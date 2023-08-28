<style>
    .slider_img {
        position: absolute;
        display: inline-block;
        min-width: 1200px;
        margin: 16px;
        margin: 0 auto;
        transition: all .2s ease;
        left: 0px;
        border-radius: 15px;
    }
</style>
<div id="slider" class=" w-[1200px]  mx-auto my-10 relative h-[600px]">
    <div id="slider_wrapper" class=" relative flex ease-in duration-500">
        <img class="slider_img" src="img/oblivion.webp" alt="">
        <img class=" slider_img" src="img/jocker.webp" alt="">
        <img class="slider_img" src="img/HomeAlone.jpg" alt="">
        
    
    </div>


    <div class="relative z-20 top-64">
        <a class="float-left " onclick="previousSlide()">@include('components.icons.left')</a>
        <a class="float-right" onclick="nextSlide()">@include('components.icons.right')</a>

    </div>

</div>

<script>
    let images = document.querySelectorAll('.slider_img')
    let slides = document.getElementsByClassName("item");
    let wrapper = document.getElementById("slider_wrapper");
    let src_mas = [];


    for (let i = 0; i < images.length; i++) {
        src_mas.push(images[i].src)
        images[i].remove()

    }

    let nextIndex = 0;

    function drawRight() {
        let offsetRight = src_mas.length - 2;
        let img = document.createElement('img');
        img.src = src_mas[nextIndex];
        img.classList.add('slider_img');
        img.style.left = offsetRight * 1248 + 'px';
        let m = document.getElementById('slider_wrapper').appendChild(img);
        if (nextIndex + 1 == src_mas.length) {
            nextIndex = 0;
        } else {
            nextIndex++
        }
        let images = document.getElementById('slider_wrapper')
        console.log(images)
    }

    let offsetLeft = -1;

    function drawLeft() {

        nextIndex = nextIndex - 1;
        if (nextIndex < 0) {
            nextIndex = src_mas.length - 1
        }

        let wrapper = document.getElementById('slider_wrapper')
        let img = document.createElement('img');
        img.src = src_mas[nextIndex];
        img.classList.add('slider_img');
        img.style.left = offsetLeft * 1248 + 'px';
        let images = document.querySelectorAll('.slider_img')
        document.getElementById('slider_wrapper').insertBefore(img, images[0]);
    }

    for (let i = 0; i < src_mas.length; i++) {
        drawRight()
        Slide()
    }

    function Slide() {
        let images = document.querySelectorAll('.slider_img')
        let offset = 0;
        for (let i = 0; i < images.length; i++) {
            images[i].style.left = (offset * 1248 - 1248) + 'px';
            offset++
        }
    }

    let offset = -1;
    function nextSlide() {

        let images = document.querySelectorAll('.slider_img')
        for (let i = 0; i < images.length; i++) {
            images[i].style.left = (offset * 1248 - 1248) + 'px';
            if (offset == (src_mas.length - 2)) {
                offset = -1;
            } else {
                offset++;
            }
        }

        images[0].remove()
        drawRight();
    }

    offset2 = 1

    function previousSlide() {
        let images = document.querySelectorAll('.slider_img')
        for (let i = 0; i < images.length; i++) {
            images[i].style.left = (offset2 * 1248 - 1248) + 'px';
            if (offset2 == src_mas.length) {
                offset2 = 1
            } else {
                offset2++
            }
        }
        images[images.length - 1].remove()
        drawLeft();

    }
</script>
