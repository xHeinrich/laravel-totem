<temporary-drawer id="totem-nav-menu" ref="drawer">
    <div slot="header" class="mdc-temporary-drawer__header-content">
        <span class="mdc-typography--title mdc-theme--text-secondary-on-light">Laravel Totem</span>
    </div>
    <nav id="icon-with-text-demo" class="mdc-temporary-drawer__content mdc-list">
        <a class="mdc-list-item {{ str_contains(url()->current(), 'tasks') ? 'mdc-temporary-drawer--selected' : '' }}" href="{{route('totem.tasks.all')}}">
            <i class="material-icons mdc-list-item__start-detail" aria-hidden="true">access_time</i>Tasks
        </a>
    </nav>
</temporary-drawer>