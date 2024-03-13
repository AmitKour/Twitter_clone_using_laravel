<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="{{ (request()->routeIs('dashboard')) ? 'text-white bg-primary rounded' : '' }} nav-link" href="{{ route('dashboard') }}">
                    <span>Home</span></a>
            </li>
            <li class="nav-item">
                <a class="{{ (request()->routeIs('feed')) ? 'text-white bg-primary rounded' : '' }} nav-link" href="{{ route('feed') }}">
                    <span>Feed</span></a>
            </li>
            <li class="nav-item">
                <a class="{{ (request()->routeIs('terms')) ? 'text-white bg-primary rounded' : '' }} nav-link" href="{{ route('terms') }}">
                    <span>Terms</span></a>
            </li>
        </ul>
    </div>
    <div class="card-footer text-center py-2">
        <a class="{{ (request()->routeIs('profile')) ? 'text-white bg-primary rounded' : '' }} nav-link" href="{{ route('profile') }}">
            <span>View Profile</span></a>
    </div>
</div>

