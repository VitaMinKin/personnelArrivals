<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\CurrentAlert;
use App\Models\AlertSignal;
use Carbon\Carbon;

class AlertSignalsController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function create($id)
    {
        $codes = ["100", "101", "102", "103"];

        if (!in_array($id, $codes)) {
            return abort(404);
        }

        $signalsList = AlertSignal::all()->pluck("caption", "id");

        $alertSignal = AlertSignal::where("code", $id)->first();

        $currentAlert = new CurrentAlert([
            "alert_signal_id" => $alertSignal->id,
            "begin_date" => Carbon::now(),
            "begin_time" => Carbon::now()
        ]);

        return view("alertSignals.create", compact("currentAlert", "signalsList")); 
    }


    public function list()
    {
        $alerts = CurrentAlert::paginate();

        return view("alertSignals.list", compact("alerts"));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            "alert_signal_id" => "required",
            "begin_date" => "required",
            "begin_time" => "required",
            "limitation" => "required",
            "reported_officer" => "required",
            "accepted_officer" => "required",
            "canceled" => "",
        ]);

        $currentAlert = new CurrentAlert();
        $currentAlert->fill($data);
        $currentAlert->save();
        return redirect()->route("employees.list");
    }

    public function show($id)
    {
        $currentAlert = CurrentAlert::findOrFail($id);

        return view('alertSignals.show', compact("currentAlert"));
    }

    public function edit($id)
    {
        $currentAlert = CurrentAlert::findOrFail($id);

        $signalsList = AlertSignal::all()->pluck("caption", "id");

        return view("alertSignals.edit", compact("currentAlert", "signalsList"));
    }

    public function update(Request $request, $id)
    {
        $currentAlert = CurrentAlert::findOrFail($id);

        $data = $this->validate($request, [
            "alert_signal_id" => "required",
            "begin_date" => "required",
            "begin_time" => "required",
            "limitation" => "required",
            "reported_officer" => "required",
            "accepted_officer" => "required",
            "canceled" => "",
        ]);

        $currentAlert->fill($data);
        $currentAlert->save();

        return redirect()->route("alertSignals.show", $currentAlert);
    }
}
