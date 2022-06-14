<div class="d-flex col-12 mx-md-auto justify-content-center p-1">
    <div class=" bg-card-body rounded justify-content-center col-12 m-0 p-0 m-md-2 p-md-2">
    	@foreach($elements as $key => $element)
    		<x-assemble.assemble 
    			:assemble=$element
    			:modelForTranslation=$modelForTranslation
    		 />
    		 
    			
    	@endforeach
    </div>
</div>
