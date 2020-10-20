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
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <style>
    .pager li>a, .pager li>span {
        margin-bottom: 5px;
    }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="navbar navbar-default">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Переключить навигацию</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="{{ route('articles') }}">Материалы</a></li>
            <li><a href="">Меню</a></li>
            <li><a href="{{ route('reviewList') }}">Отзывы</a></li>
            <li><a href="{{ route('slider') }}">Слайдер</a></li>
            <li><a href="{{ route('orders') }}">Заявки</a></li>
           
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Менеджеры контента <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('users') }}">Список пользователей</a></li>
                <li><a href="">Группы пользователей</a></li>
            </ul>
            </li>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ route('home') }}" target="_blank">Сайт</a></li>
            <li><a href="{{ route('logout') }}">Выйти</a></li>
          </ul>
        </div>
      </div>
        @yield('content')
    </div>

    <div class="footer">
      <div class="container">
        <p class="text-muted">&copy; Компания «ОКРЫМ» {{ date('Y') }}</p>
      </div>
    </div>
    
  </body>
</html>