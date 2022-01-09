<?php

namespace App\Http\Livewire\Front\Products;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class FilterProduct extends Component
{
    use WithPagination;

//    protected $paginationTheme = 'bootstrap';

    public $search;
    public $selectedCategories = [];

    public function render()
    {
        $products = Product::
        filterByCategoryIds($this->selectedCategories)
            ->where('name', 'like', '%' . $this->search . '%')
            ->select(['id', 'name', 'image', 'old_price', 'price', 'qty', 'category_id'])
//            ->paginate(6)
            ->get();
        $categories = Category::select(['id', 'name'])->withCount('products')->get();
        return view('livewire.front.products.filter-product', ['allCategories' => $categories, 'products' => $products]);
    }
}
