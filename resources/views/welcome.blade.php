@extends('layout')

@section('content')
    <div class="container">
        <h1 align="center">My Gallery</h1>
        <div class="row">
            @foreach($imagesInView as $image)
                <div class="col-md-3 gallery-item">
                    <div>
                        <img src="{{$image->image}}" alt="" class="img-thumbnail">
                    </div>
                    <a href="/show/{{$image->id}}" class="btn btn-info my-button">Show</a>

                    <a href="/edit/{{$image->id}}" class="btn btn-warning my-button">Edit</a>

                    <a href="/delete/{{$image->id}}" onclick ="return confirm('Are you sure?')" class="btn btn-danger my-button">Delete</a>
                </div>
            @endforeach

        </div>
    </div>
@endsection