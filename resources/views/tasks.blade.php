@extends('layout.app')

@section('content')

    <div class="panel-body">
        <form action="{{ route('tasks.store') }}" method="POST" class="form-horizontal">
            @csrf
            @if (count($errors) > config('constant.zero'))
                <!-- Form Error List -->
                <div class="alert alert-danger">
                    <strong>{{ trans('contents.error') }}</strong>
                    <br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">{{ trans('contents.task') }}</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="user">{{ trans('contents.task_user') }}</label>
                    <select name="user_id" id="task-user" class="form-control">
                        <option value="">{{ trans('contents.task_user_default') }}</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>    
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> {{ trans('contents.add_task') }}
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="container">
        @if (count($tasks) > config('constant.zero'))
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('contents.list_task' )}}
                </div>
                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>{{ trans('contents.task') }}</th>
                            <th>{{ trans('contents.task_user') }}</th>
                            <th>&nbsp;</th>
                        </thead>

                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="table-text">
                                        <div>{{ $task->name }}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{ $task->user->name }}</div>
                                    </td>
                                    <td>
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash"></i> {{ trans('contents.btn_delete') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>

@endsection
