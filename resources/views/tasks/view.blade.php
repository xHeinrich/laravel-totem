@extends('totem::layout')
@push('style')
    <style>
        .mdc-list-item__text a {
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
    - Task
@stop
@section('title')
    Task Details
@stop
@section('toolbar-icons')
    <a href="{{route('totem.tasks.all')}}" class="material-icons mdc-toolbar__icon">view_list</a>
    <a href="{{route('totem.task.create')}}" class="material-icons mdc-toolbar__icon">add</a>
    <a href="{{route('totem.task.edit', $task)}}" class="material-icons mdc-toolbar__icon">edit</a>
@stop
@section('content')
    <div class="mdc-list-group mdc-elevation--z1">
        <h3 class="mdc-list-group__subheader">Task Details</h3>
        <ul class="task-list mdc-list mdc-list--two-line mdc-list--avatar-list">
            <li class="mdc-list-item">
                <i class="mdc-list-item__start-detail material-icons" aria-hidden="true">subject</i>
                <span class="mdc-list-item__text">
                    {{str_limit($task->description, 30)}}
                    <span class="mdc-list-item__text__secondary">
                        Description
                    </span>
                </span>
            </li>
            <li class="mdc-list-item">
                <i class="mdc-list-item__start-detail material-icons" aria-hidden="true">settings</i>
                <span class="mdc-list-item__text">
                    {{$task->command}}
                    <span class="mdc-list-item__text__secondary">
                        Command
                    </span>
                </span>
            </li>
            <li class="mdc-list-item">
                <i class="mdc-list-item__start-detail material-icons" aria-hidden="true">more_horiz</i>
                <span class="mdc-list-item__text">
                    {{$task->parameters or 'No parameters'}}
                    <span class="mdc-list-item__text__secondary">
                        Parameters
                    </span>
                </span>
            </li>
            <li class="mdc-list-item">
                <i class="mdc-list-item__start-detail material-icons" aria-hidden="true">alarm_on</i>
                <span class="mdc-list-item__text">
                    {{$task->getCronExpression()}}
                    <span class="mdc-list-item__text__secondary">
                        Cron Expression
                    </span>
                </span>
            </li>
            <li class="mdc-list-item">
                <i class="mdc-list-item__start-detail material-icons" aria-hidden="true">schedule</i>
                <span class="mdc-list-item__text">
                    {{$task->timezone}}
                    <span class="mdc-list-item__text__secondary">
                        Timezone
                    </span>
                </span>
            </li>
            <li class="mdc-list-item">
                <span class="mdc-list-item__text">
                    {{$task->created_at->toDayDateTimeString()}}
                    <span class="mdc-list-item__text__secondary">
                        Created At
                    </span>
                </span>
            </li>
            <li class="mdc-list-item">
                <span class="mdc-list-item__text">
                    {{$task->updated_at->toDayDateTimeString()}}
                    <span class="mdc-list-item__text__secondary">
                        Updated At
                    </span>
                </span>
            </li>
        </ul>
        <hr class="mdc-list-divider">
        <h3 class="mdc-list-group__subheader">Statistics</h3>
        <ul class="task-list mdc-list mdc-list--two-line mdc-list--avatar-list mdc-list--dense">
            <li class="mdc-list-item">
                <span class="mdc-list-item__text">
                    {{$task->results->count() > 0 ? number_format(  $task->results->sum('duration') / (1000 * $task->results->count()) , 2) : '0'}} seconds
                    <span class="mdc-list-item__text__secondary">
                        Average Run Time
                    </span>
                </span>
            </li>
            <li class="mdc-list-item">
                <span class="mdc-list-item__text">
                    {{$task->upcoming }}
                    <span class="mdc-list-item__text__secondary">
                        Next Run Schedule
                    </span>
                </span>
            </li>
        </ul>
        <hr class="mdc-list-divider">
        <h3 class="mdc-list-group__subheader">Notifications</h3>
        <ul class="task-list mdc-list mdc-list--two-line mdc-list--avatar-list mdc-list--dense">
            <li class="mdc-list-item">
                <span class="mdc-list-item__text">
                    {{$task->notification_email_address or 'Do not send email notifications'}}
                    <span class="mdc-list-item__text__secondary">
                        Email Notification
                    </span>
                </span>
            </li>
            <li class="mdc-list-item">
                <span class="mdc-list-item__text">
                    {{$task->notification_phone_number or 'Do not send sms notifications'}}
                    <span class="mdc-list-item__text__secondary">
                        SMS Notification
                    </span>
                </span>
            </li>
            <li class="mdc-list-item">
                <span class="mdc-list-item__text">
                    {{$task->notification_slack_webhook or 'Do not send slack notifications'}}
                    <span class="mdc-list-item__text__secondary">
                        Slack Notifications
                    </span>
                </span>
            </li>
        </ul>
        <hr class="mdc-list-divider">
        <h3 class="mdc-list-group__subheader">Miscellaneous</h3>
        <ul class="task-list mdc-list mdc-list--dense">
            <li class="mdc-list-item">
                @if($task->dont_overlap)
                    Doesn't Overlap with another instance of this task
                @else
                    Overlaps with another instance of this task
                @endif
            </li>
            <li class="mdc-list-item">
                @if($task->run_in_maintenance)
                    Runs in maintenance mode
                @else
                    Doesn't run in maintenance mode
                @endif
            </li>
        </ul>
    </div>
@stop
@section('main-panel-footer')
    <div class="uk-flex uk-flex-between uk-flex-middle">
        <span>
            <a href="{{ route('totem.task.edit', $task) }}" class="uk-button uk-button-primary uk-button-small">Edit</a>
            <form class="uk-display-inline" action="{{route('totem.task.delete', $task)}}" method="post">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <button type="submit" class="uk-button uk-button-danger uk-button-small">Delete</button>
            </form>
        </span>
        <execute-button :data-task="{{ $task }}" url="{{route('totem.task.execute', $task)}}" button-class="uk-button-small uk-button-primary"></execute-button>
    </div>
@stop
@section('additional-panels')
    <div class="uk-card uk-card-default uk-margin-top">
        <div class="uk-card-header">
            <h5 class="uk-card-title uk-margin-remove">Execution Results</h5>
        </div>
        <div class="uk-card-body uk-padding-remove-top">
            <table class="uk-table uk-table-striped">
                <thead>
                    <tr>
                        <th>Executed At</th>
                        <th>Duration</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @forelse($results = $task->results()->orderByDesc('created_at')->paginate(10) as $result)
                    <tr>
                        <td>{{$result->ran_at->toDateTimeString()}}</td>
                        <td>{{ number_format($result->duration / 1000 , 2)}} seconds</td>
                        <td>
                            <task-output output="{{nl2br($result->result)}}"></task-output>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="uk-text-center" colspan="5">
                            <p>Not executed yet.</p>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="uk-card-footer">
            {{$results->links('totem::partials.pagination')}}
        </div>
    </div>
@stop