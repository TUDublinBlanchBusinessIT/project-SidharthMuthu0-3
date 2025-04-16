<table class="table table-responsive" id="rooms-table">
    <thead>
        <th>Room Number</th>
        <th>Room Type</th>
        <th>Price</th>
        <th>Is Available</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($rooms as $room)
        <tr>
            <td>{!! $room->room_number !!}</td>
            <td>{!! $room->room_type !!}</td>
            <td>{!! $room->price !!}</td>
            <td>{!! $room->is_available !!}</td>
            <td>
                {!! Form::open(['route' => ['rooms.destroy', $room->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('rooms.show', [$room->id]) !!}" class='btn btn-default btn-xs'><i class="far fa-eye"></i></i></a>
                    <a href="{!! route('rooms.edit', [$room->id]) !!}" class='btn btn-default btn-xs'><i class="far fa-edit"></i></i></a>
                    {!! Form::button('<i class="far fa-trash-alt"></i></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>