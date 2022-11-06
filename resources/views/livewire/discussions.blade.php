<div>
  @forelse($discussions  as $discussion )
    <div class="col-md-9 grid-margin stretch-card mb-1">
    
        <div class="card">
          <div class="card-body">
            <div class="me-auto text-sm-right pt-2 pt-sm-0">    
              </div>
            <div class="row">
              <div class="col-12">
                <div class="preview-list">
                  <div class="preview-item border-bottom">
                 
                    <img src="assets/images/faces/face3.jpg" alt="image" class="img-s rounded-circle" />
                    <div class="preview-item-content d-sm-flex flex-grow">
                      <div class="flex-grow">
                        <h6 class="preview-subject">{{ $discussion->topic }}  </h6>
                        <p class="text-muted mb-2">{{ $discussion->discussion_body }}</p>
                        @if ($confirmid === $discussion->id )
                        <button class="btn btn-success" wire:click="delete({{$discussion->id}})">Yes Delete!</button>
                        <button class="btn btn-danger" wire:click="dont_delete()">No Cancel!</button>
                        @else

                        <div class="flex items-center" style="word-spacing: 2px;">
                        @if ($discussion->userliked(auth()->user()))
                        <i class="mdi mdi-thumb-up" wire:click="unlike_discussion({{ $discussion->id  }})"></i> 
                        {{ $discussion->likes->count() }} {{ Str::plural('like',$discussion->likes->count()) }}
                            @else
                            <i class="mdi mdi-thumb-up-outline" class="btn"
                            wire:click="like_discussion({{ $discussion->id  }})">                            
                              {{ $discussion->likes->count() }}
                              {{ Str::plural('like',$discussion->likes->count()) }}
                            </i> 
                        @endif 

                        <button  wire:click="detail_discussion({{ $discussion->id }})" class="btn" >            
                        <i class="mdi mdi-message-plus" style="word-spacing:0px;">
                          {{ $discussion->comments->count() }}
                          {{ Str::plural('comment',$discussion->comments->count()) }}
                        </i>
                      </button>
              
                        @if (Auth::user()->id == $discussion->user_id)
                        <button  wire:click="confirmid({{$discussion->id}})" class="btn" >delete</button> 
                        @endif
                                   
                        @endif
                        </div>
                      </div>
                      <div class="me-auto text-sm-right pt-2 pt-sm-0">
                        <p class="text-muted">{{ $discussion->created_at->diffForHumans() }}</p>
                  
                        <p class="text-muted">{{ $discussion->user->name }}</p>
                      </div>
                    </div>

                 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       
    </div>
    @empty
    
    <h3 class="text-muted mb-2 ml-50">No Posts</h3>
    @endforelse
</div>
{{ $discussions->links() }}



