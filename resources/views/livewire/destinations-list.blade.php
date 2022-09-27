<div>
    @if ($destinations->isNotEmpty())
        <table border="1">
            <thead>
                <tr>
                    <th>Sl.No</th>
                    <th>Name</th>
                    <th>Fee</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($destinations as $destination)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $destination->name }}</td>
                        <td>{{ $destination->fees }}</td>
                        <td><button wire:click="edit({{ $destination->id }})">Edit</button></td>
                        <td><button wire:click="delete({{ $destination->id }})">Delete</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p style="color: red">Sorry, there is nothing to show here</p>
    @endif
</div>
