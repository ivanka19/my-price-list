<header class="header mb-5">
    <div class="container-xxl">
        @if (Request::is('/'))
            {{--  Якщо головна сторінка   --}}
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <img src="images/logo.svg" alt="logo" class="logo">
                </div>
            </div>
        @else
            {{--  Якщо інші сторінки  --}}
            <div class="row justify-content-center justify-content-sm-between align-items-center py-3">
                <div class="col-12 col-sm-5 p-0">
                    <h2 class="px-4 mb-3 mb-sm-0">@yield('title')</h2>
                </div>
                <div class="col-12 col-sm-4 p-0">
                    <a href="{{route('home')}}"><img src="/images/logo.svg" class="mini_logo" alt=""></a>
                </div>
            </div>
        @endif
    </div>
</header>