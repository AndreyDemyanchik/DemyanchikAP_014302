<?php

use App\Models\User;
use App\Models\Visualization;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UpdateUserTest extends TestCase
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

    public function test_update_user()
    {
        $this->withoutExceptionHandling();

        $user = User::create([
            'name' => 'test name',
            'email' => 'testmanager@gmail.com',
            'password' => Hash::make('test_user_password123')
        ]);

        $response = $this->post('api/user/update', [
            'user_id' => $user->id,
            'name' => 'testmanagerupdated@gmail.com',
            'email' => 'updated name'
        ]);

        $response->assertStatus(200);
    }
}
