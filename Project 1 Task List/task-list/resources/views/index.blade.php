<div>
hello i am blade template!</div>


<div>
    @forelse ($tasks as $task)
        <div>
            <a href="{{route('task.show', ['id' => $task->id])}}">
                {{$task->name}}
            </a>
        </div>
    @empty
    <div>There are no tasks!</div>

    @endforelse
</div>
