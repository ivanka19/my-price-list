<div class="col-10 col-sm-6 col-md-4 col-lg-3 col-print-12 mb-print-2 company-product card rounded-0 border-0">
    <div class="row h-100 m-1">

        <div class="col-12 p-0 col-print-3">
            <div class="company-product-img ratio ratio-1x1" style="background-image: URL('{{asset('storage/images/'.$item->category->company->companyName.'/'.$item->itemPhoto)}}')"> </div>
        </div>

        <div class="col-12 col-print-9 card-body d-flex flex-column d-print-block px-0 ps-print-2 py-print-0 text-start">
            <h5 class="card-title mb-2 mb-print-1 fw-bold">{{$item->itemName}} @if($item->available) <span class="badge rounded-pill  bg-success">В наявності</span>@endif</h5>
            <p class="card-text mb-5 mb-print-1">
                @if ($item->salePrice == NULL) <span class="price">{{$item->price}}</span>
                @else <span class="price old-price pe-1">{{$item->price}}</span> <span class="price new-price pe-1">{{$item->salePrice}}</span>
                @endif
                грн
            </p>
            <p class="d-none d-print-inline">{{$item->description}}</p>
            <a href="#" class="btn btn-secondary mt-auto stretched-link d-print-none" data-bs-toggle="modal" data-bs-target="#modal{{$item->itemId}}">Детальніше</a>
        </div>

    </div>
</div>

<div class="modal fade company-modal" id="modal{{$item->itemId}}" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold">{{$item->itemName}} @if($item->available) <span class="badge rounded-pill  bg-success">В наявності</span>@endif</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col col-12 col-lg-6">
                            <a href="{{asset('storage/images/'.$item->category->company->companyName.'/'.$item->itemPhoto)}}" target="_blank">
                                <div class="company-product-img ratio ratio-1x1" style="background-image: URL('{{asset('storage/images/'.$item->category->company->companyName.'/'.$item->itemPhoto)}}')"></div>
                            </a>
                        </div>
                        <div class="col col-12 col-lg-6 text-start">
                            <p class="mt-3 mt-lg-0">
                                <a class="text-secondary" href="{{route('company', $company->companyName)}}">{{$company->companyName}}</a>
                                <a class="text-secondary" href="{{route('company', ['companyName'=>$company->companyName, 'chosenCategory'=>$item->category->categoryName])}}">/{{$item->category->categoryName}}</a>
                            </p>
                            <p>{{$item->description}}</p>
                            <p class="">
                                @if ($item->salePrice == NULL)
                                    <span class="price pe-1">{{$item->price}}</span>
                                @else
                                    <span class="price old-price pe-1">{{$item->price}}</span>
                                    <span class="price new-price pe-1">{{$item->salePrice}}</span>
                                    (-{{$item->category->sale->percent}} %)
                                @endif
                                грн
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
