@if(session()->exists('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ __('Alerts.'.session('success')) }}
        <button type="button" class="close " data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    
@elseif(session('danger'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{ __('Alerts.'.session('danger')) }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="bg-danger" aria-hidden="true">&times;</span>
        </button>

    </div>
@endif