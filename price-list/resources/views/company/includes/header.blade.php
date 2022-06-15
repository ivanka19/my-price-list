<style>
    .company-header {
        background-color: {{$company->color}};
    }
</style>

<header class="header company-header">
    <div class="container-xxl">
        <div class="row py-2 align-items-center">
            <div class="col col-6 col-md-3 d-flex align-items-center">
                <div class="row">
                    @if ($company->city != NULL)
                        <div class="col col-12">
                            <p class="mb-2">{{$company->city}}</p>
                        </div>
                    @endif
                    @if ($company->phone != NULL)
                        <div class="col col-12">
                            <p class="my-0">{{$company->phone}}</p>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col col-6 d-flex justify-content-end justify-content-md-center">
                @if ($company->logo != NULL)
                    <a href="/company/{{$company->companyName}}"> <img src="/images/company/{{$company->logo}}" alt="logo" class="company-logo"> </a>
                @else
                    <h2>{{$company->companyName}}</h2>
                @endif
            </div>
            <div class="col col-12 col-md-3"></div>
        </div>
    </div>
</header>