<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatebookingRequest;
use App\Http\Requests\UpdatebookingRequest;
use App\Repositories\bookingRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Guest;
use Response;

class bookingController extends AppBaseController
{
    /** @var bookingRepository $bookingRepository */
    private $bookingRepository;

    public function __construct(bookingRepository $bookingRepo)
    {
        $this->bookingRepository = $bookingRepo;
    }

    public function index(Request $request)
    {
        $bookings = $this->bookingRepository->all();

        return view('bookings.index')->with('bookings', $bookings);
    }

    public function create()
    {
        // Get guest list as ID => Full Name
        $guests = Guest::all()->mapWithKeys(function ($guest) {
            return [$guest->id => $guest->first_name . ' ' . $guest->last_name];
        });

        return view('bookings.create', compact('guests'));
    }

    public function store(CreatebookingRequest $request)
    {
        $this->bookingRepository->create($request->all());

        return redirect()->route('bookings.index')
                         ->with('success', 'Booking created successfully!');
    }

    public function show($id)
    {
        $booking = $this->bookingRepository->find($id);

        if (empty($booking)) {
            return redirect()->route('bookings.index')->with('error', 'Booking not found!');
        }

        return view('bookings.show')->with('booking', $booking);
    }

    public function edit($id)
    {
        $booking = $this->bookingRepository->find($id);

        if (empty($booking)) {
            return redirect()->route('bookings.index')->with('error', 'Booking not found!');
        }

        $guests = Guest::all()->mapWithKeys(function ($guest) {
            return [$guest->id => $guest->first_name . ' ' . $guest->last_name];
        });

        return view('bookings.edit', compact('booking', 'guests'));
    }

    public function update($id, UpdatebookingRequest $request)
    {
        $booking = $this->bookingRepository->find($id);

        if (empty($booking)) {
            return redirect()->route('bookings.index')->with('error', 'Booking not found!');
        }

        $this->bookingRepository->update($request->all(), $id);

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully!');
    }

    public function destroy($id)
    {
        $booking = $this->bookingRepository->find($id);

        if (empty($booking)) {
            return redirect()->route('bookings.index')->with('error', 'Booking not found!');
        }

        $this->bookingRepository->delete($id);

        return redirect()->route('bookings.index')->with('deleted', 'Booking deleted successfully!');
    }
}
