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
        $post = new \App\Post;
        $testdata = [
            'title' => 'test title',
            'author' => 'fake author',
            'content' => 'test content'
        ];
        $this->post('/posts', $testdata)
            ->assertSuccessful();
        $this->assertDatabaseHas('posts', $testdata);
    }
}
