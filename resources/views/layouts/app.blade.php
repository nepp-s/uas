<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/storage/image/logo.png">
    <title>ARTIKEL</title>    
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
</head>

<body class="font-sans antialiased flex h-screen bg-white" x-data="{ sidebarOpen: false }">

    <!-- Content Area -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Navbar -->
        @include('layouts.partials.navbar')

        <!-- Page Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-white">
            <!--Content-->
            @yield('content')
        </main>

        @include('layouts.partials.footer')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @yield('js')
</body>
</html>
