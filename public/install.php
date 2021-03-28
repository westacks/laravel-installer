<?php
    if (isset($GLOBALS['argv'])) {
        die('This file should be processed only by webserver!');
    }
    header("Location: /install");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Initializing...</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <style>
        @import url(https://fonts.googleapis.com/css?family=Open+Sans);
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .load {
            position: relative;
            margin: 50px auto;
            width: 100px;
            height: 80px;
        }
        .gear {
            position: absolute;
            z-index: -10;
            width: 40px;
            height: 40px;
            -webkit-animation: spin 5s infinite;
            animation: spin 5s infinite;
        }
        .two {
            left: 40px;
            width: 80px;
            height: 80px;
            -webkit-animation: spin-reverse 5s infinite;
            animation: spin-reverse 5s infinite;
        }
        .three {
            top: 45px;
            left: -10px;
            width: 60px;
            height: 60px;
        }
        @-webkit-keyframes spin {
            50% {
                transform: rotate(360deg);
            }
        }
        @keyframes spin {
            50% {
                transform: rotate(360deg);
            }
        }
        @-webkit-keyframes spin-reverse {
            50% {
                transform: rotate(-360deg);
            }
        }
        @keyframes spin-reverse {
            50% {
                transform: rotate(-360deg);
            }
        }
        .lil-circle {
            position: absolute;
            border-radius: 50%;
            box-shadow: inset 0 0 10px 2px gray, 0 0 50px white;
            width: 100px;
            height: 100px;
            opacity: 0.65;
        }
        .blur-circle {
            position: absolute;
            top: -19px;
            left: -19px;
        }
        .text {
            color: lightgray;
            font-size: 18px;
            font-family: "Open Sans", sans-serif;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="load">
        <div class="gear one">
            <svg id="blue" viewBox="0 0 100 100" fill="#94DDFF">
                <path
                    d="M97.6,55.7V44.3l-13.6-2.9c-0.8-3.3-2.1-6.4-3.9-9.3l7.6-11.7l-8-8L67.9,20c-2.9-1.7-6-3.1-9.3-3.9L55.7,2.4H44.3l-2.9,13.6      c-3.3,0.8-6.4,2.1-9.3,3.9l-11.7-7.6l-8,8L20,32.1c-1.7,2.9-3.1,6-3.9,9.3L2.4,44.3v11.4l13.6,2.9c0.8,3.3,2.1,6.4,3.9,9.3      l-7.6,11.7l8,8L32.1,80c2.9,1.7,6,3.1,9.3,3.9l2.9,13.6h11.4l2.9-13.6c3.3-0.8,6.4-2.1,9.3-3.9l11.7,7.6l8-8L80,67.9      c1.7-2.9,3.1-6,3.9-9.3L97.6,55.7z M50,65.6c-8.7,0-15.6-7-15.6-15.6s7-15.6,15.6-15.6s15.6,7,15.6,15.6S58.7,65.6,50,65.6z">
                </path>
            </svg>
        </div>
        <div class="gear two">
            <svg id="pink" viewBox="0 0 100 100" fill="#FB8BB9">
                <path
                    d="M97.6,55.7V44.3l-13.6-2.9c-0.8-3.3-2.1-6.4-3.9-9.3l7.6-11.7l-8-8L67.9,20c-2.9-1.7-6-3.1-9.3-3.9L55.7,2.4H44.3l-2.9,13.6      c-3.3,0.8-6.4,2.1-9.3,3.9l-11.7-7.6l-8,8L20,32.1c-1.7,2.9-3.1,6-3.9,9.3L2.4,44.3v11.4l13.6,2.9c0.8,3.3,2.1,6.4,3.9,9.3      l-7.6,11.7l8,8L32.1,80c2.9,1.7,6,3.1,9.3,3.9l2.9,13.6h11.4l2.9-13.6c3.3-0.8,6.4-2.1,9.3-3.9l11.7,7.6l8-8L80,67.9      c1.7-2.9,3.1-6,3.9-9.3L97.6,55.7z M50,65.6c-8.7,0-15.6-7-15.6-15.6s7-15.6,15.6-15.6s15.6,7,15.6,15.6S58.7,65.6,50,65.6z">
                </path>
            </svg>
        </div>
        <div class="gear three">
            <svg id="yellow" viewBox="0 0 100 100" fill="#FFCD5C">
                <path
                    d="M97.6,55.7V44.3l-13.6-2.9c-0.8-3.3-2.1-6.4-3.9-9.3l7.6-11.7l-8-8L67.9,20c-2.9-1.7-6-3.1-9.3-3.9L55.7,2.4H44.3l-2.9,13.6      c-3.3,0.8-6.4,2.1-9.3,3.9l-11.7-7.6l-8,8L20,32.1c-1.7,2.9-3.1,6-3.9,9.3L2.4,44.3v11.4l13.6,2.9c0.8,3.3,2.1,6.4,3.9,9.3      l-7.6,11.7l8,8L32.1,80c2.9,1.7,6,3.1,9.3,3.9l2.9,13.6h11.4l2.9-13.6c3.3-0.8,6.4-2.1,9.3-3.9l11.7,7.6l8-8L80,67.9      c1.7-2.9,3.1-6,3.9-9.3L97.6,55.7z M50,65.6c-8.7,0-15.6-7-15.6-15.6s7-15.6,15.6-15.6s15.6,7,15.6,15.6S58.7,65.6,50,65.6z">
                </path>
            </svg>
        </div>
        <div class="lil-circle"></div>
        <svg class="blur-circle">
            <filter id="blur">
                <feGaussianBlur in="SourceGraphic" stdDeviation="13"></feGaussianBlur>
            </filter>
            <circle cx="70" cy="70" r="66" fill="transparent" stroke="white" stroke-width="40" filter="url(#blur)">
            </circle>
        </svg>
    </div>
    <div class="text">Initializing application. Please wait...</div>
    <?php 
        set_time_limit(0);
        chdir('..');
        copy('https://getcomposer.org/installer', 'composer-setup.php');
        
        if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3'){
            shell_exec('php composer-setup.php --no-ansi >> install.log 2>&1');
        }
        unlink('composer-setup.php');
        shell_exec('php composer.phar install --optimize-autoloader --no-dev --no-ansi >> install.log 2>&1');
        unlink('composer.phar');
        unlink('public/install.php');
    ?>
</body>

</html>

