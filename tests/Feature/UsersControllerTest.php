<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UsersControllerTest extends TestCase
{

    use RefreshDatabase;

    public function testNotPossibleToDeleteUser()
    {
        $user     = User::factory()->create();
        $detail   = UserDetail::factory()->for($user)->create();
        $response = $this->delete('api/users/1/delete');
        $response->assertStatus(400);
    }

    public function testUserDeleted()
    {
        $user     = User::factory()->create();
        $response = $this->delete('api/users/1/delete');
        $response->assertOk();
        $this->assertDeleted($user);
    }

}
