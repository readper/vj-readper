<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

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
        $this->post('/api/posts', $testdata)
            ->assertSuccessful();
        $this->assertDatabaseHas('posts', $testdata);
    }

    /**
     * Post Test index.
     *
     * @return void
     */
    public function testPostIndex()
    {
        $this->get('/api/posts')
            ->assertSuccessful();
    }
}
