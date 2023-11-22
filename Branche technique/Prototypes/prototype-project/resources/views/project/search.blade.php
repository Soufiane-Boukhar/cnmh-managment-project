@forelse ($projects as $index => $project)
<tr>
    <td>{{ $project->name }}</td>
    <td>{!! $project->description !!}</td>
    <td>{{ $project->start_date }}</td>
    <td>{{ $project->end_date }}</td>
    <td>
        <a href="{{ route('task.index' , $project->id) }}" class="btn btn-sm btn-primary">View Tasks</a>
    </td>
    <td>
        <a href="{{ route('project.show', $project) }}" class="btn btn-sm btn-default">
            <i class="fas fa-eye"></i>
        </a>
        <a href="{{ route('project.edit', $project) }}" class="btn btn-sm btn-default">
            <i class="fas fa-edit"></i>
        </a>
        <form method="POST" action="{{ route('project.destroy', $project) }}" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i
                    class="fas fa-trash"></i></button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="6">Aucun projet trouvé.
        <a href="{{ route('project.create') }}" class="mx-1">Ajouter projet</a>
    </td>
</tr>
@endforelse
<tr>
    <td>
        <div class="d-flex justify-content-between align-items-center p-2">
            <div class="d-flex align-items-center">
                <form action="{{ route('project.import') }}" method="post" enctype="multipart/form-data"
                    id="importForm">
                    @csrf
                    <label for="upload" class="btn btn-default btn-sm mb-0 font-weight-normal">
                        <i class="fa-solid fa-file-arrow-down"></i>
                        Importer
                    </label>
                    <input type="file" id="upload" name="file" style="display:none;" onchange="submitForm()" />
                </form>
                <a href="{{ route('project.export') }}" class="btn  btn-default btn-sm mt-0 mx-2">
                    <i class="fa-solid fa-file-export"></i>
                    Exporter
                </a>
            </div>

        </div>
    </td>
    <td>
        {{$projects->links()}}
    </td>
</tr>