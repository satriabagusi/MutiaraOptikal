<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::check()){
            if ($request->get('s')) {
                $s = $request->get('s');
                $patients = Patient::where('nama_pasien', 'LIKE', '%'.$s.'%')->orWhere('no_hp', 'LIKE', '%'.$s.'%')->orWhere('no_bpjs', 'LIKE', '%'.$s.'%')->paginate();

                    if (!$patients) {
                        return view('patient.patient-list', ['patients' => '0']);
                    }else{
                        return view('patient.patient-list', compact('patients'));
                    }

            }else{
                $patients = Patient::paginate(15);
                return view('patient.patient-list', compact('patients'));
            }
        }else{
            return redirect('/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            return view('patient.add-patient');
        }else{
            return redirect('/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required|string',
            'no_hp' => 'required|max:14',
            'no_bpjs' => 'max:15|unique:patients',
            ]);

        Patient::create([
            'nama_pasien' => $request['nama_pasien'],
            'no_hp' => $request['no_hp'],
            'no_bpjs' => $request['no_bpjs']
        ]);

        return redirect()->back()->with('status', 'Berhasil mendaftarkan Pasien baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
