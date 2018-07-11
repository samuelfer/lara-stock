<div class="container-fluid">
    @if(session()->has('flash_message'))
        <div class="message alert alert-{{bootstrap_message(session()->get('flash_message_type'))}}">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{session()->get('flash_message')}}
        </div>
     @endif
</div>

