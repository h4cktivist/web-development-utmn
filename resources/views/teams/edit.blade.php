<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактировать {{ $team->name }}</title>
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
        <div class="col-md-6">
            <form enctype="multipart/form-data" method="post" action="{{ route('teams.update', ['id' => $team->id]) }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">Название:</label>
                    <input type="text" class="form-control m-2" id="name" name="name" value="{{ $team->name }}" placeholder="Введите название футбольного клуба">
                    @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                </div>
                <div class="form-group">
                    <label for="original_name">Оригинальное название:</label>
                    <input type="text" class="form-control m-2" id="original_name" name="original_name" value="{{ $team->original_name }}" placeholder="Введите оригинальное название футбольного клуба">
                    @error('original_name') <p class="text-danger">{{ $message }}</p> @enderror
                </div>
                <div class="form-group">
                    <label for="country">Страна:</label>
                    <input type="text" class="form-control m-2" id="country" name="country" value="{{ $team->country }}" placeholder="Введите страну">
                    @error('country') <p class="text-danger">{{ $message }}</p> @enderror
                </div>
                <div class="form-group">
                    <label for="summary">Краткое описание:</label>
                    <textarea class="form-control m-2" id="summary" name="summary" rows="3" placeholder="Введите краткое описание">{{ $team->summary }}</textarea>
                    @error('summary') <p class="text-danger">{{ $message }}</p> @enderror
                </div>
                <div class="form-group">
                    <label for="description">Полное описание:</label>
                    <textarea class="form-control m-2" id="description" name="description" rows="3" placeholder="Введите полное описание">{{ $team->description }}</textarea>
                    @error('description') <p class="text-danger">{{ $message }}</p> @enderror
                </div>
                <div class="form-group">
                    <label for="image">Логотип:</label>
                    <img src="{{ url("storage/{$team->logo}") }}" alt="Логотип" class="img-fluid" style="max-width: 100px;">
                    <input type="file" class="form-control-file m-2" id="image" name="image">
                    @error('image') <p class="text-danger">{{ $message }}</p> @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-4">Сохранить</button>
            </form>
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
