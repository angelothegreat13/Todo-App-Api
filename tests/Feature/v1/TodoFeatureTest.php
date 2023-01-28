<?php

namespace Tests\Feature\v1;

use Tests\TestCase;
use App\Models\Todo;
use App\Services\v1\TodoService;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TodoFeatureTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function it_can_retrieve_the_todos()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
