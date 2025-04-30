<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Sidebar -->
        <aside class="bg-gray-900 text-white w-full md:w-64 p-4 space-y-4">
            <div class="text-xl font-bold">Doctor DASHBOARD</div>
            <nav class="space-y-2">
                <a href="{{route('doctor.dashboard')}}" class="block bg-blue-600 p-2 rounded">Appoinments list</a>
                <a href="{{route('doctorShudule')}}" class="block bg-blue-600 p-2 rounded">doctor shudule</a>
                <a href="{{route('doctor.profile')}}" class="block bg-blue-600 p-2 rounded">My Profile </a>
                <a href="{{route('doctor.statistics')}}" class="block bg-blue-600 p-2 rounded">Statistics</a>
                <a href="{{route('logout')}}" class="block bg-red-600 p-2 rounded">Déconnexion</a>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="mb-4 flex flex-col md:flex-row justify-between items-center gap-4">
                <h1 class="text-2xl font-bold">Profile</h1>
            </div>
            
            <!-- Profile Form -->
            <div class="max-w-4xl mx-auto">
                @if(session('success'))
                    <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('doctor.profile.update') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6">
                    @csrf
                    <div class="flex items-center mb-6">
                        <img src="{{ $user->image ? asset('storage/' . $user->image) : 'https://previews.123rf.com/images/belopoppa/belopoppa1809/belopoppa180900002/109693900-image-d-espace-r%C3%A9serv%C3%A9-de-profil-silhouette-grise-pas-de-photo-d-une-personne-sur-l-avatar-la.jpg' }}" alt="Profile Photo" class="w-24 h-24 rounded-full mr-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Update Profile Photo</label>
                            <input type="file" name="image" class="mt-1 block w-full text-sm text-gray-500">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">First Name</label>
                        <input type="text" name="first_name" value="{{ $user->first_name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Last Name</label>
                        <input type="text" name="last_name" value="{{ $user->last_name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Speciality</label>
                        <input type="text" name="speciality" value="{{ $user->speciality }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Bio</label>
                        <textarea name="bio" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ $user->bio }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">City</label>
                        <input type="text" name="city" value="{{ $user->city }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="text-right">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save Changes</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
