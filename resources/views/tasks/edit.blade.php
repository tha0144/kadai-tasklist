@extends('layouts.app')

@section('content')

    <h1>タスク編集</h1>
    
    {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}
        
        {!! Form::label('content', 'タスク：') !!}
        {!! Form::text('content') !!}
        
        {!! Form::submit('変更') !!}
        
    {!! Form::close() !!}

@endsection