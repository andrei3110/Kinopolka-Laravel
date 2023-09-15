@extends('layouts.main')

@section('content')
    <div class="max-w-screen-2xl mx-auto relative my-2  min-h-screen overflow-hidden">
        @include('layouts.particles.slider')
        <div class="text-3xl text-[#A59D75] text-center font-medium">Популярное</div>

        <x-slider :items="$items" :title="$popular" :index="1" :home="true" :count="7" :average="$average"/>
        

        <div id="subscribe_content" class="relative   mx-5 bg-gray-200 my-12  transparent duration-500 overflow-hidden">
            <div class="h-[500px]  bg-gray-600 overflow-hidden rounded-t-2xl">
                <button
                    class=" transition duration-700 absolute  text-white left-[600px] top-96 px-7 py-4 rounded-2xl shadow-2xl shadow-red-400/80 bg-red-600 z-20 font-medium hover:duration-700 hover:bg-red-500">Оформить
                    подписку</button>
                <img src="/img/subscribe.jpg" class="">
            </div>
            <div class="">
                <div class="w-full absolute text-center z-20 text-[#A59D75] font-medium text-3xl">
                    Фильмы по подписке
                </div>
                <x-slider :items="$subscribeItems" :title="$subscribe" :index="2" :home="true" :count="6" :average="$average"/>
            </div>
        </div>
        <div class="text-3xl text-[#A59D75] text-center font-medium">Новинки</div>
        <x-slider :items="$items" :title="$new" :index="3" :home="true" :count="7" :average="$average"/>
       
    </div>
@endsection
