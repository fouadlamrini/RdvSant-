
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
        </main>
    </div>
</body>
</html>
