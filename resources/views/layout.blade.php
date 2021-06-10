<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
    @yield('private-style')
</head>

<body>

    <!-- start header -->
    @include('includes.header')
    <!-- end header -->

    <!-- Content Section -->
    <div id="main" class="d-flex align-items-center min-vh-100 p-2">
        @yield('content')
    </div>
    <!-- end of Content Section -->

    <!-- start footer -->
    @include('includes.footer')
    <!-- end footer -->
    @include('includes.scripts')
    @yield('private-scripts')
</body>
</html>
