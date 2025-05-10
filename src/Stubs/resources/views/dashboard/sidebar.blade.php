<aside class="left-sidebar p-0">
    <nav class="sidebar-nav scroll-sidebar">
        <ul id="sidebarnav" class="px-3">
            @can('manage_dashboard')
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Route::is('admin.dashboard') ? 'active' : '' }}"
                        href="{{ route('admin.dashboard') }}"><span class="menu-icon iconify"
                            data-icon="material-symbols:dashboard-rounded"></span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
            @endcan
        </ul>
    </nav>
</aside>
