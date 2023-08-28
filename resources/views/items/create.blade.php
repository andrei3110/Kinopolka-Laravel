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
            <input name="genre" placeholder="genre">
            <input type="submit" value="create">
        </form>
       
    </div>
@endsection

