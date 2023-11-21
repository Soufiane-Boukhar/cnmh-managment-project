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
        <input type="hidden" id="id_project" value="{{ $task->project_id }}" />
    </td>
</tr>
@empty
<tr>
    <td colspan="6">Tasks not found

    </td>
</tr>
@endforelse
<tr>
    <td>
        <div class="d-flex justify-content-between align-items-center p-2">
            <div class="d-flex align-items-center">
                <form action="{{ route('task.import') }}" method="post" enctype="multipart/form-data" id="importForm">
                    @csrf
                    <label for="upload" class="btn btn-default btn-sm mb-0 font-weight-normal">
                        <i class="fa-solid fa-file-arrow-down"></i>
                        Importer
                    </label>
                    <input type="file" id="upload" name="file" style="display:none;" onchange="submitForm()" />
                </form>
                <a href="{{ route('task.export') }}" class="btn  btn-default btn-sm mt-0 mx-2">
                    <i class="fa-solid fa-file-export"></i>
                    Exporter
                </a>
            </div>

        </div>
    </td>
    <td>
        {{$tasks->links()}}
    </td>

</tr>