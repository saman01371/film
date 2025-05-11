<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'فروشگاه فیلم')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- هدر سایت -->
<header class="bg-dark text-white py-3">
    <div class="container">
        <h1 class="m-0">فروشگاه فیلم</h1>
    </div>
</header>

<!-- منوی ناوبری -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">خانه</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('films.index') }}">فیلم‌ها</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories.index') }}">دسته‌بندی‌ها</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('orders.index') }}">سفارش‌ها</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- محتوای صفحه -->
<div class="container my-4">
    @yield('content')
</div>

<!-- فوتر سایت -->
<footer class="bg-dark text-white py-3 mt-5">
    <div class="container text-center">
        <p>&copy; 2025 فروشگاه فیلم</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
