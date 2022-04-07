<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
// use Illuminate\Support\Carbon;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AddProductComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }
    public function mount()
    {
        $this->stock = 'instock';
        $this->featured = 1;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required ',
            'slug' => 'required |unique:products',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required |numeric',
            'sale_price' => 'numeric',
            'SKU' => 'required',
            'stock' => 'required',
            'quantity' => 'required |numeric',
            'image' => 'required|mimes: jpeg,png',
            'category_id' => 'required ',
        ]);
    }

    public function addProduct()
    {
        $this->validate([
            'name' => 'required ',
            'slug' => 'required |unique:products',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required |numeric',
            'sale_price' => 'numeric',
            'SKU' => 'required',
            'stock' => 'required',
            'quantity' => 'required |numeric',
            'image' => 'required|mimes: jpeg,jpg,png',
            'category_id' => 'required',
        ]);
        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        $img_name = Carbon::now()->timestamp.'.'. $this->image->extension();
        $this->image->storeAs('products',$img_name);
        $product->image = $img_name;
        $product->category_id = $this->category_id;
        $product->save();

        session()->flash('message', 'The product has been added successfully');
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.add-product-component',['categories'=>$categories])->layout('layouts.base');
    }
}
