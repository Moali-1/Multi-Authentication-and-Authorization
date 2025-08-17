<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('assets-back') }}/" data-template="vertical-menu-template-free">

@include('back.partials.head')


<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            @include('back.partials.sidebar')

            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">

                @include('back.partials.navbar')



                @yield('content')

                @include('back.partials.footer')


                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <div class="buy-now">
        <a href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/" target="_blank"
            class="btn btn-danger btn-buy-now">Upgrade to Pro</a>
    </div>

    @include('back.partials.scripts')

</body>

</html>
