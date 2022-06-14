<div class="d-flex col-lg-8 mx-md-auto p-0 m-0 justify-content-center">
    <div class="card bg-card-body rounded justify-content-center col-lg-8 col-12 ">
        <div class="card-body m-0 p-0 justify-content-center">
        	<div class="card-header justify-content-center text-center">
        		<a class="nav-links" href="{{ route($accessoryName.'.create') }}">Добавить новый</a>
        	</div>
            @foreach($elements as $element)
                <x-accessory.accessory 
                    :element=$element :accessoryName=$accessoryName :modelForTranslation=$modelForTranslation >
	                <x-accessory.actionsWithAccessory :element=$element :accessoryName=$accessoryName />
                </x-accessory.accessory>
            @endforeach
        </div>
    </div>
</div>