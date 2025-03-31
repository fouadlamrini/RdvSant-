<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Patient</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <header class="bg-blue-600 text-white p-4 text-center">
        <h1 class="text-xl font-bold">Espace Patient</h1>
    </header>

    <nav class="bg-white border-b flex justify-center space-x-4 p-3">
        <a href="#" class="text-blue-600 font-medium">HOME</a>
        <a href="#" class="text-gray-600">Mes Rendez-Vous</a>
        <a href="#" class="text-gray-600">Consultation-Video</a>
    </nav>

    <div class="container mx-auto px-4 py-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4 text-center">Prendre Un Rendez-Vous</h2>

            <h3 class="text-lg font-semibold mb-2 text-center">Spécialité</h3>
            <div class="flex justify-center">
                <select class="w-1/2 md:w-1/3 p-2 border rounded text-gray-700 mb-4">
                    @foreach ($doctors->pluck('speciality')->unique() as  $speciality)
                    <option>{{ $speciality }}</option>
                    @endforeach
                </select>
            </div>

            <h3 class="text-lg font-semibold mb-2 text-center">Ville</h3>
            <div class="flex justify-center">
                <input 
                    type="text" 
                    placeholder="Entrez Votre Ville" 
                    class="w-1/2 md:w-1/3 p-2 border rounded text-gray-700 mb-4"
                >
            </div>

            <h3 class="text-lg font-semibold mb-2 text-center">Recherche</h3>
            <div class="flex justify-center mb-6">
                <button class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                    Recherche
                </button>
            </div>

            <h3 class="text-lg font-semibold mb-4 text-center">Médecins Disponibles</h3>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">


                
                <!-- Carte Médecin -->
                @foreach ($doctors as $doctor)
                <div class="border rounded-lg p-4 flex flex-col items-center shadow-sm">
                    <img src="https://via.placeholder.com/100" alt="Dr. Fouad Lamrini" class="w-16 h-16 rounded-full mb-4">
                    <h4 class="font-semibold">Dr. {{$doctor->first_name." ".$doctor->last_name}}</h4>
                    <p class="text-gray-600">{{$doctor->speciality}} - Nador</p>
                    <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mt-4">
                        Prendre Rendez Vous
                    </button>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
