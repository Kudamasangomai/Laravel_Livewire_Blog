<div>
  @if ($discussionlist)
  <div class="row">
    <div class="col-9 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">

          @include('layouts.message')

          <h4 class="card-title">post form here</h2>

            <div class="form-group">

              <form wire:submit.prevent="create_discussion">
                <div class="form-group">
                  <label for="exampleInputUsername1"></label>
                  <input type="text" class="form-control text-white" wire:model.debounce="topic" placeholder="Topic e.g Django vs Laravel">
                  @error('topic')<span class="error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                  <textarea class="form-control text-white" wire:model.debounce="discussion_body" rows="10"
                    cols="10" placeholder="which one is better between the two"></textarea>
                  @error('discussion_body')<span class="error">{{ $message }}</span>@enderror
                </div>
          
                <div class="form-group mt-2">
                  <button type="submit" wire:click="$emit('create_discussion')"
                    class="btn btn-primary me-2">Submit</button>
                  <button class="btn btn-danger" wire:click="clearform()">Cancel</button>
                </div>
              </form>
            </div>
        </div>
      </div>
    </div>

  </div>


  @include('livewire.discussions')
  


  @elseif($updateform)
         @include('livewire.edit_discuss')

  @elseif($detailedview)

          @include('livewire.detail-discussion')
@else
@livewire('userprofile')
  @endif


</div>