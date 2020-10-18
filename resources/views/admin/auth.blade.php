<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ панель</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/css/styles_lk.css') }}">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <style>
    .pager li>a, .pager li>span {
        margin-bottom: 5px;
    }
    </style>
  </head>
  <body>
  <div class="container">
    <div class="row">
    @include('admin.errors')
    <div class="col-md-4 col-md-offset-4">
        <h1 class="h3">Авторизация</h1>
        <form method="post" action="{{ route('login') }}" id="form">
        @csrf
        <div class="input-group">
            <span class="input-group-addon">+7</span>
            <input maxlength="10" type="text" name="phone" class="form-control" placeholder="9998887766" required autofocus>
        </div>
        <p class="text-muted small">10 цифр в формате 9998887766</p>
        <div class="form-group">
            <label class="sr-only">Пароль</label>
            <input type="password" name="password" class="form-control" placeholder="Пароль" required>
        </div>
        <button type="submit" class="g-recaptcha btn btn-primary btn-block btn-lg" style="margin: 15px 0;">Войти</button>
        </form>
    </div>
    </div>
    </div>
  </body>
</html>