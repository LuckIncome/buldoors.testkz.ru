<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
@include('partials.head')
<body data-ng-app="buldoors">
    @include('partials.header')
    <div class="splash" data-ng-cloak=""></div>
    <main data-ng-cloak="">
        @yield('content')
    </main>
    @include('partials.footer')
    @include('partials.modals')
    @include('partials.scripts')
</body>
</html>
