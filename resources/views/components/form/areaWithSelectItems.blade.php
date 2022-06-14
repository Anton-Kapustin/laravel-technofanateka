<div class="">
	@dd($slot)
	<select class="selectpicker show-menu-arrow form-control m-0 p-0 h-auto" name="{{ $itemName }}">

		@foreach ($slot as $item)
			<option value="{{ $item }}"></option>
		@endforeach
	</select>
</div>