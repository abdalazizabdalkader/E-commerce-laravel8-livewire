<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\HomeSlider;
use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $homeSliders = HomeSlider::where('status',1)->get();
        $lproducts = Product::orderBy('created_at','DESC')->get()->take(10);

        $home_category = HomeCategory::find(1);
        $sel_cat = explode(',',$home_category->selected_categories);
        $NumOfProduts = $home_category->num_of_proucts;

        $home_categories = Category::whereIn('id',$sel_cat)->get();

        $sale_products = Product::where('sale_price','>',0)->take(10)->get();
        $sale = Sale::find(1);
        return view('livewire.home-component',[
            'homeSliders'=>$homeSliders,
            'lproducts' => $lproducts,
            'home_categories'=>$home_categories,
            'NumOfProduts' =>$NumOfProduts,
            'sale_products' => $sale_products,
            'sale_date' => $sale,
            
        ])->layout('layouts.base');
    }
}
