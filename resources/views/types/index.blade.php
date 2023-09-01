@extends('layouts.main')

@section('content')

    <div class="max-w-screen-2xl mx-auto relative my-2  min-h-screen overflow-hidden">

        <div class="text-3xl text-[#A59D75] text-center font-medium">Фильмы</div>

            <x-slider :items="$items" :title="$BestBovik" :index="4" :home="false" :count="6"/>              
    </div>
@endsection
