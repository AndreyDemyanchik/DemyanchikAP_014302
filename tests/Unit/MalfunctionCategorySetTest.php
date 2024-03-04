<?php

use App\Models\Visualization;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class MalfunctionCategorySetTest extends TestCase
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

    public function test_set_malfunction_category()
    {
        $this->withoutExceptionHandling();

        Visualization::create([
            'entity_title' => '',
            'fields' => json_encode(['test' => 'test'])
        ]);

        $response = $this->post('api/visualization/malfunctions', [
            'malfunctionsTypes',
            'malfunctionsByMakers',
            'rangeBySeverity',
            'avgRepairingTimeByMakers',
            'malfunctionsChanging'
        ]);

        $response->assertStatus(200);
    }
}
