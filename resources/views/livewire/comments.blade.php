<div class=" justify-content-center" style="margin-top: 20px">
    <form wire:submit.prevent="addComment">
        <div>
            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
        </div>
        <section>
            @if($image)
            <img src="{{ $image }}" alt="upload image" width="100px">
            @endif
            <input type="file" name="" id="image" wire:change="$emit('postAdded')">
        </section>
        <div class="form-group mt-1">
            <input type="text" name="comment" placeholder="Enter Comment" class="form-control"
                wire:model.debounce.500ms="newComment">
            @error('newComment') <span class="error text-danger">{{ $message }}</span> @enderror

        </div>
        <div class="form-group">
            <button type="submit" class="form-control btn btn-primary">Add comment</button>
        </div>
    </form>

    @foreach($comments as $comment)
    <div class="card mt-3">
        <h5 class="card-header">{{ ucfirst($comment->creator->name) }}
            <span>{{ $comment->created_at->diffForHumans() }}</span></h5>
        <div class="card-body">
            @if($comment->image)
                <img src="{{ $comment->imagePath }}" alt="image">
            @endif
            <p class="card-text">{{ $comment->body }}</p>
            <i class="fa fa-times float-right text-danger" style="cursor: pointer"
                wire:click="removeComment({{ $comment->id }})"></i>
        </div>
    </div>
    @endforeach
    <div class="mt-1">
        {{ $comments->links() }}
    </div>
</div>

<script>
    window.livewire.on('postAdded', () => {
        const image = document.getElementById('image')
        const inputField = image.files[0]
        let reader = new FileReader();
        reader.onloadend = ()=>{
            window.livewire.emit('fileUpload', reader.result)
        }
        reader.readAsDataURL(inputField)
    })
</script>
