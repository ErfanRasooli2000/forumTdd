<?php

namespace Tests\Feature;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CreateThreadTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @return void
     * @test
     */
    public function a_authenticated_user_can_create_threads()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = Thread::factory()->for($user , 'creator')->raw();

        $this->post('/threads/create', $data)
            ->assertRedirectToRoute('thread.all');

        $this->get(route("thread.all"))
            ->assertSee($data["title"])
            ->assertSee($data["body"]);

        $this->assertDatabaseHas('threads' , $data);
    }

    /**
     * @return void
     * @test
     */
    public function a_unauthenticated_user_cant_create_threads()
    {
        $data = Thread::factory()->raw();

        $this->post('/threads/create', $data)
            ->assertRedirectToRoute('login');
    }


}
