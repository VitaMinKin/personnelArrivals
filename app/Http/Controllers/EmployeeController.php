<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();

        return view('employee.index', compact('employees'));
    }

    public function create()
    {
        $employee = new Employee();

        return view('employee.create', compact('employee'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            "military_rank" => "required",
            "full_name" => "required|unique:employees",
            "position" => "required|unique:employees"
        ]);

        $employee = new Employee();
        $employee->fill($data);
        $employee->save();

        return redirect()->route('employees.index');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);

        return view('employee.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $data = $this->validate($request, [
            'military_rank' => "required",
            "full_name" => "required",
            "position" => "required"
        ]);

        $employee->fill($data);
        $employee->save();

        return redirect()->route('employees.index');
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);

        if ($employee) {
            $employee->delete();
        }

        return redirect()->route('employees.index');
    }


    public function list()
    {
        $employees = Employee::all();

        return view('employee.list', compact('employees'));
    }

    public function notify($id)
    {
        $employee = Employee::findOrFail($id);

        $employee->highAlerts()->create([
            "notifying_officer" => $id,
            "alert_signal" => 1,
            "time_alert" => Carbon::now()
        ]);

        return redirect()->back();
    }

}
