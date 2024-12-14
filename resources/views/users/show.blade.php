<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>
    @vite(['resources/sass/styles.sass', 'resources/js/index.js'])
    @csrf
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
        <div class="h2 text-start my-3">{{ $currentUser->name }}</div>
        <div class="col-md-6">
            <ul class="list-group">
                <li class="list-group-item"><strong>Имя пользователя:</strong> {{ $currentUser->name }}</li>
                <li class="list-group-item"><strong>Email:</strong> {{ $currentUser->email }}</li>
                <li class="list-group-item"><strong>OAuth2 токен:</strong> <button class="btn btn-sm" onclick="generateAndCopyToken()">Получить и скопировать токен</button></li>
            </ul>
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

<script>
    async function generateAndCopyToken() {
        try {
            let csrfToken = document.querySelector("input[name='_token']").value;
            console.log(csrfToken);
            const response = await fetch('/generate-token', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                }
            });

            const data = await response.json();
            if (data.token) {
                await navigator.clipboard.writeText(data.token);
                alert('Токен скопирован!');
            } else {
                alert('Ошибка получения токена!');
            }
        } catch (error) {
            console.error('Ошибка:', error);
            alert('Ошибка!');
        }
    }
</script>

</body>
</html>
