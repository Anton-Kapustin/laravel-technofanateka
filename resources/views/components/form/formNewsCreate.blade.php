<div class="card  bg-form text-light ">

        <form method="POST" action="{{ route($route) }}" enctype="multipart/form-data">
            @csrf
            @foreach ($structure as $formItem => $formItemType)
            <div class="form-group row">
                <label for="{{ $formItem }}"
                    class="col-lg-3 col-form-label text-light text-lg-right">{{ __('News.'.$formItem) }}
                </label>
                <div class="col-lg-9">
                    @if ($formItemType === 'text')
                    <input class=" w-100" id="{{ $formItem }}" type="{{ $formItemType }}" name="{{ $formItem }}"
                        required autofocus value="">
                    @elseif($formItemType === 'file')
                    <div class="d-flex flex-column">
                        <div class="d-flex">
                            <input class=" w-100" id="{{ $formItem }}" type="{{ $formItemType }}" name="{{ $formItem }}"
                                multiple value="">
                        </div>
                        {{-- <div class="d-flex">
                            <img src="{{ 'res/'.$items->$formItem }}"
                                style="object-fit: scale-down; max-width:100%; height:auto;" />
                        </div> --}}


                    </div>
                    @error('title')
                    <div class="form-group row">
                        @if ($message = Session::get('success'))
                        <div class=«alert alert-success alert-block»>
                            <button type=«button» class=«close» data-dismiss=«alert»>×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        <img src="res/news{{ Session::get('title_image') }}">
                        @endif

                        @if (count($errors) > 0)
                        <div class=«alert alert-danger»>
                            <strong>Whoops!</strong> There were some problems with your input.
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                    </div>
                    @enderror
                    @error('{{ $formItem }}')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror


                    @elseif($formItemType === 'textarea')
                    <textarea id={{ $formItem }} type={{ $formItem }}
                        class="form-control @error($formItem) is-invalid @enderror" name={{ $formItem }}
                        value="{{ old($formItem) }}" required autocomplete={{ $formItem }} autofocus
                        rows="15"></textarea>
                    @endif
                </div>


            </div>
            @endforeach

            <div class="form-group row mb-0">
                <button type="submit" class="btn btn-sm btn-action mx-auto">
                    Отправить
                </button>
            </div>

        </form>
    </div>
</div>
</div>