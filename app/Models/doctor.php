<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    protected $table = 'doctor';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'Doctor_id','image', 'field','doctor_name', 'degree','Department_ID',
	];protected $primaryKey = 'Doctor_id';    
}
