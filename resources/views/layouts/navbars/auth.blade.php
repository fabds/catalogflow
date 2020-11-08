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
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'projects' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'projects') }}">
                    <i class="nc-icon nc-app"></i>
                    <p>{{ __('Projects') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'jobs' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'jobs') }}">
                    <i class="nc-icon nc-briefcase-24"></i>
                    <p>{{ __('Jobs') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'users' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'users') }}">
                    <i class="nc-icon nc-circle-10"></i>
                    <p>{{ __('Users') }}</p>
                </a>
            </li>

            <li class="{{ $elementActive == 'icons' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'icons') }}">
                    <i class="nc-icon nc-diamond"></i>
                    <p>{{ __('Icons') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'map' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'map') }}">
                    <i class="nc-icon nc-pin-3"></i>
                    <p>{{ __('Maps') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'notifications' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'notifications') }}">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>{{ __('Notifications') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'tables' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'tables') }}">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>{{ __('Table List') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'typography' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'typography') }}">
                    <i class="nc-icon nc-caps-small"></i>
                    <p>{{ __('Typography') }}</p>
                </a>
            </li>
            <li class="active-pro {{ $elementActive == 'upgrade' ? 'active' : '' }}">
                <a href="https://filoblu.atlassian.net/wiki/spaces/TECH/pages/1423671305/CATALOG+FLOW" class="bg-danger">
                    <i class="nc-icon nc-single-copy-04 text-white"></i>
                    <p class="text-white">{{ __('Documentation') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
