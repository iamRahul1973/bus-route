<div>
    @if ($routes->isNotEmpty())
        <table border="1">
            <thead>
                <tr>
                    <th>Sl.No</th>
                    <th>Name</th>
                    <th>Destinations</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($routes as $route)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $route->name }}</td>
                        <td>{{ implode(', ', $route->destinations->pluck('name')->toArray()) }}</td>
                        <td><button wire:click="edit({{ $route->id }})">Edit</button></td>
                        <td><button wire:click="delete({{ $route->id }})">Delete</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
