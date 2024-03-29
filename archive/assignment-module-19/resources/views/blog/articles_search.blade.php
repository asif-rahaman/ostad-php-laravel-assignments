@extends('blog.app', [
    'class' => '',
    'headerImage' => '/material/img/dg3.jpg'
])
@section('header_content')
    <h1 class="title">
        {!! __('A fully functional Laravel blog <br class="d-none d-xl-block"> with beautiful design') !!}
    </h1>
@endsection

@section('content')
    <div class="container">
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 ml-auto mr-auto">
                        <h2 class="title">
                            {{ __("Search results for \"") . $searching . __("\"") }}
                        </h2>
                        @foreach($articles as $article)
                            @include('blog._partials.article_full')
                        @endforeach
                        @include('blog._partials.pagination')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection