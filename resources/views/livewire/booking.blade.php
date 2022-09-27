<div>
    <form wire:submit.prevent="search">
        <div>
            <label for="destination">Destinations</label>
            <select wire:model.defer="selectedDestination" id="destination">
                <option>Select a destination</option>
                @if ($destinations->isNotEmpty())
                    @foreach ($destinations as $destination)
                        <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                    @endforeach
                @endif
            </select>
            @error('selectedDestination')
                <p style="color: red">{{ $mesage }}</p>
            @enderror
        </div>
        <div>
            <button type="button" wire:click="search">Search</button>
        </div>
    </form>
    @if (!is_null($routes))
        <h4>Search Results</h4>
        <ul>
            @foreach ($routes as $route)
               @foreach ($route->buses as $bus)
                    <li>{{ $bus->name }} (Remaining : {{ $bus->remaining_seats }} Out of {{ $bus->seats_available }}) <button wire:click="book({{ $bus->id }})">Book</button></li>
               @endforeach
            @endforeach
        </ul>
    @endif
</div>
