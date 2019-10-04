<div class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <a href="{{ route('frontend.index') }}" class="navbar-brand"></a>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('labels.general.toggle_navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{route('frontend.index')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.index')) }}">
                        Главная
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('frontend.about')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.about')) }}">
                        О нас
                    </a>
                </li> 
                <li class="nav-item">
                    <a href="{{route('frontend.blog')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.blog')) }}">
                        Блог
                    </a>
                </li> 
                <li class="nav-item">
                    <a href="{{route('frontend.contacts')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.contacts')) }}">
                        Контакты
                    </a>
                </li> 
                @guest
                   
                @else
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuUser" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">{{ $logged_in_user->name }}</a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuUser">
                            @can('view backend')
                                <a href="{{ route('admin.dashboard') }}" class="dropdown-item">{{ __('navs.frontend.user.administration') }}</a>
                            @endcan

                            <a href="{{ route('frontend.user.account') }}" class="dropdown-item {{ active_class(Active::checkRoute('frontend.user.account')) }}">{{ __('navs.frontend.user.account') }}</a>
                            <a href="{{ route('frontend.auth.logout') }}" class="dropdown-item">{{ __('navs.general.logout') }}</a>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
</div>