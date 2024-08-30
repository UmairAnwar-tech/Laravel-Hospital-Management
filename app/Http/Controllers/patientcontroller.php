<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\patient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class patientcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $patient= DB::table('patient')->get();
        return view('patient',['patient'=>$patient]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'telephone' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'btype' => 'required',
            'c_id' => 'nullable',
            'b_id' => 'nullable',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Insert the valid form data into the database using query builder
        DB::table('patient')->insert([
            'patient_id' => $request->input('id'),
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'address' => $request->input('address'),
            'telephone' => $request->input('telephone'),
            'gender' => $request->input('gender'),
            'age' => $request->input('age'),
            'blood_type' => $request->input('btype'),
            'Cafeteria_id' => $request->input('c_id'),
            'Bill_id' => $request->input('b_id'),
        ]);
    
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    function editpatient($id)
    {
        $user = \DB::table('patient')->where('Patient_id', $id)->first();
        return view('editpatient', compact('user'));
    }
    /**
     * Update the specified resource in storage.
     */
    function updatepatient(Request $req)
    {
        $Patient_id = $req->get('Patient_id');
        $fname = $req->get('fname');
        $lname = $req->get('lname');
        $address = $req->get('Address');
        $telephone = $req->get('telephone');
        $gender = $req->get('gender');
        $age = $req->get('age');
        $bloodtype = $req->get('Blood_type');
        $cafeteria_id = $req->get('Cafeteria_id');
        $bill_id=$req->get('Bill_id');
        $affectedRows = \DB::table('patient')
            ->where('Patient_id', $Patient_id)
            ->update([
                'fname' => $fname,
                'lname' => $lname,
                'Address' => $address,
                'telephone'=>$telephone,
                'gender' => $gender,
                'age' => $age,
                'Blood_type' => $bloodtype,
                'Cafeteria_id' => $cafeteria_id,
                'Bill_id' => $bill_id
            ]);
    
        if ($affectedRows > 0) {
            return redirect('patient')->with("sucesslogin");
        } else {
            return redirect('patient')->with("sucesslogin");

            // Handle the case where no patient is found or update operation failed
            // You can redirect or show an error message
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    function destroy($id){
        \DB::table('patient')->where('Patient_id', $id)->delete();
        return redirect()->back()->with('success', 'Patient deleted successfully.');

    }
}
