@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <?php $user = Auth::user(); ?>
        {{ $user->name }}
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>タスクリスト</h1>
                {!! link_to_route('signup.get', 'アカウント作成', ['class' => 'btn btn-primary btn-lg']) !!}
            </div>
        </div>
    @endif
@endsection