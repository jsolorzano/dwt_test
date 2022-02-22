<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Mail;
use Illuminate\Support\Facades\Hash;

class Users extends Component
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
     * List and user fields .
     *
     * @var array<int, string>
     */
	public $users, $name, $last_name, $email, $password, $phone, $dni, $birthday, $user_id;
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
     * Show the list of users.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function render()
    {
        return view('livewire.user.users', [
            'list_users' => User::where('name', 'like', '%'.$this->search.'%')
            ->orWhere('last_name', 'like', '%'.$this->search.'%')
            ->orWhere('email', 'like', '%'.$this->search.'%')
            ->orWhere('phone', 'like', '%'.$this->search.'%')
            ->orWhere('dni', 'like', '%'.$this->search.'%')
            ->paginate(10),
        ]);
    }
    
    /**
     * Empty the user fields.
     *
     * @return void
     */
    private function resetInputFields(){

        $this->name = '';
        $this->last_name = '';
        $this->email = '';
        $this->password = '';
        $this->phone = '';
        $this->dni = '';
        $this->birthday = '';

    }
	
	/**
     * Create a new user instance after a valid registration.
     *
     * @return void
     */
    public function store()
    {

        $validatedDate = $this->validate([

            'name' => 'required',
            'last_name' => 'nullable',
            'email' => 'required|email',
            'password' => 'required',
            'phone' => 'required|min:8|max:11',
            'dni' => 'required|unique:App\Models\User,dni|size:8',
            'birthday' => 'required',

        ]);
        
        $validatedDate['password'] = Hash::make($validatedDate['password']);
        $validatedDate['dni'] = (int)$validatedDate['dni'];

        User::create($validatedDate);

        session()->flash('message', 'User Created Successfully.');

        $this->resetInputFields();

        $this->emit('userStore'); // Close model to using to jquery

    }

	/**
     * Gets and sets the values of a queried user.
     *
     * @return void
     */
    public function edit($id)
    {

        $this->updateMode = true;

        $user = User::where('id',$id)->first();

        $this->user_id = $id;

        $this->name = $user->name;

        $this->last_name = $user->last_name;

        $this->email = $user->email;

        $this->phone = $user->phone;

        $this->dni = $user->dni;

        $this->birthday = $user->birthday;

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
     * Update a user instance after a valid registration.
     *
     * @return void
     */
    public function update()
    {

        $validatedDate = $this->validate([

            'name' => 'required',
            'last_name' => 'nullable',
            'email' => 'required|email',
            'password' => 'nullable',
            'phone' => 'required|min:8|max:11',
            'dni' => 'required|unique:App\Models\User,dni,'.$this->user_id.'|size:8',
            'birthday' => 'required',

        ]);
        
        $validatedDate['password'] = Hash::make($validatedDate['password']);
        $validatedDate['dni'] = (int)$validatedDate['dni'];

        if ($this->user_id) {

            $user = User::find($this->user_id);
			
			$data_update = [
                'name' => $this->name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'phone' => $this->phone,
                'dni' => $this->dni,
                'birthday' => $this->birthday,
            ];
            
            if($this->password != "" && $this->password != null){
				$data_update['password'] = Hash::make($this->password);
			}

            $user->update($data_update);

            $this->updateMode = false;

            session()->flash('message', 'User Updated Successfully.');

            $this->resetInputFields();

			$this->emit('userUpdate'); // Close model to using to jquery

        }

    }
	
	/**
     * Delete a user instance if he has no mails and sets a message in session.
     *
     * @return void
     */
    public function delete($id)
    {

        if($id){

            $mails = Mail::where('user_id', $id)->get();
            
            if($mails->isEmpty()){

				User::where('id', $id)->delete();

				session()->flash('message', 'User Deleted Successfully.');
            
			}else{
				
				session()->flash('warning', 'User not deleted (Has associated mails).');
				
			}

        }

    }

}
