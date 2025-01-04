<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class Category extends Model {

protected $table    = 'categories';
protected $fillable = [
		'id',
		'admin_id',
        'name_ar',
        'name_en',
        'photo',
        'description_ar',
        'description_en',
		'created_at',
		'updated_at',
	];

   // Relationship with Blog model
   public function blogs()
   {
       return $this->hasMany(Blog::class);
   }

   // Relationship with Product model (if applicable)
   public function products()
   {
       return $this->hasMany(Product::class);
   }

 	/**
    * Static Boot method to delete or update or sort Data
    * @param void
    * @return void
    */
   protected static function boot() {
      parent::boot();
      // if you disable constraints should by run this static method to Delete children data
         static::deleting(function($category) {
         });
   }
		
}
