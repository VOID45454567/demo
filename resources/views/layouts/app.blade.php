<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>@yield('title')</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        .logo-link {
            display: flex;
            align-items: center;
        }

        .copyright {
            text-align: center;
            padding-top: 2rem;
            margin-top: 2rem;
            border-top: 1px solid #34495e;
            color: #95a5a6;
            font-size: 0.9rem;
        }

        .header {
            background-color: #3498db;
            color: white;
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .nav {
            display: flex;
            gap: 1.5rem;
        }

        .nav-link {
            color: white;
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        form.main {
            display: flex;
            flex-direction: column;
            gap: 20px;
            width: 40%;
            margin: 0 auto;
            background-color: #3498db4e;
            padding: 15px;
            color: #3498db;
            border-radius: 15px;

            .form-control {
                display: flex;
                flex-direction: column;

                input {
                    padding-left: 10px;
                    height: 30px;
                    border-radius: 10px;
                    border: none;
                }
            }

            button {
                height: 30px;
                background-color: white;
                color: #3498db;
                border-radius: 10px;
                border: none;
                cursor: pointer;
                transition: 0.2s;
            }

            button:hover {
                color: white;
                background-color: #3498db;
            }

            .error {
                color: red;
            }
        }

        .footer {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 2rem 0;
            margin-top: auto;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        .footer-container {
            text-align: center;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 2rem;
        }

        .footer-section {
            flex: 1;
            min-width: 250px;
        }

        .footer-title {
            font-size: 1.2rem;
            margin-bottom: 1rem;
            color: #3498db;
        }

        .copyright {
            text-align: center;
            padding-top: 2rem;
            margin-top: 2rem;
            border-top: 1px solid #34495e;
            color: #95a5a6;
            font-size: 0.9rem;
        }
    </style>
    @stack('styles')
</head>

<body>
    <header class="header">
        <div class="header-container">
            <div class="logo-link">
                <a href="{{ url('/') }}" class="logo">
                    <img src="{{ asset('assets/images/image01.webp') }}" alt="logo" width="80px" height="40px">
                </a>
                <h3>КорочкиЕсть</h3>
            </div>

            <nav class="nav">
                <a href="#" class="nav-link">
                    Главная
                </a>
                @auth
                    <a href="{{ route('auth.profile') }}" class="nav-link">
                        {{ auth()->user()->login }}
                    </a>
                    <a href="{{ route('auth.admin-login') }}" class="nav-link">
                        Админ-панель
                    </a>
                @else
                    <a href="{{ route('auth.login-page') }}" class="nav-link">
                        Вход
                    </a>
                    <a href="{{ route('auth.register-page') }}" class="nav-link">
                        Регистрация
                    </a>
                @endauth
            </nav>
        </div>
    </header>
    <main class="container">
        @yield('content')
    </main>
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h3 class="footer-title">О компании</h3>
                <p>Мы создаем качественные решения для вас. Профессиональный подход и индивидуальное решение
                    для каждого клиента.</p>
            </div>
        </div>

        <div class="copyright">
            <p>&copy; {{ date('Y') }} Корочки есть. Все права защищены.</p>
        </div>
    </footer>
    @stack('scripts')
</body>

</html>