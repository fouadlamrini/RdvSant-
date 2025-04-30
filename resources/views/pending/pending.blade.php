<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compte en attente de validation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">
    <div class="bg-white rounded-xl shadow-lg p-8 max-w-md w-full text-center">
        <!-- Icône d'attente (horloge) -->
        <div class="text-6xl mb-6 text-amber-500">⏳</div>
        
        <!-- Titre -->
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Your account is awaiting validation</h1>
        
        <!-- Message -->
        <div class="space-y-4 text-gray-600 mb-6">
            <p>Hello <span class="font-semibold text-gray-800">Dr. {{$doctorFname." ".$doctorLname}}</span>,</p>
            <p>Your registration request has been received but has not yet been approved by the administrator.</p>
            <p class="bg-red-100 text-red-700 p-3 rounded-lg border border-red-300">
                You cannot access the platform until your account is activated.
            </p>
        </div>
        
        <!-- Logout Button -->
        <a href="{{ route('logout') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
            Logout
        </a>
    </div>
</body>
</html>