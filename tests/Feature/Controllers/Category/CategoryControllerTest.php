<?php

namespace Tests\Feature\Controllers\Category;

use App\Models\Category\Category;
use Illuminate\{
    Http\Response,
    Testing\Fluent\AssertableJson
};
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    /**
     * @return void
     */
    public function test_category_index__get_route(): void
    {
        $response = $this->getJson('/api/category');

        $response->assertOk();

        $category = Category::find(1);

        $response->assertJson(function (AssertableJson $json) use ($category) {

            $json->whereAllType([
                'categories.0.id' => 'integer',
                'categories.0.name' => 'string'
            ]);

            $json->hasAll(['categories.0.id', 'categories.0.name']);

            $json->whereAll([
                'categories.0.id'   => $category->id,
                'categories.0.name' => $category->name
            ]);
        });
    }

    /**
     * @return void
     */
    public function test_category_single_get_route(): void
    {
        $id = 1;

        $response = $this->getJson("/api/category/{$id}");

        $response->assertOk();

        $response->assertJsonCount(1);

        $category = Category::find(1);

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

        $response = $this->postJson('/api/category', $category);

        $response->assertStatus(Response::HTTP_CREATED);

        $response->assertJson(function (AssertableJson $json) use ($category) {

            $json->where('status', 'success')
                ->where('message', 'Resource created successfully')
                ->where('data.name', $category['name']);
        });
    }
}
