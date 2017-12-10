@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    @if (Auth::check())
                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('create') }}">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <a class="btn btn-primary" href="{{ route('create') }}">
                                            Создать запись
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif
                    <div class="panel-heading">Все фотографии</div>
                        @yield('start')

                </div>
            </div>
        </div>
    </div>
@endsection
