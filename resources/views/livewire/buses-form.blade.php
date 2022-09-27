<div>
    <h3>Add New</h3>
    <form wire:submit.prevent="save">
        <table>
            <tr>
                <td><label for="name">Name : </label></td>
                <td><input type="text" id="name" wire:model.defer="name"></td>
            </tr>
            @error('name')
                <tr>
                    <td colspan="2">
                        <p style="color: red">{{ $message }}</p>
                    </td>
                </tr>
            @enderror
            <tr>
                <td><label for="seats_available">Seats Available : </label></td>
                <td><input type="number" id="seats_available" wire:model.defer="seats_available"></td>
            </tr>
            @error('seats_available')
                <tr>
                    <td colspan="2">
                        <p style="color: red">{{ $message }}</p>
                    </td>
                </tr>
            @enderror
            <tr>
                <td><label for="route_id">Route : </label></td>
                <td>
                    <select wire:model="route_id" id="route_id">
                        <option>Select a route</option>
                        @if ($routes->isNotEmpty())
                            @foreach ($routes as $route)
                                <option value="{{ $route->id }}">{{ $route->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </td>
            </tr>
            @error('route_id')
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
