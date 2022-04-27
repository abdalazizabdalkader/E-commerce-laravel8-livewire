<?php

namespace App\Http\Livewire\Admin;

use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Product;
use App\Models\Productattribute;
use App\Models\Subcategory;
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
    public $images;
    public $subcategory_id;
    public $attr;
    public $inputs =[];
    public $attribute_arr = [];
    public $attribute_values;


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
            'image' => 'required|mimes: jpeg,jpg,png',
            'category_id' => 'required ',
        ]);
    }

    public function addAttr()
    {
        if(!in_array($this->attr,$this->attribute_arr))
        {
            array_push($this->inputs,$this->attr);
            array_push($this->attribute_arr,$this->attr);
        }
    }

    public function removeAttr($attr)
    {
        unset($this->inputs[$attr]);
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

        // dd($this->description);
        // dd($this->description);
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
        $product->category_id = $this->category_id;

        if($this->subcategory_id)
        {
            $product->subcategory_id = $this->subcategory_id;
        }


        $img_name = Carbon::now()->timestamp.'.'. $this->image->extension();
        $this->image->storeAs('products',$img_name);
        $product->image = $img_name;

        if($this->images)
        {
            $imagesName = '';
            foreach($this->images as $key=>$imggallery )
            {
                $imgsname = Carbon::now()->timestamp. $key .'.'. $imggallery->extension();
                $imggallery->storeAs('products',$imgsname);
                $imagesName = $imagesName .','. $imgsname;
            }
            $product->images = $imagesName;
        }
        $product->save();

        foreach($this->attribute_values as $key=>$attribute_value )
        {
            $values = explode(',',$attribute_value);
            foreach($values as $value)
            {
                $attr_value = new AttributeValue();
                $attr_value->product_attribute_id = $key;
                $attr_value->value = $value;
                $attr_value->product_id = $product->id;
                $attr_value->save();
            }
        }
        session()->flash('message', 'The product has been added successfully');
    }

    public function changeSubcategory()
    {
        $this->subcategory_id = 0;
    }

    public function render()
    {
        $categories = Category::all();
        $subcategories = Subcategory::where('category_id',$this->category_id)->get();
        $productAttrs = Productattribute::all();
        return view('livewire.admin.add-product-component',[
            'categories'=>$categories,
            'subcategories' => $subcategories,
            'productAttrs' => $productAttrs,
            ])->layout('layouts.base');
    }
}
