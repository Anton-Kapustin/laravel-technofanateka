<div class="card bg-card-body border-dark mb-2 p-2">
    @foreach($arrayItems as $key => $item)
        @if ($key != 'route')
            <span class="ml-3 mb-1 {{($key === 'id' ? ' d-none ' : '')}}">{{$key}} : {{$item}}</span>        
        @endif
    @endforeach
    @if(Route::currentRouteName() == 'admin_accessories_page')
        @if(isset($arrayItems['id']))
            <x-accessories.actions-with-accessory :accessoryName="$acessoryName" routeEditAccessory="admin_edit_" routeDeleteAccessory="delete_accessory_" :id="$arrayItems['id']"/>
        @endif
    @endif
</div>