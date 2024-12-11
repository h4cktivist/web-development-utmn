<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $team->name }}</title>
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
    <div class="row justify-content-center">
        <div class="h2 text-start my-3">{{ $team->name }}</div>
        <div class="col-md-6">
            <div class="text-center mb-4">
                <img id="logo" src="{{ url("storage/{$team->logo}") }}" alt="Логотип" class="img-fluid" style="max-width: 250px;">
            </div>
            <ul class="list-group">
                <li class="list-group-item"><strong>Название:</strong> <a href="#" class="link-underline link-underline-opacity-0 text-black" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="{{ $team->original_name }}">{{ $team->name }}</a></li>
                <li class="list-group-item"><strong>Страна:</strong> {{ $team->country }}</li>
                <li class="list-group-item"><strong>Описание:</strong> {{ $team->description }}</li>
                <li class="list-group-item"><strong>Добавлено пользователем:</strong> <a href="{{ route('teams.index') }}?user={{ $team->user->name }}">{{ $team->user->name }}</a></li>
                <li class="list-group-item">
                    @if($team->user->id != Auth::user()->id)
                        @if (Auth::user()->isFriendsWith($team->user))
                            <form method="POST" action="{{ route('users.removeFriend', $team->user) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Удалить пользователя из друзей</button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('users.addFriend', $team->user) }}">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm">Добавить пользователя в друзья</button>
                            </form>
                        @endif
                    @endif
                </li>
            </ul>

            @if(($currentUser->is_admin || $team->user_id == $currentUser->id) && !$team->trashed())
            <div class="mt-3 d-flex justify-content-between">
                <a href="{{ route('teams.edit', $team->id) }}"><button class="btn btn-secondary mr-2">Редактировать</button></a>
                <form action="{{ route('teams.destroy', $team->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
            @elseif($currentUser->is_admin && $team->trashed())
            <div class="mt-3 d-flex justify-content-between">
                <form action="{{ route('teams.restore', $team->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success">Восстановить</button>
                </form>

                <form action="{{ route('teams.delete', $team->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить окончательно</button>
                </form>
            </div>
            @endif

        </div>
    </div>

    <form method="POST" action="{{ route('teams.matches.store', $team) }}">
        @csrf
        <div class="mb-3">
            <label for="away_team_id" class="form-label">Соперник</label>
            <select class="form-select" id="away_team_id" name="away_team_id">
                @foreach ($otherTeams as $otherTeam)
                    <option value="{{ $otherTeam->id }}">{{ $otherTeam->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="match_date" class="form-label">Дата матча</label>
            <input type="date" class="form-control" id="match_date" name="match_date">
        </div>
        <div class="mb-3">
            <label for="stadium_name" class="form-label">Стадион</label>
            <input class="form-control" id="stadium_name" name="stadium_name">
        </div>
        <button type="submit" class="btn btn-primary">Добавить матч</button>
    </form>

    @if ($games->count() > 0)

        <table class="table table-striped mt-5">
            <thead>
            <tr>
                <th>Дата</th>
                <th>Соперник</th>
                <th>Стадион</th>
                <th>Добавлено пользователем</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($team->allGames as $game)
                <tr>
                    <td>{{ $game->match_date }}</td>
                    <td>
                        @if ($game->home_team_id == $team->id)
                            <a href="{{ route('teams.show', ['id' => $game->away_team_id]) }}">{{ $game->awayTeam->name }}</a> (В гостях)
                        @else
                            <a href="{{ route('teams.show', ['id' => $game->home_team_id]) }}">{{ $game->homeTeam->name }}</a> (Дома)
                        @endif
                    </td>
                    <td>{{ $game->stadium_name }}</td>
                    <td>
                        @if (Auth::user()->isFriendsWith($game->user))
                        <p class="text-success">{{ $game->user->name }} (Ваш друг)</p>
                            <form method="POST" action="{{ route('users.removeFriend', $game->user) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Удалить из друзей</button>
                            </form>
                        @elseif($game->user->id == Auth::user()->id)
                            <p>{{ $game->user->name }} (Вы)</p>
                        @else
                            <p>{{ $game->user->name }}</p>
                            <form method="POST" action="{{ route('users.addFriend', $game->user) }}">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm">Добавить в друзья</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @else
        <h5 class="mt-5">Пока нет матчей с участием этой команды</h5>
    @endif

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

<script>
    let imageElement = document.querySelector('#logo');
    let src = imageElement.src;
    console.log(src);

    if (src.includes("http://127.0.0.1:8000/storage/http")) {
        console.log("sdfsdfsdfds");
        imageElement.src = src.split("http://127.0.0.1:8000/storage/")[1];
    }
</script>

</body>
</html>
