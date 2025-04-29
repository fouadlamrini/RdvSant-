<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Rendez-Vous</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <header class="bg-gradient-to-r from-blue-600 to-blue-800 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">Espace Patient</h1>
            <div class="flex items-center space-x-4">
                <span class="hidden sm:inline">Bienvenue, {{ Auth::user()->name }}</span>
                <a href="{{ route('logout') }}" class="flex items-center text-white hover:text-blue-200 transition-colors">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Déconnexion
                </a>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="bg-white shadow-sm">
        <div class="container mx-auto px-4">
            <div class="flex justify-center space-x-8 py-3">
                <a href="{{route('patient.dashboard')}}" class="text-gray-600 hover:text-blue-600 transition-colors pb-2 px-1">Accueil</a>
                <a href="{{route('patient.mesRendezVous')}}" class="text-blue-600 font-medium border-b-2 border-blue-600 pb-2 px-1">Mes Rendez-Vous</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4 text-center">Liste des Rendez-Vous</h2>
            @if ($appointments->isEmpty())
                <p class="text-center text-gray-600">Vous n'avez aucun rendez-vous confirmé pour le moment.</p>
            @else
                <div class="space-y-4">
                    @foreach ($appointments as $appointment)
                        <div class="border rounded-lg p-4 shadow-sm">
                            <h3 class="font-semibold text-lg">Dr. {{ $appointment->doctor->first_name }} {{ $appointment->doctor->last_name }}</h3>
                            <p class="text-gray-600">Spécialité : {{ $appointment->doctor->speciality }}</p>
                            <p class="text-gray-600">Date : {{ $appointment->appointment_date }}</p>
                            <p class="text-gray-600">Heure : {{ $appointment->start_time }} - {{ $appointment->end_time }}</p>
<div class="flex space-x-4 mt-4">
                                
        <!-- Delete Button -->
                                <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce rendez-vous ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Anuller</button>
                              </form>
</div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</body>
</html>
