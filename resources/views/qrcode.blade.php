<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Khmer:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="flex items-center justify-center">
<div class="bg-white w-[300px] min-h-[450px]">
    <div>
        <p class="mb-5 text-red-500 text-center" style="font-family: 'Noto Sans Khmer', sans-serif;">សូមធ្វើការទូរទាត់មុនពេលផុតកំណត់ !<br/><b id="display-timer">3:47</b></p>
        <div class="w-[250px] h-[376px] rounded-lg overflow-hidden  relative aspect-square bg-cover rounded shadow mx-auto" style="background-image: url('{{asset("images/hkqr_bg.png")}}')">
            <div class="pt-[60px] px-5">
                <h2 class="text-gray-500">{{$username}}</h2>
                <div>
                    <span class="text-gray-500"><b class="text-xl">{{$total_payment}}</b><span class="ml-1 text-[13px]">{{$currency}}</span></span>
                </div>
            </div>
            {{-- Start QRCode --}}
            <img class="mt-5 w-[210px] h-[210px] mx-auto"
                 src="data:image/png;base64,{{$qrcode_string }}"/>
            {{-- End QRCode --}}
        </div>
    </div>
</div>
</body>
<script>
    function startTimer(duration, display) {
        let timer = duration, minutes, seconds;
        setInterval(function () {
            minutes = Math.floor(timer / 60);
            seconds = timer % 60;
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;
            display.textContent = `${minutes}:${seconds}`;
            if (--timer < 0) {
                timer = duration; // Reset the timer
            }
        }, 1000);
    }

    window.onload = function () {
        const fiveMinutes = 60 * 5;
        const display = document.querySelector('#display-timer');
        startTimer(fiveMinutes, display);
    };
</script>
</html>
