<?php

namespace Tests\Feature;

use App\inspection\Spam;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SpamTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function it_checks_for_invalid_keyword()
    {
        $spam = new Spam();

        $this->assertFalse($spam->detect('Here is my reply.'));

        $this->expectException('Exception');

        $this->assertTrue($spam->detect('jpt'));
    }

    /** @test */
    public function it_checks_for_the_key_held_down()
    {
        $spam = new Spam();

        $this->expectException('Exception');

        $this->assertTrue($spam->detect('aaaaaaaaaaaaaaaaaaa'));

    }

}
