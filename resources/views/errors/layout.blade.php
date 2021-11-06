<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="/img/core-img/favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('message')</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Baloo" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fafaf8;
                color: #487717;
                font-family: 'Baloo', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                line-height: 1;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
                position: relative;
                margin-bottom: 29%;
            }

            .title {
                font-size: 20px;
                padding: 8px;
            }
            img {
                height: 100%;
                width: auto;
                position: absolute;
            }

            .text-5xl {
                font-size: 3rem;
            }

            .md\:text-15xl {
                font-size: 6rem;
                line-height: 0.7;
            }

            .font-light {
                font-weight: 300;
            }

            .font-black {
                font-weight: 900;
            }

            .text-2xl {
                font-size: 1.5rem;
            }

            .md\:text-3xl {
                font-size: 2.2rem;
            }

            @media only screen and (max-width: 499px) {
                img {
                    height: auto;
                    width: 100%;
                }
                .content {
                    margin-bottom: 70%;
                }
                .md\:text-3xl {
                    font-size: 1.5rem;
                }
                .md\:text-15xl {
                    font-size: 4rem;
                    line-height: 0.7;
                }
                .title {
                    font-size: 18px;
                    padding: 5px;
                }
            }

            @media only screen and (min-width: 500px) and (max-width: 999px) {
                img {
                    height: auto;
                    width: 100%;
                }

                .content {
                    margin-bottom: 50%;
                }
            }

            @media only screen and (min-width: 1000px) and (min-height: 1300px) {
                img {
                    height: auto;
                    width: 100%;
                }

                .content {
                    margin-bottom: 60%;
                }

                .md\:text-15xl {
                    font-size: 9rem;
                }

                .md\:text-3xl {
                    font-size: 3.2rem;
                }

                .title {
                    font-size: 36px;
                    padding: 16px;
                }
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <img src="/img/core-img/error10.png">
            <div class="content">
                <div class="text-5xl md:text-15xl font-black">
                    @yield('code', __('Oh no'))
                </div>
                <div class="text-2xl md:text-3xl font-light">
                    @yield('title')
                </div>
                <div class="title">
                    @yield('message')
                </div>
            </div>
        </div>
    </body>
</html>
