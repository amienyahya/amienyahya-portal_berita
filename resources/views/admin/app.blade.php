<!DOCTYPE html>
<html lang="en">
@include('admin.templates.header')
<body>
    @include('admin.templates.navbar')
    @include('admin.templates.sidebar')
    @yield('content')
    @include('admin.templates.footer')
</body>
</html>