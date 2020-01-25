@extends('layouts\app')

@section('content')
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Вітаю Андрію!</title>
    <style>
        body {
            text-align: center;
            margin: auto;
            font-size: 18px;
            background: url('/ff.jpg') no-repeat top center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        canvas {
            display: block;
        }
    </style>

    </head>


    <body class="container" style="">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <img src="5230.webp" style="width: 100%"/>
            <br>
            <p></p>
            <p class="font-weight-bold">Вітаю з днем старіння… Ой, тобто з днем народження. Нехай кісток не ломить,
                нехай пісок не сиплеться з тебе, нехай зуби не болять від смачного торта, а всі свічки на ньому з першої
                спроби вдасться задмухати =)</p>
            <p class="font-weight-bold">З Днем народження! Нехай у твоєму житті буде побільше крутих віражів,
                холодильник тріщить по швах, а гроші вивалюються з мішків. В акваріумі живе золота рибка, яка виконує
                будь-які твої бажання, а в спальні спить кохана обіймака.</p>
            <img src="/P1010036-COLLAGE.jpg" style="width: 100%">

        </div>
        <div class="col-md-3"></div>


    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <script>
        $(function () {
            var canvas = $('#canvas')[0];
            canvas.width = $(window).width();
            canvas.height = $(window).height();
            var ctx = canvas.getContext('2d');
            // init

            ctx.fillRect(0, 0, canvas.width, canvas.height);
            // objects
            var listFire = [];
            var listFirework = [];
            var fireNumber = 10;
            var center = {
                x: canvas.width / 2,
                y: canvas.height / 2
            };
            var range = 100;
            for (var i = 0; i < fireNumber; i++) {
                var fire = {
                    x: Math.random() * range / 2 - range / 4 + center.x,
                    y: Math.random() * range * 2 + canvas.height,
                    size: Math.random() + 0.5,
                    fill: '#fd1',
                    vx: Math.random() - 0.5,
                    vy: -(Math.random() + 4),
                    ax: Math.random() * 0.02 - 0.01,
                    far: Math.random() * range + (center.y - range)
                };
                fire.base = {
                    x: fire.x,
                    y: fire.y,
                    vx: fire.vx
                };
                //
                listFire.push(fire);
            }

            function randColor() {
                var r = Math.floor(Math.random() * 256);
                var g = Math.floor(Math.random() * 256);
                var b = Math.floor(Math.random() * 256);
                var color = 'rgb($r, $g, $b)';
                color = color.replace('$r', r);
                color = color.replace('$g', g);
                color = color.replace('$b', b);
                return color;
            }

            (function loop() {
                requestAnimationFrame(loop);
                update();
                draw();
            })();

            function update() {
                for (var i = 0; i < listFire.length; i++) {
                    var fire = listFire[i];
                    //
                    if (fire.y <= fire.far) {
                        // case add firework
                        var color = randColor();
                        for (var i = 0; i < fireNumber * 5; i++) {
                            var firework = {
                                x: fire.x,
                                y: fire.y,
                                size: Math.random() + 1.5,
                                fill: color,
                                vx: Math.random() * 5 - 2.5,
                                vy: Math.random() * -5 + 1.5,
                                ay: 0.05,
                                alpha: 1,
                                life: Math.round(Math.random() * range / 2) + range / 2
                            };
                            firework.base = {
                                life: firework.life,
                                size: firework.size
                            };
                            listFirework.push(firework);
                        }
                        // reset
                        fire.y = fire.base.y;
                        fire.x = fire.base.x;
                        fire.vx = fire.base.vx;
                        fire.ax = Math.random() * 0.02 - 0.01;
                    }
                    //
                    fire.x += fire.vx;
                    fire.y += fire.vy;
                    fire.vx += fire.ax;
                }
                for (var i = listFirework.length - 1; i >= 0; i--) {
                    var firework = listFirework[i];
                    if (firework) {
                        firework.x += firework.vx;
                        firework.y += firework.vy;
                        firework.vy += firework.ay;
                        firework.alpha = firework.life / firework.base.life;
                        firework.size = firework.alpha * firework.base.size;
                        firework.alpha = firework.alpha > 0.6 ? 1 : firework.alpha;
                        //
                        firework.life--;
                        if (firework.life <= 0) {
                            listFirework.splice(i, 1);
                        }
                    }
                }
            }

            function draw() {
                // clear
                ctx.globalCompositeOperation = 'source-over';
                ctx.globalAlpha = 0.18;
                ctx.fillStyle = '#000';
                ctx.fillRect(0, 0, canvas.width, canvas.height);
                // re-draw
                ctx.globalCompositeOperation = 'screen';
                ctx.globalAlpha = 1;
                for (var i = 0; i < listFire.length; i++) {
                    var fire = listFire[i];
                    ctx.beginPath();
                    ctx.arc(fire.x, fire.y, fire.size, 0, Math.PI * 2);
                    ctx.closePath();
                    ctx.fillStyle = fire.fill;
                    ctx.fill();
                }
                for (var i = 0; i < listFirework.length; i++) {
                    var firework = listFirework[i];
                    ctx.globalAlpha = firework.alpha;
                    ctx.beginPath();
                    ctx.arc(firework.x, firework.y, firework.size, 0, Math.PI * 2);
                    ctx.closePath();
                    ctx.fillStyle = firework.fill;
                    ctx.fill();
                }
            }
        })
    </script>

    </body>
    </html>


@endsection
