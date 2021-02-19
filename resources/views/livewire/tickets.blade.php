<div class="border p-4" style="margin-top: 20px">
 <h1>Support Tickets</h1>
 @foreach($tickets as $ticket)
 <div class="card mb-1 {{ $active == $ticket->id ? 'bg-info' : '' }}" style="">
    <div class="card-body" wire:click="$emit('selectedTicket', {{ $ticket->id }})">
     {{ $ticket->question }}
    </div>
  </div>
  @endforeach
</div>
