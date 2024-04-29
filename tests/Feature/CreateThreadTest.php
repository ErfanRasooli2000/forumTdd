<?php

namespace Tests\Feature;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateThreadTest extends TestCase
{
    use DatabaseMigrations;

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

    public function publishThread($replaces = [])
    {
        $thread = Thread::factory()->raw($replaces);
        $user = User::factory()->create();
        $this->actingAs($user);

        return $this->post(route('thread.create'), $thread);
    }

    /**
     * @return void
     * @test
     */
    public function it_requires_valid_title()
    {
        $this->publishThread(['title' => null])
            ->assertSessionHasErrors();
    }

    /**
     * @return void
     * @test
     */
    public function it_requires_valid_body()
    {
        $this->publishThread(['body' => null])
            ->assertSessionHasErrors();
    }

    /**
     * @return void
     * @test
     */
    public function it_requires_valid_chanel()
    {
        $this->publishThread(['chanel_id' => null])
            ->assertSessionHasErrors();

        $this->publishThread(['chanel_id' => 999])
            ->assertSessionHasErrors();
    }
}
