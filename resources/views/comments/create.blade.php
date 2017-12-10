@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Добавление комментария</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('store', [$post_id = $post_id])}}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                                <label for="text" class="col-md-4 control-label">Комментарий:</label>

                                <div class="col-md-6">
                                    <input id="text" type="text" class="form-control" name="text" maxlength="255" value="{{ old('text') }}" required autofocus>

                                    @if ($errors->has('text'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Отправить
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <a href="/home" type="submit" class="btn alert-danger">
                                    Отменить
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection