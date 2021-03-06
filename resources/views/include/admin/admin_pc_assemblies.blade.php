@section('body')
    <div class="container mt-2 mb-5">
        <div class="card bg-card-body text-light">
            <div class="card-header bg-card-header">
                <h6>Сборки ПК</h6>
            </div>
            <div class="card-body">
                <div id="accordion">
                    <div class="card bg-card-body">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Игровые ПК
                                </button>
                            </h5>
                        </div>
                    
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">

                                @foreach ($assemblies as $assemble)
                                    <x-app-layout :assemble="$assemble" />
                                @endforeach
                                
                            </div>
                        </div>
                    </div>
                    <div class="card bg-card-body">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Офисные ПК
                                </button>
                            </h5>
                        </div>
                        
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">

        </div>
    </div>