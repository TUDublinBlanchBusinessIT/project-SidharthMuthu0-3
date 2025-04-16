<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateguestRequest;
use App\Http\Requests\UpdateguestRequest;
use App\Repositories\guestRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class guestController extends AppBaseController
{
    /** @var guestRepository $guestRepository*/
    private $guestRepository;

    public function __construct(guestRepository $guestRepo)
    {
        $this->guestRepository = $guestRepo;
    }

    /**
     * Display a listing of the guest.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $guests = $this->guestRepository->all();

        return view('guests.index')
            ->with('guests', $guests);
    }

    /**
     * Show the form for creating a new guest.
     *
     * @return Response
     */
    public function create()
    {
        return view('guests.create');
    }

    /**
     * Store a newly created guest in storage.
     *
     * @param CreateguestRequest $request
     *
     * @return Response
     */
    public function store(CreateguestRequest $request)
    {
        $input = $request->all();

        $guest = $this->guestRepository->create($input);

        Flash::success('Guest saved successfully.');

        return redirect(route('guests.index'));
    }

    /**
     * Display the specified guest.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $guest = $this->guestRepository->find($id);

        if (empty($guest)) {
            Flash::error('Guest not found');

            return redirect(route('guests.index'));
        }

        return view('guests.show')->with('guest', $guest);
    }

    /**
     * Show the form for editing the specified guest.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $guest = $this->guestRepository->find($id);

        if (empty($guest)) {
            Flash::error('Guest not found');

            return redirect(route('guests.index'));
        }

        return view('guests.edit')->with('guest', $guest);
    }

    /**
     * Update the specified guest in storage.
     *
     * @param int $id
     * @param UpdateguestRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateguestRequest $request)
    {
        $guest = $this->guestRepository->find($id);

        if (empty($guest)) {
            Flash::error('Guest not found');

            return redirect(route('guests.index'));
        }

        $guest = $this->guestRepository->update($request->all(), $id);

        Flash::success('Guest updated successfully.');

        return redirect(route('guests.index'));
    }

    /**
     * Remove the specified guest from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $guest = $this->guestRepository->find($id);

        if (empty($guest)) {
            Flash::error('Guest not found');

            return redirect(route('guests.index'));
        }

        $this->guestRepository->delete($id);

        Flash::success('Guest deleted successfully.');

        return redirect(route('guests.index'));
    }
}
