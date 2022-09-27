<div>
    <h3>
        @if ($action === 'create')
            Add New
        @else
            Edit {{ $itemToEdit->name }}
        @endif
    </h3>

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
                <td><label for="fees">Fees : </label></td>
                <td><input type="text" name="fees" id="fees" wire:model.defer="fees"></td>
            </tr>
            @error('fees')
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
