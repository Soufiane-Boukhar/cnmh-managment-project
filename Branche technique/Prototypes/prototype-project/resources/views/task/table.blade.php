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
       @include('project.task.search')
    </tbody>
</table>
<input type="hidden" id="page_hidden" value="1">