<div class="card bg-card-body mb-3 ">
    <div class="card-horizontal">
            <div class="d-flex flex-lg-row flex-column">

                <div class="col-lg-3 d-flex align-items-center justify-content-center p-2">
                    <img src="{{ asset('/res/assemblies_preview/'.$assemble->preview_image)}}" class="card-img rounded img-assemble" alt="...">
                </div>
            
                <div class="col-lg-9">
                    <div class="card-body">
                        <h5 class="card-title">{{$assemble->price}}руб.</h5>
                        <ul class="list-unstyled card-text">
                            <li>CPU: {{$assemble->pc_cpu['model']}}</li>
                            <li>Motherboard: {{$assemble->pc_motherboards['model']}}</li>
                            <li>RAM: {{$assemble->pc_ram['model']}}</li>
                            <li>Video card: {{$assemble->pc_video['model']}}</li>
                            <li>SSD: {{$assemble->pc_memory['model']}}</li>
                            <li>Блок питания: {{$assemble->pc_power_supply['model']}}</li>
                            <li>Охлаждение: {{$assemble->pc_cooller['model']}}</li>
                            <li>Корпус: {{$assemble->pc_computer_case['model']}}</li>
                                @if (str_contains(Route::currentRouteName(), "admin"))
                                    <li class="mt-2" >
                                        <a class="nav-links" href="{{ route('show_edit_pc_assemble_page', $assemble->id) }}">
                                            Редактировать
                                        </a>
                                    </li>
                                @endif                           
                        </ul>
                    </div>
                </div>
            </div>

    </div>
</div>

