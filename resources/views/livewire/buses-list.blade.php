<div>
    @if ($buses->isNotEmpty())
        <table border="1">
            <thead>
                <tr>
                    <th>Sl.No</th>
                    <th>Name</th>
                    <th>Seats Available</th>
                    <th>Route</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($buses as $bus)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $bus->name }}</td>
                        <td>{{ $bus->seats_available }}</td>
                        <td>{{ $bus->route->name }}</td>
                        <td><button wire:click="edit({{ $bus->id }})">Edit</button></td>
                        <td><button wire:click="delete({{ $bus->id }})">Delete</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p style="color: red">Sorry, there is nothing to show here</p>
    @endif
</div>
