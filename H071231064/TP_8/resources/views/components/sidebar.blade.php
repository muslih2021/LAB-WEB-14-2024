<div class="col-sm-auto bg-light sticky-top">
    <div class="d-flex flex-sm-column flex-row flex-nowrap bg-light align-items-center sticky-top">
        <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center align-items-center">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link link-dark text-decoration-none py-3 px-2" title="Home" data-bs-toggle="tooltip" data-bs-placement="right">
                    <i class="bx bxs-home fs-1"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('about') }}" class="nav-link link-dark text-decoration-none py-3 px-2" title="About" data-bs-toggle="tooltip" data-bs-placement="right">
                    <i class="bx bxs-info-circle fs-1"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('contact') }}" class="nav-link link-dark text-decoration-none py-3 px-2" title="Contact" data-bs-toggle="tooltip" data-bs-placement="right">
                    <i class="bx bxs-phone fs-1"></i>
                </a>
            </li>
        </ul>
    </div>
</div>
@push('scripts')
    
@endpush