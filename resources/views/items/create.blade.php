@extends('layouts.main')

@section('content')
    <div class="max-w-screen-2xl mx-auto min-h-screen ">
        <form action='{{ route('items.store') }}' enctype="multipart/form-data" method="post">
            @csrf
            <input name="name" placeholder="name">
            <input type="file" name="image" placeholder="image" id="image">
            @foreach ($years as $year)
            <div class="relative block">
                <input type="radio" name="year" value="{{$year->id}}">
                <label>{{$year->title}}</label>
            </div>
            @endforeach
////////////////countries/////////////////
            @foreach ($countries as $country)
            <div class="relative block">
                <input type="checkbox" name="check_country[]" value="{{$country->id}}">
                <label>{{$country->title}}</label>
            </div>
            @endforeach
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

