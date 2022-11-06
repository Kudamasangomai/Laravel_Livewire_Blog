<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\discussion;
class Search extends Component
{
    public $searched_topic="";
    public $list;

    public function render()
    {
        return view('livewire.search',[
            'topics' => discussion::where('topic','like', '%' . $this->searched_topic .'%')->get()
        ]);
    }

    public function searched($id)
    {
      
        $this->emit('searched',$id);
        $this->searched_topic ="";
    }


   
 
}  