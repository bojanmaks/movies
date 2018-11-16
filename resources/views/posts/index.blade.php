@extends('main')
@section('title','| All Posts')

@section('content')

    <div class="row">
        <div class="col-md-2">
              <a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-success btn-h1-spacing">Add new</a>
        </div>
        <div class="col-md-10">

        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>POSTER</th>
                    <th>MOVIE</th>
                    <th>GENRE</th>
                    <th>PLOT</th>
                      <th>DIRECTOR</th>
                      <th>WRITER</th>
                      <th>ACTORS</th>
                      <th>RATING</th>
                      <th>VOTES</th>
                      <th>RUNTIME</th>
                      <th></th>
                </thead>
                <tbody>
                @foreach($posts as $post)
                  <tr>
                    <th><img src="{{ asset('images/' . $post->image) }}" alt="" style="width: 70px; height:100px;"></th>
                    <td>{{ $post->movie }}</td>
                    <td>{{ $post->genre}}</td>
                    <td>{{ substr($post->plot, 0, 50) }}{{ strlen($post->plot) > 50 ? "..." : "" }}</td>
                      <td>{{ $post->director }}</td>
                      <td>{{ $post->writer }}</td>
                      <td>{{ $post->actors }}</td>
                      <td>{{ $post->rating }}</td>
                      <td>{{ $post->votes }}</td>
                      <td>{{ $post->runtime}}</td>
                      <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">View</a> <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-sm">Edit</a>
                        {!! Form::open(['route'=>['posts.destroy',$post->id], 'method'=>'DELETE']) !!}
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) !!}
                        {!! Form::close() !!}
                      </td>
                  </tr>
                    @endforeach
                </tbody>
              </table>

            <div class="text-center">
                {!! $posts->links() !!}
            </div>
        </div>
    </div>


    @endsection
