<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>IgniteFuture</title>
</head>

<body>
    <div class="flex ">
        <div class="bg-cornflower-blue-500 w-full h-16 px-12 py-4">
            <ul class="list-none flex gap-7 font-medium text-cornflower-blue-100">
                <li><a>Home</a></li>
                <li><a>Courses</a></li>
                <li><a>Quiz</a></li>
                <li><a>Ranking</a></li>
            </ul>
        </div>
    </div>

    @yield('main-content')

    <footer class="bg-cornflower-blue-500 pt-12 pb-3">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-6 gap-8 text-white">
                <!-- Brand Section -->
                <div class="col-span-2">
                    <h2 class="text-2xl font-bold">IgniteFuture</h2>
                    <p class="mt-4 text-sm">
                        Aliquam rhoncus ligula est, non pulvinar elit convallis nec. Donec mattis odio at.
                    </p>
                    <!-- Social Media Icons -->
                    <div class="flex space-x-4 mt-6">
                        <a href="#" class="text-white"><i class="fab fa-facebook-square fa-2x"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-instagram fa-2x"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-linkedin fa-2x"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-twitter fa-2x"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-youtube fa-2x"></i></a>
                    </div>
                </div>

                <!-- Top 4 Category -->
                <div>
                    <h3 class="font-bold">Top 4 Category</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#" class="hover:underline">Development</a></li>
                        <li><a href="#" class="hover:underline">Finance & Accounting</a></li>
                        <li><a href="#" class="hover:underline">Design</a></li>
                        <li><a href="#" class="hover:underline">Business</a></li>
                    </ul>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="font-bold">Quick Links</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#" class="hover:underline">About</a></li>
                        <li><a href="#" class="hover:underline">Become Instructor</a></li>
                        <li><a href="#" class="hover:underline">Contact</a></li>
                        <li><a href="#" class="hover:underline">Career</a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div>
                    <h3 class="font-bold">Support</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#" class="hover:underline">Help Center</a></li>
                        <li><a href="#" class="hover:underline">FAQs</a></li>
                        <li><a href="#" class="hover:underline">Terms & Conditions</a></li>
                        <li><a href="#" class="hover:underline">Privacy Policy</a></li>
                    </ul>
                </div>

                <!-- Download Our App -->
                <div>
                    <h3 class="font-bold">Download Our App</h3>
                    <div class="mt-4 space-y-4">
                        <a href="#" class="bg-black text-white py-2 px-4 inline-flex items-center rounded">
                            <i class="fab fa-apple mr-2"></i>
                            App Store
                        </a>
                        <a href="#" class="bg-black text-white py-2 px-4 inline-flex items-center rounded">
                            <i class="fab fa-google-play mr-2"></i>
                            Play Store
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex justify-center text-sm text-white pt-6 font-semibold">
                © 2024 - IgniteFuture. All rights reserved.
            </div>
        </div>
    </footer>

</body>

</html>
