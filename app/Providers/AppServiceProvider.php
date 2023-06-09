<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\ProductProtypes;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Manufactures;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
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
        Schema::defaultStringLength(191);
        $typeList = DB::table('products')
        ->select('protypes.id','protypes.type_name', DB::raw('count(*) as count'))
        ->join('protypes', 'products.type_id', '=', 'protypes.id')
        ->groupBy('protypes.type_name')
        ->take(5)->get();
        $manufactureCounts = DB::table('products')
        ->select('manufactures.id','manufactures.manu_name', DB::raw('count(*) as count'))
        ->join('manufactures', 'products.manu_id', '=', 'manufactures.id')
        ->groupBy('manufactures.manu_name')
        ->take(5)->get();

        $bestSellingProducts = Product::orderBy('sell_number', 'desc')->take(3)->get();
        $randomProducts = $bestSellingProducts->shuffle()->take(3);
        $viewData = [
            'typeList' => $typeList,
            'manufactureCounts' => $manufactureCounts,
            'randomProducts' => $randomProducts,
        ];
        view()->share($viewData);
         // Đăng ký biến $typeList vào Container
         config(['app.variable_name' => $typeList]);
    }
}
