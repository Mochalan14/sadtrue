<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin SadTrue</title>
    @include('admin.include.style')

</head>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_navbar.html -->
        @include('admin.include.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            @include('admin.include.sidebar')

            @yield('konten')
            <!-- partial -->
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.include.script')

    @stack('script-dt')


    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <!-- End custom js for this page -->
</body>

</html>
