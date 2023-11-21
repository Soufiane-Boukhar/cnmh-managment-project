@forelse ($tasks as $index => $task)
<tr>
    <td>
        {{$task->name}}
    </td>
    <td>
        {{$task->description}}
    </td>
    <td>
        {{$task->start_date}}
    </td>
    <td>
        {{$task->end_date}}
    </td>
    <td>
        <a href="{{ route('task.edit', ['id' => $task->project_id, 'task_id' => $task->id]) }}"
            class="btn btn-sm btn-default">
            <i class="fas fa-edit"></i>
        </a>
        <form method="POST" action="" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i
                    class="fas fa-trash"></i></button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="6">Tasks not found
        <a href="{{ route('task.create' ,  ['id' => $task->project_id, 'task_id' => $task->id]) }}" class="mx-1">Add
            task</a>
    </td>
</tr>
@endforelse
<tr>
    <td>
       
                {{$tasks->links()}}

        

    </td>

</tr>