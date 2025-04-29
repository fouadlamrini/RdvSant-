<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DocSelect - Home</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50 font-[Poppins]">

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

  <!-- Hero Section -->
  <section class="bg-blue-600 text-white py-24">
    <div class="max-w-4xl mx-auto px-6 text-center">
      <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">Bienvenue chez RdvSent</h1>
      <p class="text-xl mb-8 text-blue-100 max-w-2xl mx-auto">Votre plateforme numérique pour prendre facilement des rendez-vous médicaux et communiquer avec les médecins.</p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <a href="{{ route('login') }}"
           class="bg-white text-blue-600 px-8 py-4 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 font-semibold text-lg hover:translate-y-[-2px]">
           Commencez maintenant
        </a>
        <a href="{{ route('about') }}"
           class="border-2 border-white text-white px-8 py-4 rounded-full hover:bg-white hover:text-blue-600 transition-all duration-300 font-semibold text-lg hover:translate-y-[-2px]">
           En savoir plus
        </a>
      </div>
    </div>
  </section>

<!-- Features Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
      <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-16">Pourquoi choisir RdvSent ?</h2>
      <div class="grid md:grid-cols-3 gap-8">
        
        <!-- Feature 1 -->
        <div class="bg-gray-50 p-8 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 hover:translate-y-[-5px] border-t-4 border-blue-500">
          <div class="flex items-center mb-6">
            <div class="bg-blue-100 p-3 rounded-full mr-4">
              <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M8 7V3m8 4V3m-9 4h10M5 11h14M10 16h4m-7 4h10a2 2 0 002-2v-5H5v5a2 2 0 002 2z" />
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-800">Réservation instantanée</h3>
          </div>
          <p class="text-gray-600">Réservez facilement vos rendez-vous médicaux en quelques clics avec les meilleurs médecins à Nador et partout au Maroc.</p>
        </div>
        
        <!-- Feature 2 -->
        <div class="bg-gray-50 p-8 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 hover:translate-y-[-5px] border-t-4 border-blue-500">
          <div class="flex items-center mb-6">
            <div class="bg-blue-100 p-3 rounded-full mr-4">
              <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-800">Gain de temps</h3>
          </div>
          <p class="text-gray-600">Évitez les longues files d'attente et les appels téléphoniques interminables en gérant vos rendez-vous en ligne.</p>
        </div>
        
        <!-- Feature 3 -->
        <div class="bg-gray-50 p-8 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 hover:translate-y-[-5px] border-t-4 border-blue-500">
          <div class="flex items-center mb-6">
            <div class="bg-blue-100 p-3 rounded-full mr-4">
              <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-800">Professionnels vérifiés</h3>
          </div>
          <p class="text-gray-600">Accédez à un réseau de médecins qualifiés et vérifiés pour des soins de qualité.</p>
        </div>
      </div>
    </div>
  </section>
  
 
  <!-- CTA Section -->
  <section class="bg-blue-600 text-white py-16">
    <div class="max-w-4xl mx-auto px-6 text-center">
      <h2 class="text-3xl font-bold mb-6">Prêt à simplifier vos rendez-vous médicaux ?</h2>
      <p class="text-xl mb-8 text-blue-100 max-w-2xl mx-auto">Inscrivez-vous maintenant et découvrez une nouvelle façon de gérer votre santé.</p>
      <a href="{{ route('signup.patient') }}"
         class="inline-block bg-white text-blue-600 px-8 py-3 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 font-semibold text-lg hover:translate-y-[-2px]">
         S'inscrire gratuitement
      </a>
    </div>
  </section>
  
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

  <script>
    // Mobile menu toggle
    document.getElementById('menu-toggle').addEventListener('click', function() {
      const menu = document.getElementById('mobile-menu');
      menu.classList.toggle('hidden');
    });
  </script>

</body>
</html>