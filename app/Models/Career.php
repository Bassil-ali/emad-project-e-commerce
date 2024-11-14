<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class Career extends Model {

protected $table    = 'careers';
protected $fillable = [
		'id',
		'admin_id',
        'Full_Name',
        'Nationality',
        'Occupation',
        'Current_Location',
        'Age',
        'Mobile_Number',
        'Email',
        'Landline_Number',
        'Occupation_Interest',
        'attach_cv',
        'message',
		'created_at',
		'updated_at',
	];

 	/**
    * Static Boot method to delete or update or sort Data
    * @param void
    * @return void
    */
   protected static function boot() {
      parent::boot();
      // if you disable constraints should by run this static method to Delete children data
         static::deleting(function($career) {
         });
   }
		
}
