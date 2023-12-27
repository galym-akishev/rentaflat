<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-header">Admin Panel</li>
    <li class="nav-item">
        <a href="{{ route('admin.advertisement.index') }}" class="nav-link">
            <i class="nav-icon fas fa-align-justify"></i>
            <p>
                Advertisements
                <span class="badge badge-info right">
                    {{ $advertisementsCount }}
                </span>
            </p>
        </a>
    </li>
    @can('update', auth()->user())
        <li class="nav-item">
            <a href="{{ route('admin.user.index') }}" class="nav-link">
                <i class="nav-icon fas fa-align-justify"></i>
                <p>
                    Users
                    <span class="badge badge-info right">
                    {{ $usersCount }}
                </span>
                </p>
            </a>
        </li>
    @endcan
    <li class="nav-item">
        <a href="{{ route('admin.amenity.index') }}" class="nav-link">
            <i class="nav-icon fas fa-align-justify"></i>
            <p>
                Amenities
                <span class="badge badge-info right">
                    {{ $amenitiesCount }}
                </span>
            </p>
        </a>
    </li>
    @can('create', App\Models\Amenity::class)
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.amenity.create') }}">
                <i class="nav-icon fas fa-align-justify"></i>
                Create amenity
            </a>
        </li>
    @endcan
</ul>
