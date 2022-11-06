<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\discussion;

class AllDiscussionCount extends Component
{
    
 
    public $all_discussion_count;
    protected $listeners = [
        'create_discussion' => 'render',
        'delete' => 'render'
    ];

     public function render()
    {    
       
        $this->all_discussion_count = discussion::count();
        return view('livewire.all-discussion-count');

    }
}
