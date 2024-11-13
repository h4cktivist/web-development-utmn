<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Футбольные клубы</title>
    @vite(['resources/sass/styles.sass', 'resources/js/index.js'])
</head>
<body>
<nav class="bg-primary navbar navbar-expand-lg p-0 m-2">
    <div class="container">
        <a class="navbar-brand text-dark pt-0 d-flex">
            <img src="{{ url('storage/images/football.png') }}" class="align-text-top bg-secondary p-1" width="50" height="50">
            <div class="d-flex align-items-center justify-content-center ms-3 my-3">Футбольные клубы</div>
        </a>
        <a href="{{ route('teams.create') }}"><button id="liveToastBtn" class="btn btn-secondary">Добавить</button></a>
    </div>
</nav>

<div class="container text-center">
    <div class="h2 text-start my-3">Футбольные клубы</div>
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3 row-cols-xxl-3 align-content-center">

        @if (count($teams) > 0)

            @foreach($teams as $team)

                <div class="col text-start pb-3">
                    <div class="card p-3 h-100">
                        <img src="{{ url("storage/images/{$team->logo}") }}" class="card-img-top img-fluid p-5">
                        <div class="badge position-absolute mt-2 ms-2 bg-secondary text-dark">{{ $team->country }}</div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $team->name }}</h5>
                            <p class="card-text">{{ $team->summary }}</p>
                            <a href="{{ route('teams.show', ['id' => $team->id]) }}" class="btn btn-secondary">Подробнее</a>
                        </div>
                    </div>
                </div>

            @endforeach

        @else
            <div class="h4 text-start my-3">Записей пока нет</div>
        @endif

    </div>
</div>

<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center ms-4">
        <span class="mb-3 mb-md-0 text-body-secondary">© Вадим Попов</span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex me-4">
        <li class="ms-3"><a href="https://github.com/h4cktiv1st"><img src="{{ url('storage/images/social.png') }}" width="30" height="24" class="d-inline-block align-text-top img-fluid"></a></li>
        <li class="ms-3"><a href="https://vk.com"><img src="{{ url('storage/images/vk.png') }}" width="30" height="24" class="d-inline-block align-text-top img-fluid"></a></li>
        <li class="ms-3"><a href="https://t.me/h4cktiv1st"><img src="{{ url('storage/images/telegram.png') }}" width="30" height="24" class="d-inline-block align-text-top img-fluid"></a></li>
    </ul>
</footer>


<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            <strong class="me-auto ms-2">Загрузка...</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body text-danger">
            На данный момент этот функционал недоступен!
        </div>
    </div>
</div>

</body>
</html>
