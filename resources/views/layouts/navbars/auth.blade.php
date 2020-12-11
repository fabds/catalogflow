<div class="sidebar" data-color="black" data-active-color="info">
    <div class="logo">
        <a href="{{ route('page.index', 'dashboard') }}" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/filoblu-logo.jpeg">
            </div>
        </a>
        <a href="{{ route('page.index', 'dashboard') }}" style="text-transform: none; font-weight: bold; font-size: 24px" class="simple-text logo-normal">
            {{ __('CatalogFlow') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'dashboard') }}">
                    <i class="fa fa-tachometer-alt"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            @can('project-list')
                <li class="{{ $elementActive == 'projects' ? 'active' : '' }}">
                    <a href="{{ route('page.index', 'projects') }}">
                        <i class="nc-icon nc-app"></i>
                        <p>{{ __('Projects') }}</p>
                    </a>
                </li>
            @endcan
            @can('job-list')
                <li class="{{ $elementActive == 'jobs' ? 'active' : '' }}">
                    <a href="{{ route('page.index', 'jobs') }}">
                        <i class="nc-icon nc-briefcase-24"></i>
                        <p>{{ __('Jobs') }}</p>
                    </a>
                </li>
            @endcan
            @can('user-list')
                <li class="{{ $elementActive == 'users' ? 'active' : '' }}">
                    <a href="{{ route('page.index', 'users') }}">
                        <i class="nc-icon nc-circle-10"></i>
                        <p>{{ __('Users') }}</p>
                    </a>
                </li>
            @endcan
            @can('role-list')
                <li class="{{ $elementActive == 'roles' ? 'active' : '' }}">
                    <a href="{{ route('page.index', 'roles') }}">
                        <i class="nc-icon nc-key-25"></i>
                        <p>{{ __('Roles') }}</p>
                    </a>
                </li>
            @endcan

            <li class="active-pro {{ $elementActive == 'upgrade' ? 'active' : '' }}">
                <a href="https://filoblu.atlassian.net/wiki/spaces/TECH/pages/1423671305/CATALOG+FLOW" class="bg-danger">
                    <i class="nc-icon nc-single-copy-04 text-white"></i>
                    <p class="text-white">{{ __('Documentation') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
