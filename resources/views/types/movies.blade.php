@extends('layouts.main')

@section('content')
    <div class="max-w-screen-2xl mx-auto relative my-2  min-h-screen overflow-hidden">
        <div class="w-full h-52 bg-gray-200 my-3 py-1">
            <div class="w-full  text-3xl text-[#A59D75] text-center inline-block font-medium">Фильтры</div>
            <form action="/filter" class="" method="post">
                @csrf
                <div class="relative mt-3   h-full left-1/4">
                    <div class="block">
                        <x-filter :items="$genres" :title="$genre" /> 
                        <x-filter :items="$years" :title="$year"/>
                        <x-filter :items="$countries" :title="$country"/>
                    </div>
                   <div class="block relative  mt-3">
                    <div class="relative inline-block bg-gray-300 rounded-xl px-4 py-1">
                        <input type="checkbox" class="border-none" name="subscribe" value="подписка">
                        <label class="text-gray-500 font-medium">платные</label>
                    </div>
                    <div class="relative inline-block bg-gray-300 rounded-xl px-4 py-1">
                        <input type="checkbox" class="border-none" name="free" value="бесплатно">
                        <label class="text-gray-500 font-medium">бесплатные</label>
                    </div>
                   </div>
                   <input name="id" value="{{$id}}" type="hidden">
                   <input type="submit" class="relative text-gray-500 top-5 left-72 px-6 py-1 font-medium bg-gray-300" value="Поиск">
                </div>
                
            </form>
        </div>
        <div class="my-4 mx-auto relative w-[1372px]">
            @foreach ($items as $item)
                <div class="w-48 py-3 mt-1 inline-block  bg-gray-200  relative transparent duration-700 ">
                    <div class="mx-3 relative ">
                        <div class="">
                            <img class="w-full h-auto rounded-xl" src="../img/{{ $item->image }}">
                        </div>  
                        <div class="text-center font-medium  text-gray-700 ">{{ $item->name }}</div>
                        <div class=" font-medium  text-sm  text-gray-500 ">{{ $item->status }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
