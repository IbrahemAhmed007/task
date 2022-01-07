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
    public function testBasicProductFactory()
    {
        Product::factory()->create();
        $this->assertDatabaseCount('products', 1);
    }
    public function testCreateProductsToTheSameCategory()
    {
        Product::factory()->forCategory()->count(5)->create();
        $this->assertDatabaseCount('products', 5);
    }


}
