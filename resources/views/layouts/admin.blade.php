
<!DOCTYPE html>
<html lang="en">

<head>
    <title>XII RPL 2 | {{ $title }}</title>
    @include('admin-components.head')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('admin-components.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('admin-components.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <hr style="margin: 0 0 20px;">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">@yield('admin-title')</h1>
                    @yield('admin-content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            @include('admin-components.footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    @include('components.scroll-to-top')

    @include('admin-components.logout-modal')

    @include('admin-components.script')

</body>

</html>