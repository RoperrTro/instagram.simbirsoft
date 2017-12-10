@extends ('layouts.app')

@section ('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Изменение записи</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{'/posts/' . $post->id}}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('place') ? ' has-error' : '' }}">
                                <label for="place" class="col-md-4 control-label">Место съемки</label>

                                <div class="col-md-6">
                                    <input id="location" type="text" class="form-control" name="place" value="{{ old('place') }}" required autofocus>

                                    @if ($errors->has('place'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('place') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('photo') ? 'has-error' : '' }}">
                                <label for="photo" class="col-md-4 control-label"></label>

                                <div class="col-md-6">
                                    <input id="photo" type="file" name="photo" multiple accept="image/*,image/jpeg" value="Выбрать">

                                    @if ($errors->has('photo'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('photo') }}</strong>
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