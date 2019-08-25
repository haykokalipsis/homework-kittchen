<!DOCTYPE html>
<html lang="en">
    <head>
        @include('front.partials.head')

        {{-- CSS --}}
        @include('front.partials._styles')
    </head>

    <body>
        @include('front.partials.lang-window')
        @include('front.partials.header')

        @yield('content')

        @include('front.partials.footer')

        {{-- Javascript --}}
        @include('front.partials._scripts')
    </body>
</html>