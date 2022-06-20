<nav class="navbar navbar-expand-lg bg-light sticky-top py-2 py-sm-0 mb-5">
    <div class="container-xxl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link me-2 me-lg-4" href="{{route('company', $company->companyName)}}">
                    <span class="fa-solid fa-user"></span> Прайс-лист
                </a>
                <a class="nav-link me-2 me-lg-4" href="{{route('company-admin', $company->companyName)}}">
                    <span class="fa-solid fa-screwdriver-wrench"></span> Адміністрування
                </a>
                <a class="nav-link me-2 me-lg-4" href="{{route('main-info-admin', $company->companyName)}}">
                    <span class="fa-solid fa-info me-1"></span> Основна інформація
                </a>
                <a class="nav-link me-2 me-lg-4" href="{{route('categories-admin', $company->companyName)}}">
                    <span class="fa-solid fa-list me-1"></span> Категорії
                </a>
                <a class="nav-link me-2 me-lg-4" href="{{route('items-admin', $company->companyName)}}">
                    <span class="fa-solid fa-tags me-1"></span> Товари
                </a>
                <a class="nav-link me-2 me-lg-4" href="{{route('sales-admin', $company->companyName)}}">
                    <span class="fa-solid fa-percent me-1"></span> Знижки
                </a>
                <a class="nav-link me-2 me-lg-4" href="/logout">
                    <span class="fa-solid fa-arrow-right-from-bracket me-1"></span> Вийти
                </a>
            </div>
        </div>
    </div>
</nav>