<div>
    <input type="text" class="form-control" id="search" wire:model.debounce="searched_topic" placeholder="Search Topic">


    @if ($searched_topic)


    <div id="searchdiv">
        <ul>
            @foreach ($topics as $topic)
            <li>
                <button wire:click="searched({{ $topic->id }})" class="btn" id="btn">
                    {{ $topic->topic }}
                </button>
            </li>
            @endforeach
        </ul>



    </div>
    @endif








</div>
<style>
    #search {
        border: 2px white solid;
        width: 200%;
        color: white;

    }

    #searchdiv {
        z-index: 12;
        position: absolute;
        background-color: white;
        color: black;
        width: 38%;

    }

    #btn {
        color: black;
    }

    #searchdiv ul li {
        list-style: none;

    }
</style>