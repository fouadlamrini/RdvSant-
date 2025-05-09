<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
            <div class="mb-4 flex flex-col md:flex-row justify-between items-center gap-4">
                <h1 class="text-2xl font-bold">Dashboard</h1>
                <form method="GET" action="{{ route('users.search') }}" class="flex gap-2 w-full md:w-1/3">
                    <input type="text" name="search" placeholder="Rechercher par nom ou prénom" class="p-2 border rounded flex-1">
                    <button type="submit" class="p-2 bg-blue-600 text-white rounded">Rechercher</button>
                </form>
            </div>
            
          
            
            <!-- Users Table -->
            <div class="bg-white p-4 shadow rounded-lg overflow-x-auto">
                <table class="w-full border-collapse border border-gray-200 text-sm">
                    <thead>
                        <tr class="bg-gray-200 text-left">
                            <th class="p-2 border">Id d'utilisateur</th>
                            <th class="p-2 border">Nom d'utilisateur</th>
                            <th class="p-2 border">Role</th>
                        
                            <th class="p-2 border">Status</th>
                            <th class="p-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr class="text-center hover:bg-gray-50">
                            <td class="p-2 border">{{ $user->id }} </td>
                            <td class="p-2 border">{{ $user->first_name . ' ' . $user->last_name }}</td>
                            <td class="p-2 border text-green-500">{{ $user->role }}</td>
                            
                            @php
                            $statusColor = match($user->status) {
                                'pending' => 'text-yellow-500',
                                'active' => 'text-blue-600',
                                'inactive' => 'text-red-500',
                                default => 'text-gray-500'
                            };
                        @endphp
                        
                        <td class="p-2 border">
                            <a href="{{ route('users.toggleStatus', $user->id) }}">
                                <button class="{{ $statusColor }} font-semibold">{{ $user->status }}</button>
                            </a>
                        </td>
                            <td class="p-2 border">
                            
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger text-red-500">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
