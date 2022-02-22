<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

       <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="updateModalLabel">Update mail</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">×</span>

                </button>

            </div>

            <div class="modal-body">

                <form>

                    <div class="form-group">

                        <input type="hidden" wire:model="mail_id">

                        <input type="hidden" wire:model="user_id">

                        <label for="updateFormControlInput1">Subject</label>

                        <input type="text" class="form-control" wire:model="subject" id="updateFormControlInput1" placeholder="Enter Subject">

                        @error('subject') <span class="text-danger">{{ $message }}</span>@enderror

                    </div>

                    <div class="form-group">

                        <label for="updateFormControlInput2">Recipient</label>

                        <input type="text" class="form-control" wire:model="recipient" id="updateFormControlInput2" placeholder="Enter Recipient">

                        @error('recipient') <span class="text-danger">{{ $message }}</span>@enderror

                    </div>

                    <div class="form-group">

                        <label for="updateFormControlInput3">Message</label>

                        <textarea class="form-control" wire:model="message" id="updateFormControlInput3" placeholder="Enter Message"></textarea>

                        @error('message') <span class="text-danger">{{ $message }}</span>@enderror

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
