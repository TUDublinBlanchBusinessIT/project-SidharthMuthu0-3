<table class="table table-responsive" id="guests-table">
    <thead>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>National Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($guests as $guest)
        <tr>
            <td>{!! $guest->first_name !!}</td>
            <td>{!! $guest->last_name !!}</td>
            <td>{!! $guest->phone_number !!}</td>
            <td>{!! $guest->email !!}</td>
            <td>{!! $guest->national_id !!}</td>
            <td>
                {!! Form::open(['route' => ['guests.destroy', $guest->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('guests.show', [$guest->id]) !!}" class='btn btn-default btn-xs'><i class="far fa-eye"></i></i></a>
                    <a href="{!! route('guests.edit', [$guest->id]) !!}" class='btn btn-default btn-xs'><i class="far fa-edit"></i></i></a>
                    {!! Form::button('<i class="far fa-trash-alt"></i></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>