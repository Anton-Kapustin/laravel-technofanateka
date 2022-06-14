<div class="form-group row">
	<label for="{{ $name }}"
	    class="col-lg-3 col-form-label text-light text-lg-right">{{ (Lang::has($modelForTranslation.$name)) ? __($modelForTranslation.$name) : $name }}
	</label>

	<div class="col-lg-9">
	    <select class="selectpicker show-menu-arrow form-control m-0 p-0 h-auto" name="{{ $name }}">
	    	{{ $option }}
	        @foreach ($items as $item)
	        	@isset($item['model'])
	                <option value="{{ $item['id'] }}">
	                    {{ (Lang::has($modelForTranslation.$item['model'])) ? __($modelForTranslation.$item['model']) : $item['model'] }}
	                </option>
	            @endisset
            	@empty($item['model'])
                    <option value="{{ $item['id'] }}">
                        {{ (Lang::has($modelForTranslation.$item['id'])) ? __($modelForTranslation.$item['id']) : $item['id'] }}
                    </option>
                @endempty
	        @endforeach
	    </select>
	</div>
</div>
