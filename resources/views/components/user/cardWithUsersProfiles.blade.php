<div class="d-flex flex-column col-12 col-md-10 d-flex mt-md-3 pt-3 ml-lg-5 mr-lg-5 pl-md-5 pr-md-5 pb-5 mx-auto">

		@foreach($users as $userData)
	    	<x-user.cardWithUserProfile :userData=$userData :modelForTranslation=$modelForTranslation />
	    @endforeach
</div>
