<div>

    @include('livewire.create')

    @include('livewire.update')

    @if (session()->has('message'))

        <div class="alert alert-success" style="margin-top:30px;">x

          {{ session('message') }}

        </div>

    @endif
    
    <input wire:model="search" type="search" class="bg-light border-1 medium" placeholder="Search by name, ...">

    <table class="table table-bordered mt-8">

        <thead>

            <tr>

                <th>No.</th>

                <th>Name</th>

                <th>Last Name</th>

                <th>Email</th>

                <th>Phone</th>

                <th>DNI</th>

                <th>Birthday</th>

                <th>Action</th>

            </tr>

        </thead>

        <tbody>

            @foreach($list_users as $value)

            <tr>

                <td>{{ $value->id }}</td>

                <td>{{ $value->name }}</td>

                <td>{{ $value->last_name }}</td>

                <td>{{ $value->email }}</td>

                <td>{{ $value->phone }}</td>

                <td>{{ $value->dni }}</td>

                <td>{{ $value->birthday }}</td>

                <td>

                <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $value->id }})" class="btn btn-primary btn-sm">Edit</button>

                <button wire:click="delete({{ $value->id }})" class="btn btn-danger btn-sm">Delete</button>

                </td>

            </tr>

            @endforeach

        </tbody>
        
        <tfoot>
			
			<th colspan="8">{{ $list_users->links() }}</th>
        
        </tfoot>

    </table>

</div>
