@extends('main')

@section('title','| Create New Post')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
    <!-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea'
        });
    </script> -->


@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Post</h1>
            <hr>

            {!! Form::open(array('route'=>'posts.store', 'data-parsley-validate'=>'', 'files'=>true)) !!}
            {!!  csrf_field() !!}
                {{ Form::label('movie','Movie:')}}
                {{ Form::text('movie',null,array('class'=>'form-control', 'required'=>''))}}

                {{ Form::label('genre', 'Genre:') }}
                {{ Form::text('genre', null, ['class'=>'form-control', 'required'=>'', 'minlength'=>'1', 'maxlength'=>'255']) }}

                {{ Form::label('plot','Plot:')}}
                {{ Form::textarea('plot',null,array('class'=>'form-control'))}}

                {{ Form::label('director','Director:')}}
                {{ Form::text('director',null,array('class'=>'form-control'))}}

                {{ Form::label('writer','Writer:')}}
                {{ Form::text('writer',null,array('class'=>'form-control'))}}

                {{ Form::label('actors','Actors:')}}
                {{ Form::text('actors',null,array('class'=>'form-control'))}}

                {{ Form::label('rating','Rating:')}}
                {{ Form::text('rating',null,array('class'=>'form-control'))}}

                {{ Form::label('votes','Votes:')}}
                {{ Form::text('votes',null,array('class'=>'form-control'))}}

                {{ Form::label('runtime','Runtime:')}}
                {{ Form::text('runtime',null,array('class'=>'form-control'))}}

                {{ Form::label('featured_image', 'Upload Featured Image:') }}
                {{ Form::file('featured_image') }}



                {{ Form::submit('Create Post',array('class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top:20px'))}}

            {!! Form::close() !!}
        </div>
    </div>

    @endsection

@section('scripts')

    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}
    <script type="text/javascript">
        $(".select2-multi").select2();
    </script>


@endsection
