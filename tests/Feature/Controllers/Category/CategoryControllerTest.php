<?php

namespace Tests\Feature\Controllers\Category;

use App\Models\Category\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Http\Response;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function test_category_index_get_route(): void
    {
        $categories = Category::factory(10)->create();

        $response = $this->getJson('/api/category');

        $response->assertStatus(Response::HTTP_OK);

        $response->assertJson(function (AssertableJson $json) use ($categories) {

            $json->whereAllType([
                'categories.0.id' => 'integer',
                'categories.0.name' => 'string'
            ]);

            $json->hasAll(['categories.0.id', 'categories.0.name']);

            $json->whereAll([
                'categories.0.id'   => $categories[0]->id,
                'categories.0.name' => $categories[0]->name
            ]);
        });
    }

    /**
     * @return void
     */
    public function test_category_single_get_route(): void
    {
        $category = Category::factory(1)->create()[0];

        $response = $this->getJson("/api/category/{$category->id}");

        $response->assertStatus(Response::HTTP_OK);

        $response->assertJsonCount(1);

        $response->assertJson(function (AssertableJson $json) use ($category) {

            $json->whereAllType([
                'category.id' => 'integer',
                'category.name' => 'string'
            ]);

            $json->hasAll(['category.id', 'category.name']);

            $json->whereAll([
                'category.id'   => $category->id,
                'category.name' => $category->name
            ]);
        });
    }

    /**
     * @return void
     */
    public function test_category_create_post_route(): void
    {
        $category = Category::factory(1)->makeOne()->toArray();

        $response = $this->postJson('/api/category' , $category);

        $response->assertStatus(Response::HTTP_CREATED);

        $response->assertJson(fn(AssertableJson $json) => $json->where('message', 'Resource created'));
    }

    /**
     * @return void
     */
    public function test_category_create_post_route_should_validate_when_try_create_a_invalid_category(): void
    {
        $response = $this->postJson('/api/category', []);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $response->assertJson(function (AssertableJson $json) {

            $json->hasAll('name.0');

            $json->where('name.0', 'The name field is required.');
        });
    }

    /**
     * @return void
     */
    public function test_category_update_put_route(): void
    {
        Category::factory(1)->createOne();

        $category = ['name' => 'Updated test', 'description' => 'Updated description'];

        $response = $this->putJson('/api/category/1', $category);

        $response->assertStatus(Response::HTTP_CREATED);

        $response->assertJson(function (AssertableJson $json) use ($category) {

            $json->hasAll(['message']);

            $json->where('message', 'updated');
        });
    }

    /**
     * @return void
     */
    public function test_category_update_patch_route(): void
    {
        Category::factory(1)->createOne();

        $category = ['name' => 'Updated test'];

        $response = $this->patchJson('/api/category/1', $category);

        $response->assertStatus(Response::HTTP_CREATED);

        $response->assertJson(function (AssertableJson $json) use ($category) {

            $json->hasAll(['message']);

            $json->where('message', 'updated');
        });
    }

    /**
     * @return void
     */
    public function test_category_destroy_delete_route(): void
    {
        Category::factory(1)->createOne();

        $response = $this->deleteJson('/api/category/1');

        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }
}
