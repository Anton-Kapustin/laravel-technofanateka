<div class="card col-md-8 bg-form text-light mb-5 p-0">
    <div class="card-header bg-form-header">
        <h6 class="text-center">{{$title}}</h6>
    </div>
    <div class="card-body bg-form">
        <form method="POST" action="{{$items['route']}}" enctype="multipart/form-data">
            @if (isset($assemble['id']) != false)
                <input type="hidden" name="id" value={{$assemble['id']}}>
            @endif
            
            @foreach ($items as $key => $item)
                @if (($key != 'form_type') and ($key != 'route'))
                    <div class="form-group row">
                        <label for="{{$key}}" class="col-md-5 col-form-label text-light text-md-right">{{ __('accessories.'.$key)}}</label>

                        <div class="col-12 col-md-6 m-0 p-0 d-flex align-items-center">

                            <select name="{{$key}}" id="" class="selectpicker show-menu-arrow form-control m-0 p-0 h-auto" >
                                @foreach ($item as $model)

                                    <option value="{{ (isset($model['id']) == true ? $model['id'] : $model) }}" 
                                    class="m-0 p-0">
                                        {{ (isset($model['model']) == true ? $model['model'] : $model) }}
                                    </option>
                            
                                @endforeach
                            
                                
                            </select>
                        </div>
                    </div>
                @endif
            @endforeach

            <div class="form-group row">
                <label for="price" class="col-md-5 col-form-label text-md-right">Введите цену</label>

                <div class="col-12 col-md-6 m-0 p-0 d-flex align-items-center">
                    <input type="text" multiple name="price" value="{{ (isset($assemble['price']) == true ? $assemble['price'] : '') }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="preview_image" class="col-md-5 col-form-label text-md-right">Выберите превью</label>

                <div class="col-12 col-md-6 m-0 p-0 d-flex align-items-center">
                    <input type="file" multiple name="preview_image">
                </div>
            </div>
                @if (isset($assemble['preview_image']))
                    <div class="d-flex align-items-center justify-content-center col-12 col-md-6 m-0 p-0 d-flex mx-auto p-2">
                        <img class="img-assemble " style="object-fit: contain; filter: none !important;" src="res/assemblies_preview/{{$assemble['preview_image']}}">
                    </div>
                @endif
            

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-sm btn-action text-center">Добавить</button>
            </div>
            

        </form>
    </div>
</div>