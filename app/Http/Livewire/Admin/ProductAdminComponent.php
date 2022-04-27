<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
class ProductAdminComponent extends Component
{
    use WithPagination;
    public $searchTerm;

    public function deleteProduct($id)
    {
        $product = Product::find($id);

        if($product->images)
        {
            $images = explode(',',$product->images);
            // dd($images);
            // dd('assets/images/products'.'/'.'fuck');
            foreach($images as $image)
            {
                if(!$image == '')
                {
                    unlink('assets/images/products'.'/'.$image);
                }
            }
        }
        if($product->image)
        {
            unlink('assets/images/products'.'/'.$product->image);
        }
        $product->delete();
        session()->flash('message', 'The Product deleted ');
    }
    public function render()
    {
        $search = '%'. $this->searchTerm .'%';
        $products = Product::where('name', 'like', $search)
                    ->orWhere('stock_status', 'like', $search)
                    ->orWhere('regular_price', 'like', $search)
                    ->orWhere('sale_price', 'like', $search)
                    ->orderBy('id','DESC')->paginate(20);
        return view('livewire.admin.product-admin-component',['products'=>$products])->layout('layouts.base');
    }
}
