<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateguestRequest;
use App\Http\Requests\UpdateguestRequest;
use App\Repositories\guestRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use App\Models\Guest;

class guestController extends AppBaseController
{
    /** @var guestRepository $guestRepository */
    private $guestRepository;

    public function __construct(guestRepository $guestRepo)
    {
        $this->guestRepository = $guestRepo;
    }

    public function index(Request $request)
    {
        $guests = $this->guestRepository->all();

        return view('guests.index')
            ->with('guests', $guests);
    }

    public function create()
    {
        return view('guests.create');
    }

    public function store(CreateguestRequest $request)
    {
        $input = $request->all();
        $this->guestRepository->create($input);

        return redirect()->route('guests.index')->with('success', 'Guest created successfully!');
    }

    public function show($id)
    {
        $guest = $this->guestRepository->find($id);

        if (empty($guest)) {
            return redirect()->route('guests.index')->with('error', 'Guest not found!');
        }

        return view('guests.show')->with('guest', $guest);
    }

    public function edit($id)
    {
        $guest = $this->guestRepository->find($id);

        if (empty($guest)) {
            return redirect()->route('guests.index')->with('error', 'Guest not found!');
        }

        return view('guests.edit')->with('guest', $guest);
    }

    public function update($id, UpdateguestRequest $request)
    {
        $guest = $this->guestRepository->find($id);

        if (empty($guest)) {
            return redirect()->route('guests.index')->with('error', 'Guest not found!');
        }

        $this->guestRepository->update($request->all(), $id);

        return redirect()->route('guests.index')->with('success', 'Guest updated successfully!');
    }

    public function destroy($id)
    {
        $guest = $this->guestRepository->find($id);

        if (empty($guest)) {
            return redirect()->route('guests.index')->with('error', 'Guest not found!');
        }

        $this->guestRepository->delete($id);

        // ✅ Use "deleted" key for red alert
        return redirect()->route('guests.index')->with('deleted', 'Guest deleted successfully!');
    }
}

