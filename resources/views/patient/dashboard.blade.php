<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Patient</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Notifications -->
    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                <strong class="font-bold">Erreurs :</strong>
            </div>
            <ul class="mt-2 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <!-- Header -->
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
                <a href="{{route('patient.dashboard')}}" class="text-blue-600 font-medium border-b-2 border-blue-600 pb-2 px-1">Accueil</a>
                <a href="{{route('patient.mesRendezVous')}}" class="text-gray-600 hover:text-blue-600 transition-colors pb-2 px-1">Mes Rendez-Vous</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Search Section -->
            <div class="bg-gray-50 px-6 py-8">
                <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Prendre Un Rendez-Vous</h2>
                
                <div class="max-w-3xl mx-auto grid md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Spécialité</label>
                        <select class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @foreach ($doctors->pluck('speciality')->unique() as $speciality)
                            <option>{{ $speciality }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ville</label>
                        <input 
                            type="text" 
                            placeholder="Entrez votre ville" 
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        >
                    </div>
                    
                    <div class="flex items-end">
                        <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg transition duration-300 shadow-md">
                            Rechercher
                        </button>
                    </div>
                </div>
            </div>

            <!-- Doctors List -->
            <div class="p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-6 text-center">Médecins Disponibles</h3>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($doctors as $doctor)
                    <div class="bg-white border border-gray-200 rounded-xl p-5 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
                        <div class="flex flex-col items-center text-center">
                            <img 
                                src="{{ $doctor->image ? asset('storage/' . $doctor->image) : 'https://previews.123rf.com/images/belopoppa/belopoppa1809/belopoppa180900002/109693900-image-d-espace-r%C3%A9serv%C3%A9-de-profil-silhouette-grise-pas-de-photo-d-une-personne-sur-l-avatar-la.jpg' }}" 
                                alt="Dr. {{ $doctor->first_name }} {{ $doctor->last_name }}"
                                class="w-20 h-20 rounded-full object-cover border-4 border-blue-100 mb-4"
                            >
                            <h4 class="font-bold text-lg text-gray-800">Dr. {{ $doctor->first_name }} {{ $doctor->last_name }}</h4>
                            <p class="text-blue-600 font-medium">{{ $doctor->speciality }}</p>
                            <p class="text-gray-500 text-sm mt-1">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                {{ $doctor->city }}
                            </p>
                            <button 
                                class="mt-4 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-full transition duration-300 shadow-sm"
                                data-doctor-id="{{ $doctor->id }}"
                            >
                                Prendre Rendez-vous
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>

    <!-- Availability Modal -->
    <div id="availabilityModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center p-4 z-50">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold text-gray-800">Disponibilités du Médecin</h3>
                    <button id="closeModal" class="text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                
                <div id="availabilityContent" class="space-y-3">
                    <!-- Availability slots will be dynamically loaded here -->
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('availabilityModal');
            const closeModal = document.getElementById('closeModal');
            const availabilityContent = document.getElementById('availabilityContent');

            document.querySelectorAll('[data-doctor-id]').forEach(button => {
                button.addEventListener('click', function () {
                    const doctorId = this.dataset.doctorId;
                    
                    // Show loading state
                    availabilityContent.innerHTML = `
                        <div class="flex justify-center items-center py-8">
                            <div class="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-blue-500"></div>
                        </div>
                    `;
                    modal.classList.remove('hidden');

                    fetch(`/doctor/${doctorId}/appointments`)
                        .then(response => response.json())
                        .then(data => {
                            availabilityContent.innerHTML = '';
                            
                            if (data.length > 0) {
                                let currentDate = null;
                                
                                data.forEach(slot => {
                                    if (slot.status === 'available') {
                                        // Add date header if new date
                                        const slotDate = new Date(slot.date).toLocaleDateString('fr-FR', { 
                                            weekday: 'long', 
                                            day: 'numeric', 
                                            month: 'long' 
                                        });
                                        
                                        if (slotDate !== currentDate) {
                                            currentDate = slotDate;
                                            const dateHeader = document.createElement('h4');
                                            dateHeader.className = 'font-semibold text-gray-700 mt-4 mb-2 text-lg';
                                            dateHeader.textContent = slotDate.charAt(0).toUpperCase() + slotDate.slice(1);
                                            availabilityContent.appendChild(dateHeader);
                                        }
                                        
                                        // Create time slot button
                                        const slotElement = document.createElement('button');
                                        slotElement.className = 'w-full text-left p-3 border border-gray-200 rounded-lg hover:bg-blue-600 hover:text-white transition-colors mb-2';
                                        slotElement.innerHTML = `
                                            ${slot.start_time} - ${slot.end_time}
                                            <span class="float-right text-sm bg-blue-100 text-blue-800 px-2 py-1 rounded-full hover:bg-blue-200">Réserver</span>
                                        `;
                                        
                                        slotElement.addEventListener('click', () => {
                                            const form = document.createElement('form');
                                            form.method = 'POST';
                                            form.action = '{{ route("appointments.store") }}';

                                            // Add CSRF token
                                            const csrfToken = document.createElement('input');
                                            csrfToken.type = 'hidden';
                                            csrfToken.name = '_token';
                                            csrfToken.value = '{{ csrf_token() }}';
                                            form.appendChild(csrfToken);

                                            // Add appointment data
                                            const doctorInput = document.createElement('input');
                                            doctorInput.type = 'hidden';
                                            doctorInput.name = 'doctor_id';
                                            doctorInput.value = doctorId;
                                            form.appendChild(doctorInput);

                                            const appointmentDate = document.createElement('input');
                                            appointmentDate.type = 'hidden';
                                            appointmentDate.name = 'appointment_date';
                                            appointmentDate.value = slot.date;
                                            form.appendChild(appointmentDate);

                                            const startTime = document.createElement('input');
                                            startTime.type = 'hidden';
                                            startTime.name = 'start_time';
                                            startTime.value = slot.start_time;
                                            form.appendChild(startTime);

                                            const endTime = document.createElement('input');
                                            endTime.type = 'hidden';
                                            endTime.name = 'end_time';
                                            endTime.value = slot.end_time;
                                            form.appendChild(endTime);

                                            document.body.appendChild(form);
                                            form.submit();
                                        });
                                        
                                        availabilityContent.appendChild(slotElement);
                                    }
                                });
                            } else {
                                availabilityContent.innerHTML = `
                                    <div class="text-center py-8">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <h4 class="mt-3 text-lg font-medium text-gray-700">Aucune disponibilité trouvée</h4>
                                        <p class="mt-1 text-gray-500">Ce médecin n'a pas encore défini ses disponibilités.</p>
                                    </div>
                                `;
                            }
                        })
                        .catch(error => {
                            availabilityContent.innerHTML = `
                                <div class="text-center py-8 text-red-500">
                                    <svg class="mx-auto h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                    </svg>
                                    <h4 class="mt-3 text-lg font-medium">Erreur de chargement</h4>
                                    <p class="mt-1">Une erreur est survenue lors du chargement des disponibilités.</p>
                                </div>
                            `;
                        });
                });
            });

            closeModal.addEventListener('click', function () {
                modal.classList.add('hidden');
            });
            
            // Close modal when clicking outside
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>