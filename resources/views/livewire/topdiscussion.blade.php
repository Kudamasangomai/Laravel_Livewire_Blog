
<div class="col-5 grid-margin stretch-card" >
    <div class="card">
      <div class="card-body" style="height:300px;overflow: auto;overflow-x: hidden;">
        <h4 class="card-title">To do list</h4>
    
        <div class="list-wrapper">
          <ul class="d-flex flex-column-reverse text-white todo-list todo-list-custom">
            @foreach ($discussionlimit as $item)
                
         
            <li>
    
             
                  <label > {{ $item->topic }} </label>
    
                            
                      
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>


</div>