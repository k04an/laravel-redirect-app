@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-7 my-3 my-lg-0">
                <div class="card">
                    <div class="card-header">Создание перенаплавления</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('createRedirect') }}" method="post">
                                    @csrf
                                    <div class="d-flex align-content-center">
                                        <div class="input-group">
                                            <input type="text" name="url" placeholder="URL"
                                                   class="form-control @error('url') is-invalid @enderror @if (session()->has('message')) is-valid @endif"
                                                   id="toUrl">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-dark">Создать</button>
                                            </div>
                                            @error('url')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            @if (session()->has('message'))
                                                <div class="valid-feedback">Перенаправление успешно создано</div>
                                            @endif
                                        </div>
                                    </div>
                                    @if(Auth::user()->hasVerifiedEmail())
                                        <div class="col-lg-7 mt-3">
                                            <input type="text" class="form-control @error('customUrl') is-invalid @enderror" name="customUrl" placeholder="Имя маршрута">
                                            <span class="invalid-feedback" role="alert">
                                                @error('customUrl')
                                                <strong>{{ $message }}</strong>
                                                @enderror
                                            </span>
                                        </div>
                                    @endif
                                </form>
                                @if (!Auth::user()->hasVerifiedEmail())
                                    <div class="alert alert-warning mt-3 col-lg-8">Для того чтобы получить доступ к
                                        пользовательскким названиям маршрутов перенаправления, подтвердите email
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 my-3 my-lg-0">
                <div class="card">
                    <div class="card-header">Ваши ссылки</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Откуда</th>
                                <th>Куда</th>
                                <th></th>
                            </tr>
                            </thead>
                            @foreach(Auth::user()->redirectRoutes as $route)
                                <tr>
                                    <td><a href="/{{ $route->fromUrl }}">{{ $route->fromUrl }}</a></td>
                                    <td>{{ $route->toUrl }}</td>
                                    <td>
                                        <a href="/logs/{{ $route->fromUrl }}">Журнал</a>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

    </script>
@endsection
