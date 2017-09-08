<temporary-drawer ref="drawer" style="z-index: 20;">
    <div slot="header" class="mdc-temporary-drawer__header-content">
        <img src="{{asset('vendor/totem/img/mask.svg')}}">
        <div class="">Totem</div>
    </div>
    <nav id="icon-with-text-demo" class="mdc-temporary-drawer__content mdc-list">
        <a class="mdc-list-item {{ str_contains(url()->current(), 'tasks') ? 'mdc-temporary-drawer--selected' : '' }}" href="{{route('totem.tasks.all')}}">
            <i class="material-icons mdc-list-item__start-detail" aria-hidden="true">inbox</i>Tasks
        </a>
    </nav>
</temporary-drawer>