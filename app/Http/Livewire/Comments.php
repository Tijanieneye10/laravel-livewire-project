<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class Comments extends Component
{
    use WithPagination, WithFileUploads;
    // To change the css framework of pagination
    protected $paginationTheme = 'bootstrap';
    public $newComment, $image;
    public $ticketId;

    protected $listeners = ['fileUpload' => 'handleFileUpload', 'selectedTicket'];

    public function handleFileUpload($imageData)
    {
        $this->image = $imageData;
    }

    public function selectedTicket($ticketId)
    {
            $this->ticketId = $ticketId;
    }

    public function storeImage()
    {
        if (!$this->image) {
            return null;
        }
            $img = ImageManagerStatic::make($this->image)->encode('jpg');
            $name = Str::random(). '.jpg';
            Storage::disk('public')->put($name, $img);
            return $name;
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, ['newComment' => 'required|max:255']);
    }

    public function addComment()
    {
        $this->validate(['newComment' => 'required']); 
        $image = $this->storeImage();
        Comment::create(['body' => $this->newComment, 'user_id' => auth()->user()->id, 'image' => $image, 'support_ticket_id' => $this->ticketId]);
        session()->flash('message', 'Comment added successfully 😍  ');
        $this->newComment = '';
        $this->image = '';
    }

    // To remove comment
    public function removeComment($commentId)
    {
        $comment = Comment::find($commentId);
        Storage::disk('public')->delete($comment->image);
        $comment->delete();
        session()->flash('message', 'Comment deleted successfully 🤯  ');
    }

    public function render()
    {
        return view('livewire.comments', ['comments' => Comment::where('support_ticket_id', $this->ticketId)->latest()->paginate(2)]);
    }
}
