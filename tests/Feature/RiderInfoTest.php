<?php

namespace Tests\Feature;
use Database\Factories\ResturantFactory;
use App\Models\RiderInfo;
use App\Models\Resturant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class RiderInfoTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the provided method for inserting rider info.
     */
    public function testRiderInfoInsertion()
    {
        $requestData = [
            'rider_id' => 1,
            'lat' => '37.7749',
            'long' => '-122.4194',
        ];

        Validator::shouldReceive('make')->once()->andReturn(
            \Mockery::mock(['fails' => false])
        );

        $response = $this->json('POST', '/api/store-rider-info', $requestData);

        $response->assertStatus(201)
            ->assertJson([
                'message' => 'Rider info inserted successfully',
            ])
            ->assertJsonStructure([
                'message',
                'data' => [
                    'id',
                    'rider_id',
                    'lat',
                    'long',
                    'created_at',
                    'updated_at',
                ],
            ]);

        $this->assertDatabaseHas('riders_info', [
            'rider_id' => $requestData['rider_id'],
            'lat' => $requestData['lat'],
            'long' => $requestData['long'],
        ]);
    }

    public function testValidationFailure()
    {
        $invalidData = [
            'rider_id' => 'invalid',
            'lat' => '37.7749',
            'long' => '-122.4194',
        ];

        Validator::shouldReceive('make')->once()->andReturn(
            \Mockery::mock(['fails' => true, 'errors' => new \Illuminate\Support\MessageBag(['rider_id' => 'The rider_id must be an integer.'])])
        );

        $response = $this->json('POST', '/api/store-rider-info', $invalidData);

        $response->assertStatus(422)
            ->assertJson([
                'errors' => 'The rider_id must be an integer.',
                'data' => null,
                'statusCode' => 422,
            ]);
    }

    // public function testInsertionFailure()
    // {
    //     $requestData = [
    //         'rider_id' => 1,
    //         'lat' => '37.7749',
    //         'long' => '-122.4194',
    //     ];

    //     Validator::shouldReceive('make')->once()->andReturn(
    //         \Mockery::mock(['fails' => false])
    //     );

    //     $this->mock(RiderInfo::class, function ($mock) use ($requestData) {
    //         $mock->shouldReceive('create')->once()->with($requestData)->andThrow(new \Exception('Rider info insertion failed'));
    //     });

    //     try {
    //         throw new \Exception('Rider info insertion failed');
    //     } catch (\Exception $e) {
    //         $response = $this->json('POST', '/api/store-rider-info', $requestData);

    //         $this->assertEquals(500, $response->status());

    //         $this->assertStringContainsString('Rider info insertion failed', $response->getContent());

    //         $this->assertTrue(true);
    //     }
    // }

}
