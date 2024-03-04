<?php

namespace Tests\Unit;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CategoriesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('fake_storage');
        $this->withHeaders([
            'accept' => 'application/json',
        ]);
    }

    /**
     * A basic test example.
     */
    public function test_that_categories_is_correct_json(): void
    {
        $result = [];
        $this->withoutExceptionHandling();

        for ($i = 1; $i <= 4; $i++) {
            Category::create(['title' => 'Категория ' . $i]);
        }

        $response = $this->get('/api/categories');
        $data = $response->getData();

        foreach ($data as $datum) {
            $result[] = (array) $datum;
        }

        $response->assertJson($result);
    }
}
