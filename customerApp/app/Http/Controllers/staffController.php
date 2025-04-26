<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatestaffRequest;
use App\Http\Requests\UpdatestaffRequest;
use App\Repositories\staffRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;

class staffController extends AppBaseController
{
    /** @var staffRepository */
    private $staffRepository;

    public function __construct(staffRepository $staffRepo)
    {
        $this->staffRepository = $staffRepo;
    }

    public function index(Request $request)
    {
        $staff = $this->staffRepository->all();

        return view('staff.index')->with('staff', $staff);
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(CreatestaffRequest $request)
    {
        $input = $request->only([
            'first_name',
            'last_name',
            'position',
            'phone_number',
            'email',
            'hire_date',
        ]);

        $this->staffRepository->create($input);

        return redirect()->route('staff.index')->with('success', 'Staff created successfully!');
    }

    public function show($id)
    {
        $staff = $this->staffRepository->find($id);

        if (empty($staff)) {
            return redirect()->route('staff.index')->with('error', 'Staff not found!');
        }

        return view('staff.show')->with('staff', $staff);
    }

    public function edit($id)
    {
        $staff = $this->staffRepository->find($id);

        if (empty($staff)) {
            return redirect()->route('staff.index')->with('error', 'Staff not found!');
        }

        return view('staff.edit')->with('staff', $staff);
    }

    public function update($id, UpdatestaffRequest $request)
    {
        $staff = $this->staffRepository->find($id);

        if (empty($staff)) {
            return redirect()->route('staff.index')->with('error', 'Staff not found!');
        }

        $input = $request->only([
            'first_name',
            'last_name',
            'position',
            'phone_number',
            'email',
            'hire_date',
        ]);

        $this->staffRepository->update($input, $id);

        return redirect()->route('staff.index')->with('success', 'Staff updated successfully!');
    }

    public function destroy($id)
    {
        $staff = $this->staffRepository->find($id);

        if (empty($staff)) {
            return redirect()->route('staff.index')->with('error', 'Staff not found!');
        }

        $this->staffRepository->delete($id);

        return redirect()->route('staff.index')->with('deleted', 'Staff deleted successfully!');
    }
}
