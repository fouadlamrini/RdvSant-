<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Statistics</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Sidebar -->
        <aside class="bg-gray-900 text-white w-full md:w-64 p-4 space-y-4">
            <div class="text-xl font-bold">Doctor DASHBOARD</div>
            <nav class="space-y-2">
                <a href="{{route('doctor.dashboard')}}" class="block bg-blue-600 p-2 rounded">Appointments list</a>
                <a href="{{route('doctorShudule')}}" class="block bg-blue-600 p-2 rounded">Doctor Schedule</a>
                <a href="{{route('doctor.profile')}}" class="block bg-blue-600 p-2 rounded">My Profile</a>
                <a href="{{route('doctor.statistics')}}" class="block bg-blue-600 p-2 rounded">Statistics</a>
                <a href="{{route('logout')}}" class="block bg-red-600 p-2 rounded">Déconnexion</a>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="mb-4 flex flex-col md:flex-row justify-between items-center gap-4">
                <h1 class="text-2xl font-bold">Statistics</h1>
            </div>
            
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                <div class="bg-white p-4 shadow rounded-lg flex items-center justify-center">
                    <span class="text-lg font-bold">{{ $totalPatients }}</span>
                    <span class="ml-2">Total Patients</span>
                </div>
                <div class="bg-white p-4 shadow rounded-lg flex items-center justify-center">
                    <span class="text-lg font-bold">{{ $totalAppointments }}</span>
                    <span class="ml-2">Total Appointments</span>
                </div>
                <div class="bg-white p-4 shadow rounded-lg flex items-center justify-center">
                    <span class="text-lg font-bold">{{ $confirmedAppointments }}</span>
                    <span class="ml-2">Confirmed Appointments</span>
                </div>
                <div class="bg-white p-4 shadow rounded-lg flex items-center justify-center">
                    <span class="text-lg font-bold">{{ $pendingAppointments }}</span>
                    <span class="ml-2">Pending Appointments</span>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
