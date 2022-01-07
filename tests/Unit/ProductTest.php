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

    public function testHitProductsAPIReturnsJson()
    {
        $response = $this->getJson('/api/products');
        $response->assertOk();
        $response->assertHeader("content-type", 'application/json');
    }

    public function testHitProductsAPIReturnsProductsJson()
    {
        $this->withoutExceptionHandling();
        $product = Product::factory()->create();
        $response = $this->getJson('/api/products');
        $response->assertJson([
            'products' => [
                [
                    "id"=>$product->id
                ]
            ]
        ]);

    }

}
