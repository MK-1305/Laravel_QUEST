<x-layout>
    <div class="editor-page">
    <div class="container page">
        <div class="row">
        <div class="col-md-10 offset-md-1 col-xs-12">
            @if ($errors->any())
                <ul class="error-messages">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form action="{{route('conduit.update', $post->id)}}" method="POST">
            @csrf
            @method('PUT')
            <fieldset>
                <fieldset class="form-group">
                <input type="text" name="title" class="form-control form-control-lg" placeholder="{{$post->title}}" value="{{ old('title') }}" />
                </fieldset>
                <fieldset class="form-group">
                <input type="text" name="about" class="form-control" placeholder="{{$post->about}}" />
                </fieldset>
                <fieldset class="form-group">
                <textarea
                    class="form-control"
                    name="content"
                    rows="8"
                    placeholder="{{$post->content}}"
                ></textarea>
                </fieldset>
                <fieldset class="form-group">
                    <input type="text" name="tags" class="form-control" placeholder="Enter tags (comma separated)" />
                <div class="tag-list">
                    @foreach ($post->tags as $tag)
                    <a href="{{route('conduit.detachTag', ['post' => $post->id, 'tag' => $tag->id ])}}" class="tag-default tag-pill">
                        <i class="ion-close-round"></i>{{$tag->name}}</>
                    </a>
                    @endforeach
                </div>
                </fieldset>
                <button class="btn btn-lg pull-xs-right btn-primary" type="submit">
                Update Article
                </button>
            </fieldset>
            </form>
        </div>
        </div>
    </div>
    </div>
</x-layout>
