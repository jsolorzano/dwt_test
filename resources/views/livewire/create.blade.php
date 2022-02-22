<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
	New
</button>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Create user</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                     <span aria-hidden="true close-btn">×</span>

                </button>

            </div>

           <div class="modal-body">

                <form>

                    <div class="form-group">

                        <label for="exampleFormControlInput1">Name</label>

                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name" wire:model="name">

                        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror

                    </div>

                    <div class="form-group">

                        <label for="exampleFormControlInput2">Last name</label>

                        <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Enter Last Name" wire:model="last_name">

                        @error('last_name') <span class="text-danger error">{{ $message }}</span>@enderror

                    </div>

                    <div class="form-group">

                        <label for="exampleFormControlInput3">Email address</label>

                        <input type="email" class="form-control" id="exampleFormControlInput3" wire:model="email" placeholder="Enter Email">

                        @error('email') <span class="text-danger error">{{ $message }}</span>@enderror

                    </div>

                    <div class="form-group">

                        <label for="exampleFormControlInput4">Password</label>

                        <input type="password" class="form-control" id="exampleFormControlInput4" wire:model="password" placeholder="Enter password">

                        @error('password') <span class="text-danger error">{{ $message }}</span>@enderror

                    </div>

                    <div class="form-group">

                        <label for="exampleFormControlInput5">Phone</label>

                        <input type="text" class="form-control" id="exampleFormControlInput5" placeholder="Enter Phone" wire:model="phone">

                        @error('phone') <span class="text-danger error">{{ $message }}</span>@enderror

                    </div>

                    <div class="form-group">

                        <label for="exampleFormControlInput6">DNI</label>

                        <input type="text" class="form-control" id="exampleFormControlInput6" placeholder="Enter DNI" wire:model="dni">

                        @error('dni') <span class="text-danger error">{{ $message }}</span>@enderror

                    </div>

                    <div class="form-group">

                        <label for="exampleFormControlInput7">Birthday</label>

                        <input type="date" class="form-control" id="exampleFormControlInput7" placeholder="Enter Birthday" wire:model="birthday">

                        @error('birthday') <span class="text-danger error">{{ $message }}</span>@enderror

                    </div>

                </form>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>

                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save changes</button>

            </div>

        </div>

    </div>

</div>
