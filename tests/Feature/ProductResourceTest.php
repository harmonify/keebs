<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Tests\ResourceTestCase;

class ProductResourceTest extends ResourceTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->actingAs($this->user)->get(route('dashboard.products.index'));
    }

    public function test_it_can_list_all_products()
    {
        $response = $this->get(route('dashboard.products.index'));

        $response->assertStatus(200);

        $response->assertViewIs('dashboard.products.index');
    }


    public function test_it_can_render_the_create_product_form()
    {
        $response = $this->get(route('dashboard.products.create'));

        $response->assertStatus(200);

        $response->assertViewIs('dashboard.products.create');
    }

    public function test_it_can_create_a_product()
    {
        $product = [
            'name' => 'Product',
            'description' => 'Product Description',
            'category_id' => Category::factory()->create()->id,
            'stock' => '10',
            'price' => '1000',
        ];

        $response = $this->post(route('dashboard.products.store'), $product);

        $response->assertStatus(302);

        $response->assertRedirect(route('dashboard.products.index'));

        $this->assertDatabaseCount('products', 1);
    }

    public function test_it_can_show_a_product()
    {
        $product = Product::factory()->create();

        $response = $this->get(route('dashboard.products.show', $product));

        $response->assertStatus(200);

        // $response->assertSee($product->name);

        $response->assertViewIs('dashboard.products.show');
    }

    public function test_it_can_render_the_edit_product_form()
    {
        $product = Product::factory()->create();

        $response = $this->get(route('dashboard.products.edit', $product));

        $response->assertStatus(200);

        $response->assertViewIs('dashboard.products.edit');
    }

    public function test_it_can_update_a_product()
    {
        $product = Product::factory()->create();

        $response = $this->put(route('dashboard.products.update', $product), $product->toArray());

        $response->assertStatus(302);

        $response->assertRedirect(route('dashboard.products.index'));
    }

    public function test_it_can_delete_a_product()
    {
        $product = Product::factory()->create();

        $response = $this->actingAs($this->user)->delete(route('dashboard.products.destroy', $product));

        $response->assertStatus(302);

        $response->assertRedirect(route('dashboard.products.index'));

        $this->assertDatabaseMissing('products', $product->toArray());
    }
}
