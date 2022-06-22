<style>
    .company-header {
        background-color: {{$company->color}};
    }
</style>

<header class="header company-header d-print-none">
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
                    <a href="/company/{{$company->companyName}}"> <img src="{{asset('storage/images/'.$company->companyName.'/'.$company->logo)}}" alt="logo" class="company-logo"> </a>
                @else
                    <a href="/company/{{$company->companyName}}" class="text-dark"> <h2>{{$company->companyName}}</h2> </a>
                @endif
            </div>
            <div class="col col-12 col-md-3"></div>
        </div>
    </div>
</header>