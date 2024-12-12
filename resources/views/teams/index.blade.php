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
        <div class="align-content-center">
            <a href="{{ route('teams.index') }}?user={{ $currentUser->name }}"><button id="liveToastBtn" class="btn btn-secondary">Мои клубы</button></a>
            <a href="{{ route('teams.create') }}"><button id="liveToastBtn" class="btn btn-secondary">Добавить</button></a>
            <a href="{{ route('friends.teams.index') }}"><button id="liveToastBtn" class="btn btn-secondary">Клубы друзей</button></a>
            @if ($currentUser->is_admin)
                <a href="{{ route('admin.index') }}"><button id="liveToastBtn" class="btn btn-secondary">Админ</button></a>
            @endif
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" id="liveToastBtn" class="btn btn-secondary">Выйти</button>
            </form>
        </div>
    </div>
</nav>

<div class="container text-center">
    <div class="h2 text-start my-3">Футбольные клубы</div>
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3 row-cols-xxl-3 align-content-center">

        @if (count($teams) > 0)

            @foreach($teams as $team)

                <div class="col text-start pb-3">
                    @if($team->trashed())
                        <div class="card p-3 h-100" style="background-color: gray">
                    @else
                        <div class="card p-3 h-100">
                    @endif
                        @if(str_contains($team->logo, 'http'))
                            <img id="logo" src="{{ url("{$team->logo}") }}" class="card-img-top img-fluid p-5">
                        @else
                            <img id="logo" src="{{ url("storage/{$team->logo}") }}" class="card-img-top img-fluid p-5">
                        @endif
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
            <div class="h5 text-start my-3">Записей пока нет</div>
        @endif

    </div>
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

</body>
</html>
