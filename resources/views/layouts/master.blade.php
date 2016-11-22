<!DOCTYPE html>
<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to 'CampMonkey' --}}
        @yield('title','CampMonkey')
    </title>

    <meta charset='utf-8'>
    <link rel="stylesheet" type='text/css' href="/css/reset.css">
    <link rel="stylesheet" type='text/css' href="/css/styles.css">

    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')

</head>
<body>

    <header id="mainHeader" role="banner">
        <h1>CampMonkey</h1>
        <p>Your guide to Scouting Campgrounds</p>
    </header>

    <main>
        {{-- Main page content will be yielded here --}}
        @yield('content')
    </main>

    <footer>
        <!--&copy; {{ date('Y') }} -->
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

</body>
</html>
