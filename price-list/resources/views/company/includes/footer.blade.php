<style>
    .company-footer {
        background-color: {{$company->color}};
    }
</style>

<footer class="footer company-footer py-4 mt-5">
    <div class="container-xxl">
        <div class="row justify-content-center justify-content-md-between align-items-center mb-4">
            <div class="col col-10 col-md-3 mb-3 mb-md-0">
                
                @if ($company->logo != NULL)
                    <a href="{{route('company', $company->companyName)}}"> <div class="company-footer-logo ratio ratio-1x1" style="background-image: URL('/images/company/{{$company->logo}}')"> </div> </a>
                @else
                    <h2>{{$company->companyName}}</h2>
                @endif                
            
            </div>
            <div class="col col-12 col-md-4 d-flex align-items-center">
                <div class="w-100">
                    <div class="row justify-content-center justify-content-md-end mb-4">

                        @if ($company->instagram)
                            <div class="col col-2">
                                <a href="{{$company->instagram}}" class="company-social text-center text-md-end" target="_blank">
                                    <span class="fa-brands fa-instagram-square"></span>
                                </a>
                            </div>
                        @endif
                        @if ($company->facebook)
                            <div class="col col-2">
                                <a href="{{$company->facebook}}" class="company-social text-center text-md-end" target="_blank">
                                    <span class="fa-brands fa-facebook-square"></span>
                                </a>
                            </div>
                        @endif
                        @if ($company->youTube)
                            <div class="col col-2">
                                <a href="{{$company->youTube}}" class="company-social text-center text-md-end" target="_blank">
                                    <span class="fa-brands fa-youtube"></span>
                                </a>
                            </div>
                        @endif
                        @if ($company->tikTok)
                            <div class="col col-2">
                                <a href="{{$company->tikTok}}" class="company-social text-center text-md-end" target="_blank">
                                    <span class="fa-brands fa-tiktok"></span>
                                </a>
                            </div>
                        @endif

                        <div class="col col-2">
                            <a href="mailto:{{$company->email}}" class="company-social text-center text-md-end" target="_blank">
                                <span class="fa-solid fa-envelope"></span>
                            </a>
                        </div>
                    
                    </div>
                    <div class="row">
                        @if ($company->city != NULL)
                            <div class="col-12 m-0 p-0">
                                <p class="mb-2 text-md-end">{{$company->city}}</p>
                            </div>
                        @endif
                        @if ($company->phone != NULL)
                            <div class="col-12 m-0 p-0">
                                <p class="my-0 text-md-end">{{$company->phone}}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <p> Створено за допомогою сервісу <a href="{{route('home')}}"><img src="/images/logo.svg" class="logo-link" alt=""></a>
            </p>
        </div>
    </div>
</footer>