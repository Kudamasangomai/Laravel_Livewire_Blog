<?php

namespace App\Http\Livewire;

use App\Models\comments;
use App\Models\discussion_likes;
use App\Models\discussion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;



class Discussions extends Component
{
    
    public  $total_comments,$comment,$created_at,  $objid;
    public $topic,$selected_id;
    public $discussion_body,$rand;
    public $total;  
    public $user,$confirmid;
    public $comments,$name;
    public $discussionlist = true;
    public $detailedview=false;
    public $updateform = false;
    public $image, $fileNameToStore,$userobject;

    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    protected $listeners = [
        'searched' => 'detail_discussion',
        
    ];

    protected $rules = [
        'topic' => 'required|max:25|min:5',
        'discussion_body' => 'required|min:10',
       
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }
    public function clearform()
    {
        $this->comment= '';
        $this->topic= '';
        $this->discussion_body='';
        // $this->reset();
    }

    public function render()
    {
        $discussions = discussion::orderBy('created_at', 'DESC')->paginate(5);
        return view('livewire.postform', compact('discussions',$discussions ));
    }

    public function create_discussion()
    {
        $this->validate();

    
        $newdiscussion  = new discussion();
        $newdiscussion->topic = $this->topic;
        $newdiscussion->discussion_body = $this->discussion_body;
        $newdiscussion->discussion_id = random_int(1000, 99999);
        $newdiscussion->user_id = Auth::user()->id;
        $newdiscussion->save();
        session()->flash('message', 'Post Succesfully created');
        // $this->reset();
        $this->clearform();
        $this->emit('create_discussion');
    }

    public function detail_discussion($id)
    {
        
        $discussionobject = discussion::find($id);
        $this->comments = comments::where('discussion_id', $id)->orderBy('created_at','desc')->get();
        // $this->total_comments = comments::where('discussion_id',$id)->count();
        $this->objid = $discussionobject->id;
        $this->topic = $discussionobject->topic;
        $this->discussion_body = $discussionobject->discussion_body;
        $this->created_at = $discussionobject->created_at;
        $this->user = $discussionobject->user; 
        $this->image = $discussionobject->image;
        $this->comment= '';
        $this->detailedview= true;   
        $this->discussionlist = false;
        $this->updateform = false;
   
    }
    public function edit_discuss($objid){
        $discussionpost = discussion::findOrFail($objid);
        $this->discussionlist = false;
        $this->selected_id = $objid;
        $this->topic = $discussionpost->topic;
        $this->discussion_body = $discussionpost->discussion_body; 
        $this->updateform = true;
    }
  
    public function update_discussion(){
        $this->validate([
            'selected_id' => 'required|numeric',
            'topic' => 'required',
            'discussion_body' => 'required'
        ]);
        
        if ($this->selected_id) {
            $record = discussion::find($this->selected_id);          
            $record->update([
                'topic' => $this->topic,
                'discussion_body' => $this->discussion_body
            ]);
           
                
            session()->flash('message','Post Succesfully Updated');
            $this->reset();
    }
}

    public function like_discussion($id)
    {

        $likes  = new discussion_likes();
        $likes->discussion_id = $id;
        $likes->user_id = Auth::user()->id;
        $likes->save();
    }

    public function unlike_discussion($id)
    {
        $commentobj = discussion_likes::where('discussion_id',$id)->where('user_id',Auth::user()->id);
        $commentobj->delete(); 
    }

    public function return_to_home()
    {
        $this->discussionlist = true;  
        $this->reset();
      
    }

    public function dont_delete()

    {
        $this->reset();
    }
    public function comment()
    {
        $this->validate([
            'objid' => 'required|numeric',
            'comment' => 'required|max:150',

        ]);
        
       
        $newcomment  = new comments();
        $newcomment->user_id = Auth::user()->id;
        $newcomment->discussion_id = $this->objid;
        $newcomment->comment_body = $this->comment;    
        $newcomment->save();      
        session()->flash('message', 'Comment Succesfully submitted');
        $this->comments = comments::where('discussion_id', $this->objid)->orderBy('created_at','desc')->get();
        $this->clearform();
        
        
    }


    public function confirmid($objid)
    {
        $this->confirmid = $objid;
    }

    public function delete($id)
    {
        $discuss = discussion::where('id',$id);
        $discuss->delete();
        session()->flash('message', 'Post Succesfully Deleted');
        $this->discussionlist = true;
        $this->reset();
        $this->emit('delete');

    }


    public function user_profile($id)
    {

        $this->userobject = User::find($id); 
        $this->discussionlist = false;
        $this->emit('user_profile');
    }
}
