<?php
namespace App\Providers;																
use Illuminate\Support\ServiceProvider;																
use App\Models\Type_products;																
use App\Models\Products;																
class AppServiceProvider extends ServiceProvider																
{																
    /**																
    *																
    * @return void																
    */																
    public function register()																
    {								
         //																
     }																
                                                                                                                                
    /**																
     * Bootstrap any application services.																
     *																
     * @return void																
     */																
 public function boot()																
 {																
 view()->composer('header', function ($view) {														
    $loai_sp = Type_products::all();																
     $view->with('loai_sp', $loai_sp);																
     });																
 view()->composer('page.product_type', function ($view) {																
 $product_new = Products::where('new',1)->orderBy('id','DESC')->skip(1)->take(8)->get();																
 $view->with('product_new', $product_new);																
 });																
 }																
}																

                                                                