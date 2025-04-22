<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DocSelect - Home</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

   <!-- Navbar -->
   <nav class="bg-black text-white shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <a href="#" class="text-2xl font-bold">RdvSent</a>

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

  

  <!-- Hero Section -->
  <section class="text-center py-20 bg-blue-50">
    <div class="max-w-3xl mx-auto">
      <h2 class="text-4xl font-bold text-blue-700 mb-4">  Bienvenue chez RdvSent </h2>
      <p class="text-gray-700 mb-6">Votre plateforme numérique pour prendre facilement des rendez-vous médicaux et communiquer avec les médecins.</p>
      <a href="{{ route('login') }}"
         class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-full shadow">
         Commencez maintenant
      </a>
    </div>
  </section>

<!-- Features Section -->
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4">
      <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Pourquoi choisir RdvSent ?</h2>
      <div class="grid md:grid-cols-2 gap-10">
        
        <!-- Feature 1 -->
        <div class="bg-blue-50 p-6 rounded-xl shadow hover:shadow-lg transition-all duration-300">
          <div class="flex items-center mb-4">
            <svg class="w-10 h-10 text-blue-600 mr-4" fill="none" stroke="currentColor" stroke-width="2"
              viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M8 7V3m8 4V3m-9 4h10M5 11h14M10 16h4m-7 4h10a2 2 0 002-2v-5H5v5a2 2 0 002 2z" />
            </svg>
            <h3 class="text-xl font-semibold text-blue-700">Réservation instantanée</h3>
          </div>
          <p class="text-gray-600">Réservez facilement vos rendez-vous médicaux en quelques clics avec les meilleurs médecins à Nador et partout au Maroc.</p>
        </div>
  
        <!-- Feature 2 -->
        <div class="bg-blue-50 p-6 rounded-xl shadow hover:shadow-lg transition-all duration-300">
          <div class="flex items-center mb-4">
            <svg class="w-10 h-10 text-blue-600 mr-4" fill="none" stroke="currentColor" stroke-width="2"
              viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M15 10l4.553 2.276a1 1 0 010 1.789L15 16M4 6h16M4 12h8m-8 6h16" />
            </svg>
            <h3 class="text-xl font-semibold text-blue-700">Consultations vidéo</h3>
          </div>
          <p class="text-gray-600">Faites vos consultations médicales en ligne par appel vidéo sécurisé, sans vous déplacer de chez vous.</p>
        </div>
  
      </div>
    </div>
  </section>
  
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
