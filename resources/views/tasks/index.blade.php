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
@section('toolbar-icons')
    <a href="{{route('totem.task.create')}}" class="material-icons mdc-toolbar__icon">add</a>
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
                    <a href="{{route('totem.task.execute', $task)}}" class="mdc-list-item__end-detail material-icons" aria-label="Execute Task" title="View task details">
                        play_arrow
                    </a>
                </li>
            @empty
                <li class="center p1">
                    <img width="60" height="60" src="{{asset('/vendor/totem/img/funnel.svg')}}">
                    <p class="mdc-typography--caption">No inactive tasks</p>
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
                        play_arrow
                    </a>
                </li>
            @empty
                <li class="center p1">
                    <img width="60" height="60" src="{{asset('/vendor/totem/img/funnel.svg')}}">
                    <p class="mdc-typography--caption">No inactive tasks</p>
                </li>
            @endforelse
        </ul>
    </div>
@stop
