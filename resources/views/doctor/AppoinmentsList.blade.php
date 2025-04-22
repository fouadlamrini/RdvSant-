<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Sidebar -->
        <aside class="bg-gray-900 text-white w-full md:w-64 p-4 space-y-4">
            <div class="text-xl font-bold">Doctor DASHBOARD</div>
            <nav class="space-y-2">
                <a href="#" class="block bg-blue-600 p-2 rounded">Appoinments list</a>
                <a href="#" class="block bg-blue-600 p-2 rounded">doctor shudule</a>
                <a href="#" class="block bg-red-600 p-2 rounded">Déconnexion</a>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="mb-4 flex flex-col md:flex-row justify-between items-center gap-4">
                <h1 class="text-2xl font-bold">Dashboard</h1>
                <input type="text" placeholder="Search" class="p-2 border rounded w-full md:w-1/3">
            </div>
            
            <!-- Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                <div class="bg-white p-4 shadow rounded-lg flex items-center justify-center">
                    <span class="text-lg font-bold">5</span>
                    <span class="ml-2">Utilisateurs</span>
                </div>
                <div class="bg-white p-4 shadow rounded-lg flex items-center justify-center">
                    <span class="text-lg font-bold">1</span>
                    <span class="ml-2">Projets</span>
                </div>
                <div class="bg-white p-4 shadow rounded-lg flex items-center justify-center">
                    <span class="text-lg font-bold">1</span>
                    <span class="ml-2">Freelances</span>
                </div>
                <div class="bg-white p-4 shadow rounded-lg flex items-center justify-center">
                    <span class="text-lg font-bold">1</span>
                    <span class="ml-2">Offres</span>
                </div>
            </div>
            
            <!-- Users Table -->
            <div class="bg-white p-4 shadow rounded-lg overflow-x-auto">
                <table class="w-full border-collapse border border-gray-200 text-sm">
                    <thead>
                        <tr class="bg-gray-200 text-left">
                            <th class="p-2 border">Id d'utilisateur</th>
                            <th class="p-2 border">Nom d'utilisateur</th>
                            <th class="p-2 border">Role</th>
                            <th class="p-2 border">Email</th>
                            <th class="p-2 border">Status</th>
                            <th class="p-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center hover:bg-gray-50">
                            <td class="p-2 border">7</td>
                            <td class="p-2 border">admin</td>
                            <td class="p-2 border text-green-500">admin</td>
                            <td class="p-2 border">admin@admin.com</td>
                            <td class="p-2 border"><span class="text-green-600 font-semibold">active</span></td>
                            <td class="p-2 border">
                                <a href="#" class="text-blue-500 hover:underline">Modifier</a> |
                                <a href="#" class="text-red-500 hover:underline">Supprimer</a>
                            </td>
                        </tr>
                        <tr class="text-center hover:bg-gray-50">
                            <td class="p-2 border">8</td>
                            <td class="p-2 border">ayoub</td>
                            <td class="p-2 border text-green-500">freelancer</td>
                            <td class="p-2 border">ayoub@gmail.com</td>
                            <td class="p-2 border"><span class="text-yellow-500 font-semibold">pending</span></td>
                            <td class="p-2 border">
                                <a href="#" class="text-blue-500 hover:underline">Modifier</a> |
                                <a href="#" class="text-red-500 hover:underline">Supprimer</a>
                            </td>
                        </tr>
                        <tr class="text-center hover:bg-gray-50">
                            <td class="p-2 border">9</td>
                            <td class="p-2 border">jebbouri</td>
                            <td class="p-2 border text-green-500">user</td>
                            <td class="p-2 border">jebbouri@gmail.com</td>
                            <td class="p-2 border"><span class="text-red-600 font-semibold">inactive</span></td>
                            <td class="p-2 border">
                                <a href="#" class="text-blue-500 hover:underline">Modifier</a> |
                                <a href="#" class="text-red-500 hover:underline">Supprimer</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
