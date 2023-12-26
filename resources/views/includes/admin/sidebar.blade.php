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
{{--    <li class="nav-item">--}}
{{--        <a href="{{ route('admin.users.index') }}" class="nav-link">--}}
{{--            <i class="nav-icon fas fa-align-justify"></i>--}}
{{--            <p>--}}
{{--                Users--}}
{{--                <span class="badge badge-info right">--}}
{{--                    {{ $users->total() }}--}}
{{--                </span>--}}
{{--            </p>--}}
{{--        </a>--}}
{{--    </li>--}}
</ul>
