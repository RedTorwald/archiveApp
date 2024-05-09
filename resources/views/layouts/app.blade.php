<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
            background-size: 30px;
            margin: 0;
            padding: 0;
            overflow-x: hidden; 
        }
        nav {
            background-color: #808080;
            color: #fff;
            padding: 0px;            
            font-size: 18px;
            text-align: center; 
            line-height: 1;
        }

        nav ul {
            list-style-type: none;
            padding: 0px;
            margin: 0;
            display: flex;
            justify-content: space-between; 
        }

        nav li {
            flex-grow: 1; 
            text-align: center; 
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            display: block; 
            padding: 15px; 
        }

        nav ul li a:hover {
            background-color: rgba(255, 255, 255, 0.1); 
        }

        nav ul li:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 0;
            right: -10px; 
            height: 100%; 
            width: 1px; 
            background-color: #666; 
        }

        main {
            padding: 20px;
            padding-top: 60px;
            font-size: 18px;
            background-color: #f4f4f4;
        }

        footer {
            background-color: #808080;
            color: #fff;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <nav>        
        <ul>
            <li><a href="/">Главная</a></li> 
            <li><a href="{{ route('documents.all') }}">Документы</a></li>
            <li><a href="{{ route('documents.create') }}">Регистрация документов</a></li>
            <li><a href="{{ route('expiring-documents.index') }}">Документы с истекающим сроком хранения</a></li>
            @if(Auth::check())
            <li>
                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="#" onclick="document.getElementById('logout-form').submit();">Выход</a>
                </form>
            </li>
            @else
                <li><a href="{{ route('login') }}">Вход</a></li>
            @endif
        </ul>        
    </nav>

    <main>
        <div class="relative sm:flex sm:justify-center sm:items-center selection:bg-red-500 selection:text-white">
            @yield('content')
        </div>
    </main>

    <footer>
        &copy; {{ date('Y') }} archiveApp
    </footer>
</body>
</html