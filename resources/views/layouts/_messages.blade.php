@if (Session::has('success'))

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div style="background-color: #00FF00;">
                        <div class="panel-heading">Данные успешно сохранены</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endif

@if (Session::has('gooddel'))

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div style="background-color: #00FF00;">
                        <div class="panel-heading">Данные успешно удалены</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endif

