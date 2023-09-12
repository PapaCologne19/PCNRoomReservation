<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/hala.css">
    <title>Document</title>
</head>

<body>
    <div class="slider-container">
        <div class="slides">
            <figure style="--index:0">
                <img src="https://images.pexels.com/photos/3069252/pexels-photo-3069252.jpeg?cs=srgb&dl=pexels-atiabii-3069252.jpg&fm=jpg" alt="">
            </figure>

            <figure style="--index:1">
                <img src="https://images.pexels.com/photos/1845208/pexels-photo-1845208.jpeg?cs=srgb&dl=pexels-gustavo-peres-1845208.jpg&fm=jpg" alt="">
            </figure>

            <figure style="--index:2">
                <img src="https://images.pexels.com/photos/1758144/pexels-photo-1758144.jpeg?cs=srgb&dl=pexels-athena-1758144.jpg&fm=jpg" alt="">
            </figure>

            <figure style="--index:3">
                <img src="https://images.pexels.com/photos/1321909/pexels-photo-1321909.jpeg?cs=srgb&dl=pexels-tu%E1%BA%A5n-ki%E1%BB%87t-jr-1321909.jpg&fm=jpg" alt="">
            </figure>

            <figure style="--index:4">
                <img src="https://images.pexels.com/photos/2787341/pexels-photo-2787341.jpeg?cs=srgb&dl=pexels-ali-pazani-2787341.jpg&fm=jpg" alt="">
            </figure>

            <figure style="--index:5">
                <img src="https://images.pexels.com/photos/1921168/pexels-photo-1921168.jpeg?cs=srgb&dl=pexels-kourosh-qaffari-1921168.jpg&fm=jpg" alt="">
            </figure>
        </div>
    </div>
    <button class="prev">&#10094</button>
    <button class="next">&#10095</button>
</body>

<script>
    const slides = document.querySelector(".slides");
        const slidesCount = document.querySelectorAll(".slides img").length;
        let index = 0;
        let deg = 360 / slidesCount
        const imgs = document.querySelectorAll(".slides img");

        document.querySelector(".next").addEventListener("click", () => {
            // slides.style.transform = "perspective(1000px) rotateY(-60deg)";
            index++;
            slides.style.transition = "all 500ms ease-in";
            if (index > slidesCount - 1) {
                slides.style.transition = "none";
                index = 0;
            }
            slides.style.transform = `perspective(1000px) rotateY(${-deg * index}deg)`;
        });
        document.querySelector(".prev").addEventListener("click", () => {
            index--;
            slides.style.transition = "all 500ms ease-in";
            if (index < 0) {
                slides.style.transition = "none";
                index = slidesCount - 1;
            }
            slides.style.transform = `perspective(1000px) rotateY(${-deg * index}deg)`;
        });
</script>

</html>