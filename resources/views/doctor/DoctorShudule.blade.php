<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/index.global.min.js'></script>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        eventTimeFormat: {
            hour: '2-digit',
            minute: '2-digit',
            hour12: false
        },
        events: '/doctor/schedule/events', 
        eventRender: function(info) {
       
            var eventDuration = info.event.end ? ' - ' + info.event.end.toISOString().split('T')[1].slice(0, 5) : '';
            info.el.querySelector('.fc-event-time').textContent += eventDuration;
        }
    });

    calendar.render();
});
    </script>
    
</head>
<body class="bg-gray-100">
    <div class="flex flex-col md:flex-row min-h-screen">
        <aside class="bg-gray-900 text-white w-full md:w-64 p-4 space-y-4">
            <div class="text-xl font-bold">Doctor DASHBOARD</div>
            <nav class="space-y-2">
                <a href="{{ route('doctor.dashboard') }}" class="block bg-blue-600 p-2 rounded">Appointments list</a>
                <a href="{{ route('doctorShudule') }}" class="block bg-blue-600 p-2 rounded">Doctor Schedule</a>
                <a href="{{route('doctor.profile')}}" class="block bg-blue-600 p-2 rounded">My Profile </a>
                <a href="{{route('doctor.statistics')}}" class="block bg-blue-600 p-2 rounded">Statistics</a>
                <a href="{{ route('logout') }}" class="block bg-red-600 p-2 rounded">Déconnexion</a>
            </nav>
        </aside>

        <main class="flex-1 p-6">
            <div id="calendar"></div>

            <!-- Add Event Form -->
            <div class="mt-8 max-w-md mx-auto bg-white p-6 rounded-xl shadow-md">
                <h2 class="text-xl font-semibold text-gray-700 mb-4 flex items-center gap-2">
                    <!-- Clock Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Ajouter une Disponibilité
                </h2>
            
                <form action="{{ url('doctorShudule') }}" method="POST" class="space-y-4">
                    @csrf
            
                    <!-- Date -->
                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-600 mb-1">📅 Date</label>
                        <input type="date" id="date" name="date"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                            required>
                    </div>
            
                    <!-- Start Time -->
                    <div>
                        <label for="start_time" class="block text-sm font-medium text-gray-600 mb-1">🕒 Heure de début</label>
                        <input type="time" id="start_time" name="start_time"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                            required min="09:00" max="18:00">
                    </div>
            
                    <!-- End Time -->
                    <div>
                        <label for="end_time" class="block text-sm font-medium text-gray-600 mb-1">🕔 Heure de fin</label>
                        <input type="time" id="end_time" name="end_time"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                            required min="09:00" max="18:00">
                    </div>
            
                    <button type="submit"
                        class="w-full bg-blue-600 text-white font-medium py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                        Ajouter
                    </button>
                </form>
            </div>
            

            <!-- Availability List -->
            <div class="mt-10">
                <!-- Title with Icon -->
                <h2 class="text-2xl font-bold mb-6 text-gray-800 flex items-center gap-2">
                    <!-- Calendar Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10m-12 6h14M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Liste des Disponibilités
                </h2>
            
                <!-- Grid Layout for Disponibilités -->
                <div id="availabilityList" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($availabilities as $availability)
                    <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-md hover:shadow-lg transition">
                        <div class="flex flex-col h-full justify-between">
                            <div>
                                <!-- Date -->
                                <div class="flex items-center gap-2 mb-1 text-sm text-gray-500">
                                    <!-- Calendar Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span>Date</span>
                                </div>
                                <p class="text-lg text-gray-800 font-medium">{{ $availability->date }}</p>
                            
                                <!-- Heure -->
                                <div class="flex items-center gap-2 mt-2 text-sm text-gray-500">
                                    <!-- Clock Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>Heure</span>
                                </div>
                                <p class="text-lg text-gray-800 font-medium">{{ $availability->start_time }} - {{ $availability->end_time }}</p>
                            </div>
                            
                            <div class="flex space-x-3 mt-4">
                                <!-- Modify Button with Icon -->
                                <button 
                                    class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold px-4 py-2 rounded-lg flex items-center gap-1 transition"
                                    onclick="openEditModal({{ $availability->id }}, '{{ $availability->date }}', '{{ $availability->start_time }}', '{{ $availability->end_time }}')">
                                    <!-- Pencil Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5h2M5 20h14M7 20l10-10a1.5 1.5 0 00-2.12-2.12L5 17.88V20h2z" />
                                    </svg>
                                    Modifier
                                </button>
            
                                <!-- Delete Button with Icon -->
                                <form action="{{ route('disponibility.destroy', $availability->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette disponibilité ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-2 rounded-lg flex items-center gap-1 transition">
                                        <!-- Trash Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a1 1 0 00-1 1v1h6V4a1 1 0 00-1-1m-4 0h4" />
                                        </svg>
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Edit Modal -->
            <div id="editModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden flex items-center justify-center">
                <div class="bg-white rounded-lg shadow-lg p-6 w-1/2">
                    <h3 class="text-lg font-semibold mb-4">Modifier la Disponibilité</h3>
                    <form id="editForm" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="availabilityId" name="availability_id">
                        <label for="date" class="block">Date :</label>
                        <input type="date" id="date" name="date" class="p-2 mt-2 mb-4 border border-gray-300 rounded" required>
                        <label for="start_time" class="block">Heure de début :</label>
                        <input type="time" id="start_time" name="start_time" class="p-2 mt-2 mb-4 border border-gray-300 rounded" required>
                        <label for="end_time" class="block">Heure de fin :</label>
                        <input type="time" id="end_time" name="end_time" class="p-2 mt-2 mb-4 border border-gray-300 rounded" required>
                        <div class="flex justify-end space-x-4">
                            <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600" onclick="closeEditModal()">Annuler</button>
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>

            <script>
                function openEditModal(id, date, startTime, endTime) {
                    document.getElementById('editModal').classList.remove('hidden');
                    document.getElementById('availabilityId').value = id;
                    document.getElementById('date').value = date;
                    document.getElementById('start_time').value = startTime;
                    document.getElementById('end_time').value = endTime;
                    document.getElementById('editForm').action = `/disponibility/${id}`;
                }

                function closeEditModal() {
                    document.getElementById('editModal').classList.add('hidden');
                }
            </script>
        </main>
    </div>
</body>
</html>
