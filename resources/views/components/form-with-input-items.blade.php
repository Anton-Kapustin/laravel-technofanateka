<div class="card col-md-8 bg-form border text-light mb-5 p-0">
    <div class="card-header bg-form-header text-center">{{$title}}</div>
        <div class="card-body ml-md-5 mr-md-5 p-5">
            <form method="POST" action="{{ $route }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value={{$items->id}}>
                @foreach ($items as $key => $item)
                    <div class="form-group row">
                        @if(isset($item['lable']) and isset($item['type']) and isset($item['value']) and ($key != 'route'))
                            <label for="{{ $key }}" class="col-lg-3 col-form-label text-light text-lg-right">{{ $item['lable'] }}</label>
                                <div class="col-lg-9">
                                    @if (($item['type'] === 'text') or ($item['type'] === 'file'))
                                        <input class=" w-100" id="{{ $key }}" type="{{ $item['type'] }}"  name="{{ $key }}" {{ ($item['type'] === 'text') ? " required autofocus " : ' multiple '}} value="{{ $item['value'] }}" >
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
                                        @error('{{ $key }}')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    
                                
                                    @elseif($item['type'] === 'textarea')
                                        <textarea id="body" type="text" class="form-control @error('body') is-invalid @enderror" name="body" value="{{ old('body') }}" required autocomplete="body" autofocus rows="15">{{$item['value']}}</textarea>
                                    @endif
                                </div>

                                    
                        @endif
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