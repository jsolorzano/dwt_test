<div>

    @include('livewire.mail.create')

    @include('livewire.mail.update')
    
    <input wire:model="search" type="search" class="bg-light border-1 medium" placeholder="Search by subject, ...">

    @if (session()->has('message'))

        <div class="alert alert-success" style="margin-top:30px;">x

          {{ session('message') }}

        </div>

    @endif

    <table class="table table-bordered mt-8">

        <thead>

            <tr>

                <th>No.</th>

                <th>Subject</th>

                <th>Recipient</th>

                <th>User</th>

                <th>Action</th>

            </tr>

        </thead>

        <tbody>

            @foreach($list_mails as $value)

            <tr>

                <td>{{ $value->id }}</td>

                <td>{{ $value->subject }}</td>

                <td>{{ $value->recipient }}</td>

                <td>{{ $value->user->name }} {{ $value->user->last_name }}</td>

                <td>

                <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $value->id }})" class="btn btn-primary btn-sm">Edit</button>

                <button wire:click="delete({{ $value->id }})" class="btn btn-danger btn-sm">Delete</button>

                </td>

            </tr>

            @endforeach

        </tbody>
        
        <tfoot>
			
			<th colspan="8">{{ $list_mails->links() }}</th>
        
        </tfoot>

    </table>

</div>
