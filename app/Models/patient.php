<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    protected $table = 'patient';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'Patient_id', 'fname','lname', 'Address','telephone','gender','age','Blood_type','Cafeteria_id','Bill_id',
	];protected $primaryKey = 'Doctor_id';    
}
