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

            <form action="{{route('conduit.store')}}" method="POST">
                @csrf
            <fieldset>
                <fieldset class="form-group">
                <input type="text" name="title" class="form-control form-control-lg" placeholder="Article Title" />
                </fieldset>
                <fieldset class="form-group">
                <input type="text" name="about" class="form-control" placeholder="What's this article about?" />
                </fieldset>
                <fieldset class="form-group">
                <textarea
                    name="content"
                    class="form-control"
                    rows="8"
                    placeholder="Write your article (in markdown)"
                ></textarea>
                </fieldset>
                <fieldset class="form-group">
                    <input type="text" name="tags" class="form-control" placeholder="Enter tags (comma separated)">
                </fieldset>
                <button class="btn btn-lg pull-xs-right btn-primary" type="submit">
                Publish Article
                </button>
            </fieldset>
            </form>
        </div>
        </div>
    </div>
    </div>
</x-layout>
