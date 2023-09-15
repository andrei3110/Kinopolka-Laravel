@extends('layouts.main')

@section('content')
    <div class="max-w-screen-2xl mx-auto min-h-screen ">

        <div class="my-12 ">

            @if ($item->category_id == 1)
                <div
                    class="text-7xl my-2 pb-5 text-gray-800 border-b border-dashed border-gray-300 font-medium relative text-center">
                    Фильм {{ $item->name }}
                    ({{ $year->title }}) </div>
            @elseif($item->category_id == 2)
                <div class="text-7xl my-2 text-gray-800 font-medium relative text-center">Сериал {{ $item->name }}
                    ({{ $year->title }}) </div>
            @elseif($item->category_id == 3)
                <div class="text-7xl my-2 text-gray-800 font-medium relative text-center">Мультфильм {{ $item->name }}
                    ({{ $year->title }}) </div>
            @endif
            @if ($item->category_id == 1)
                <div class="text-2xl my-8 text-gray-800 font-medium relative text-center">о фильме </div>
            @elseif($item->category_id == 2)
                <div class="text-2xl my-8 text-gray-800 font-medium relative text-center">о сериале</div>
            @elseif($item->category_id == 3)
                <div class="text-2xl my-8 text-gray-800 font-medium relative text-center">о мультфильме</div>
            @endif
            <div class="block my-10">
                <div class="w-[1000px] mx-auto ">
                    <img class="w-72 rounded-xl relative inline-block " src="../img/{{ $item->image }}">

                    <div
                        class="inline-block relative bottom-12 pl-2  border-l border-dashed border-gray-300 text-gray-700 ml-24 mr-12">
                        <div class="block text-xl my-3 font-medium  relative">Год:</div>
                        <div class="block text-xl my-3 font-medium  relative">Статус:</div>
                        <div class="block text-xl my-3 font-medium  relative">Жанры:</div>
                        <div class="block text-xl my-3 font-medium  relative">Страны:</div>
                        <div
                            class="block absolute  w-[600px] h-48 overflow-hidden top-52   text-justify  text-xl font-medium text-gray-700">
                            <div class="relative   py-1 ">Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Incidunt in, laborum, quidem magnam amet exercitationem quaerat sunt atque
                                iste itaque quia, expedita libero dicta consectetur ea nam? Maiores, porro perferendis!
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius deserunt molestias
                                dolorem nihil? Totam distinctio cum fuga, quod dolore reprehenderit dolorem quidem quasi,
                                repudiandae iure debitis nesciunt? Nobis, a!</div>
                        </div>



                    </div>
                    <div class="inline-block relative bottom-12">
                        <div class="block my-2">
                            <div class="inline-block mx-3 px-3  rounded-md py-1 bg-gray-400 text-white">{{ $year->title }}
                            </div>
                        </div>
                        <div class="block my-2">
                            <div class="inline-block mx-3 px-3 rounded-md py-1 bg-gray-400 text-white">{{ $item->status }}
                            </div>
                        </div>
                        <div class="block mx-3  my-2 text-white">
                            @foreach ($genres as $genre)
                                <div class="inline-block rounded-md py-1 px-3 bg-gray-400">{{ $genre }}</div>
                            @endforeach
                        </div>
                        <div class="block mx-3  my-2 text-white">
                            @foreach ($countries as $country)
                                <div class="inline-block rounded-md py-1 px-3 bg-gray-400">{{ $country }}</div>
                            @endforeach
                        </div>

                    </div>
                </div>


            </div>
            <div class="w-[1035px] mx-auto h-24">
                <div class="relative w-64 h-[82px] text-xl text-black rounded-xl bg-slate-100" id="averange">
                    <div class="absolute top-3 ml-5">рейтинг:</div>
                    <div class=" w-20 text-center py-5 my-1 mr-1 bg-[#A59D75] text-white font-semibold rounded-lg relative float-right text-3xl" id="averangeText">
                        {{ $average }}
                    </div>

                    <div class="relative top-12 ml-5 text-sm" id="voices">
                        всего голосов:<span class="textVoises" id="textViews">
                            {{ $voices }}
                        </span></div>
                </div>
    
            </div>
            
            <div class=" relative text-center text-2xl font-medium text-gray-700">актеры:</div>
            <div class="my-12 overflow-hidden h-48 w-[1035px] mx-auto">

                @foreach ($participants as $participant)
                    <div class="w-36 relative h-48 inline-block ">
                        <img class=" w-36 h-36 rounded-full" src="../actorsImg/{{ $participant->image }}">
                        <div class="relative  h-12  text-center ">
                            <div class="relative text-gray-700 top-5 truncate">{{ $participant->name }}</div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($rates != null)
                <div class=" relative mx-auto my-4  text-center  max-w-6xl  bottom-2" id="rates-wrapper">
                    <div id="rate-thanks"
                        class="hidden py-4 bg-slate-50 text-xl font-medium text-gray-500  text-center relative mx-auto my-4 max-w-6xl">
                        <button onclick="Edit()">EDIT</button>
                        Thanks for raing us!
                    </div>
                    <div id="rate-update" class="hidden">
                    </div>
                    <div id="rate-create">
                        <div class="grid text-center place-items-center py-4 bg-slate-50 relative mx-auto my-4 items-center justify-center flex-col  max-w-6xl"
                            id="container">
                            <div id="star-widget" class="text-center items-center justify-center">
                                <ul class="grid text-center w-[300px] grid-cols-5">
                                    @for ($i = 1; $i < 6; $i++)
                                        <li class="m-0">
                                            <input type="radio" name="rate" id="rate-{{ $i }}"
                                                class="rate hidden peer" value="{{ $i }}" required>
                                            <label for="rate-{{ $i }}"
                                                class="float-right text-2xl  text-gray-500 p-2 peer-checked:text-blue-600">@include('components.icons.star')</label>
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                            <div class="p-3 text-xl text-gray-600 my-8 font-medium  w-full text-center mb-2 bg-slate-200">

                                <button onclick="rate(`{{ route('api.item.rate') }}`)">Send</button>
                            </div>
                        </div>

                    </div>
                </div>
            @endif

            @foreach ($rates as $rate)
                @if ($rate->user_id == Auth::user()->id && $rate->item_id == $item->id)
                    <script>
                        document.getElementById('rate-create').style.display = "none";
                        document.getElementById('rate-thanks').style.display = "block";
                    </script>
                @endif
            @endforeach

        </div>

    </div>
