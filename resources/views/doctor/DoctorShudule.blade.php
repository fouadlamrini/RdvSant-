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
                <a href="{{ route('logout') }}" class="block bg-red-600 p-2 rounded">Déconnexion</a>
            </nav>
        </aside>

        <main class="flex-1 p-6">
            <div id="calendar"></div>

            <!-- Add Event Form -->
            <div class="mt-8">
              <form action="{{ url('doctorShudule') }}" method="POST">
                @csrf

                <label for="date" class="block">date:</label>
                <input type="date" id="date" name="date" class="p-2 mt-2 mb-4 border border-gray-300 rounded" required >
            
           
                <label for="start_time" class="block">Start Time:</label>
                <input type="time" id="start_time" name="start_time" class="p-2 mt-2 mb-4 border border-gray-300 rounded" required min="09:00" max="18:00">
                <label for="end_time" class="block">Start Time:</label>
                <input type="time" id="end_time" name="end_time" class="p-2 mt-2 mb-4 border border-gray-300 rounded" required min="09:00" max="18:00">
            
                <button type="submit" class="bg-blue-600 text-white p-2 rounded mt-4">Add Schedule</button>
            </form>
            
            </div>

            <!-- Availability List -->
            <div class="mt-8">
                <h2 class="text-lg font-semibold mb-4">Liste des Disponibilités</h2>
                <div id="availabilityList" class="space-y-4">
                    @foreach ($availabilities as $availability)
                    <div class="border rounded-lg p-4 shadow-sm">
                        <p class="text-gray-600">Date : {{ $availability->date }}</p>
                        <p class="text-gray-600">Heure : {{ $availability->start_time }} - {{ $availability->end_time }}</p>
                        <div class="flex space-x-4 mt-4">
                            <!-- Modify Button -->
                            <button 
                                class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600"
                                onclick="openEditModal({{ $availability->id }}, '{{ $availability->date }}', '{{ $availability->start_time }}', '{{ $availability->end_time }}')">
                                Modifier
                            </button>
                            <!-- Delete Button -->
                            <form action="{{ route('disponibility.destroy', $availability->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette disponibilité ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Supprimer</button>
                            </form>
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
