<?php

namespace App\Http\Livewire;



use App\Models\discussion;
use Livewire\Component;

class DiscussionsTotal extends Component
{
    public $total,$all_discussion_count;
    protected $listeners = [
        'create_discussion' => 'render',
        'delete' => 'render'
    ];

     public function render()
    {    
        $this->total =discussion::where('user_id', auth()->user()->id)->count();
        $this->all_discussion_count = discussion::count();
        return view('livewire.discussions-total');

    }



}
