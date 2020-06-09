<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <main>
        <div class="container mt-5">

            <div class="alert alert-success alert-dismissible fade show" style="display: none" role="alert">
                <span class="message"></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h4>Добавить новый населенный пункт</h4>
                            </div>
                            <form class="main-form" action="{{ route('cities.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Название города</label>
                                    <input type="text" class="form-control @if($errors->has('name')) is-invalid @endif" id="name" name="name" autocomplete="off">
                                    <span class="invalid-feedback name">
                                        <strong></strong>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Широта</label>
                                    <input type="text" class="form-control @if($errors->has('latitude')) is-invalid @endif" id="latitude" name="latitude" autocomplete="off">
                                    <span class="invalid-feedback latitude">
                                        <strong></strong>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Долгота</label>
                                    <input type="text" class="form-control @if($errors->has('longitude')) is-invalid @endif" id="longitude" name="longitude" autocomplete="off">
                                    <span class="invalid-feedback longitude">
                                        <strong></strong>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Население</label>
                                    <input type="text" class="form-control @if($errors->has('population')) is-invalid @endif" id="population" name="population" autocomplete="off">
                                    <span class="invalid-feedback population">
                                        <strong></strong>
                                    </span>
                                </div>
                                <button type="button" id="save" class="btn btn-primary">Добавить</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h4>Список населенных пунктов</h4>
                            </div>
                            <table class="table mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Название</th>
                                        <th scope="col">Широта</th>
                                        <th scope="col">Долгота</th>
                                        <th scope="col">Население</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cities as $city)
                                    <tr>
                                        <td>{{ $city->name }}</td>
                                        <td>{{ $city->latitude }}</td>
                                        <td>{{ $city->longitude }}</td>
                                        <td>{{ $city->population }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
