<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Patient</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    <header class="bg-blue-600 text-white p-4 text-center">
        <h1 class="text-xl font-bold">Espace Patient</h1>
    </header>

    <nav class="bg-white border-b flex justify-center space-x-4 p-3">
        <a href="{{route("patient.dashboard")}}" class="text-blue-600 font-medium">HOME</a>
        <a href="{{route("patient.mesRendezVous")}}" class="text-gray-600">Mes Rendez-Vous</a>
       
        <a href="{{ route('logout') }}" type="submit" class="text-red-600 font-medium">Déconnexion</a>
     
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
                @foreach ($doctors as $doctor)
                <div class="border rounded-lg p-4 flex flex-col items-center shadow-sm">
                    <img src="{{ $doctor->image ? asset('storage/' . $doctor->image) : 'https://previews.123rf.com/images/belopoppa/belopoppa1809/belopoppa180900002/109693900-image-d-espace-r%C3%A9serv%C3%A9-de-profil-silhouette-grise-pas-de-photo-d-une-personne-sur-l-avatar-la.jpg' }}" alt="Profile Photo" class="w-24 h-24 rounded-full mr-4">                    <h4 class="font-semibold">Dr. {{ $doctor->first_name . ' ' . $doctor->last_name }}</h4>
                    <p class="text-gray-600">{{ $doctor->speciality }} - {{$doctor->city}}</p>
                    <button 
                        class="btn-prendre-rendez-vous bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mt-4" 
                        data-doctor-id="{{ $doctor->id }}">
                        Prendre Rendez Vous
                    </button>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div id="availabilityModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/2">
            <h3 class="text-lg font-semibold mb-4">Disponibilités du Médecin</h3>
            <div id="availabilityContent" class="space-y-4">
                <!-- Availability slots will be dynamically loaded here -->
            </div>
            <button id="closeModal" class="bg-red-600 text-white px-4 py-2 rounded mt-4">Fermer</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('availabilityModal');
            const closeModal = document.getElementById('closeModal');
            const availabilityContent = document.getElementById('availabilityContent');

            document.querySelectorAll('.btn-prendre-rendez-vous').forEach(button => {
                button.addEventListener('click', function () {
                    const doctorId = this.dataset.doctorId;

                    fetch(`/doctor/${doctorId}/appointments`)
                        .then(response => response.json())
                        .then(data => {
                            availabilityContent.innerHTML = '';
                            if (data.length > 0) {
                                data.forEach(slot => {
                                    console.log(slot)
                                    if (slot.status === 'available') {
                                        const slotElement = document.createElement('div');
                                        slotElement.classList.add('p-2', 'border', 'rounded', 'cursor-pointer', 'hover:bg-gray-100');
                                        slotElement.textContent = `${slot.date} de ${slot.start_time} à ${slot.end_time}`;
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
                                            doctorInput.value = doctorId; // Using the doctorId from the outer scope
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
                                availabilityContent.innerHTML = '<p>Aucune disponibilité trouvée.</p>';
                            }
                            modal.classList.remove('hidden');
                        });
                });
            });

            closeModal.addEventListener('click', function () {
                modal.classList.add('hidden');
            });
        });
    </script>
</body>
</html>