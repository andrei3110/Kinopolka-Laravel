@extends('layouts.main')

@section('content')
    <div class="max-w-screen-2xl mx-auto min-h-screen overflow-hidden">
        <div class="">
            @include('layouts.particles.slider')
            <div class="text-3xl text-[#A59D75] text-center font-medium">Популярное</div>
            <div id="film_wrapper" class="relative py-2 flex mx-5 bg-gray-200   my-12  transparent duration-500">
                @foreach ($items as $item)
                <div class="film_object min-w-44 bg-gray-200 h-72  relative inline-block px-2 transparent duration-500">
                    <div class="">
                        
                        <img class="w-44  h-60 rounded-xl" src="img/{{$item->image}}">
                        <div class="text-center ">{{$item->name}}</div>
                    </div>

                </div>
                @endforeach
                



                <div class=" absolute w-full z-20 top-28">


                    <a class="float-left m-2 " onclick="left()">@include('components.icons.left')</a>
                    <a class="float-right m-2" onclick="right()">@include('components.icons.right')</a>

                </div>
            </div>

        </div>

    </div>
@endsection
<script>
    let index = 0;
    let currentOffset = 0;
    FilmOffset = 0;
    function right() {
        let film_wrapper = document.getElementById('film_wrapper')
        let items = document.querySelectorAll(".film_object");
        if(index < items.length - 7 ){
            FilmOffset++
       
        currentOffset = 0;
        currentOffset = -items[1].offsetWidth* FilmOffset;
       
        for (let i = 0; i < items.length; i++) {
            items[i].style.left = currentOffset + 'px'; 
        }
        index ++
        }
        console.log(items.length)
        console.log(index)
    }

    function left() {
        if(index > 0){
            FilmOffset--
        let film_wrapper = document.getElementById('film_wrapper')
        let items = document.querySelectorAll(".film_object");
        currentOffset = 0;
        currentOffset = -items[1].offsetWidth * FilmOffset;
        
        for (let i = 0; i < items.length; i++) {
            items[i].style.left = currentOffset + 'px'; 
        }
        index --
        }
        
    }
</script>
