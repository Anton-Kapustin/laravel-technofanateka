<ul class="nav nav-pills  rounded mx-auto mb-2 ">

    <li class="nav-item">
        <a class="nav-link {{ (Route::currentRouteName() == 'Cpu.index' ? ' nav-links-active' : 'nav-links') }} " href="{{ route('Cpu.index') }}"> <small>{{ __('Accessory.cpu') }}</small>  </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ (Route::currentRouteName() == 'Motherboard.index' ? ' nav-links-active' : 'nav-links') }} " href="{{route('Motherboard.index')}}"> <small>{{ __('Accessory.motherboard') }}</small><span class="sr-only">(current)</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ (Route::currentRouteName() == 'Cooller.index' ? ' nav-links-active' : 'nav-links') }} " href="{{route('Cooller.index')}}"> <small>{{ __('Accessory.cooller') }}</small><span class="sr-only">(current)</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ (Route::currentRouteName() == 'Ram.index' ? ' nav-links-active' : 'nav-links') }} " href="{{route('Ram.index')}}"> <small>{{ __('Accessory.ram') }}</small><span class="sr-only">(current)</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ (Route::currentRouteName() == 'Ssd.index' ? ' nav-links-active' : 'nav-links') }} " href="{{route('Ssd.index')}}"> <small>{{ __('Accessory.ssd') }}</small><span class="sr-only">(current)</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ (Route::currentRouteName() == 'Hdd.index' ? ' nav-links-active' : 'nav-links') }} " href="{{route('Hdd.index')}}"> <small>{{ __('Accessory.hdd') }}</small><span class="sr-only">(current)</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ (Route::currentRouteName() == 'VideoCard.index' ? ' nav-links-active' : 'nav-links') }} " href="{{route('VideoCard.index')}}"> <small>{{ __('Accessory.videoCard') }}</small><span class="sr-only">(current)</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ (Route::currentRouteName() == 'PcCase.index' ? ' nav-links-active' : 'nav-links') }} " href="{{route('PcCase.index')}}"> <small>{{ __('Accessory.pcCase') }}</small><span class="sr-only">(current)</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ (Route::currentRouteName() == 'PowerSupply.index' ? ' nav-links-active' : 'nav-links') }} " href="{{route('PowerSupply.index')}}"> <small>{{ __('Accessory.powerSupply') }}</small><span class="sr-only">(current)</span></a>
    </li>
    
</ul>