@endsection
<script>
    function Edit() {
        document.getElementById('rate-create').style.display = "block";
        document.getElementById('rate-thanks').style.display = "none";
    }

    function rate(action) {
        const rate = document.querySelectorAll('input[name="rate"]');
        let checkedRadio = 0;
        for (let i = 0; i < rate.length; i++) {
            if (rate[i].checked) {
                checkedRadio = rate[i].value
                break;
            }
        }
        axios.post(
            action, {
                rate: Number(checkedRadio),
                item_id: {{ $item->id }},
                user_id: {{ Auth::user()->id }}
            }, {
                mode: 'cors',
                headers: {
                    'Content-Type': 'application/json',
                },
            },
        ).then((response) => {

            let rate = response.data
            if (rate[0] == true) {
                document.getElementById('rate-create').style.display = "none";
                document.getElementById('rate-thanks').style.display = "block";
            }

            const averange = document.getElementById('averange')
            
            averange.innerHTML = `
            <div class="absolute top-3 ml-5">рейтинг:</div>
                    <div class=" w-20 text-center py-5 my-1 mr-1 bg-[#A59D75] text-white font-semibold rounded-lg relative float-right text-3xl" id="averangeText">
                        ${rate[1]}
                    </div>
                    <div class="relative top-12 ml-5 text-sm" id="voices">
                        всего голосов:<span class="textVoises" id="textViews">
                            ${rate[2]}
                        </span></div>
            `
        }).catch(function(error) {


        })
    }
</script>
