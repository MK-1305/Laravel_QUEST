<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
class PostControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_index_returns_200()
    {
        $response = $this->get(route('conduit.index'));

        $response->assertStatus(200);
    }
    public function testStore()
    {
        // テストデータの準備
        $user = User::factory()->create();
        $postData = [
            'title' => 'Test Title',
            'about' => 'Test About',
            'content' => 'Test Content',
            'tags' => 'tag1,tag2,tag3',
        ];

        // リクエストの送信
        $response = $this->actingAs($user)->post(route('conduit.store'), $postData);
        dump($response->getContent()); // レスポンスの内容を出力
        dump($response->getStatusCode());

        // レスポンスの検証
        $response->assertRedirect(route('conduit.index'));
        $response->assertSessionHas('success', '投稿が完了しました');

        // データベースの検証
        $this->assertDatabaseHas('posts', [
            'title' => 'Test Title',
            'about' => 'Test About',
            'content' => 'Test Content',
        ]);

        // タグの検証
        $post = Post::where('title', 'Test Title')->first();
        $this->assertEquals(['tag1', 'tag2', 'tag3'], $post->tags->pluck('name')->toArray());
    }
}


// public function test_store_redirects()
// {
//     $user = User::factory()->create();
//     $this->actingAs($user);

//     $postData = [
//         'title' => $this->faker->sentence,
//         'about' => $this->faker->paragraph,
//         'content' => $this->faker->paragraphs(3, true),
//         'tags' => 'tag1,tag2,tag3',
//     ];

//     $response = $this->post(route('conduit.store'), $postData);

//     $response->assertRedirect(route('conduit.index'));
//     // または
//     // $response->assertStatus(302);
// }
