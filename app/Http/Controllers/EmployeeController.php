<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();

        return view('employee.index', [
            'items' => $employees
        ]);
    }

    public function store(Request $request)
    {
        Employee::create([
            'first_name' => $request->first_name123,
            'last_name' => $request->last_name123,
            'job' => $request->job123,
             'phone_number' => $request->phone_number123,
            'salary' => $request->salary123
        ]);

        return redirect()->back();
    }
    //
}
