<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class ingredient extends Model {

protected $table    = 'ingredients';
protected $fillable = [
		'id',
		'admin_id',
        'Allergens_ar',
        'Allergens_en',
        'Calories_per_serving_ar',
        'Calories_per_serving_en',
        'Barcode',
        'Size',
        'Packing_ar',
        'Packing_en',
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
         static::deleting(function($ingredient) {
         });
   }
		
}
