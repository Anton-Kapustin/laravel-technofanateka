<div class="card border-0 bg-form text-light">

    <div class="card-body ">
        <form method="POST" action="{{ route($route,$items->id) }} }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input type="hidden" name="id" value={{$items->id}}>
            @foreach ($structure as $formItem => $formItemType)
                <div class="form-group row">
                    <label for="{{ $formItem }}"
                        class="col-lg-3 col-form-label text-light text-lg-right">{{ (Lang::has($modelForTranslation.$formItem)) ? __($modelForTranslation.$formItem) : $formItem }}
                    </label>
                    <div class="col-lg-9">
                        @if ($formItemType === 'text')
                            <input class=" w-100" id="{{ $formItem }}" type="{{ $formItemType }}" name="{{ $formItem }}" required autofocus value="{{ (Lang::has($modelForTranslation.$items->$formItem)) ? __($modelForTranslation.$items->$formItem) : $items->$formItem }}">
                        @elseif($formItemType === 'file')
                            <div class="d-flex flex-column">
                                <div class="d-flex">
                                    <input class=" w-100" id="{{ $formItem }}" type="{{ $formItemType }}" name="{{ $formItem }}" multiple
                                        value="{{ $items->$formItem }}">
                                </div>
                                <div class="d-flex">
                                    <img src="{{ '/res/news/'.$items->$formItem }}" style="object-fit: scale-down; max-width:100%; height:auto;" />
                                </div>   
                            </div>
                        @elseif($formItemType === 'selectText')
                            <div class="">
                                <select class="selectpicker show-menu-arrow form-control m-0 p-0 h-auto" name="{{ $formItem }}">
                                    <option value="{{ $items->$formItem }}">
                                        {{ (Lang::has($modelForTranslation.$items->$formItem)) ? __($modelForTranslation.$items->$formItem) : $items->$formItem }}
                                    </option>
                                    @foreach ($selectItems[$formItem] as $selectItem)
                                        @if(!($selectItem === $items->$formItem))
                                            <option value="{{ $selectItem }}">
                                                {{ (Lang::has($modelForTranslation.$selectItem)) ? __($modelForTranslation.$selectItem) : $selectItem }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            @error('title')
                                <div class="form-group row">
                                    @if ($message = Session::get('success'))
                                        <div class=«alert alert-success alert-block»>
                                            <button type=«button» class=«close» data-dismiss=«alert»>×</button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        <img src="res/{{ Session::get('title_image') }}">
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
                            <textarea id={{ $formItem }} type={{ $formItem }} class="form-control @error($formItem) is-invalid @enderror" name={{ $formItem }}
                                value="{{ old($formItem) }}" required autocomplete={{ $formItem }} 
                                rows="15">{{ $items->$formItem }}
                             </textarea>
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