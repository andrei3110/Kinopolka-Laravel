@extends('layouts.main')

@section('content')
    <div class="max-w-screen-2xl mx-auto relative my-2  min-h-screen overflow-hidden">
        <div class="w-full h-52 bg-slate-50 my-3 py-1">
            <div class="w-full  text-3xl text-[#b4ab7f] text-center inline-block font-medium">Фильтры</div>
            <form action="/filter" class="" method="post">
                @csrf
                <div class="relative mt-3   h-full left-1/4">
                    <div class="block">
                        <x-filter :items="$genres" :title="$genre" /> 
                        <x-filter :items="$years" :title="$year"/>
                        <x-filter :items="$countries" :title="$country"/>
                    </div>
                   <div class="block relative  mt-3">
                    <div class="relative inline-block bg-slate-200 rounded-xl px-4 py-1">
                        <input type="checkbox" class="border-none" name="subscribe" value="подписка">
                        <label class="text-gray-500 font-medium">платные</label>
                    </div>
                    <div class="relative inline-block  bg-slate-200  rounded-xl px-4 py-1">
                        <input type="checkbox" class="border-none" name="free" value="бесплатно">
                        <label class="text-gray-500 font-medium">бесплатные</label>
                    </div>
                   </div>
                   <input name="id" value="{{$id}}" type="hidden">
                   <input type="submit" class="relative text-white top-5 left-72 px-6 py-1 font-medium  bg-slate-400 " value="Поиск">
                </div>
                
            </form>
        </div>
        <div class="text-3xl text-[#A59D75] text-center font-medium">Фильмы</div>

        <x-slider :items="$items" :title="$BestBovik" :index="4" :home="false" :count="6" />
    </div>
@endsection

