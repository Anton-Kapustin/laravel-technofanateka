<div class="form-group row">
	<label for="{{ $name }}"
	    class="col-lg-3 col-form-label text-light text-lg-right">{{ (Lang::has($modelForTranslation.$name)) ? __($modelForTranslation.$name) : $name }}
	</label>
	<div class="col-lg-9">
		<input class=" w-100" id="{{ $name }}" type="{{ $type }}" name="{{ $name }}"   value="{{ (Lang::has($modelForTranslation.$value)) ? __($modelForTranslation.$value) : $value }}">
	</div>
</div>
