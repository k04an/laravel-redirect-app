@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-8 p-md-5">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm">
                                Журнал перехода по ссылке
                            </div>
                            <div class="col-sm d-sm-flex justify-content-end text-center">
                                {{ $logs->count() }} записей
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Время перехода</th>
                                    <th>IP адрес</th>
                                </tr>
                            </thead>
                            @foreach($logs as $log)
                                <tr>
                                    <td>{{ $log->created_at->format('d.m.Y h:i:s') }}</td>
                                    <td>{{ $log->ip_address }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
