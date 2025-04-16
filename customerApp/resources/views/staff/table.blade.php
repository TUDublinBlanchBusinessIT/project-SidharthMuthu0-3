<table class="table table-responsive" id="staff-table">
    <thead>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Position</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Hire Date</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($staff as $staff)
        <tr>
            <td>{!! $staff->first_name !!}</td>
            <td>{!! $staff->last_name !!}</td>
            <td>{!! $staff->position !!}</td>
            <td>{!! $staff->phone_number !!}</td>
            <td>{!! $staff->email !!}</td>
            <td>{!! $staff->hire_date !!}</td>
            <td>
                {!! Form::open(['route' => ['staff.destroy', $staff->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('staff.show', [$staff->id]) !!}" class='btn btn-default btn-xs'><i class="far fa-eye"></i></i></a>
                    <a href="{!! route('staff.edit', [$staff->id]) !!}" class='btn btn-default btn-xs'><i class="far fa-edit"></i></i></a>
                    {!! Form::button('<i class="far fa-trash-alt"></i></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>