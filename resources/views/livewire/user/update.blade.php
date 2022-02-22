<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

       <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="updateModalLabel">Update user</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">×</span>

                </button>

            </div>

            <div class="modal-body">

                <form>

                    <div class="form-group">

                        <input type="hidden" wire:model="user_id">

                        <label for="updateFormControlInput1">Name</label>

                        <input type="text" class="form-control" wire:model="name" id="updateFormControlInput1" placeholder="Enter Name">

                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror

                    </div>

                    <div class="form-group">

                        <label for="updateFormControlInput2">Last name</label>

                        <input type="text" class="form-control" wire:model="last_name" id="updateFormControlInput2" placeholder="Enter Last Name">

                        @error('last_name') <span class="text-danger">{{ $message }}</span>@enderror

                    </div>

                    <div class="form-group">

                        <label for="updateFormControlInput3">Email address</label>

                        <input type="email" class="form-control" wire:model="email" id="updateFormControlInput3" placeholder="Enter Email">

                        @error('email') <span class="text-danger">{{ $message }}</span>@enderror

                    </div>
                    
                    <div class="form-group">

                        <label for="updateFormControlInput4">Password</label>

                        <input type="password" class="form-control" wire:model="password" id="updateFormControlInput4" placeholder="Enter password">

                        @error('password') <span class="text-danger error">{{ $message }}</span>@enderror

                    </div>
                    
                    <div class="form-group">

                        <label for="updateFormControlInput5">Phone</label>

                        <input type="text" class="form-control" wire:model="phone" id="updateFormControlInput5" placeholder="Enter Phone">

                        @error('phone') <span class="text-danger error">{{ $message }}</span>@enderror

                    </div>

                    <div class="form-group">

                        <label for="updateFormControlInput6">DNI</label>

                        <input type="text" class="form-control" wire:model="dni" id="updateFormControlInput6" placeholder="Enter DNI">

                        @error('dni') <span class="text-danger error">{{ $message }}</span>@enderror

                    </div>

                    <div class="form-group">

                        <label for="updateFormControlInput7">Birthday</label>

                        <input type="date" class="form-control" wire:model="birthday" id="updateFormControlInput7" placeholder="Enter Birthday">

                        @error('birthday') <span class="text-danger error">{{ $message }}</span>@enderror

                    </div>

                </form>

            </div>

            <div class="modal-footer">

                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>

                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Save changes</button>

            </div>

       </div>

    </div>

</div>
