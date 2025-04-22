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
  <nav class="bg-black text-white shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <a href="{{route('home')}}" class="text-2xl font-bold">RdvSent</a>

      <!-- Hamburger Menu Button -->
      <button id="menu-toggle" class="md:hidden text-white focus:outline-none">
        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        </svg>
      </button>

      <!-- Desktop Links -->
      <div class="hidden md:flex space-x-4">
        <a href="{{ route('home') }}" class="hover:text-blue-500">Home</a>
        <a href="{{ route('about') }}" class="hover:text-blue-500">About</a>
      
        <a href="{{ route('signup.doctor') }}" class="hover:text-blue-500">Sign Up Doctor</a>
        <a href="{{ route('signup.patient') }}" class="hover:text-blue-500">Sign Up Patient</a>
        <a href="{{ route('login') }}" class="hover:text-blue-500">Login</a>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden px-6 pb-4">
      <a href="{{ route('home') }}" class="block py-2 hover:text-blue-500">Home</a>
      <a href="{{ route('about') }}" class="block py-2 hover:text-blue-500">About</a>
      <a href="{{ route('signup.doctor') }}" class="block py-2 hover:text-blue-500">Sign Up Doctor</a>
      <a href="{{ route('signup.patient') }}" class="block py-2 hover:text-blue-500">Sign Up Patient</a>
      <a href="{{ route('login') }}" class="block py-2 hover:text-blue-500">Login</a>
    </div>
  </nav> 
  <!-- end navbar -->
  

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
                     
                </form>
            </div>
        </div>
    </main>
  <!-- Footer -->
  <footer class="bg-black text-white text-center py-4">
    <p>&copy; 2025 RdvSent. All Rights Reserved.</p>
    <div class="space-x-4">
        <a href="#privacy" class="hover:text-blue-500">Privacy Policy</a>
        <a href="#terms" class="hover:text-blue-500">Terms of Service</a>
        <a href="#contact" class="hover:text-blue-500">Contact</a>
    </div>
</footer>

<script src="{{ asset('js/menu_mobile.js') }}"></script>
</body>

</html>