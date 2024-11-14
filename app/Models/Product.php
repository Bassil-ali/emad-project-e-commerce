<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\ingredient;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class Product extends Model {

protected $table    = 'products';
protected $fillable = [
		'id',
		'admin_id',
        'Name_ar',
        'name_en',
        'title_ar',
        'title_en',
        'main_photo',
        'photos',
        'price',
        'number_of_calories',
        'description_ar',
        'description_en',
        'category_id',
        

		'created_at',
		'updated_at',
	];

	// Define the relationship with the Ingredient model
   public function ingredients()
   {
       return $this->belongsToMany(Ingredient::class, 'product_ingredient');
   }

   // Define the relationship
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

 	/**
    * Static Boot method to delete or update or sort Data
    * @param void
    * @return void
    */
   protected static function boot() {
      parent::boot();
      // if you disable constraints should by run this static method to Delete children data
         static::deleting(function($product) {
			//$product->ingredient_id()->delete();
         });
   }
		
}
