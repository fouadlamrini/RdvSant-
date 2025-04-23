<!-- resources/views/doctor/schedule.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/locales-all.global.min.js"></script>
</head>
<body class="bg-gray-100">
    <div class="flex flex-col md:flex-row min-h-screen">
        <aside class="bg-gray-900 text-white w-full md:w-64 p-4 space-y-4">
            <div class="text-xl font-bold">Doctor DASHBOARD</div>
            <nav class="space-y-2">
                <a href="{{ route('doctor.dashboard') }}" class="block bg-blue-600 p-2 rounded">Appointments list</a>
                <a href="{{ route('doctorShudule') }}" class="block bg-blue-600 p-2 rounded">Doctor Schedule</a>
                <a href="{{ route('logout') }}" class="block bg-red-600 p-2 rounded">Déconnexion</a>
            </nav>
        </aside>

        <main class="flex-1 p-6">
            <div id="calendar"></div>

            <!-- Add Event Form -->
            <div class="mt-8">
              <form action="{{ url('doctorShudule') }}" method="POST">
                @csrf
            
                <label for="day_of_week" class="block">Day of the Week:</label>
                <select id="day_of_week" name="day_of_week" class="p-2 mt-2 mb-4 border border-gray-300 rounded" required>
                    <option value="monday">Monday</option>
                    <option value="tuesday">Tuesday</option>
                    <option value="wednesday">Wednesday</option>
                    <option value="thursday">Thursday</option>
                    <option value="friday">Friday</option>
                    <option value="saturday">Saturday</option>
                    <option value="sunday">Sunday</option>
                </select>
            
                <label for="start_time" class="block">Start Time:</label>
                <input type="time" id="start_time" name="start_time" class="p-2 mt-2 mb-4 border border-gray-300 rounded" required>
            
                <label for="end_time" class="block">End Time:</label>
                <input type="time" id="end_time" name="end_time" class="p-2 mt-2 mb-4 border border-gray-300 rounded" required>
            
                <button type="submit" class="bg-blue-600 text-white p-2 rounded mt-4">Add Schedule</button>
            </form>
            
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek',
                slotMinTime: "08:00:00",
                slotMaxTime: "20:00:00",
                allDaySlot: false,
                events: '/doctor/schedule/events', // Endpoint that returns events
                eventColor: '#22c55e',
                eventDisplay: 'background'
            });

            calendar.render();
        });
    </script>
</body>
</html>
