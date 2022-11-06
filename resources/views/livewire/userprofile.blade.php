<div>


    <h4 class="card-title text-black">Profile Settings</h2>


    <div class="row">
        <div class="col-9 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <input type="hidden" wire:model="updateid">
                        <img src="assets/images/faces/face3.jpg" alt="image" class="img-s rounded-circle" />
                        {{ $image }}
                        @include('layouts.message')
                        <div class="form-group">
                            <label for="exampleInputUsername1"></label>
                            <input type="text" class="form-control text-white" wire:model.debounce="name"
                               >
                            @error('name')<span class="error">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputUsername1"></label>
                            <input type="text" class="form-control text-white" wire:model="email"
                                >
                            @error('email')<span class="error">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputUsername1"></label>
                            <input type="file" class="form-control text-white" wire:model="image"
                                >
                            @error('image')<span class="error">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group mt-2">
                            @if ($errors->count() > 0)
                            <button type="submit" disabled="disabled"
                            class="btn btn-primary me-2">Submit</button>
                                @else
                             
                                    <button type="submit" wire:click="update_profile()"
                                    class="btn btn-primary me-2">Submit</button>
                           
                             
                            @endif
                            <button class="btn btn-danger" wire:click="clearform()">Cancel</button>
                        </div>

                   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>