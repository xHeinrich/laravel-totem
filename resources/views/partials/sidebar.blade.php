<div id="sidebar-wrapper">

    <div class="uk-panel uk-padding ">
        <a class="uk-logo" href="#">
            <img src="{{asset('vendor/totem/img/mask.svg')}}" class="uk-svg">
            <div class="uk-text-large">Totem</div>
        </a>
    </div>

    <div class="uk-padding uk-padding-remove-top">
        <ul class="uk-nav uk-nav-default"  uk-nav>
            <li class="uk-parent {{ str_contains(url()->current(), 'tasks') ? 'uk-active' : '' }}">
                <a href="{{route('totem.tasks.all')}}" class="uk-flex uk-flex-middle">
                    <icon name="clock" :scale="100" class="uk-visible@m uk-margin-small-right uk-icon"></icon>
                    <span class="uk-vertical-align-middle">Tasks</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-left tm-mobile-menu">
        <ul class="uk-navbar-nav">
            <li class="uk-parent {{ str_contains(url()->current(), 'tasks') ? 'uk-active' : '' }}">
                <a href="{{route('totem.tasks.all')}}" class="uk-flex uk-flex-middle">
                    <icon name="clock" :scale="100" class="uk-visible@m uk-margin-small-right uk-icon"></icon>
                    <span class="uk-vertical-align-middle">Tasks</span>
                </a>
            </li>
        </ul>
    </div>
</nav>