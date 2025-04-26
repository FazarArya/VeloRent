<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VeloRent</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="font-sans bg-gray-100">
    <!-- Hero Section -->
    <div class="h-screen bg-cover bg-center relative" style="background-image: url('/images/landingM4.jpg');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <nav class="top-0 left-0 right-0 flex items-center justify-between px-8 py-4 bg-transparent relative">
            <a class="flex items-center text-white font-bold text-lg" href="/">
                <img src="{{ asset('images/Logo VeloRent (1).png') }}" alt="VeloRent Logo" class="h-10">
            </a>
            <ul class="flex space-x-4">
                <li>
                    <a class="text-white hover:text-gray-300" href="#about" style="font-family: 'Poppins', sans-serif;">About</a>
                </li>
                <li>
                    <a class="text-white hover:text-gray-300" href="{{ route('login') }}" style="font-family: 'Poppins', sans-serif;">Login</a>
                </li>
                <li>
                    <a class="text-white hover:text-gray-300" href="{{ route('register') }}" style="font-family: 'Poppins', sans-serif;">Register</a>
                </li>
            </ul>
        </nav>
        <div class="flex items-center justify-center h-full text-center text-white relative">
            <div>
                <h1 class="text-7xl font-bold" style="font-family: 'Poppins', sans-serif; font-weight: bold;">VeloRent</h1>
                <p class="mt-2 text-lg" style="font-family: 'Poppins', sans-serif;">
                    Jelajahi Bandung dengan mudah bersama VeloRent! Sewa kendaraan nyaman, praktis, dan nikmati perjalanan tak terlupakan bersama orang tercinta.
                </p>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <div id="about" class="py-16 bg-black">
        <div class="container mx-auto px-8">
            <h1 class="text-4xl font-bold text-center mb-8 text-white" style="font-family: 'Poppins', sans-serif;">About VeloRent</h1>
            <p class="text-lg text-white mb-4 text-justify" style="font-family: 'Poppins', sans-serif;">
                VeloRent hadir sebagai solusi transportasi terpercaya untuk Anda di Kota Bandung. Kami adalah inovasi dalam dunia penyewaan kendaraan yang menghadirkan kemudahan dan kenyamanan dalam setiap perjalanan Anda. Melalui platform kami, Anda dapat dengan mudah menyewa berbagai jenis kendaraan, mulai dari sepeda motor hingga mobil, yang siap menemani aktivitas Anda.
            </p>
            <p class="text-lg text-white mb-4 text-justify" style="font-family: 'Poppins', sans-serif;">
                Kami memahami bahwa setiap perjalanan Anda memiliki arti penting. Oleh karena itu, VeloRent menawarkan sistem penyewaan yang fleksibel, praktis, dan dapat diandalkan kapan saja. Baik untuk kebutuhan harian, perjalanan bisnis, maupun liburan akhir pekan, kami menyediakan armada berkualitas dengan layanan terbaik untuk mendukung mobilitas Anda.
            </p>
            <p class="text-lg text-white text-justify" style="font-family: 'Poppins', sans-serif;">
                Bersama VeloRent, nikmati kebebasan menjelajahi Bandung tanpa batas. Karena bagi kami, setiap perjalanan Anda adalah prioritas utama kami.
            </p>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="py-16 bg-black">
        <div class="container mx-auto px-8">
            <h1 class="text-4xl font-bold text-center mb-8 text-white" style="font-family: 'Poppins', sans-serif;">Contact Us</h1>
            <h2 class="text-2xl font-semibold mb-3 text-white" style="font-family: 'Poppins', sans-serif;">Telkom University</h2>
            <p class="text-lg mb-3 text-white" style="font-family: 'Poppins', sans-serif;">
                Jl. Telekomunikasi No. 1, Bandung Terusan Buahbatu - Bojongsoang, Sukapura, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat 40257, Indonesia
            </p>
            <p class="text-lg text-white" style="font-family: 'Poppins', sans-serif;">Whatsapp: +62 811 1234 5678</p>
            <p class="text-lg text-white" style="font-family: 'Poppins', sans-serif;">
                <a href="mailto:velorent@gmail.com" class="text-blue-500">velorent@gmail.com</a>
            </p>
            <p class="text-lg text-white" style="font-family: 'Poppins', sans-serif;">
                <a href="https://www.velorent.com" class="text-blue-500">www.velorent.com</a>
            </p>
            <p class="text-center text-gray-600 mt-8" style="font-family: 'Poppins', sans-serif;">&copy; 2023 RJEP. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
