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
   <nav class="bg-blue-900 text-white shadow-lg">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <a href="{{route('home')}}" class="text-2xl font-bold tracking-tight">RdvSent</a>

      <!-- Hamburger Menu Button -->
      <button id="menu-toggle" class="md:hidden text-white focus:outline-none">
        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        </svg>
      </button>

      <!-- Desktop Links -->
      <div class="hidden md:flex space-x-6">
        <a href="{{ route('home') }}" class="hover:text-blue-300 transition-colors duration-200">Home</a>
        <a href="{{ route('about') }}" class="hover:text-blue-300 transition-colors duration-200">About</a>
        <div class="relative group">
          <button class="hover:text-blue-300 transition-colors duration-200 flex items-center">
            Sign Up 
            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </button>
          <div class="absolute hidden group-hover:block bg-white text-gray-800 shadow-lg rounded-md mt-2 py-1 w-48 z-10">
            <a href="{{ route('signup.doctor') }}" class="block px-4 py-2 hover:bg-blue-100">As Doctor</a>
            <a href="{{ route('signup.patient') }}" class="block px-4 py-2 hover:bg-blue-100">As Patient</a>
          </div>
        </div>
        <a href="{{ route('login') }}" class="bg-white text-blue-700 px-4 py-2 rounded-md hover:bg-blue-100 transition-colors duration-200 font-medium">Login</a>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden px-6 pb-4 bg-blue-800">
      <a href="{{ route('home') }}" class="block py-3 hover:text-blue-300 border-b border-blue-700">Home</a>
      <a href="{{ route('about') }}" class="block py-3 hover:text-blue-300 border-b border-blue-700">About</a>
      <a href="{{ route('signup.doctor') }}" class="block py-3 hover:text-blue-300 border-b border-blue-700">Sign Up Doctor</a>
      <a href="{{ route('signup.patient') }}" class="block py-3 hover:text-blue-300 border-b border-blue-700">Sign Up Patient</a>
      <a href="{{ route('login') }}" class="block py-3 hover:text-blue-300">Login</a>
    </div>
  </nav> 
  <!-- end navbar -->
  

    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center p-4 bg-gradient-to-r from-blue-50 to-indigo-50">
        <div class="bg-white p-8 rounded-2xl shadow-2xl flex flex-col md:flex-row items-center gap-8 w-full max-w-4xl border border-gray-200 transform transition-all hover:shadow-xl">
            <!-- Image -->
            <div class="hidden md:block w-full md:w-1/2 overflow-hidden rounded-xl">
                <img src="{{ asset('images/daily-031015-x.jpg.webp') }}" alt="Doctor"
                    class="w-full h-full object-cover transform hover:scale-105 transition duration-500">
            </div>

            <!-- Form -->
            <div class="w-full md:w-1/2">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-800">Welcome Back</h2>
                    <p class="text-gray-600 mt-2">Sign in to access your account</p>
                </div>

                <form class="space-y-6" method="post" action="{{ route('login') }}">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                            <div class="relative">
                                <input type="email" id="email" name="email" placeholder="Enter your email"
                                    class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-gray-50">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                            <div class="relative">
                                <input type="password" id="password" name="password" placeholder="Enter your password"
                                    class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-gray-50">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                   

                    <div>
                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg hover:bg-blue-700 transition duration-300 font-medium shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Sign In
                        </button>
                    </div>
                </form>

                <div class="mt-6">
                  

                    
                </div>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Don't have an account?
                        <div class="mt-6 text-center">
                          <div class="relative group inline-block">
                              <button class="text-blue-600 hover:text-blue-800 font-medium flex items-center mx-auto">
                                  Sign Up
                                  <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                  </svg>
                              </button>
                              <div class="absolute hidden group-hover:block bg-white text-gray-800 shadow-lg rounded-md mt-1 py-1 w-48 z-10 left-1/2 transform -translate-x-1/2">
                                  <a href="{{ route('signup.doctor') }}" class="block px-4 py-2 hover:bg-blue-100 text-sm">As Doctor</a>
                                  <a href="{{ route('signup.patient') }}" class="block px-4 py-2 hover:bg-blue-100 text-sm">As Patient</a>
                              </div>
                          </div>
                      </div>
                    </p>
                </div>
            </div>
        </div>
    </main>
    <footer class="bg-gray-900 text-white py-12">
      <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-4 gap-8">
          <div>
            <h3 class="text-xl font-bold mb-4">RdvSent</h3>
            <p class="text-gray-400">Votre plateforme de rendez-vous médicaux en ligne, simple et efficace.</p>
          </div>
          <div>
            <h4 class="font-semibold mb-4 text-gray-300">Liens rapides</h4>
            <ul class="space-y-2">
              <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition-colors">Accueil</a></li>
              <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-white transition-colors">À propos</a></li>
              <li><a href="{{ route('signup.doctor') }}" class="text-gray-400 hover:text-white transition-colors">Devenir médecin</a></li>
            </ul>
          </div>
          <div>
            <h4 class="font-semibold mb-4 text-gray-300">Compte</h4>
            <ul class="space-y-2">
              <li><a href="{{ route('login') }}" class="text-gray-400 hover:text-white transition-colors">Connexion</a></li>
              <li><a href="{{ route('signup.patient') }}" class="text-gray-400 hover:text-white transition-colors">Inscription patient</a></li>
            </ul>
          </div>
          <div>
            <h4 class="font-semibold mb-4 text-gray-300">Contact</h4>
            <p class="text-gray-400">contact@rdvsent.com</p>
            <p class="text-gray-400">+212 6 12 34 56 78</p>
          </div>
        </div>
        <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
          <p>&copy; 2025 RdvSent. Tous droits réservés.</p>
        </div>
      </div>
    </footer>

<script src="{{ asset('js/menu_mobile.js') }}"></script>
</body>

</html>