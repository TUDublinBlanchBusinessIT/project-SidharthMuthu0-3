<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateroomRequest;
use App\Http\Requests\UpdateroomRequest;
use App\Repositories\roomRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Room;
use Response;

class roomController extends AppBaseController
{
    /** @var roomRepository */
    private $roomRepository;

    public function __construct(roomRepository $roomRepo)
    {
        $this->roomRepository = $roomRepo;
    }

    public function index(Request $request)
    {
        $rooms = $this->roomRepository->all();

        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(CreateroomRequest $request)
    {
        $this->roomRepository->create($request->all());

        return redirect()->route('rooms.index')->with('success', 'Room created successfully!');
    }

    public function show($id)
    {
        $room = $this->roomRepository->find($id);

        if (empty($room)) {
            return redirect()->route('rooms.index')->with('error', 'Room not found!');
        }

        return view('rooms.show', compact('room'));
    }

    public function edit($id)
    {
        $room = $this->roomRepository->find($id);

        if (empty($room)) {
            return redirect()->route('rooms.index')->with('error', 'Room not found!');
        }

        return view('rooms.edit', compact('room'));
    }

    public function update($id, UpdateroomRequest $request)
    {
        $room = $this->roomRepository->find($id);

        if (empty($room)) {
            return redirect()->route('rooms.index')->with('error', 'Room not found!');
        }

        $this->roomRepository->update($request->all(), $id);

        return redirect()->route('rooms.index')->with('success', 'Room updated successfully!');
    }

    public function destroy($id)
    {
        $room = $this->roomRepository->find($id);

        if (empty($room)) {
            return redirect()->route('rooms.index')->with('error', 'Room not found!');
        }

        $this->roomRepository->delete($id);

        return redirect()->route('rooms.index')->with('deleted', 'Room deleted successfully!');
    }
}
