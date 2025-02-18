<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>


<body>

    @if (!isset($hideHeader) || !$hideHeader)
        @include('parts.header')
    @endif

    <main class="container mx-auto p-4">
        @yield('content')
    </main>

    @if (!isset($hideFooter) || !$hideFooter)
        @include('parts.footer')
    @endif

    @yield('scripts')

</body>

</html>
