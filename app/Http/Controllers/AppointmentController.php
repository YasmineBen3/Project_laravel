<?php

namespace App\Http\Controllers;

use App\Notifications\AppointmentRequest;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::all();
        return view('appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('appointments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'appointment_date' => 'required|date',
            'status'=>'nullable',
            'notes'=>'nullable',
        ]);
        Appointment::create($request->all());

        return redirect()->route('appointments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        return view('appointments.edit', compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'appointment_date' => 'required|date',
            'status'=>'nullable',
            'notes'=>'nullable',
        ]);
        $appointment->update($request->all());

        return redirect()->route('appointments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('appointments.index');
    }
    public function requestAppointment(Request $request)
{
    $appointment = Appointment::create([
        'doctor_id' => $request->doctor_id,
        'patient_id' => $request->patient_id,
        'appointment_date' => $request->appointment_date,
        'status'=> $request->status,
        'notes'=>$request->notes,

    ]);

    $doctor = $appointment->doctor;
    $doctor->notify(new AppointmentRequest($appointment));


    return redirect()->route('appointments.index');
}
public function validateAppointment(Appointment $appointment)
    {
        $appointment->update(['status' => 'validated']);

        return back();
    }

    public function exportToExcel()
    {
        $fileName = 'validated_appointments.xlsx';

        return Excel::download(new AppointmentsExport, $fileName);
    }

    public function generatePDF(Appointment $appointment)
    {
        $pdf = PDF::loadView('pdf.appointment', compact('appointment'));

        $pdfPath = 'pdf/appointments/'.$appointment->id.'.pdf';
        Storage::put($pdfPath, $pdf->output());

        return $pdfPath;
    }
}
