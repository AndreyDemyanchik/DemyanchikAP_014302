<?php

use App\Models\Visualization;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AggregatedDataGetTest extends TestCase
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

    public function test_get_aggregated_data()
    {
        $this->withoutExceptionHandling();

        Visualization::create([
            'entity_title' => 'clients',
            'fields' => json_encode([
                'avgAge',
                'absoluteChangingClientsQuantityByTime',
                'changingClientsWithSubscription',
                'clientsDynamicsByMonth',
                'strongClientsDynamicsByMonth'
            ])
        ]);

        $response = $this->get('api/aggregated-data');

        $response->assertJson(json_decode($response->getContent(), true));
    }
}
