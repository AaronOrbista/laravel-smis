<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.userManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('permission_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('home/permissions') || request()->is('home/permissions/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon">

                                    </i>
                                    {{ trans('cruds.permission.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('home/roles') || request()->is('home/roles/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ trans('cruds.role.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('home/users') || request()->is('home/users/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user nav-icon">

                                    </i>
                                    {{ trans('cruds.user.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('item_category_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-tasks nav-icon">

                        </i>
                        {{ trans('cruds.itemCategory.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('item_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.items.index") }}" class="nav-link {{ request()->is('home/items') || request()->is('home/items/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-shopping-cart nav-icon">

                                    </i>
                                    {{ trans('cruds.item.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('brand_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.brands.index") }}" class="nav-link {{ request()->is('home/brands') || request()->is('home/brands/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-bars nav-icon">

                                    </i>
                                    {{ trans('cruds.brand.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('requestor_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-user nav-icon">

                        </i>
                        {{ trans('cruds.requestor.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('account_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.accounts.index") }}" class="nav-link {{ request()->is('home/accounts') || request()->is('home/accounts/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-list nav-icon">

                                    </i>
                                    {{ trans('cruds.account.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('approved_request_access')
                <li class="nav-item">
                    <a href="{{ route("admin.approved-requests.index") }}" class="nav-link {{ request()->is('home/approved-requests') || request()->is('home/approved-requests/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-list-alt nav-icon">

                        </i>
                        {{ trans('cruds.approvedRequest.title') }}
                    </a>
                </li>
            @endcan
            @can('item_release_record_access')
            <li class="nav-item">
                <a href="{{ route("admin.item-release-records.index") }}" class="nav-link {{ request()->is('home/item-release-records') || request()->is('home/item-release-records/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-clipboard-list nav-icon">

                    </i>
                    {{ trans('cruds.itemReleaseRecord.title') }}
                </a>
            </li>
        @endcan

            @can('supplier_access')
            <li class="nav-item">
                <a href="{{ route("admin.supplier.index") }}" class="nav-link {{ request()->is('home/supplier') || request()->is('home/supplier/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-users nav-icon">

                    </i>
                    Supplier
                </a>
            </li>
        @endcan
           <!-- <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li> -->
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>