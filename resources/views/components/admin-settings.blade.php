<div class="card text-white border-secondary w-100 mb-3 p-0 m-0" style="background: linear-gradient(90deg, rgba(25,0,48,1) 0%, rgba(44,2,68,1) 49%, rgba(28,0,31,1) 100%);">
    <div class="card-header" style="background: linear-gradient(90deg, rgba(25,0,48,1) 0%, rgba(44,2,68,1) 49%, rgba(28,0,31,1) 100%);">
        <h5>Telegram Settings</h5>
        <ul class="list-unstyled">
            <li> Telegram PUSH: <a class="btn btn-circle {{($telegram_status['webhook'] == 1 ? 'btn-success text-success' : 'btn-danger text-danger')}} " href="{{($telegram_status['webhook'] == 1 ? route('telegram_remove_webhook')  : route('telegram_set_webhook'))}}"></a></li>
        </ul>
    </div>
</div>