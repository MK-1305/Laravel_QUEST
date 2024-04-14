<x-layout>
    <div class="home-page">
        <div class="banner">
            <div class="container">
                <h1 class="logo-font">conduit</h1>
                <p>A place to share your knowledge.</p>
            </div>
        </div>

        <div class="container page">
            <div class="row">
                <div class="col-md-9">
                    <div class="feed-toggle">
                        <ul class="nav nav-pills outline-active">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('conduit.myfeed') }}">Your Feed</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('conduit.index')}}">Global Feed</a>
                            </li>
                        </ul>
                    </div>
                    @foreach ($posts as $post)
                    <div class="article-preview">
                        <div class="article-meta">
                            <div class="info">
                                <a href="/profile/eric-simons" class="author">{{$post->user->name}}</a>
                                <span class="date">{{ $post->created_at->format('F jS') }}</span>
                            </div>
                            <button class="btn btn-outline-primary btn-sm pull-xs-right">
                                <i class="ion-heart"></i> 29
                            </button>
                        </div>
                        <a href="{{route('conduit.article', $post->id)}}" class="preview-link">
                            <h1>{{$post->title}}</h1>
                            <p>{{$post->about}}</p>
                            <span>Read more...</span>
                            <ul class="tag-list">
                                @foreach ($post->tags as $tag)
                                <li class="tag-default tag-pill tag-outline">{{$tag->name}}</li>
                                @endforeach
                            </ul>
                        </a>
                    @endforeach

                    <ul class="pagination">
                        <li class="page-item active">
                            <a class="page-link" href="">1</a>
                        </li>
                        {{-- <li class="page-item">
                            <a class="page-link" href="">2</a>
                        </li> --}}
                    </ul>
                </div>

                <div class="col-md-3">
                    <div class="sidebar">
                        <p>Popular Tags</p>

                        <div class="tag-list">
                            @foreach ($tags as $tag)
                            <a href="" class="tag-pill tag-default">{{$tag->name}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
