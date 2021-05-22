<div>
    <h1 class="text-3x1">Support Tickets</h1>
    @foreach($tickets as $ticket)
        <div 
            class="rounded border shadow p-3 my-2 {{ $active == $ticket->id ? 'bg-green-200' : '' }}" 
            wire:click="$emit('ticketSelected', {{ $ticket->id }})"

        >
            <div class="flex justify-between my-2">
                <div class="flex">
                    <p class="font-bold text-lg">{{ $ticket->supportTicket->creator->name ?? '' }}</p>
                    <p class="mx-3 py-1 text-xs text-gray-500 font-semibold">{{ $ticket->created_at->diffForHumans() }}
                    </p>
                </div>
                
            </div>
            <p class="text-gray-800">{{ $ticket->question }}</p>
        </div>
    @endforeach

</div>
