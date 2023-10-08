<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Garage;
use App\Models\Service;

class EmployeesController extends Controller
{
    // Display a listing of the employees.
    public function index()
    {
        $garages = Garage::all();
        $service = Service::all();
        $data = Employee::all();
        return view('employee.index', compact('data', 'garages', 'service'));
    }

    // Show the form for creating a new employee.
    public function create()
    {
        return view('employee.create');
    }

    // Store a newly created employee in the database.
    public function store(Request $request)
    {
        $validatedData = $request->all();

        Employee::create($validatedData);

        return redirect(route('employee.index'))->with('success', 'Employee created successfully.');
    }

    // Display the specified employee.
    public function show(Employee $employee)
    {
        return view('employee.show', compact('employee'));
    }

    // Show the form for editing the specified employee.
    public function edit($id)
    {
        $data = Employee::findOrfail($id);
        return response()->json($data);
    }

    // Update the specified employee in the database.
    public function update(Request $request, Employee $employee)
    {
        $validatedData = $request->validate([
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'phone' => 'required|string',
            'cin' => 'required|string|unique:employee,cin,' . $employee->id,
            'service_id' => 'required|exists:services,id',
            'garage_id' => 'required|exists:garage,id',
        ]);

        $employee->update($validatedData);

        return redirect(route('employee.index'))->with('success', 'Employee updated successfully.');
    }

    // Remove the specified employee from the database.
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect(route('employee.index'))->with('success', 'Employee deleted successfully.');
    }
}
