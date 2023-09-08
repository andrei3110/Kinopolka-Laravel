@extends('layouts.main')

@section('content')
    <div class="max-w-screen-2xl mx-auto min-h-screen ">
        
            <div class="my-12">
                <div class="w-full font-medium text-3xl text-center">О фильме</div>
               @if ($item->category_id == 1)
               <div class="text-7xl my-2 text-gray-800 font-medium relative text-center">Фильм {{$item->name}} ({{$year->title}}) </div>
                @elseif($item->category_id == 2)
                <div class="text-7xl my-2 text-gray-800 font-medium relative text-center">Сериал {{$item->name}} ({{$year->title}}) </div>
                @elseif($item->category_id == 3)
                <div class="text-7xl my-2 text-gray-800 font-medium relative text-center">Мультфильм {{$item->name}} ({{$year->title}}) </div>
               @endif
                <div class="block mt-10">
                    <img class="w-96 rounded-xl m mx-4 relative  inline-block " src="../img/{{$item->image}}">
                    
                    <div class="inline-block relative bottom-12 text-gray-700 mx-12">
                        <div class="block text-xl my-3 font-medium  relative">Год:</div>
                        <div class="block text-xl my-3 font-medium  relative">Статус:</div>
                        <div class="block text-xl my-3 font-medium  relative">Жанры:</div>
                        <div class="block text-xl my-3 font-medium  relative">Страны:</div>
                        <div class="block absolute  w-[700px] top-52 text-xl font-medium text-gray-700"><div class="relative text-black mx-3 px-3  py-1 ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius deserunt molestias dolorem nihil? Totam distinctio cum fuga, quod dolore reprehenderit dolorem quidem quasi, repudiandae iure debitis nesciunt? Nobis, a!</div></div>
                       
                        
                    </div>
                    <div class="inline-block relative bottom-12">
                        <div class="block my-2"><div class="inline-block mx-3 px-3  rounded-md py-1 bg-gray-400 text-white">{{$year->title}}</div></div>
                        <div class="block my-2"><div class="inline-block mx-3 px-3 rounded-md py-1 bg-gray-400 text-white">{{$item->status}}</div></div>
                        <div class="block mx-3  my-2 text-white">
                            @foreach ($genres as $genre)
                            <div class="inline-block rounded-md py-1 px-3 bg-gray-400">{{$genre}}</div>
                            @endforeach    
                        </div>
                        <div class="block mx-3  my-2 text-white">
                            @foreach ($countries as $country)
                            <div class="inline-block rounded-md py-1 px-3 bg-gray-400">{{$country}}</div>
                            @endforeach    
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
        
    </div>
@endsection

