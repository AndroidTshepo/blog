<!DOCTYPE html>
<html lang="en">
<head>
{{--including my partial into to the main menu --}}
@include('partials._head')
</head>
<body>
@include('partials._nav')

<div class="container">

    @include('partials._messages')
    <!--Loading the required view to avoid using the same code more than once-->

    @yield('content')

    @include('partials._footer')

</div>
@include('partials._javascript')

@yield('scripts')

</body>
</html>