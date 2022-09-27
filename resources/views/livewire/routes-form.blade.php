<div>
    <h3>Add New</h3>
    <form action="#" method="POST" wire:submit.prevent="save">
        <table>
            <tr>
                <td><label for="name">Name : </label></td>
                <td><input type="text" name="name" id="name" wire:model.defer="name"></td>
            </tr>
            @error('name')
                <tr>
                    <td colspan="2">
                        <p style="color: red">{{ $message }}</p>
                    </td>
                </tr>
            @enderror
            <tr>
                <td><label for="destinations">Destinations : </label></td>
                <td>
                    @if ($destinations->isNotEmpty())
                        @foreach ($destinations as $destination)
                            <input type="checkbox" wire:model="selectedDestinations" value="{{ $destination->id }}" /> {{ $destination->name }}
                        @endforeach
                    @endif
                </td>
            </tr>
            @error('selectedDestinations')
                <tr>
                    <td colspan="2">
                        <p style="color: red">{{ $message }}</p>
                    </td>
                </tr>
            @enderror
            <tr>
                <td><input type="submit" value="Save"></td>
                @if ($action === 'edit')
                    <td>
                        <button wire:click="setAction('create')" type="button">Cancel Editing</button>
                    </td>
                @endif
            </tr>
        </table>
    </form>
</div>
