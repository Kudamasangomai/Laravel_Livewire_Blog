<div>




  <form wire:submit.prevent="comment">
    <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            @include('layouts.message')
            <div class="d-flex flex-row justify-content-between">
              <h6 class="text-muted font-weight-normal mb-1">{{ $user->name }}</h6>
              <p class="text-muted mb-1">   <button class="btn btn-inverse-danger" wire:click="return_to_home()">X </button></p>
            </div>
            <h4 class="card-title">{{ $topic }} </h4>
            <input type="hidden" wire:model="objid">
            <img  class="img-rounded img-fluid"
            src="/{{$image}}">
            <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
              <div class="text-md-center text-xl-left">
                <h6 class="text-muted font-weight-normal">{{ $discussion_body }}</h6>
     
              </div>
            </div>
            {{-- @if ($confirmid === $objid)
            @else
              @error('comment')<span class="error">{{ $message }}</span>@enderror
              @endif --}}
              @error('comment')<span class="error">{{ $message }}</span>@enderror
            <textarea class="form-control text-white mb-3" wire:model="comment" placeholder="Comment Here" rows="10"
              cols="10"></textarea>
          

            @if ($confirmid === $objid)
            <span><strong>Are Your Sure?</strong></span>
            <div class="form-group">

              <button class="btn btn-success btn-rounded" wire:click="delete({{$objid}})">Yes Delete!</button>
              <button class="btn btn-inverse-primary btn-rounded" wire:click="dont_delete({{$objid}})">No Cancel!</button>
              @else

          
              <button type="submit" wire:click="comment()" class="btn btn-primary">Submit</button>
             
              @if(Auth::user()->id == $user->id)
              <button class="btn btn-warning" wire:click="edit_discuss({{$objid}})"
                style="border-bottom: 1px solid white;">Edit</button>
              <button class="btn btn-danger" wire:click="confirmid({{$objid}})">Delete</button>

              @endif
              @endif
            </div>

          </div>
        </div>
      </div>
    
    </div>
  </form>

  <div class="row">
    <div class="col-md-9  grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex flex-row justify-content-between">
            <h4 class="card-title">
              {{-- {{ $total_comments }} --}}
              {{ $comments->count() }}
              {{ Str::plural('Comment', $total_comments) }}
            </h4>

          </div>
          @forelse($comments as $row)




          <div class="preview-list">
            <div class="preview-item border-bottom">
              <div class="preview-thumbnail">
                <img src="assets/images/faces/face6.jpg" alt="image" class="rounded-circle" />
              </div>
              <div class="preview-item-content d-flex flex-grow">
                <div class="flex-grow">
                  <div class="d-flex d-md-block d-xl-flex justify-content-between">
                    <h6 class="preview-subject">{{ $row->user->name }}</h6>
                    <p class="text-muted text-small">{{ $row->created_at->diffForHumans() }}</p>
                  </div>
                  <p class="text-muted">{{$row->comment_body}}</p>
                </div>
              </div>
            </div>
          </div>
@empty
          <h4>no comments</h4>
          @endforelse
        </div>
      </div>

    </div>

  </div>

</div>