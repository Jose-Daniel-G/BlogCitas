<nav class="main-header navbar
    {{ config('adminlte.classes_topnav_nav', 'navbar-expand') }}
    {{ config('adminlte.classes_topnav', 'navbar-white navbar-light') }}">

    {{-- Navbar left links --}}
    <ul class="navbar-nav">
        {{-- Left sidebar toggler link --}}
        @include('adminlte::partials.navbar.menu-item-left-sidebar-toggler')

        {{-- Configured left links --}}
        @each('adminlte::partials.navbar.menu-item', $adminlte->menu('navbar-left'), 'item')

        {{-- Custom left links --}}
        @yield('content_top_nav_left')
    </ul>

    {{-- Navbar right links --}}
    <ul class="navbar-nav ml-auto">
        {{-- Custom right links --}}
        @yield('content_top_nav_right')

        {{-- Configured right links --}}
        @each('adminlte::partials.navbar.menu-item', $adminlte->menu('navbar-right'), 'item')
        
        @php
        $unreadNotificationsCount = auth()->check() ? auth()->user()->unreadNotifications->count() : 0;
        $readNotificationsCount = auth()->check() ? auth()->user()->readNotifications->count() : 0;
    @endphp
    
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning">{{ $unreadNotificationsCount }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-header">{{ $unreadNotificationsCount }} Notificaciones No Leídas</span>
                <div class="dropdown-divider"></div>
    
                @forelse(auth()->user()->unreadNotifications as $notification)
                    <a href="{{ $notification->data['url'] ?? '#' }}" class="dropdown-item">
                        <i class="{{ $notification->data['icon'] ?? 'fas fa-envelope mr-2' }} mr-2"></i> {{ $notification->data['name'] ?? 'Nueva Notificación' }}
                        <span class="ml-3 pull-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                @empty
                <span class="ml-3 pull-right text-muted text-sm">Sin notificaciones por leer</span>
                @endforelse
                <span class="dropdown-header">{{ $readNotificationsCount }} Notificaciones Leídas</span>
                <div class="dropdown-divider"></div>
                @forelse(auth()->user()->readNotifications as $notification)
                    <a href="{{ $notification->data['url'] ?? '#' }}" class="dropdown-item">
                        <i class="{{ $notification->data['icon'] ?? 'fas fa-users mr-2' }} mr-2"></i> {{ $notification->data['name'] ?? 'Nueva Notificación' }}
                        <span class="ml-3 pull-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                @empty
                <span class="ml-3 pull-right text-muted text-sm">Sin notificaciones leidas</span>
                @endforelse
                <a href="{{ route('posts.markAsRead')}}" class="dropdown-item dropdown-footer">Marcar como leidas</a>
                {{-- <a href="" class="dropdown-item dropdown-footer">Ver Todas las Notificaciones</a> --}}
            </div>
        </li>
    </ul>
    
        
        {{-- User menu link --}}
        @if(Auth::user())
            @if(config('adminlte.usermenu_enabled'))
                @include('adminlte::partials.navbar.menu-item-dropdown-user-menu')
            @else
                @include('adminlte::partials.navbar.menu-item-logout-link')
            @endif
        @endif

        {{-- Right sidebar toggler link --}}
        @if(config('adminlte.right_sidebar'))
            @include('adminlte::partials.navbar.menu-item-right-sidebar-toggler')
        @endif
    </ul>

</nav>
