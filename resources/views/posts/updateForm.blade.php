@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset='utf-8"'>
        <link rel='stylesheet' href='/css/app.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>


    <body>
        <header>
            <h1 class='page-header'>掲示板</h1>
        </header>

        <div class='container'>
            <h2 class='page-header'>投稿内容を変更する</h2>
            {!! Form::open(['url' => '/post/update']) !!}

            <div class="form-group">
                {!! Form::hidden('id', $post->id) !!}
                {!! Form::input('text', 'upName', $post->user_name, ['required', 'class' => 'form-control']) !!}
                @if ($errors->has('upName'))
                    <ul>
                        <li class="alert alert-danger">{{ $errors->first('upName') }}</li>
                    </ul>
                @endif
                {!! Form::input('text', 'upPost', $post->contents, ['required', 'class' => 'form-control']) !!}

                @if ($errors->has('upPost'))
                    <ul>
                        <li class="alert alert-danger">{{ $errors->first('upPost') }}</li>
                    </ul>
                @endif
            </div>

            <button type="submit" class="btn btn-primary pull-right">更新</button>

            {!! Form::close() !!}
        </div>

        <footer>
            <small>Lesson18@sinyatensyon</small>
        </footer>

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

    </body>

    </html>
@endsection
