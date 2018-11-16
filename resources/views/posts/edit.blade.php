@extends('main')

@section('title', '| Edit Blog Post')

@section('stylesheets')

    {!! Html::style('css/select2.min.css') !!}



@endsection

@section('content')

    <div class="row">
        {!! Form::model($post, ['route'=>['posts.update', $post->id], 'method'=>'PATCH', 'files'=>true]) !!}
        <div class="col-md-8">
            {{ Form::label('movie',' Movie:') }}
            {{ Form::text('movie', null, ['class'=>'form-control input-lg', 'disabled' => 'disabled']) }}

            {{ Form::label('genre', 'Genre:', ['class'=>'form-spacing-top']) }}
            {{ Form::text('genre', null, ['class'=>'form-control']) }}

            {{ Form::label('plot', 'Plot:', ['class'=>'form-spacing-top']) }}
            {{ Form::textarea('plot', null,['class'=>'form-control']) }}

            {{ Form::label('director', 'Director:', ['class'=>'form-spacing-top']) }}
            {{ Form::text('director', null, ['class'=>'form-control']) }}

            {{ Form::label('writer', 'Writer:', ['class'=>'form-spacing-top']) }}
            {{ Form::text('writer', null, ['class'=>'form-control']) }}

            {{ Form::label('actors', 'Actors:', ['class'=>'form-spacing-top']) }}
            {{ Form::text('actors', null, ['class'=>'form-control']) }}

            {{ Form::label('rating', 'Rating:', ['class'=>'form-spacing-top']) }}
            {{ Form::text('rating', null, ['class'=>'form-control']) }}

            {{ Form::label('votes', 'Votes:', ['class'=>'form-spacing-top']) }}
            {{ Form::text('votes', null, ['class'=>'form-control']) }}

            {{ Form::label('runtime', 'Runtime:', ['class'=>'form-spacing-top']) }}
            {{ Form::text('runtime', null, ['class'=>'form-control']) }}

            {{ Form::label('featured_image', 'Update Featured Image:' , ['class'=>'form-spacing-top']) }}
            {{ Form::file('featured_image')}}


        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Director:</dt>
                    <dd>{{ $post->director }}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{date('M j, Y h:i a',strtotime($post->updated_at))}}</dd>
                </dl>
                <hr>

                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class'=>'btn btn-danger btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {{ Form::submit('Save Changes', ['class'=>'btn btn-success btn-block']) }}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@endsection

@section('scripts')

    {!! Html::script('js/select2.min.js') !!}

  


@endsection
