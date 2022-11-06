<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Userprofile extends Component
{
    Use WithFileUploads;
    public $name;  
    public $email; 
    public $user_object ;
    public $updateid;
    public $image;

  

    protected $rules =[

        'name' => 'required|max:30|min:3',
        'email' => 'required',
     
 
    ];
    public function mount()
    {
        $user_object = User::find(Auth::user()->id);
        $this->name = $user_object->name;
        $this->email = $user_object->email;
        $this->updateid = $user_object->id;
        $this->image = $user_object->image;
    }
    public function render()
    {
   
        return view('livewire.userprofile');
    }

 
    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function update_profile()
    {
      
        $this->validate([
            'updateid' => 'required',
            'name' => 'required|max:30|min:3',
             'email' => 'required',
      
             
             
        ]);



    
            if ($this->updateid) {
                $user_record = User::find($this->updateid);    
                $user_record->update([
                    
                    'name' => $this->name,
                    'email' => $this->email,
            
                ]); 
           
                session()->flash('message','User Profile Succesfully Updated');
      
        }

        }
}
