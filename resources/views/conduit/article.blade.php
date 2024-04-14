<x-layout>
    <div class="article-page">
    <div class="banner">
        <div class="container">
        <h1>{{ $post->title }}</h1>

        <div class="article-meta">
            <div class="info">
            <a href="/profile/eric-simons" class="author">{{$post->user->name}}</a>
            <span class="date">{{ $post->created_at->format('F jS') }}</span>
            </div>
            @auth
                @if(auth()->user()->id === $post->user->id)
                    <a href="{{route('conduit.edit', $post->id)}}">
                        <button class="btn btn-sm btn-outline-secondary">
                            <i class="ion-edit"></i> Edit Article
                        </button>
                    </a>
                    <form action="{{route('conduit.destroy', $post->id)}}" method="POST" style="display: inline">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-outline-danger">
                            <i class="ion-trash-a"></i> Delete Article
                        </button>
                    </form>
                @else
                    <button class="btn btn-sm btn-outline-secondary">
                        <i class="ion-plus-round"></i> &nbsp; Follow {{$post->user->name}}
                        <span class="counter">(10)</span>
                    </button>
                    &nbsp;&nbsp;
                    <button class="btn btn-sm btn-outline-primary">
                        <i class="ion-heart"></i> &nbsp; Favorite Post
                        <span class="counter">(29)</span>
                    </button>
                @endif
            @endauth
        </div>
        </div>
    </div>

    <div class="container page">
        <div class="row article-content">
        <div class="col-md-12">
            <p>
            {{$post->content}}
            </p>
            <ul class="tag-list">
                @foreach ($post->tags as $tag)
                <li class="tag-default tag-pill tag-outline">{{$tag->name}}</li>
                @endforeach
            </ul>
        </div>
        </div>

        <hr />

        <div class="article-actions">
        <div class="article-meta">
            {{-- <a href="profile.html"><img src="http://i.imgur.com/Qr71crq.jpg" /></a> --}}
            <div class="info">
            <a href="" class="author">{{$post->user->name}}</a>
            <span class="date">{{ $post->created_at->format('F jS') }}</span>
            </div>

            @auth
                @if(auth()->user()->id === $post->user->id)
                    <a href="{{route('conduit.edit', $post->id)}}">
                        <button class="btn btn-sm btn-outline-secondary">
                            <i class="ion-edit"></i> Edit Article
                        </button>
                    </a>
                    <form action="{{route('conduit.destroy', $post->id)}}" method="POST" style="display: inline">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-outline-danger">
                            <i class="ion-trash-a"></i> Delete Article
                        </button>
                    </form>
                @else
                    <button class="btn btn-sm btn-outline-secondary">
                        <i class="ion-plus-round"></i> &nbsp; Follow {{$post->user->name}}
                        <span class="counter">(10)</span>
                    </button>
                    &nbsp;&nbsp;
                    <button class="btn btn-sm btn-outline-primary">
                        <i class="ion-heart"></i> &nbsp; Favorite Post
                        <span class="counter">(29)</span>
                    </button>
                @endif
            @endauth
        </div>
        </div>
        @auth
        <div class="row">
            <div class="col-xs-12 col-md-8 offset-md-2">
                <form class="card comment-form">
                    <div class="card-block">
                        <textarea class="form-control" placeholder="Write a comment..." rows="3"></textarea>
                    </div>
                    <div class="card-footer">
                        {{-- <img src="http://i.imgur.com/Qr71crq.jpg" class="comment-author-img" /> --}}
                        <button class="btn btn-sm btn-primary">Post Comment</button>
                    </div>
                </form>
            </div>
        </div>
        @endauth
    </div>
    </div>
</x-layout>
