<!DOCTYPE html>


<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('assets-back') }}/" data-template="vertical-menu-template-free">

@include('back.auth.partials.head')


<body>

    @yield('content')



    <div class="buy-now">
        <a href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/" target="_blank"
            class="btn btn-danger btn-buy-now">Upgrade to Pro</a>
    </div>

    @include('back.auth.partials.scripts')
</body>

</html>
