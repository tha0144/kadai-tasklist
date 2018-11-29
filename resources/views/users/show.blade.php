@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->name }}</h3>
                </div>
                <div class="panel-body">
                    <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 500) }}" alt="">
                </div>
            </div>
        </aside>
        <div class="col-xs-8">
            <ul class="nav nav-tabs nav-justified">
                <li role="presentaion" class="{{ Request::is('user/' . $user->id) ? 'active' : '' }}"><a href="{{ route('users.show', ['id' => $user->id]) }}">タスク <span class="badge">{{ $ct_tasks }}</span></a></li>
                <li><!--Followings--></li>
                <li><!--Followers--></li>
            </ul>
            @if(Auth::id() == $user->id)
                {!! Form::open(['route' => 'tasks.store']) !!}
                    <div class="form-group">
                        {!! Form::label('status', 'ステータス') !!}
                        {!! Form::text('status', old('status'), ['class' => 'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('content', 'タスク内容') !!}
                        {!! Form::text('content', old('content'), ['class' => 'form-control']) !!}
                    </div>
                    
                    {!! Form::submit('タスク作成', ['class' => 'btn btn-primary btn-block']) !!}
                {!! Form::close() !!}
            @endif
            @if(count($tasks) > 0)
                @include('tasks.tasks', ['tasks' => $tasks])
            @endif
        </div>
    </div>
@endsection