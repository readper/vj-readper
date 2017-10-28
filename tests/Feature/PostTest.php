<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    /**
     * Post Test creating.
     *
     * @return void
     */
    public function testPostCreate()
    {
        $post = factory(\App\Post::class)->create();
        $testdata = [
            'title' => 'test title',
            'author' => 'fake author',
            'content' => 'test content'
        ];
        $this->actingAs($post)
            ->post('posts', $testdata)
            ->assertResponseOk()
            ->seeInDatabase('posts', $testdata);
    }
}
