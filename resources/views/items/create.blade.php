@extends('layouts.main')

@section('content')
    <div class="max-w-screen-2xl mx-auto min-h-screen ">
        <form action='{{ route('items.store') }}' enctype="multipart/form-data" method="post">
            @csrf
            <input name="name" placeholder="name">
            <input type="file" name="image" placeholder="image" id="image">
            <input name="year" placeholder="year">
            <input name="country" placeholder="country">
            <input name="description" placeholder="description">
            <input name="status" placeholder="status">
            <input name="type" placeholder="type">
            <input type="submit" value="create">

            @foreach ($genres as $genre)
            <div class="relative block">
                <input type="checkbox" name="check[]" value="{{$genre->id}}">
                <label>{{$genre->title}}</label>
            </div>
            @endforeach
        </form>
       
    </div>
@endsection

