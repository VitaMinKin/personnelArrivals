<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\CurrentAlert;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\HighAlert;
use Carbon\Carbon;

class EmployeeController extends Controller
{
        public function cards()
    {
        $employees = Employee::all();

        return view('employee.cards', compact('employees'));
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
            "position" => "required",
            "mobile_phone_number" => ""
        ]);

        $employee = new Employee();
        $employee->fill($data);
        $employee->save();

        $contact = new Contact(["mobile_phone_number" => $data['mobile_phone_number']]);
        $employee->contact()->save($contact);

        return redirect()->route('employees.list');
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
            "position" => "required",
            "mobile_phone_number" => ""
        ]);

        $employee->fill($data);
        $employee->save();

        $employee->contact()->delete();
        $employee->contact()->create(["mobile_phone_number" => $data["mobile_phone_number"]]);

        return redirect()->route('employees.list');
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

    public function notify($id, $alertId)
    {
        $employee = Employee::findOrFail($id);
        $currentAlert = CurrentAlert::findOrFail($alertId);

        $employee->highAlerts()->create([
            "notifying_officer" => $id,
            "alert_signal" => $currentAlert->id,
            "time_alert" => Carbon::now()
        ]);

        return redirect()->back();
    }

    public function arrived($employeeId, $arrivedId)
    {
        //$employee = Employee::findOrFail($employeeId);
        $arrival = HighAlert::findOrFail($arrivedId);

        $arrival->arrivals_time = Carbon::now();

        $arrival->save();

        return redirect()->back();
    }

}
