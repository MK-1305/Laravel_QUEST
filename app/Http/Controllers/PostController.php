<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        $tags = Tag::all();

        return view('conduit.index', compact('posts', 'tags'));
    }
    public function myFeed()
    {
        $user = auth()->user();
        $posts = $user->posts()->with('tags')->get();
        $tags = Tag::all();
        return view('conduit.index', compact('posts', 'tags'));
    }
    public function create() {
        return view('conduit.create');
    }
    public function store(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'about' => 'required|max:255',
            'content'=> 'required',
            'tags' => 'nullable|string',
        ]);

        // $post = Post::create($validatedData);
        $post = new Post($validatedData);
        $post->user_id = auth()->id();
        if (!$post->user_id) {
            return redirect()->back()->withErrors(['error' => 'ログインが必要です。']);
        }
        $post->save();
        // カンマ区切りで配列に入れる
        $tags = explode(',', $request->input('tags'));
        // 各タグの前後の空白を削除
        $tags = array_map('trim', $tags);
        // 空の要素を取り除く
        $tags = array_filter($tags);
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $post->tags()->attach($tag);
        }

        return redirect()->route('conduit.index')->with('success','投稿が完了しました');
    }
    public function article($id) {
        $post = Post::findOrFail($id);
        return view('conduit.article', compact('post'));
    }
    public function edit($id) {
        $post = Post::findOrFail($id);
        return view('conduit.edit', compact('post'));
    }
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $validatedData = $request->validate([
            'title' => 'nullable|max:255',
            'about' => 'nullable|max:255',
            'content' => 'nullable',
            'tags' => 'nullable|string',
        ]);

        $post->title = $request->filled('title') ? $request->input('title') : $post->title;
        $post->about = $request->filled('about') ? $request->input('about') : $post->about;
        $post->content = $request->filled('content') ? $request->input('content') : $post->content;
        $post->save();

        // タグの更新処理(storeと同じ)
        $post->tags()->detach();
        if ($request->filled('tags')) {
            $tags = explode(',', $request->input('tags'));
            $tags = array_map('trim', $tags);
            $tags = array_filter($tags);
            foreach ($tags as $tagName) {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $post->tags()->attach($tag);
            }
        }

        return redirect()->route('conduit.index')->with('success', '投稿が更新されました');
    }
    public function detachTag($postId, $tagId) {
        $post = Post::findOrFail($postId);
        $tag = Tag::findOrFail($tagId);

        $post->tags()->detach($tag);
        return redirect()->route('conduit.edit', $post->id)->with('success','タグが削除されました');
    }
    public function destroy($id) {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('conduit.index')->with('success','投稿が削除されました');
    }
}
