<?php

namespace Tests\Unit;

use App\Models\Reply;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ReplayTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @return void
     * @test
     */
    public function a_replay_has_a_owner()
    {
        $replay = Reply::factory()->create();

        $this->assertInstanceOf(User::class , $replay->owner);
    }

    /**
     * @return void
     * @test
     */
    public function a_authenticated_user_can_add_reply()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $thread = Thread::factory()->create();
        $reply = Reply::factory()->raw();

        $this->post('/threads/'.$thread->id.'/replies',$reply)
            ->assertRedirectToRoute('thread.show' , ['thread' => $thread]);

        $this->get(route("thread.show" , ['thread' => $thread]))
            ->assertSee($reply["body"]);

        $this->assertCount(1,$thread->replies);
    }

    /**
     * @return void
     * @test
     */
    public function a_unauthenticated_user_cant_add_reply()
    {
        $thread = Thread::factory()->create();
        $reply = Reply::factory()->raw();

        $this->post('/threads/'.$thread->id.'/replies',$reply)
            ->assertRedirectToRoute("login");
    }

}
