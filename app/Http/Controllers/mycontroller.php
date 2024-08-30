<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\doctor;
class mycontroller extends Controller
{
    function insert(Request $request){
        //validation
       // $req->validate([
         //   'image'=>'required|mimes:jpeg,jpg,png,gif|max:1000',
           // 'id'=>'required',
       //     'dname'=>'required',
         //   'dspeciality'=>'required',
           // 'ddegree'=>'required',
           // 'ddepartment'=>'required',
            
       // ]);


/*
        $imagename=time().'.'.$req->image->extension();
        $req->image->move(public_path('doctor'),$imagename);
        $id=$req->get('id');
        $name=$req->get('dname');
        $speciality=$req->get('dspeciality');
        $degree=$req->get('ddegree');
        $department=$req->get('ddepartment');
         
        $doc=new doctor();
        $doc->image=$imagename;
        $doc->Doctor_id=$id;
        $doc->doctor_name=$name;
        $doc->field=$speciality;
        $doc->degree=$degree;
        $doc->Department_ID=$department;
        $doc->save();

        return redirect('dashboard');
 */
 // Validate the form inputs
 $validatedData = $request->validate([
    'id' => 'required',
    'dname' => 'required',
    'dspeciality' => 'required',
    'ddegree' => 'required',
    'ddepartment' => 'required',
    'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
]);

// Handle image upload
if ($request->hasFile('image')) {
    $image = $request->file('image');
    $imageName = time() . '.' . $image->getClientOriginalExtension();
    $image->move(public_path('doctor'), $imageName);
} else {
    $imageName = 'default-image.jpg'; // Provide a default image if no file is uploaded
}

// Create a new Doctor instance and save it to the database
$doctor = new Doctor;
$doctor->Doctor_id = $validatedData['id'];
$doctor->doctor_name = $validatedData['dname'];
$doctor->field = $validatedData['dspeciality'];
$doctor->degree = $validatedData['ddegree'];
$doctor->Department_ID = $validatedData['ddepartment'];
$doctor->image = $imageName;
$doctor->save();

// Redirect the user to the desired page or show a success message
return redirect()->back()->with('success', 'Doctor added successfully');

        
    }
    function read_data(){
        $Ddata=doctor::all();
        return view('dashboard',['data'=>$Ddata]);
    }
    function read(Request $req){
        $id=$req->get('id');
        return $id;
    }
    function editdoc($id)
    {
        $user = \DB::table('doctor')->where('Doctor_id', $id)->first();
        return view('editdoctor', compact('user'));
    }
    function updatedoc(Request $req){
        
        $Doctor_id=$req->get('Doctor_id');
        $name=$req->get('dname');
        $field=$req->get('dfield');
        $degree=$req->get('ddegree');
        $department_id=$req->get('ddepartmentid');
        $doc = Doctor::where('Doctor_id', $Doctor_id)->first();
        $doc->doctor_name=$name;
        $doc->field=$field;
        $doc->degree=$degree;
        $doc->Department_ID=$department_id;
        if(isset($req->image))
        {
            $imagename=time().'.'.$req->image->extension();
            $req->image->move(public_path('doctor'),$imagename);
            $doc->image=$imagename;

        }
        $doc->save();
        return redirect('dashboard')->with("sucesslogin");
        
    }
    function destroy($id){
        \DB::table('Doctor')->where('Doctor_id', $id)->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');

    }
    function login(Request $req)
    {
        $email=$req->get('email');
        $password=$req->get('password');
        $getUserByEmail = \DB::table('users')->where('email', $email)->first();

        if ($getUserByEmail && $password == $getUserByEmail->password) {
            return  redirect()->route('readdata')->with('successlogin', 'Logged in successfully.');
        } else {
            return redirect()->back()->with('error', 'Invalid email or password.');
        }
}
}