@props(['items', 'title', 'index', 'home', 'count'])
<div class="flex relative mt-4  w-full h-[450px] bg-gray-200 transparent duration-500 overflow-hidden">
    @foreach ($items as $item)
    <a href="/description/{{$item->id}}">
        <div
        class="{{ $title }} min-w-44 flex  bg-gray-200 h-full absolute  items-center  transparent duration-200 ">
        <div class="mx-3 absolute ">
            @if ($home == true)
                <div class="group rounded-xl duration-500 hover:-translate-y-1 hover:scale-105">
                    <button
                        class="duration-200 absolute z-20 right-0 m-4 opacity-0 group-hover:block group-hover:duration-200  group-hover:opacity-100">
                        @include('components.icons.bookmark')
                    </button>
                    <div
                        class="duration-200 absolute z-20 text-gray-300 px-2 bottom-2 text-sm opacity-0 group-hover:block group-hover:duration-200 font-medium  group-hover:opacity-100">
                        {{ $item->year->title }}</div>
                    <div
                        class="duration-200 bottom-12 font-medium text-sm absolute whitespace-nowrap w-full px-2 text-gray-300 opacity-0 z-20 truncate overflow-visible   group-hover:duration-200 group-hover:opacity-100">
                        @foreach ($item->countries as $country)
                            {{ $country->title }},
                        @endforeach
                    </div>
                    <div
                        class="duration-200 bottom-7 font-medium text-sm absolute whitespace-nowrap w-full px-2 text-gray-300 opacity-0 z-20 truncate overflow-visible   group-hover:duration-200 group-hover:opacity-100">
                        @foreach ($item->genres as $genre)
                            {{ $genre->title }},
                        @endforeach
                    </div>
                    <img class="film_image{{ $title }} w-44 h-auto rounded-xl duration-200  z-20 group-hover:brightness-[30%]"
                        src="../img/{{ $item->image }}">
                </div>
            @else
                <div class="">
                    <img class="w-full h-auto rounded-xl" src="../img/{{ $item->image }}">
                </div>
            @endif
            <div class="text-center font-medium  text-gray-700 ">{{ $item->name }}</div>
            @if ($title != 'subscribe')
                <div class=" font-medium  text-sm  text-gray-500 ">{{ $item->status }}</div>
            @endif
        </div>
    </div>
    </a>
       
    @endforeach

    <div class=" absolute w-full z-20 my-44 h-auto">
        <a class="float-left m-2 " onclick="left{{ $title }}()">@include('components.icons.left')</a>
        <a class="float-right m-2" onclick="right{{ $title }}()">@include('components.icons.right')</a>
    </div>
</div>
<script>
    let index{{ $index }} = 0;
    let items{{ $index }} = document.querySelectorAll(".{{ $title }}");
    let film{{ $index }} = document.querySelectorAll(".film_image{{ $title }}");

    let arr{{ $index }} = []
    const screenWidth{{ $index }} = window.screen.width
    const objectWidth{{ $index }} = Math.round((window.screen.width / {{ $count }}) -
        {{ $count }} * 3)

    for (let i = 0; i < items{{ $index }}.length; i++) {
        items{{ $index }}[i].style.left = i * items{{ $index }}[0].offsetWidth + 'px';
        items{{ $index }}[i].style.minWidth = objectWidth{{ $index }} + 'px'
    }
    for (let i = 0; i < film{{ $index }}.length; i++) {
        film{{ $index }}[i].style.width = objectWidth{{ $index }} + 'px'

    }


    function right{{ $title }}() {
        if (index{{ $index }} < items{{ $index }}.length - {{ $count }}) {
            for (let i = 0; i < items{{ $index }}.length; i++) {
                items{{ $index }}[i].style.left = Number(items{{ $index }}[i].style.left.slice(0, -2)) -
                    items{{ $index }}[0].offsetWidth + 'px';
            }
            index{{ $index }}++
        }
    }

    function left{{ $title }}() {
        if (index{{ $index }} > 0) {
            for (let i = 0; i < items{{ $index }}.length; i++) {
                items{{ $index }}[i].style.left = Number(items{{ $index }}[i].style.left.slice(0, -2)) +
                    items{{ $index }}[0].offsetWidth + 'px';
            }
            index{{ $index }}--
        }

    }
</script>
