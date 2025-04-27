<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Rendez-Vous</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <header class="bg-blue-600 text-white p-4 text-center">
        <h1 class="text-xl font-bold">Mes Rendez-Vous Confirmés</h1>
    </header>

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
