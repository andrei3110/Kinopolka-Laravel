@extends('layouts.main')

@section('content')
    <div class="max-w-screen-2xl mx-auto min-h-screen ">
        <form action='{{ route('genre.store') }}' enctype="multipart/form-data" method="post">
            @csrf
            <input name="name" placeholder="title">
            <input type="file" name="image" placeholder="title">
            <input type="submit" value="create">
        </form>
       
    </div>
@endsection

