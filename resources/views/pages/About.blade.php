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
  <footer class="bg-black text-white text-center py-6">
    <p class="mb-2">&copy; 2025 RdvSent. All Rights Reserved.</p>
    <div class="space-x-4">
      <a href="#privacy" class="hover:text-blue-500">Privacy Policy</a>
      <a href="#terms" class="hover:text-blue-500">Terms of Service</a>
      <a href="#contact" class="hover:text-blue-500">Contact</a>
    </div>
  </footer>



  <script src="{{ asset('js/menu_mobile.js') }}"> </script>
</body>

</html>
