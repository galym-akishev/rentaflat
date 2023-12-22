<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-header">Admin Panel</li>
    <li class="nav-item">
        <a href="{{ route('admin.advertisement.index') }}" class="nav-link">
            <i class="nav-icon fas fa-align-justify"></i>
            <p>
                Advertisements
                <span class="badge badge-info right">
                    {{ $advertisements->total() }}
                </span>
            </p>
        </a>
    </li>
</ul>
