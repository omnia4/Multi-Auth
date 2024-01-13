<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Application</title>
    <!-- Add your stylesheet links here -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav>
            <!-- Your navigation bar -->
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Add your script links here -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>