@extends('main')

@section('title','| View Post')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <img src="{{ asset('images/' . $post->image) }}" alt="" style="width: 250px; height: 400px;">
            <h1>{{ $post->movie }}</h1>
            <p class="lead">{!!  $post->plot !!}</p>
            <hr>



        </div>
        <div class="col-md-4">
            <div class="well">


                <dl class="dl-horizontal">
                    <label>Director:</label>
                    <p>{{ $post->director }}</p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Writer:</label>
                    <p>{{ $post->writer }}</p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Actors:</label>
                    <p>{{ $post->actors }}</p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Rating:</label>
                    <p>{{ $post->rating }}</p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Votes:</label>
                    <p>{{ $post->votes }}</p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Runtime:</label>
                    <p>{{ $post->runtime }}</p>
                </dl>

                <hr>

                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class'=>'btn btn-primary btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['route'=>['posts.destroy',$post->id], 'method'=>'DELETE']) !!}
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
