<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_see_all_articles()
    {
        // $articles = Article::all();
        // $course = factory(\App\User::class, 1)->create();
        $user = factory(User::class)->create();

        // $user = User::create([
        //     'name' => 'Lini',
        //     'email' => 'lini@gmail.com',
        //     'password' => Hash::make('password123')
        // ]);

        $response = $this->actingAs($user)
                    ->get('/');
        //             ->get('/article/list');
        
        // $response = $this->get('/');
        // $response = $this->actingAs($user)->get('/article/list');

        $response->assertStatus(200);
    }

    // public function test_create_articles()
    // {
    //     $this->post('/post/create');
    // }
}
