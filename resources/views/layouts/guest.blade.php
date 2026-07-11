<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FlexKnee</title>

    <link rel="preconnect" href="https://fonts.bunny.net">

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased bg-[#F5F8FF]">

<div class="min-h-screen flex">

    <!-- KIRI -->
    <div class="hidden lg:flex lg:w-[55%] relative overflow-hidden">

        <!-- BACKGROUND -->
        <div class="absolute inset-0 bg-gradient-to-br from-[#123B7A] via-[#2456A5] to-[#4F7FDC]"></div>

        <!-- OVERLAY -->
        <div class="absolute inset-0 bg-gradient-to-r from-[#123B7A]/95 via-[#2456A5]/85 to-[#2456A5]/40"></div>

        <!-- DEKORASI -->
        <div class="absolute -top-56 -left-56 w-[700px] h-[700px] rounded-full bg-white/10"></div>

        <div class="absolute bottom-[-250px] left-[150px] w-[500px] h-[500px] rounded-full bg-white/5"></div>

        <div class="absolute top-24 right-24 w-48 h-48 rounded-full bg-cyan-300/10 blur-3xl"></div>

        <!-- CONTENT -->
        <div class="relative z-20 flex flex-col justify-center px-20 text-white">

            <h1 class="text-7xl font-black drop-shadow-2xl">

                Flex<span class="text-cyan-200">Squidin</span>

            </h1>

            <p class="mt-4 text-2xl text-blue-100 font-medium">

                Smart Squat Monitoring

            </p>


        </div>


        <!-- PEMISAH MELENGKUNG -->
        <div
            class="absolute right-[-170px] top-0 w-[340px] h-full bg-[#F5F8FF] rounded-l-[220px] z-30">
        </div>

    </div>

    <!-- KANAN -->
    <div class="w-full lg:w-[45%] flex items-center justify-center relative px-8">

        <!-- GLOW -->
        <div class="absolute top-20 right-10 w-64 h-64 rounded-full bg-blue-300/20 blur-3xl"></div>

        <div class="absolute bottom-20 left-10 w-40 h-40 rounded-full bg-indigo-300/20 blur-3xl"></div>

        <!-- LOGIN -->
        <div class="relative z-10 w-full max-w-md">

            <div
                class="bg-white/90 backdrop-blur-xl
                       rounded-[50px]
                       border border-white
                       p-10
                       shadow-[0_30px_80px_rgba(37,99,235,0.15)]">

                <!-- MOBILE -->
                <div class="lg:hidden text-center mb-8">

                    <h1 class="text-5xl font-black text-blue-700">

                        Flex<span class="text-indigo-500">Knee</span>

                    </h1>

                </div>


                {{ $slot }}

            </div>

        </div>

    </div>

</div>

</body>

</html>