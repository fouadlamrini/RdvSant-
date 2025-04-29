<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Patient Sign Up</title>
</head>

<body class="min-h-screen md:bg-[url('/images/360_F_424309320_UkOxg2z3sq7yXwGnWCO6xBXkRI4byhnI.jpg')] bg-cover bg-center">

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
    <div class="flex items-center justify-center">
        <div class="flex flex-col md:flex-row bg-white shadow-lg rounded-lg overflow-hidden w-11/12 sm:w-5/6 lg:w-3/4 max-w-4xl mx-4 my-8">
            
            <!-- Image Section - Hidden on mobile -->
            <div class="hidden md:block md:w-1/2 lg:w-2/5">
                <img src="{{ asset('images/nurse-providing-care-support-smiling-patient-hospital-bed_697880-29127.avif') }}"
                    alt="Doctor" class="w-full h-full object-contain p-6 max-h-[600px]">
            </div>

            <!-- Form Section -->
            <div class="w-full md:w-1/2 lg:w-3/5 p-6 sm:p-8 md:p-10">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-6 text-center md:text-left">Sign Up</h2>
                <form method="post" action="{{ route('signup.patient') }}">
                    @csrf
                    <!-- Name Fields -->
                    <div class="flex flex-col sm:flex-row gap-4 mb-4">
                        <div class="w-full sm:w-1/2">
                            <label for="First_Name" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                            <input type="text" value="{{ old('first_name') }}" id="First_Name" name="first_name"
                                placeholder="First Name"
                                class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('first_name')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="w-full sm:w-1/2">
                            <label for="Last_Name" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                            <input type="text" value="{{ old('last_name') }}" id="Last_Name" name="last_name"
                                placeholder="Last Name"
                                class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('last_name')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Email Field -->
                    <div class="mb-4">
                        <label for="Email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="text" value="{{ old('email') }}" id="Email" name="email"
                            placeholder="Email Address"
                            class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('email')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div class="mb-4">
                        <label for="Password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" value="{{ old('password') }}" id="Password" name="password"
                            placeholder="Password"
                            class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('password')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Submit Button -->
                    <button type="submit" class="w-full p-3 bg-black text-white font-semibold rounded-lg shadow-md ">
                        Sign Up
                    </button>
                </form>

                <!-- Login Link -->
                <p class="mt-4 text-center text-gray-600">
                    Already have an account?
                    <a href="{{route('login') }}"
                        class="text-blue-600 font-semibold hover:text-blue-800 transition duration-300">Login</a>
                </p>

                @if (session('success'))
                    <div class="bg-green-50  p-4 mb-4">
                        <p class="text-sm text-green-700">
                            {{ session('success') }}
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>

     <!-- Footer -->
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
