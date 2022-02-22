<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
	New
</button>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Create mail</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                     <span aria-hidden="true close-btn">×</span>

                </button>

            </div>

           <div class="modal-body">

                <form>

                    <div class="form-group">

                        <label for="exampleFormControlInput1">Subject</label>

                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Subject" wire:model="subject">

                        @error('subject') <span class="text-danger error">{{ $message }}</span>@enderror

                    </div>

                    <div class="form-group">

                        <label for="exampleFormControlInput2">Recipient</label>

                        <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="Enter Recipient" wire:model="recipient">

                        @error('recipient') <span class="text-danger error">{{ $message }}</span>@enderror

                    </div>

                    <div class="form-group">

                        <label for="exampleFormControlInput3">Message</label>
						
                        <textarea class="form-control" id="exampleFormControlInput3" wire:model="message" placeholder="Enter Message"></textarea>

                        @error('message') <span class="text-danger error">{{ $message }}</span>@enderror

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
