<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('partials.head')
    <script type="text/javascript">
        $(function() {
            AOS.init();
        });
    </script>
    <body>
        <div id='app'>
            @include('partials.nav')
            
            <div class="gradient-grey-bg">
                @include('partials.session')
                @include('partials.errors')
                @yield('content')
            </div>
            
            @include('partials.footer')
            @include('partials.sizes')
            @include('partials.forhire')
            @include('partials.returns')
            @include('partials.privacy')
            @include('partials.terms')
            @include('partials.cookies')
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('jquery-ui/jquery-ui.js') }}"></script>
        <script src="{{ asset('bootstrap/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/browser.min.js') }}"></script>
        <script src="{{ asset('js/breakpoints.min.js') }}"></script>
        <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
        <script src="{{ asset('jquery-validate/jquery-validate.min.js') }}"></script>
        <script src="{{ asset('jquery-validate/jquery-validate-additional-methods.min.js') }}"></script>
        <script src="{{ asset('jquery-datetimepicker/jquery.datetimepicker.full.min.js') }}"></script>
        <script src="{{ asset('jquery-daterangepicker/moment.min.js') }}"></script>
        <script src="{{ asset('jquery-daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{ asset('owl.carousel/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('jquery-cookie/jquery.cookie.min.js') }}"></script>
        <script src="{{ asset('jquery-cookie/cookie-consent.js') }}"></script>
        <script src="{{ asset('jquery-maxlength/jquery.maxlength.min.js') }}"></script>
        <script src="{{ asset('js/util.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/signin.js') }}"></script>
        <script src="{{ asset('js/signup.js') }}"></script>
        <script src="{{ asset('js/catalogue.js') }}"></script>
        <script src="{{ asset('js/contact.js') }}"></script>
        <script src="{{ asset('js/hires.js') }}"></script>
        <script src="{{ asset('js/paginator.js') }}"></script>

        @yield('scripts')
    </body>
</html>
