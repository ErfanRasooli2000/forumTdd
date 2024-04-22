<?php

namespace Tests\Unit;

use App\Models\Reply;
use App\Models\User;
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
}
