<?php

namespace App\Http\Livewire\Front\Products;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class FilterProduct extends Component
{
    use WithPagination;

//    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $products = Product::select(['id', 'name', 'image', 'old_price', 'price', 'qty', 'category_id'])->paginate(12);
        $categories = Category::select(['id', 'name'])->withCount('products')->get();
        return view('livewire.front.products.filter-product', ['categories' => $categories, 'products' => $products]);
    }
}
