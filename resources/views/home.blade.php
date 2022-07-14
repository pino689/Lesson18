@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset='utf-8"'>
        <link rel='stylesheet' href="{{ asset('/css/app.css') }}">
        <link rel='stylesheet' href="{{ asset('/css/style.css') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
        <header>
            <h1>掲示板作成</h1>
        </header>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>検索ふぉーむ</h2>
                    <div id="custom-search-input">
                        <div class="input-group col-md-12 search-box">

                            {!! Form::open(['url' => '/posts/search']) !!}
                            {{-- <form action="{{ route('posts.search') }}" method="post"> --}}
                            {{-- {{ csrf_fieid() }} --}}
                            <div class="search-box">
                                <input type="text" class="form-control input-lg" name="search" placeholder="キーワード" />
                                <span class="input-group-btn">
                                    <button class="btn btn-info btn-lg" type="submit">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </span>
                            </div>
                            {{-- </form> --}}
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class='container'>
            <p class="pull-right"><a class="btn btn-success" href="/create-form">投稿する</a></p>
            <h2 class='page-header'>投稿一覧</h2>
            <table class='table table-hover'>
                <tr>
                    {{-- <th>投稿No</th> --}}
                    <th>名前</th>
                    <th>投稿内容</th>
                    <th>投稿日時</th>
                    <th></th>
                    <th></th>
                </tr>

                @foreach ($posts as $post)
                    <tr>
                        {{-- <td>{{ $post->id }}</td> --}}
                        <td>{{ $post->user_name }}</td>
                        <td>{{ $post->contents }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td><a class="btn btn-primary" href="/post/{{ $post->id }}/update-form">更新</a></td>
                        <td><a class="btn btn-danger" href="/post/{{ $post->id }}/delete"
                                onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td>
                    </tr>
                @endforeach

                @if ($posts->isEmpty())
                    <p>検索結果は0件です</p>
                @endif

            </table>
        </div>

        <footer>
            <small>Lesson18@sinyatensyon</small>
        </footer>

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    </body>

    </html>
@endsection
