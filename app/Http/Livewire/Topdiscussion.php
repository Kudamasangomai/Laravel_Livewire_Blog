<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\discussion;

class Topdiscussion extends Component
{
    public function render()
    {
        $discussionlimit = discussion::orderBy('created_at', 'DESC')->get();
        return view('livewire.topdiscussion',compact('discussionlimit', $discussionlimit));
    }

    public function detail()
    {
        $this->emit('detail');
    }
}
