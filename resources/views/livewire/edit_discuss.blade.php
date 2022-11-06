<div>

    <div class="row">
   
        <div class="col-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Udpate Form </h2>
    
        <input type="hidden" wire:model="selected_id">
        <div class="form-group">
            <label for="categoryName">Name:</label>
            <input type="text" class="form-control text-white" wire:model.debounce="topic">
            @error('topic')      <span class="error">{{ $message }}</span>     @enderror
        </div>
        <div class="form-group">
            <label for="categoryDescription">Description:</label>
            <input type="text"class="form-control" id="discussion_body" wire:model="discussion_body" placeholder="Enteremail">
            @error('discussion_body') <span class="text-danger">{{ $message }}</span>@enderror
        </div>

    
    
    


            <button type="submit" wire:click="update_discussion()" class="btn btn-primary me-2">Update</button>
            <button  class="btn btn-danger" wire:click="clearform()">Cancel</button>
    
              </div>
            </div>
        </div>
    </div>
    
    </div>
    
              
            
            
    
    
          
     
    
    
      