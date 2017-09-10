@extends("totem::layout")
@push('style')
<style>
    .mdc-list-item__text a {
        text-decoration: none;
    }
    .mdc-list-item__end-detail {
        color: rgba(0, 0, 0, .26);
        text-decoration: none;
    }
    .mdc-list-group {
        border: 1px solid rgba(0, 0, 0, 0.1);
    }
    .mdc-list-item__start-detail {
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
</style>
@endpush
@section('page-title')
    @parent
    - Tasks
@stop
@section('title')
    Tasks
@stop
@section('content')
    <div class="mdc-list-group mdc-elevation--z1">
        <h3 class="mdc-list-group__subheader">Active Tasks</h3>
        <ul class="task-list mdc-list mdc-list--two-line mdc-list--avatar-list">
            @forelse($active as $task)
                <li class="mdc-list-item">
                    <div class="mdc-list-item__start-detail">
                        <i class="material-icons" aria-hidden="true">access_time</i>
                    </div>

                    <span class="mdc-list-item__text">
                        <a href="{{route('totem.task.view', $task)}}">
                            {{str_limit($task->description, 30)}}
                        </a>
                        <span class="mdc-list-item__text__secondary">
                            @if($last = $task->results->last())
                                {{$last->ran_at->toDayDateTimeString()}}
                            @endif
                        </span>
                    </span>
                    <a href="#" class="mdc-list-item__end-detail material-icons" aria-label="Execute Task" title="View task details">
                        more_vert
                    </a>
                    <div class="mdc-simple-menu" tabindex="-1">
                        <ul class="mdc-simple-menu__items mdc-list" role="menu" aria-hidden="true">
                            <li class="mdc-list-item" role="menuitem" tabindex="0">
                                <a href="{{route('totem.task.execute', $task)}}">Execute</a>
                            </li>
                            <li class="mdc-list-item" role="menuitem" tabindex="-1" aria-disabled="true">
                                Disable
                            </li>
                        </ul>
                    </div>
                </li>
            @empty
                <li class="mdc-list-item">
                    <span class="mdc-list-item__start-detail">
                        <img width="60" height="60" src="{{asset('/vendor/totem/img/funnel.svg')}}">
                    </span>

                    <span class="mdc-list-item__text">
                        No active tasks
                    </span>
                </li>
            @endforelse
        </ul>
        <hr class="mdc-list-divider">
        <h3 class="mdc-list-group__subheader">Inactive Tasks</h3>
        <ul class="task-list mdc-list mdc-list--two-line mdc-list--avatar-list">
            @forelse($inactive as $task)
                <li class="mdc-list-item">
                    <i class="mdc-list-item__start-detail material-icons" aria-hidden="true">access_time</i>
                    <span class="mdc-list-item__text">
                        <a href="{{route('totem.task.view', $task)}}">
                            {{str_limit($task->description, 30)}}
                        </a>
                        <span class="mdc-list-item__text__secondary">
                            @if($last = $task->results->last())
                                {{$last->ran_at->toDayDateTimeString()}}
                            @endif
                        </span>
                    </span>
                    <a href="{{route('totem.task.execute', $task)}}" class="mdc-list-item__end-detail material-icons" aria-label="Execute Task" title="View task details">
                        settings
                    </a>
                </li>
            @empty
                <li class="mdc-list-item">
                    <span class="mdc-list-item__start-detail">
                        <img width="60" height="60" src="{{asset('/vendor/totem/img/funnel.svg')}}">
                    </span>

                    <span class="mdc-list-item__text">
                        No inactive tasks
                    </span>
                </li>
            @endforelse
        </ul>
    </div>
@stop
