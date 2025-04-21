<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Connectez-vous à votre compte pour gérer vos rendez-vous médicaux, consulter les disponibilités des professionnels et accéder à vos informations personnelles.">
    <title>Sign In</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex flex-col min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="#" class="text-xl font-bold text-gray-800">MediCare</a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#" class="text-gray-600 hover:text-gray-900">Home</a>
                    <a href="#" class="text-gray-600 hover:text-gray-900">Doctors</a>
                    <a href="#" class="text-gray-600 hover:text-gray-900">Services</a>
                    <a href="#" class="text-gray-600 hover:text-gray-900">About</a>
                    <a href="#" class="text-gray-600 hover:text-gray-900">Contact</a>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('login') }}" class="px-4 py-2 rounded-md text-white bg-black hover:bg-gray-800 transition duration-300">Sign In</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center p-4 md:bg-[url('/images/360_F_424309320_UkOxg2z3sq7yXwGnWCO6xBXkRI4byhnI.jpg')] bg-cover bg-center">
        <div
            class="bg-white p-6 md:p-8 rounded-2xl shadow-lg flex flex-col md:flex-row items-center gap-8 w-full max-w-4xl border border-gray-100">
            <!-- Image -->
            <div class="hidden md:block w-full md:w-1/2">
                <img src="{{ asset('images/daily-031015-x.jpg.webp') }}" alt="Doctor"
                    class="w-full h-auto rounded-xl object-cover max-h-[500px] shadow-md">
            </div>

            <!-- Form -->
            <div class="w-full md:w-1/2 px-0 md:px-4">
                <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Sign in</h2>

                <form class="space-y-4" method="post" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="email" placeholder="   Email" name="email"
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" id="password" placeholder="  password" name="password"
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white">
                    </div>

                    <button type="submit"
                        class="w-full bg-black text-white py-3 rounded-xl hover:bg-gray-800 transition duration-300 font-medium mt-2 shadow-md">
                        Continue
                    </button>

                    <p class="text-center text-sm text-gray-600 mt-4">
                        You don't have an account?
                        <a href="#" class="font-semibold text-blue-600 hover:underline ml-1">Sign up</a>
                    </p>
                </form>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">MediCare</h3>
                    <p class="text-gray-400">Providing quality healthcare services with compassion and excellence.</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Services</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Doctors</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Services</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Emergency Care</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Primary Care</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Dental Care</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Pediatrics</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
                    <address class="text-gray-400 not-italic">
                        <p>123 Medical Center Drive</p>
                        <p>City, State 12345</p>
                        <p>Phone: (123) 456-7890</p>
                        <p>Email: info@medicare.com</p>
                    </address>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-400">
                <p>&copy; 2023 MediCare. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>