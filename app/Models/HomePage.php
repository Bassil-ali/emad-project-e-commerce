<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class HomePage extends Model {

protected $table    = 'home_pages';
protected $fillable = [
		'id',
		'admin_id',
        'first_title',
        'description',
        'second_title',
        'client_photo',
        'vedio',
        'workers',
        'certificates',
        'clients',
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
         static::deleting(function($homepage) {
         });
   }
		
}
