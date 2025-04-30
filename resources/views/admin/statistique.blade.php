<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Sidebar -->
        <aside class="bg-gray-900 text-white w-full md:w-64 p-4 space-y-4">
            <div class="text-xl font-bold">Admin DASHBOARD</div>
            <nav class="space-y-2">
                <a href="{{route('admin.dashboard')}}" class="block bg-blue-600 p-2 rounded">Dashboard</a>
                <a href="{{route('admin.statistics')}}" class="block bg-blue-600 p-2 rounded">STATISTIQUE</a>
                <a href="{{ route('logout') }}" class="block bg-red-600 p-2 rounded">Déconnexion</a>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <main class="flex-1 p-6">
            <h1 class="text-2xl font-bold mb-4">Statistiques</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-white p-4 shadow rounded-lg">
                    <h2 class="text-lg font-bold">Total Utilisateurs</h2>
                    <p class="text-2xl">{{ $totalUsers }}</p>
                </div>
                <div class="bg-white p-4 shadow rounded-lg">
                    <h2 class="text-lg font-bold">Total Médecins</h2>
                    <p class="text-2xl">{{ $totalDoctors }}</p>
                </div>
                <div class="bg-white p-4 shadow rounded-lg">
                    <h2 class="text-lg font-bold">Total Patients</h2>
                    <p class="text-2xl">{{ $totalPatients }}</p>
                </div>
                <div class="bg-white p-4 shadow rounded-lg">
                    <h2 class="text-lg font-bold">Total Rendez-vous</h2>
                    <p class="text-2xl">{{ $totalAppointments }}</p>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
