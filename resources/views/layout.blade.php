<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
        <!-- <link rel="stylesheet" href="/css/styles.css?v=<? //filemtime($path_index . '/css/styles.css') ?>"> -->
        <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
        <script src="{{ asset('/js/scripts.js') }}"></script>
    </head>
    <body>
        
<div class="container">

      <div class="row">
        <div class="col-sm-6">
          <a href="/">
            <img src="/img/logo.png" class="img-responsive">
          </a>
        </div>
        <div class="col-sm-6 text-right">
          
            <a href="https://www.instagram.com/" target="_blank">
                <img src="/img/instagram.svg" style="max-width: 24px;">
            </a>
            <a href="https://vk.com/" target="_blank">
                <img src="/img/vkcom.svg" style="max-width: 24px;">
            </a>
          
        </div>
      </div>
        
        <hr>
        
      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Компания «ОКРЫМ»</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              @foreach($menuItems as $menuItem)
                @if($menuItem->type == 1 && $menuItem->parent_id == 0)
                  <!-- @if($menuItem->homepage == 1)
                    <li><a href="{{ route('home', $menuItem->material_id) }}">{{ $menuItem->title }}</a></li>
                  @else
                    <li><a href="{{ route('home', $menuItem->material_id) }}">{{ $menuItem->title }}</a></li>
                  @endif -->

                  @if(isset($menuItem->childs) && $menuItem->childs->isNotEmpty())
                    <li class="dropdown">
                      <a href="{{ route('realtyInfo') }}" class="dropdown-toggle disabled" data-toggle="dropdown">Недвижимость <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        @foreach($menuItem->childs as $childMenuItem)
                          <li><a href="{{ route($menuItem->pathForType($childMenuItem), $childMenuItem->material_id) }}">{{ $childMenuItem->title }}</a></li>
                        @endforeach
                      </ul>
                    </li>
                  @else
                  <li><a href="{{ route('home', $menuItem->material_id) }}">{{ $menuItem->title }}</a></li>
                  @endif
                @endif

                @if($menuItem->type == 2 && $menuItem->parent_id == 0)
                @if(isset($menuItem->childs) && $menuItem->childs->isNotEmpty())
                    <li class="dropdown">
                      <a href="{{ route('realtyInfo') }}" class="dropdown-toggle disabled" data-toggle="dropdown">Недвижимость <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        @foreach($menuItem->childs as $childMenuItem)
                          <li><a href="{{ route($menuItem->pathForType($childMenuItem), $childMenuItem->material_id) }}">{{ $childMenuItem->title }}</a></li>
                        @endforeach
                      </ul>
                    </li>
                  @else
                    <li><a href="{{ route('orderForm') }}">{{ $menuItem->title }}</a></li>
                    @endif
                @endif

                @if($menuItem->type == 3 && $menuItem->parent_id == 0)
                @if(isset($menuItem->childs) && $menuItem->childs->isNotEmpty())
                    <li class="dropdown">
                      <a href="{{ route('realtyInfo') }}" class="dropdown-toggle disabled" data-toggle="dropdown">Недвижимость <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        @foreach($menuItem->childs as $childMenuItem)
                          <li><a href="{{ route($menuItem->pathForType($childMenuItem), $childMenuItem->material_id) }}">{{ $childMenuItem->title }}</a></li>
                        @endforeach
                      </ul>
                    </li>
                  @else
                  <li><a href="{{ route('map') }}">{{ $menuItem->title }}</a></li>
                  @endif
                @endif

                @if($menuItem->type == 4 && $menuItem->parent_id == 0)
                @if(isset($menuItem->childs) && $menuItem->childs->isNotEmpty())
                    <li class="dropdown">
                      <a href="{{ route('realtyInfo') }}" class="dropdown-toggle disabled" data-toggle="dropdown">Недвижимость <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        @foreach($menuItem->childs as $childMenuItem)
                          <li><a href="{{ route($menuItem->pathForType($childMenuItem), $childMenuItem->material_id) }}">{{ $childMenuItem->title }}</a></li>
                        @endforeach
                      </ul>
                    </li>
                  @else
                  <li><a href="{{ route('orderList') }}">{{ $menuItem->title }}</a></li>
                  @endif
                @endif

                @if($menuItem->type == 5 && $menuItem->parent_id == 0)
                @if(isset($menuItem->childs) && $menuItem->childs->isNotEmpty())
                    <li class="dropdown">
                      <a href="{{ route('realtyInfo') }}" class="dropdown-toggle disabled" data-toggle="dropdown">Недвижимость <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        @foreach($menuItem->childs as $childMenuItem)
                          <li><a href="{{ route($menuItem->pathForType($childMenuItem), $childMenuItem->material_id) }}">{{ $childMenuItem->title }}</a></li>
                        @endforeach
                      </ul>
                    </li>
                  @else
                  <li><a href="{{ route('acticles') }}">{{ $menuItem->title }}</a></li>
                  @endif
                @endif

                @if($menuItem->type == 6 && $menuItem->parent_id == 0)
                  @if(isset($menuItem->childs) && $menuItem->childs->isNotEmpty())
                    <li class="dropdown">
                      <a href="{{ route('realtyInfo') }}" class="dropdown-toggle disabled" data-toggle="dropdown">Недвижимость <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        @foreach($menuItem->childs as $childMenuItem)
                          <li><a href="{{ route($menuItem->pathForType($childMenuItem), $childMenuItem->material_id) }}">{{ $childMenuItem->title }}</a></li>
                        @endforeach
                      </ul>
                    </li>
                  @else
                    <li><a href="{{ route('about', $menuItem->material_id) }}">{{ $menuItem->title }}</a></li>
                  @endif
                @endif
              
              @endforeach
                <!-- <li><a href="/">Главная</a></li> -->
                
                <!-- <li><a href="{{ route('acticles') }}">Новости</a></li>
                <li class="dropdown">
                  <a href="{{ route('realtyInfo') }}" class="dropdown-toggle disabled" data-toggle="dropdown">Недвижимость <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="{{ route('orderList') }}">Аренда недвижимости</a></li>
                    <li><a href="{{ route('orderForm') }}">Форма заявки</a></li>
                  </ul>
                </li>
                <li><a href="{{ route('map') }}">Как нас найти</a></li> -->
                
            </ul>
          </div>
        </div>
      </nav>

        @yield('content')

    <hr>
    <p>&copy; Компания «ОКРЫМ» {{ date('Y') }}</p>
    
    </div>
        
    </body>
</html>