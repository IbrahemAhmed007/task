<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_basic_product_factory()
    {
        Product::factory()->create();
        $this->assertDatabaseCount('products', 1);
    }
    public function test_create_products_to_the_same_category()
    {
        Product::factory()->forCategory()->count(5)->create();
        $this->assertDatabaseCount('products', 5);
    }
}
