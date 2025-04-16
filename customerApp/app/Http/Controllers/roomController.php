<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateroomRequest;
use App\Http\Requests\UpdateroomRequest;
use App\Repositories\roomRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class roomController extends AppBaseController
{
    /** @var roomRepository $roomRepository*/
    private $roomRepository;

    public function __construct(roomRepository $roomRepo)
    {
        $this->roomRepository = $roomRepo;
    }

    /**
     * Display a listing of the room.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $rooms = $this->roomRepository->all();

        return view('rooms.index')
            ->with('rooms', $rooms);
    }

    /**
     * Show the form for creating a new room.
     *
     * @return Response
     */
    public function create()
    {
        return view('rooms.create');
    }

    /**
     * Store a newly created room in storage.
     *
     * @param CreateroomRequest $request
     *
     * @return Response
     */
    public function store(CreateroomRequest $request)
    {
        $input = $request->all();

        $room = $this->roomRepository->create($input);

        Flash::success('Room saved successfully.');

        return redirect(route('rooms.index'));
    }

    /**
     * Display the specified room.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $room = $this->roomRepository->find($id);

        if (empty($room)) {
            Flash::error('Room not found');

            return redirect(route('rooms.index'));
        }

        return view('rooms.show')->with('room', $room);
    }

    /**
     * Show the form for editing the specified room.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $room = $this->roomRepository->find($id);

        if (empty($room)) {
            Flash::error('Room not found');

            return redirect(route('rooms.index'));
        }

        return view('rooms.edit')->with('room', $room);
    }

    /**
     * Update the specified room in storage.
     *
     * @param int $id
     * @param UpdateroomRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateroomRequest $request)
    {
        $room = $this->roomRepository->find($id);

        if (empty($room)) {
            Flash::error('Room not found');

            return redirect(route('rooms.index'));
        }

        $room = $this->roomRepository->update($request->all(), $id);

        Flash::success('Room updated successfully.');

        return redirect(route('rooms.index'));
    }

    /**
     * Remove the specified room from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $room = $this->roomRepository->find($id);

        if (empty($room)) {
            Flash::error('Room not found');

            return redirect(route('rooms.index'));
        }

        $this->roomRepository->delete($id);

        Flash::success('Room deleted successfully.');

        return redirect(route('rooms.index'));
    }
}
