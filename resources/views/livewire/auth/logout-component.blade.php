<div class="d-flex">

    <a href="{{route('video.create',['channel'=>Auth::user()->channel])}}" class="mx-5 text-dark">
        <span class="material-icons ">video_call</span>
    </a> 
    <button wire:click='logout' class="btn btn-outline-success">Sair</button>

</div>
