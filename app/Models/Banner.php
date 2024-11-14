<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class Banner extends Model {

protected $table    = 'banners';
protected $fillable = [
		'id',
		'admin_id',
        'photo',
        'title_en',
        'description_en',
        'action_url',
        'title_ar',
        'Description_ar',
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
         static::deleting(function($banner) {
         });
   }
		
}
