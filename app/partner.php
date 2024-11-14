<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class partner extends Model {

protected $table    = 'partners';
protected $fillable = [
		'id',
		'admin_id',
        'Partner_Type',
        'business_name',
        'phone_number',
        'email_address',
        'message',
        'file',
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
         static::deleting(function($partner) {
         });
   }
		
}
