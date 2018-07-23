@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h1>Add Image</h1>
                <form action="/store" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-control">
                        <input name="image" type="file">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection