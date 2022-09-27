<div>
    @if ($bookings->isNotEmpty())
        <ul>
            @foreach ($bookings as $booking)
                <li>{{ $booking->bus->name }} going through {{ implode(', ', $booking->bus->route->destinations->pluck('name')->toArray()) }} - Booked by {{ $booking->user->name }}</li>
            @endforeach
        </ul>
    @endif
</div>
