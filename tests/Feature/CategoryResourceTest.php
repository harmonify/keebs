<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\ResourceTestCase;

class CategoryResourceTest extends ResourceTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->actingAs($this->user)->get(route('dashboard.categories.index'));
    }

    public function test_it_can_list_all_categories()
    {
        $response = $this->get(route('dashboard.categories.index'));

        $response->assertStatus(200);

        $response->assertViewIs('dashboard.categories.index');
    }

    public function test_it_can_show_a_category()
    {
        $category = Category::factory()->create();

        $response = $this->get(route('dashboard.categories.show', $category));

        $response->assertStatus(200);

        // $response->assertSee($category->name);

        $response->assertViewIs('dashboard.categories.show');
    }

    public function test_it_can_render_create_category()
    {
        $response = $this->get(route('dashboard.categories.create'));

        $response->assertStatus(200);

        $response->assertViewIs('dashboard.categories.create');
    }

    public function test_it_can_store_a_category()
    {
        $category = [
            'name' => 'Category',
            'alias' => 'cat',
            'description' => 'Category Description',
        ];

        $response = $this->post(route('dashboard.categories.store'), $category);

        $response->assertStatus(302);

        $response->assertRedirect(route('dashboard.categories.index'));
        
        $this->assertDatabaseCount('categories', 1);
    }

    public function test_it_can_render_edit_category()
    {
        $category = Category::factory()->create();

        $response = $this->get(route('dashboard.categories.edit', $category));

        $response->assertStatus(200);

        $response->assertViewIs('dashboard.categories.edit');
    }

    public function test_it_can_update_a_category()
    {
        $category = Category::factory()->create();

        $response = $this->put(route('dashboard.categories.update', $category), $category->toArray());

        $response->assertStatus(302);

        $response->assertRedirect(route('dashboard.categories.index'));

        $this->assertDatabaseHas('categories', [
            'id' => $category->id,
        ]);
    }

    public function test_it_can_delete_a_category()
    {
        $category = Category::factory()->create();

        $response = $this->delete(route('dashboard.categories.destroy', $category));

        $response->assertStatus(302);

        $response->assertRedirect(route('dashboard.categories.index'));

        $this->assertDatabaseMissing('categories', $category->toArray());
    }
}
