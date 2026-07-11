<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>FlexSquidi</title>

    <style>
        body{
            font-family: 'Poppins', sans-serif;
        }
    </style>

</head>

<body class="bg-blue-100 overflow-x-hidden">

    <!-- ================= NAVBAR ================= -->

    <nav class="fixed top-0 left-0 w-full z-50 bg-white/80 backdrop-blur-md border-b border-gray-200">

        <div class="max-w-7xl mx-auto px-4 sm:px-8 py-5 flex justify-between items-center">

            <!-- Logo -->
            <div class="text-3xl font-bold">
                <span class="text-[#183B6B]">Flex</span>
                <span class="text-cyan-400">Squidi</span>
            </div>

            <!-- Menu -->
            <div class="hidden lg:flex gap-10 font-medium text-gray-700">

                <a href="#home" class="hover:text-blue-600 duration-300">
                    Home
                </a>

                <a href="#about" class="hover:text-blue-600 duration-300">
                    About
                </a>

                <a href="#contact" class="hover:text-blue-600 duration-300">
                    Contact
                </a>

            </div>

            
            <!-- Login & Sign Up -->
            <div class="flex items-center gap-4">

                <a href="login"
                    class="bg-[#183B6B] text-white px-7 py-3 rounded-full hover:bg-blue-700 duration-300 shadow-lg">
                    Login
                </a>

                <a href="register"
                    class="bg-[#183B6B] text-white px-7 py-3 rounded-full hover:bg-blue-700 duration-300 shadow-lg">
                    Sign Up
                </a>

            </div>

        </div>

    </nav>

    <!-- ================= HERO ================= -->
    <section  id="home" class="relative pt-32">

        <div class="max-w-7xl mx-auto px-8">

             <div class="grid lg:grid-cols-2 items-center min-h-[85vh]">

                <!-- KIRI -->
                <div>
                    <p class="uppercase tracking-[5px] text-yellow-500 font-semibold mb-6">

                        WELCOME TO FLEXSQUIDI

                    </p>

                    <h1 class="text-6xl font-black leading-tight text-[#183B6B]">

                        Tingkatkan
                        <br>
                        Performa Squat

                        <span class="text-cyan-400">

                        Anda

                        </span>

                    </h1>

                    <p class="text-gray-500 mt-8 leading-8 text-lg max-w-xl">

                    "Pantau setiap gerakan squat secara real-time dengan teknologi 
                    yang dirancang untuk membantu Anda berlatih lebih tepat, lebih aman, dan lebih efektif".

                    </p>

                    <div class="flex mt-8 mb-8">

                        <a href="login" class="bg-[#183B6B] text-white px-5 py-3 rounded-full tracking-wider font-semibold ">
                            Mulai Monitoring
                        </a>

                    </div>
                </div>

                <!-- KANAN -->

                <div class="relative flex justify-center">

                    <!-- FOTO -->
                    <div class="relative z-20">

                        <div class="w-[370px] h-[370px] rounded-full overflow-hidden border-[12px] border-yellow-300">

                            <img src="{{ asset('storage/website/lutut.jpg') }}"

                                class="w-full h-full object-cover">

                        </div>

                    </div>

                    <div class="absolute top-0 right-20 grid grid-cols-4 gap-3"> 
                    <div class="w-2 h-2 bg-blue-400 rounded-full"></div>
                    <div class="w-2 h-2 bg-cyan-400 rounded-full"></div>
                    <div class="w-2 h-2 bg-cyan-400 rounded-full"></div>
                    <div class="w-2 h-2 bg-cyan-400 rounded-full"></div>
                    <div class="w-2 h-2 bg-cyan-400 rounded-full"></div>
                    <div class="w-2 h-2 bg-cyan-400 rounded-full"></div>
                    <div class="w-2 h-2 bg-cyan-400 rounded-full"></div>
                    <div class="w-2 h-2 bg-cyan-400 rounded-full"></div>

            </div>

        </div>
    </section>
                
    <!-- ================= ABOUT ================= -->

    <section id="about" class="py-28 bg-blue-50">

        <div class="max-w-6xl mx-auto px-8">

            <!-- Heading -->

            <div class="text-center">

                <span class="px-5 py-2 rounded-full bg-yellow-100 text-blue-700 font-semibold">
                    About FlexSquidi
                </span>

                <h2 class="mt-6 text-5xl font-black text-blue-900">
                    Squat Monitoring System
                </h2>

            </div>

            <!-- Card -->

            <div class="mt-14 bg-white rounded-[35px] shadow-xl border border-yellow-500 px-10 py-14">

                <p class="text-center text-lg leading-10 text-gray-600 max-w-4xl mx-auto">

                    FlexSquidi merupakan sistem monitoring gerakan squat berbasis Internet of Things
                    yang memanfaatkan sensor MPU6050,ESP32,dan MQTT 
                    untuk memantau sudut lutut secara realtime melalui dashboard web.
                    Sistem ini membantu pengguna mengevaluasi teknik squat dengan
                    lebih mudah, cepat, dan akurat.

                </p>

                <!-- Technology -->

                <div class="grid md:grid-cols-3 gap-6 mt-14">

                    <!-- ESP32 -->

                    <div class="rounded-2xl border border-blue-100 bg-blue-50 p-6 text-center hover:-translate-y-2 hover:shadow-lg transition">
                        <div class="text-4xl">💻</div>

                        <h3 class="mt-4 text-xl font-bold text-purple-900">

                            ESP32

                        </h3>

                        <p class="mt-3 text-gray-600 text-sm">

                            Mikrokontroler utama yang mengirim data sensor secara realtime.

                        </p>

                    </div>

                    <!-- MPU6050 -->
                    <div class="rounded-2xl border border-blue-100 bg-blue-50 p-6 text-center transition hover:-translate-y-2 hover:shadow-lg">

                        <div class="text-4xl">📐</div>

                        <h3 class="mt-4 text-xl font-bold text-purple-900">

                            MPU6050

                        </h3>

                        <p class="mt-3 text-gray-600 text-sm">

                            Sensor accelerometer untuk membaca sudut lutut.

                        </p>

                    </div>

                    <!-- MQTT -->
                    <div class="rounded-2xl border border-blue-100 bg-blue-50 p-6 text-center transition hover:-translate-y-2 hover:shadow-lg">

                        <div class="text-4xl">☁️</div>

                        <h3 class="mt-4 text-xl font-bold text-purple-900">

                            MQTT

                        </h3>

                        <p class="mt-3 text-gray-600 text-sm">

                            Protokol komunikasi ringan untuk transfer data realtime.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- ================= FOOTER ================= -->
    <footer id="contact" class="relative overflow-hidden bg-[#183B6B] text-white">

        <div class="max-7xl  px-10 py-3">

            <!-- 3 Kolom -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 md:gap-8 pt-2">

                <!-- Brand -->
                <div>

                    <h2 class="text-3xl font-black">
                        Flex<span class="text-cyan-300">Squidi</span>
                    </h2>

                </div>

                <!-- Contact -->
                <div>

                    <h3 class="text-2xl font-semibold mb-6">

                        Contact

                    </h3>

                    <div class="space-y-4 text-blue-100 text-sm">

                        <p>📧 andinidwiputri753@gmail.com</p>

                        <p>📞 +62 896-5350-9964</p>

                        <p>📍 Padang, Sumatera Barat</p>

                    </div>

                </div>

                <!-- Follow -->
                <div>

                    <h3 class="text-2xl font-semibold mb-6">

                        Follow Us

                    </h3>

                    <div class="space-y-4 text-blue-100 text-sm">

                        <p>instagram: @andinidwptr</p>

                        <p>github: github.com/andinidwiputri</p>

                    </div>

                </div>

            </div>

            <!-- Garis -->
            <div class="border-t border-white/20 mt-6 pt-4">

                <p class="text-center text-blue-100 text-sm">

                    © {{ date('Y') }} FlexSquidi. All Rights Reserved.

                </p>

            </div>

        </div>

    </footer>

</body>
</html>