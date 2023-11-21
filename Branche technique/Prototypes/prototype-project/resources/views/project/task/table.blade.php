<table class="table table-striped text-nowrap ">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
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
            <a href="{{ route('task.edit', ['id' => $task->project_id]) }}" class="btn btn-sm btn-default">
                  <i class="fas fa-edit"></i>
                </a>
                <form method="POST" action="" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"
                        onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6">Tasks not found
                <a href="{{ route('task.create' , $tasks->project_id) }}" class="mx-1">Add task</a>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>