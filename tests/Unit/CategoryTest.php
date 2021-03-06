<?php

namespace Tests\Unit;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testBasicCategoryFactory()
    {
        Category::factory()->create();
        $this->assertDatabaseCount('categories', 1);
    }

    public function testCreateCategoryWithMultipleProduct()
    {
        Category::factory()->hasProducts(5)->create();
        $this->assertDatabaseCount('categories', 1);
        $this->assertDatabaseCount('products', 5);
    }

}
