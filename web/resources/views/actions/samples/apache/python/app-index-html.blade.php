<!DOCTYPE html>
<html>
<head>
    <title>Che Panel - Passenger Python Flask App </title>

    <style>

        body {
            font-family: Nunito, sans-serif;
        }

        :root {
            --foreground-rgb: 0, 0, 0;
            --background-start-rgb: 214, 219, 220;
            --background-end-rgb: 255, 255, 255;
        }

        @media (prefers-color-scheme: dark) {
            :root {
                --foreground-rgb: 255, 255, 255;
                --background-start-rgb: 0, 0, 0;
                --background-end-rgb: 0, 0, 0;
            }
        }

        body {
            color: rgb(var(--foreground-rgb));
            background: linear-gradient(
                to bottom,
                transparent,
                rgb(var(--background-end-rgb))
            )
            rgb(var(--background-start-rgb));
        }

        @layer utilities {
            .text-balance {
                text-wrap: balance;
            }
        }

    </style>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">

    <script src="//cdn.tailwindcss.com"></script>

</head>
<body>


<main class="flex min-h-screen flex-col items-center justify-between p-24">
    <div class="z-10 max-w-5xl w-full items-center justify-between font-mono text-sm lg:flex"><p
            class="fixed left-0 top-0 flex w-full justify-center border-b border-gray-300 bg-gradient-to-b from-zinc-200 pb-6 pt-8 backdrop-blur-2xl dark:border-neutral-800 dark:bg-zinc-800/30 dark:from-inherit lg:static lg:w-auto  lg:rounded-xl lg:border lg:bg-gray-200 lg:p-4 lg:dark:bg-zinc-800/30">
            Get started by editing&nbsp;<code class="font-mono font-bold">public_html/app.py</code></p>
        <div
            class="fixed bottom-0 left-0 flex h-48 w-full items-end justify-center bg-gradient-to-t from-white via-white dark:from-black dark:via-black lg:static lg:h-auto lg:w-auto lg:bg-none">
            <a class="pointer-events-none flex place-items-center gap-2 p-8 lg:pointer-events-auto lg:p-0"
               href=""
               target="_blank" rel="noopener noreferrer">By ATSiCorporation.</a></div>
    </div>
    <div
        class="relative flex place-items-center before:absolute before:h-[300px] before:w-full sm:before:w-[480px] before:-translate-x-1/2 before:rounded-full before:bg-gradient-radial before:from-white before:to-transparent before:blur-2xl before:content-[''] after:absolute after:-z-20 after:h-[180px] after:w-full sm:after:w-[240px] after:translate-x-1/3 after:bg-gradient-conic after:from-sky-200 after:via-blue-200 after:blur-2xl after:content-[''] before:dark:bg-gradient-to-br before:dark:from-transparent before:dark:to-blue-700 before:dark:opacity-10 after:dark:from-sky-900 after:dark:via-[#0141ff] after:dark:opacity-40 before:lg:h-[360px] z-[-1]">


        <svg class="relative dark:drop-shadow-[0_0_0.3rem_#ffffff70] dark:invert" style="width:350px;" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 808.52 192.65">
            <defs>
                <style>
                    .cls-1 {
                        fill: url(#linear-gradient-12);
                    }

                    .cls-1, .cls-2, .cls-3, .cls-4, .cls-5, .cls-6, .cls-7, .cls-8, .cls-9, .cls-10, .cls-11, .cls-12, .cls-13 {
                        stroke-width: 0px;
                    }

                    .cls-2 {
                        fill: url(#linear-gradient);
                    }

                    .cls-3 {
                        fill: url(#linear-gradient-6);
                    }

                    .cls-4 {
                        fill: url(#linear-gradient-11);
                    }

                    .cls-5 {
                        fill: url(#linear-gradient-5);
                    }

                    .cls-6 {
                        fill: #f9be22;
                    }

                    .cls-7 {
                        fill: url(#linear-gradient-2);
                    }

                    .cls-8 {
                        fill: url(#linear-gradient-7);
                    }

                    .cls-9 {
                        fill: url(#linear-gradient-3);
                    }

                    .cls-10 {
                        fill: url(#linear-gradient-9);
                    }

                    .cls-11 {
                        fill: url(#linear-gradient-8);
                    }

                    .cls-12 {
                        fill: url(#linear-gradient-10);
                    }

                    .cls-13 {
                        fill: url(#linear-gradient-4);
                    }
                </style>
                <linearGradient id="linear-gradient" x1="5.89" y1="67.83" x2="786.82" y2="71" gradientUnits="userSpaceOnUse">
                    <stop offset=".25" stop-color="#f8bd20"/>
                    <stop offset=".41" stop-color="#f9c628"/>
                    <stop offset=".69" stop-color="#fbd131"/>
                    <stop offset="1" stop-color="#fcd535"/>
                </linearGradient>
                <linearGradient id="linear-gradient-2" x1="694.68" y1="13.95" x2="808.52" y2="13.95" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#f8bd20"/>
                    <stop offset=".63" stop-color="#fcd535"/>
                </linearGradient>
                <linearGradient id="linear-gradient-3" x1="642.49" y1="69.62" x2="785.47" y2="69.62" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#f8bd20" stop-opacity=".9"/>
                    <stop offset=".15" stop-color="rgba(249, 197, 39, .94)" stop-opacity=".94"/>
                    <stop offset=".37" stop-color="rgba(250, 206, 47, .97)" stop-opacity=".97"/>
                    <stop offset=".63" stop-color="rgba(251, 211, 51, .99)" stop-opacity=".99"/>
                    <stop offset="1" stop-color="#fcd535"/>
                </linearGradient>
                <linearGradient id="linear-gradient-4" x1="647.99" y1="69.56" x2="785.96" y2="69.56" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#f8bd20"/>
                    <stop offset=".63" stop-color="#fcd535"/>
                </linearGradient>
                <linearGradient id="linear-gradient-5" x1="161.7" y1="69.56" x2="212.2" y2="69.56" gradientUnits="userSpaceOnUse">
                    <stop offset=".45" stop-color="#f8bd20"/>
                    <stop offset=".54" stop-color="#f9c326"/>
                    <stop offset=".78" stop-color="#fbd031"/>
                    <stop offset="1" stop-color="#fcd535"/>
                </linearGradient>
                <linearGradient id="linear-gradient-6" x1="-14.8" y1="68.54" x2="812.93" y2="71.9" gradientUnits="userSpaceOnUse">
                    <stop offset=".23" stop-color="#f8bd20"/>
                    <stop offset=".23" stop-color="#f8bd20"/>
                    <stop offset=".4" stop-color="#faca2c"/>
                    <stop offset=".6" stop-color="#fbd232"/>
                    <stop offset="1" stop-color="#fcd535"/>
                </linearGradient>
                <linearGradient id="linear-gradient-7" x1="19.43" y1="68.42" x2="756.99" y2="71.42" xlink:href="#linear-gradient-6"/>
                <linearGradient id="linear-gradient-8" x1="-12.06" y1="69.99" x2="808.02" y2="73.32" xlink:href="#linear-gradient-6"/>
                <linearGradient id="linear-gradient-9" x1="0" y1="69.56" x2="54.12" y2="69.56" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#f8bd20"/>
                    <stop offset=".21" stop-color="#f9c628"/>
                    <stop offset=".58" stop-color="#fbd131"/>
                    <stop offset="1" stop-color="#fcd535"/>
                </linearGradient>
                <linearGradient id="linear-gradient-10" x1="-24.07" y1="41.56" x2="837.97" y2="45.06" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#f8bd20"/>
                    <stop offset=".07" stop-color="#f9c628"/>
                    <stop offset=".2" stop-color="#fbd131"/>
                    <stop offset=".34" stop-color="#fcd535"/>
                </linearGradient>
                <linearGradient id="linear-gradient-11" x1="485.03" y1="69.56" x2="538.44" y2="69.56" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#f8bd20"/>
                    <stop offset=".21" stop-color="#f9c628"/>
                    <stop offset=".58" stop-color="#fbd131"/>
                    <stop offset="1" stop-color="#fcd535"/>
                </linearGradient>
                <linearGradient id="linear-gradient-12" x1="521.21" y1="69.56" x2="642.79" y2="69.56" xlink:href="#linear-gradient-11"/>
            </defs>
            <g>
                <path class="cls-6" d="M383.66,189.79l.87-4.15c.31-1.47-.81-2.86-2.32-2.86h-10.04c-1.12,0-2.08.78-2.32,1.87l-1.31,6.12c-.23,1.09-1.2,1.87-2.32,1.87h0c-1.51,0-2.63-1.39-2.32-2.86l4.22-19.87c.23-1.09,1.2-1.88,2.32-1.88h0c1.51,0,2.63,1.39,2.32,2.86l-.88,4.17c-.31,1.47.81,2.86,2.32,2.86h10.04c1.12,0,2.08-.78,2.32-1.87l1.32-6.14c.23-1.09,1.2-1.87,2.32-1.87h0c1.51,0,2.63,1.39,2.32,2.86l-4.22,19.87c-.23,1.09-1.2,1.88-2.32,1.88h0c-1.51,0-2.63-1.39-2.32-2.86Z"/>
                <path class="cls-6" d="M416.74,192.65h-11c-1.72,0-3.35-.79-4.41-2.14h0c-1.03-1.31-1.42-3-1.08-4.62l2.37-11.23c.33-1.56,1.18-2.96,2.41-3.97l.86-.7c1.53-1.25,3.45-1.94,5.43-1.94h10.39c1.72,0,3.35.79,4.41,2.14h0c1.03,1.31,1.42,3,1.08,4.62l-2.37,11.19c-.34,1.59-1.2,3.01-2.45,4.04l-1.27,1.04c-1.23,1.01-2.78,1.57-4.38,1.57ZM419.35,172.9h-8.48c-1.77,0-3.3,1.24-3.66,2.97l-1.7,7.97c-.43,2.03,1.12,3.95,3.2,3.95h7.89c1.76,0,3.28-1.23,3.64-2.95l1.83-8.58c.37-1.73-.95-3.35-2.72-3.35Z"/>
                <path class="cls-6" d="M450.21,192.65h-13.09c-1.44,0-2.52-1.33-2.22-2.74l.07-.32c.22-1.05,1.15-1.8,2.22-1.8h14.24c1.27,0,2.51-.44,3.49-1.25h0c.35-.29.59-.68.69-1.12h0c.14-.6,0-1.22-.38-1.71l-.04-.05c-.43-.55-1.09-.88-1.79-.88h-10.13c-1.67,0-2.95-.63-3.99-1.94h0c-1.07-1.36-1.12-3.12-1.09-4.97l.07-1.88c0-.68.15-1.66.56-2.43.48-.92.95-1.56,2.87-2.8h0c1.32-.83,3.78-.72,6.91-.72h12.75c1.44,0,2.52,1.33,2.22,2.74l-.07.32c-.22,1.05-1.15,1.8-2.22,1.8h-14.3c-1.25,0-2.46.43-3.43,1.22h0c-.36.3-.61.7-.7,1.16h0c-.12.59.02,1.2.39,1.67h0c.48.61,1.21.97,1.99.97h10.37c1.41,0,2.74.64,3.61,1.75h0c1.23,1.56,1.71,3.59,1.29,5.53l-.25,1.19c-.28,1.33-1.01,2.52-2.05,3.38h0c-2.26,1.86-5.09,2.87-8.01,2.87Z"/>
                <path class="cls-6" d="M488.37,174.78l-3.4,16c-.23,1.09-1.2,1.88-2.32,1.88h0c-1.51,0-2.63-1.39-2.32-2.86l2.98-14.03c.31-1.47-.81-2.86-2.32-2.86h-4.04c-1.51,0-2.63-1.39-2.32-2.86l.03-.12c.23-1.1,1.2-1.88,2.32-1.88h19.77c1.51,0,2.63,1.39,2.32,2.86l-.03.12c-.23,1.1-1.2,1.88-2.32,1.88h-6.04c-1.12,0-2.08.78-2.32,1.88Z"/>
                <path class="cls-6" d="M505.5,189.68l4.2-19.69c.24-1.14,1.25-1.95,2.41-1.95h0c1.57,0,2.73,1.44,2.41,2.97l-4.2,19.69c-.24,1.14-1.25,1.95-2.41,1.95h0c-1.57,0-2.73-1.44-2.41-2.97Z"/>
                <path class="cls-6" d="M539.69,191.61l-9.6-14.15c-.48-.7-1.56-.49-1.74.34l-2.76,12.97c-.23,1.09-1.2,1.88-2.32,1.88h0c-1.51,0-2.63-1.39-2.32-2.86l4.13-19.43c.29-1.35,1.48-2.31,2.86-2.31h.53c1.06,0,2.06.53,2.65,1.41l9.51,14.05c.41.6,1.34.42,1.49-.29l2.83-13.29c.23-1.09,1.2-1.88,2.32-1.88h0c1.51,0,2.63,1.39,2.32,2.86l-4.22,19.87c-.23,1.09-1.2,1.88-2.32,1.88h-1.4c-.79,0-1.52-.39-1.96-1.04Z"/>
                <path class="cls-6" d="M573.43,192.64l-10.43.02c-1.83,0-3.56-.83-4.7-2.27l-.04-.05c-.95-1.2-1.31-2.74-.99-4.22l2.41-11.39c.34-1.6,1.21-3.04,2.48-4.08l1.22-1c1.26-1.04,2.85-1.6,4.48-1.6h10.94c1.72,0,3.34.79,4.4,2.14h0c1.02,1.3,1.42,2.99,1.08,4.62-.05.26-.11.51-.16.74-.16.75-.82,1.29-1.6,1.29h-1.49c-1.03,0-1.8-.96-1.59-1.97h0c.21-1.01-.55-1.96-1.59-1.96-3.11,0-9,0-11.62,0-.77,0-1.43.54-1.59,1.29l-2.46,11.65c-.21,1.01.56,1.97,1.6,1.97h11.59c.77,0,1.44-.54,1.6-1.29l.37-1.76c.21-1.01-.56-1.97-1.6-1.97h-5.86c-1.04,0-1.81-.96-1.59-1.97l.34-1.6c.16-.75.83-1.29,1.59-1.29h6.15c1.9,0,3.7.87,4.88,2.36l.15.19c.84,1.05,1.16,2.43.88,3.74l-.55,2.61c-.22,1.05-.8,1.99-1.63,2.67l-1.62,1.33c-1.42,1.17-3.21,1.81-5.05,1.81Z"/>
                <path class="cls-6" d="M629.48,182.79h-10.75c-1.12,0-2.08.78-2.32,1.87l-1.31,6.12c-.23,1.09-1.2,1.87-2.32,1.87h0c-1.51,0-2.63-1.39-2.32-2.86l4.22-19.87c.23-1.09,1.2-1.88,2.32-1.88h15.74c1.73,0,3.37.8,4.44,2.16h0c1.02,1.3,1.41,2.98,1.07,4.59l-.43,2.02c-.24,1.13-.85,2.15-1.75,2.89l-1.51,1.25c-1.43,1.19-3.23,1.83-5.09,1.83ZM631.75,172.9h-11.58c-.73,0-1.35.51-1.51,1.22l-.4,1.88c-.21.99.55,1.92,1.56,1.92h11.52c.82,0,1.54-.58,1.71-1.38l.34-1.6c.23-1.05-.57-2.04-1.65-2.04Z"/>
                <path class="cls-6" d="M665.75,189.79l.89-4.18c.31-1.47-.81-2.86-2.32-2.86h-10.07c-1.12,0-2.08.78-2.32,1.87l-1.32,6.15c-.23,1.1-1.21,1.88-2.33,1.87h-.02c-1.5,0-2.62-1.39-2.31-2.86l3.11-14.63c.4-1.88,1.43-3.57,2.92-4.79l.53-.43c1.5-1.22,3.37-1.89,5.3-1.89h10.74c1.55,0,3.01.71,3.97,1.93h0c1.13,1.45,1.57,3.32,1.19,5.11l-3.33,15.69c-.23,1.09-1.2,1.88-2.32,1.88h0c-1.51,0-2.63-1.39-2.32-2.86ZM667.11,172.9h-11.14c-.9,0-1.67.63-1.86,1.5l-.32,1.52c-.22,1.03.57,2,1.62,2h11.64c.71,0,1.33-.5,1.48-1.19l.35-1.64c.24-1.13-.61-2.19-1.77-2.19Z"/>
                <path class="cls-6" d="M700.08,191.39l-9.28-13.69c-.54-.79-1.76-.55-1.96.38l-2.7,12.69c-.23,1.09-1.2,1.88-2.32,1.88h0c-1.51,0-2.63-1.39-2.32-2.86l4.16-19.56c.27-1.28,1.4-2.19,2.71-2.19h.51c1.15,0,2.23.57,2.88,1.53l9.3,13.74c.45.67,1.49.47,1.66-.32l2.78-13.07c.23-1.09,1.2-1.88,2.32-1.88h0c1.51,0,2.63,1.39,2.32,2.86l-4.12,19.37c-.29,1.39-1.52,2.38-2.94,2.38h-.62c-.95,0-1.84-.47-2.37-1.26Z"/>
                <path class="cls-6" d="M717.03,189.71l4.2-19.75c.24-1.12,1.23-1.92,2.38-1.92h19.64c1.54,0,2.7,1.42,2.38,2.93h0c-.24,1.12-1.23,1.93-2.38,1.93h-15.81c-1.15,0-2.14.8-2.38,1.92l-.03.16c-.32,1.51.83,2.94,2.38,2.94h9.8c1.54,0,2.7,1.42,2.38,2.93h0c-.24,1.12-1.23,1.93-2.38,1.93h-11.87c-1.14,0-2.13.8-2.37,1.92l-.03.14c-.33,1.51.83,2.95,2.37,2.95h13.75c1.54,0,2.7,1.42,2.38,2.93h0c-.24,1.12-1.23,1.93-2.38,1.93h-19.64c-1.55,0-2.7-1.42-2.38-2.94Z"/>
                <path class="cls-6" d="M752.53,189.67l4.22-19.85c.23-1.1,1.2-1.88,2.33-1.88h0c1.51,0,2.64,1.39,2.33,2.87l-2.99,14c-.32,1.48.81,2.87,2.33,2.87h13.78c1.57,0,2.74,1.44,2.41,2.97h0c-.09.41-.14.86-.42,1.18-.76.87-1.78.71-3.38.71h-12.75c-2.1,0-2.93.07-5.76.01-1.58-.03-2.19-.74-2.09-2.89Z"/>
            </g>
            <path class="cls-2" d="M428.17,83.3h-2.67c-6.07,0-11.32,4.24-12.59,10.18l-7.54,35.19c-1.27,5.94-6.52,10.18-12.59,10.18h-.87c-8.18,0-14.28-7.52-12.6-15.52l4.96-23.63c1.77-8.45-4.67-16.4-13.31-16.4h0c-9.55,0-18.57-4.38-24.47-11.89l-.06-.08c-5.89-7.49-8.16-17.22-6.17-26.54l7.29-34.33c1.26-5.95,6.52-10.2,12.6-10.2h.87c8.18,0,14.28,7.52,12.6,15.52l-5.17,24.62c-.77,3.69.11,7.53,2.41,10.51h0c2.44,3.16,6.21,5.01,10.2,5.01h50.24c5.4,0,10.62-1.9,14.76-5.38h0c3.4-2.85,5.74-6.76,6.66-11.1l6.16-28.99c1.26-5.95,6.52-10.2,12.6-10.2h.95c8.19,0,14.3,7.54,12.6,15.55l-5.43,25.56c-2.5,11.74-8.89,22.3-18.14,29.95h0c-9.36,7.74-21.12,11.98-33.26,11.98Z"/>
            <path class="cls-7" d="M808.22,16.77h0c1.79-8.51-4.7-16.51-13.39-16.51h-94.61s-5.53,27.37-5.53,27.37h100.15c6.47,0,12.06-4.53,13.39-10.86Z"/>
            <path class="cls-9" d="M774.88,72.44h0c1.79-8.51-4.7-16.51-13.39-16.51h-72.87l-5.77,27.37h78.64c6.47,0,12.06-4.53,13.39-10.86Z"/>
            <path class="cls-13" d="M677.87,111.48l6.11-28.18h0l6.01-28.49h.05s5.78-27.18,5.78-27.18l5.79-27.03c.04-.18-.1-.34-.27-.34h-5.32c-12.69,0-23.65,8.88-26.29,21.29l-21.42,100.78c-1.81,8.51,4.68,16.53,13.39,16.53h110.59c6.47,0,12.06-4.53,13.39-10.86h0c1.79-8.51-4.7-16.51-13.39-16.51h-94.4Z"/>
            <path class="cls-5" d="M203.58,55.93l8.32-39.57c1.75-8.3-4.59-16.1-13.06-16.1h0c-6.3,0-11.75,4.41-13.06,10.58l-23.78,111.89c-1.77,8.31,4.57,16.13,13.06,16.13h0c6.29,0,11.73-4.4,13.05-10.55l9.66-45.01h0l5.82-27.37h0Z"/>
            <polygon class="cls-3" points="203.58 55.87 197.77 83.24 282.37 83.3 288.17 55.93 203.58 55.87"/>
            <path class="cls-8" d="M311.44.26c-6.29,0-11.73,4.4-13.05,10.55l-9.59,44.73h0l-6.55,30.92h-.03s-7.64,36.29-7.64,36.29c-1.75,8.3,4.58,16.1,13.06,16.1h.01c6.3,0,11.75-4.41,13.06-10.57l23.78-111.9c1.77-8.3-4.57-16.12-13.06-16.12h0Z"/>
            <polygon class="cls-11" points="288.73 55.94 288.7 55.93 288.7 55.93 288.17 55.93 282.37 83.3 282.88 83.3 282.22 86.46 282.25 86.47 288.73 55.94"/>
            <path class="cls-10" d="M21.82,21.46L.3,122.73c-1.77,8.31,4.57,16.13,13.06,16.13h0c6.29,0,11.73-4.4,13.05-10.55l9.66-45.01-.02.12,5.84-27.49,6.01-28.3h0L54.12.26h-6.12c-12.64,0-23.55,8.84-26.18,21.2Z"/>
            <path class="cls-12" d="M111.53,0l-57.79.26-5.95,27.37h66.44c9.04,0,15.77,8.34,13.87,17.18h0c-1.4,6.5-7.12,11.16-13.77,11.2l-72.69.53-5.73,27.37,69.83-.49c11.47-.08,24.22-2.55,33.06-9.86h0c6.97-5.77,14.29-13.29,16.46-31.62h0c-.56-20.89-7.73-28.5-7.73-28.5h0S140.06,1,111.53,0Z"/>
            <path class="cls-4" d="M506.81,21.58l-21.48,101.08c-1.77,8.34,4.59,16.2,13.12,16.2h0c6.32,0,11.78-4.41,13.11-10.59l9.65-44.96h.02l5.71-27.37h0l5.96-28.17,5.55-27.42s-.02-.08-.07-.08h-5.23c-12.71,0-23.69,8.89-26.33,21.32Z"/>
            <path class="cls-1" d="M636.82,13.71l-2.27-2.89c-5.24-6.67-13.25-10.57-21.73-10.57h-74.36l-5.55,27.37h78.11c3.05,0,5.35,2.78,4.77,5.78h0c-.21,1.11-.81,2.11-1.68,2.82l-16.44,13.56c-4.81,3.96-10.84,6.13-17.07,6.13h-53.68l-5.72,27.37h51.65c7.31,0,14.23,3.35,18.76,9.09l1.28,1.62c4.97,6.29,6.86,14.46,5.18,22.29l-1.48,6.87c-1.74,8.07,4.41,15.68,12.66,15.68h0c6.55,0,12.2-4.58,13.56-10.99l5.11-24.08c1.74-8.21-.24-16.77-5.42-23.38l-5.33-6.81c-1.76-2.25-1.41-5.48.79-7.3l14.59-12.04c4.67-3.85,7.88-9.18,9.12-15.1l.52-2.49c1.68-8.07-.28-16.47-5.38-22.95Z"/>
        </svg>


    </div>
    <div class="mb-32 grid text-center lg:max-w-5xl lg:w-full lg:mb-0 lg:grid-cols-4 lg:text-left"><a
            href=""
            class="group rounded-lg border border-transparent px-5 py-4 transition-colors hover:border-gray-300 hover:bg-gray-100 hover:dark:border-neutral-700 hover:dark:bg-neutral-800/30"
            target="_blank" rel="noopener noreferrer"><h2 class="mb-3 text-2xl font-semibold">Docs<!-- --> <span
                    class="inline-block transition-transform group-hover:translate-x-1 motion-reduce:transform-none">-&gt;</span>
            </h2>
            <p class="m-0 max-w-[30ch] text-sm opacity-50">Find in-depth information about Che Panel features and API.</p>
        </a><a
            href=""
            class="group rounded-lg border border-transparent px-5 py-4 transition-colors hover:border-gray-300 hover:bg-gray-100 hover:dark:border-neutral-700 hover:dark:bg-neutral-800 hover:dark:bg-opacity-30"
            target="_blank" rel="noopener noreferrer"><h2 class="mb-3 text-2xl font-semibold">Learn<!-- --> <span
                    class="inline-block transition-transform group-hover:translate-x-1 motion-reduce:transform-none">-&gt;</span>
            </h2>
            <p class="m-0 max-w-[30ch] text-sm opacity-50">Learn about Che Panel in an interactive course with&nbsp;quizzes!</p>
        </a><a
            href=""
            class="group rounded-lg border border-transparent px-5 py-4 transition-colors hover:border-gray-300 hover:bg-gray-100 hover:dark:border-neutral-700 hover:dark:bg-neutral-800/30"
            target="_blank" rel="noopener noreferrer"><h2 class="mb-3 text-2xl font-semibold">Templates<!-- --> <span
                    class="inline-block transition-transform group-hover:translate-x-1 motion-reduce:transform-none">-&gt;</span>
            </h2>
            <p class="m-0 max-w-[30ch] text-sm opacity-50">Explore starter templates for Che.</p></a><a
            href=""
            class="group rounded-lg border border-transparent px-5 py-4 transition-colors hover:border-gray-300 hover:bg-gray-100 hover:dark:border-neutral-700 hover:dark:bg-neutral-800/30"
            target="_blank" rel="noopener noreferrer"><h2 class="mb-3 text-2xl font-semibold">Deploy<!-- --> <span
                    class="inline-block transition-transform group-hover:translate-x-1 motion-reduce:transform-none">-&gt;</span>
            </h2>
            <p class="m-0 max-w-[30ch] text-sm opacity-50 text-balance">
                Instantly deploy your Python Flask site to a shareable URL with Che.
            </p>
        </a>
    </div>
</main>

</body>
</html>
