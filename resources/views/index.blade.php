@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5 mb-4">
            <div class="col">
                <h1 class="text-center">Сервис коротких ссылок нового поколения</h1>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <hr class="w-50">
            </div>
        </div>
        <div class="row mt-5 my-4">
            <div class="col d-flex justify-content-center">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h3 class="text-center">Попробуйте</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="text-center fst-italic opacity-50">Без регистрации и смс</p>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-5">
                            <form action="{{route('createRedirect')}}" method="post">
                                @csrf
                                <div class="input-group-group">
                                    <div class="d-flex">
                                        <input type="text"
                                               class="form-control @if (session()->has('message')) is-valid @endif @error('url') is-invalid @enderror"
                                               name="url">
                                        <button class="btn btn-dark">Создать</button>
                                    </div>
                                    @if (session()->has('message'))
                                        <div class="valid-feedback d-block">Перенаправление успешно создано <a
                                                href="{{ route('redirect', ['redirectRoute' => session('url')]) }}">{{ session('url') }}</a>
                                        </div>
                                    @endif
                                    @error('url')
                                    <span class="invalid-feedback d-inline" role="alert">
                                            <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <hr class="w-50">
            </div>
        </div>
        <div class="row my-4">
            <div class="col">
                <h3 class="text-center">Мы предлагаем</h3>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col d-flex flex-wrap justify-content-center">
                <div class="card col-lg-4 p-3 mx-lg-3 my-lg-3 my-3">
                    <div class="card-body">
                        <h3 class="text-center">Удобный интерфейс</h3>
                        <hr>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto assumenda deserunt eos
                            ipsam ipsum, laudantium tempore voluptas? Ab, accusamus, alias atque consectetur debitis
                            doloribus et fuga in magnam nesciunt non officia optio, placeat quidem repellendus
                            repudiandae ut vero voluptate voluptates?</p>
                    </div>
                </div>

                <div class="card col-lg-4 p-3 mx-lg-3 my-lg-3 my-3">
                    <div class="card-body">
                        <h3 class="text-center">Высокую стабильность</h3>
                        <hr>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto assumenda deserunt eos
                            ipsam ipsum, laudantium tempore voluptas? Ab, accusamus, alias atque consectetur debitis
                            doloribus et fuga in magnam nesciunt non officia optio, placeat quidem repellendus
                            repudiandae ut vero voluptate voluptates?</p>
                    </div>
                </div>

                <div class="card col-lg-4 p-3 mx-lg-3 my-lg-3 my-3">
                    <div class="card-body">
                        <h3 class="text-center">Подробную статистику</h3>
                        <hr>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto assumenda deserunt eos
                            ipsam ipsum, laudantium tempore voluptas? Ab, accusamus, alias atque consectetur debitis
                            doloribus et fuga in magnam nesciunt non officia optio, placeat quidem repellendus
                            repudiandae ut vero voluptate voluptates?</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col d-flex justify-content-center">
                <hr class="w-50">
            </div>
        </div>
        <div class="row my-4">
            <div class="col">
                <h3 class="text-center">Заинтересованы?</h3>
            </div>
        </div>
        <div class="row my-4 d-flex justify-content-center">
            <div class="col-md-6 col-lg-4 d-flex justify-content-center">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('register') }}" class="btn btn-dark fs-4 w-100">Зарегестрируйтесь</a>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <h5 class="text-center fst-italic opacity-50">Это бесплатно</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
