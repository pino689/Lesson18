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
            <h1 class='page-header'>新規投稿フォーム</h1>
        </header>

        <div class='container'>
            <h2 class='page-header'>新しく投稿をする</h2>
            {!! Form::open(['url' => 'post/create']) !!}
            <div class="form-group">
                {!! Form::input('text', 'newName', null, ['required', 'class' => 'form-control', 'placeholder' => '名前']) !!}
                @if ($errors->has('userName'))
                    <ul>
                        <li class="alert alert-danger">{{ $errors->first('newName') }}</li>
                    </ul>
                @endif

                {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容']) !!}

                @if ($errors->has('newPost'))
                    <ul>
                        <li class="alert alert-danger">{{ $errors->first('newPost') }}</li>
                    </ul>
                @endif

            </div>

            <button type="submit" class="btn btn-success pull-right">追加</button>

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
