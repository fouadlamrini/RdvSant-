<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DocSelect</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-800">

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

  <!-- about section -->
  <section class="py-16 bg-gray-100">
    <div class="container mx-auto px-6">
      <div class="flex flex-col md:flex-row items-center">
        <div class="md:w-1/2 mb-8 md:mb-0">
          <h2 class="text-3xl font-bold mb-4">À propos de nous</h2>
          <p class="text-gray-700 leading-relaxed">
            Nous réinventons votre expérience des soins de santé.
            Animés par la compassion, l'excellence et l'innovation, nous mettons tout en œuvre pour rendre votre parcours médical plus fluide, tout en mettant votre bien-être au cœur de nos priorités. Forts d’une solide expérience dans le domaine, nous connaissons les obstacles que rencontrent les patients au quotidien et proposons des solutions personnalisées, pensées pour répondre à vos besoins spécifiques.
            <br><br>
            Notre engagement : vous offrir les outils, les ressources et l’accompagnement nécessaires pour mieux gérer votre santé. Nous croyons en des soins accessibles, transparents et véritablement centrés sur la personne. Que vous ayez besoin d’aide pour organiser vos rendez-vous, suivre vos prescriptions ou comprendre vos traitements, nous sommes à vos côtés, pas à pas.
            <br><br>
            Avançons ensemble vers une vie plus sereine et plus autonome.
            Parce que votre santé compte, simplifions-la ensemble.
          </p>
        </div>
        <div class="md:w-1/2">
          <img src="{{ asset('images/doctor_patient.png') }}" alt="Doctor_Patient" class="w-full rounded-lg shadow-lg">
        </div>
      </div>
    </div>
  </section>
  <!-- end about section -->

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



  <script src="{{ asset('js/menu_mobile.js') }}"> </script>
</body>

</html>
