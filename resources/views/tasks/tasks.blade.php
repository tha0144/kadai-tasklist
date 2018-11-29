<ul class="media-list">
@foreach($tasks as $task)
    <?php $user = $task->user; ?>
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
                {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">作成日：{{ $task->created_at }}</span>
            </div>
            <div>
                <p>
                    ステータス：{!! nl2br(e($task->status)) !!}<br>
                    {!! nl2br(e($task->content)) !!}
                </p>
            </div>
            <div>
                @if(Auth::id() == $task->user_id)
                    {!! link_to_route('tasks.edit', '編集', ['id' => $task->id], ['class' => 'btn btn-success btn-xs']) !!}
                    
                    {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                        {!! Form::submit('削除', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $tasks->render() !!}