<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class PostTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Post Test creating.
     *
     * @return void
     */
    public function testPostCreate()
    {
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
        $post = factory(\App\Post::class)->create();
        $this->get('/api/posts')
            ->assertSuccessful()
            ->assertJson([[
                'title' => 'factory title',
                'author' => 'factory author',
                'content' => 'factory content'
            ]]);
    }

    /**
     * Post Test show.
     *
     * @return void
     */
    public function testPostShow()
    {
        $post = factory(\App\Post::class)->create();
        $this->get('/api/posts/'.$post->id)
            ->assertSuccessful()
            ->assertJson([
                'title' => 'factory title',
                'author' => 'factory author',
                'content' => 'factory content'
            ]);
    }

    /**
     * Post Test update.
     *
     * @return void
     */
    public function testPostUpdate()
    {
        $post = factory(\App\Post::class)->create();
        $testdata = [
            'title' => 'test title',
            'author' => 'fake author',
            'content' => 'test content'
        ];
        $this->put('/api/posts/'.$post->id, $testdata)
            ->assertSuccessful();
        $testdata['id'] = $post->id;
        $this->assertDatabaseHas('posts', $testdata);
    }

    /**
     * Post Test destroy.
     *
     * @return void
     */
    public function testPostDestroy()
    {
        $post = factory(\App\Post::class)->create();
        $postArray = $post->toArray();
        $this->delete('/api/posts/'.$post->id)
            ->assertSuccessful();
        $this->assertDatabaseMissing('posts', $postArray);
    }
}
