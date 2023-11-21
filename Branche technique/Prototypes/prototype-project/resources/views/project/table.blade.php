<table class="table table-striped text-nowrap">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Tasks</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($projects as $index => $project)
        <tr>
            <td>{{ $project->name }}</td>
            <td>{{ $project->description }}</td>
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
                    <button type="submit" class="btn btn-sm btn-danger"
                        onclick="return confirm('Are you sure?')">Delete</button>
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
    </tbody>
</table>