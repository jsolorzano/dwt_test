<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Mail;

class Mails extends Component
{
	use WithPagination;
	
	/**
     * Theme to use for pagination.
     *
     * @var string
     */
	protected $paginationTheme = 'bootstrap';
	
	/**
     * Attributes to handle the search engine .
     *
     * @var string
     */
	public $search = '';
	protected $queryString = ['search'];
	
	/**
     * List and mail fields .
     *
     * @var array<int, string>
     */
	public $mails, $subject, $recipient, $message, $user_id, $mail_id;
	public $updateMode = false;
	
	/**
     * Method to reset pagination after filtering data
     *
     * @return void
     */
	public function updatingSearch()
    {
        $this->resetPage();
    }
    
    /**
     * Show the list of mails.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function render()
    {
		$user_id = auth()->user()->id;
		// If you are an administrator 
		if(auth()->user()->is_admin){
			return view('livewire.mail.mails', [
				'list_mails' => Mail::where('subject', 'like', '%'.$this->search.'%')
				->orWhere('recipient', 'like', '%'.$this->search.'%')
				->orWhere('message', 'like', '%'.$this->search.'%')
				->paginate(10),
			]);
		}else{  // If you are not an administrator 
			return view('livewire.mail.mails', [
				'list_mails' => Mail::where('user_id', $user_id)->where(function($query) {
					$query->where('subject', 'like', '%'.$this->search.'%')
					->orWhere('recipient', 'like', '%'.$this->search.'%')
					->orWhere('message', 'like', '%'.$this->search.'%');
				})->paginate(10),
			]);
		}
    }
    
    /**
     * Empty the mail fields.
     *
     * @return void
     */
    private function resetInputFields(){

        $this->subject = '';
        $this->recipient = '';
        $this->message = '';

    }
	
	/**
     * Create a new mail instance after a valid registration.
     *
     * @return void
     */
    public function store()
    {

        $validatedDate = $this->validate([

            'subject' => 'string|required',
            'recipient' => 'required|email',
            'message' => 'string|required',

        ]);
        
        $validatedDate['user_id'] = (int)auth()->user()->id;

        Mail::create($validatedDate);

        session()->flash('message', 'Mail Created Successfully.');

        $this->resetInputFields();

        $this->emit('mailStore'); // Close model to using to jquery

    }

	/**
     * Gets and sets the values of a queried mail.
     *
     * @return void
     */
    public function edit($id)
    {

        $this->updateMode = true;

        $mail = Mail::where('id',$id)->first();

        $this->mail_id = $id;

        $this->subject = $mail->subject;

        $this->recipient = $mail->recipient;

        $this->message = $mail->message;

        $this->user_id = $mail->user_id;

    }
	
	/**
     * Abort the changes and empty the attributes.
     *
     * @return void
     */
    public function cancel()
    {

        $this->updateMode = false;

        $this->resetInputFields();

    }
	
	/**
     * Update a mail instance after a valid registration.
     *
     * @return void
     */
    public function update()
    {

        $validatedDate = $this->validate([

            'subject' => 'string|required',
            'recipient' => 'required|email',
            'message' => 'string|required',

        ]);

        if ($this->mail_id) {

            $mail = Mail::find($this->mail_id);
			
			$data_update = [
                'subject' => $this->subject,
                'recipient' => $this->recipient,
                'message' => $this->message,
            ];

            $mail->update($data_update);

            $this->updateMode = false;

            session()->flash('message', 'Mail Updated Successfully.');

            $this->resetInputFields();

			$this->emit('mailUpdate'); // Close model to using to jquery

        }

    }
	
	/**
     * Delete a mail instance and sets a message in session.
     *
     * @return void
     */
    public function delete($id)
    {

        if($id){

            Mail::where('id',$id)->delete();

            session()->flash('message', 'Mail Deleted Successfully.');

        }

    }

}
