<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/bootstrap/main.min.css"
    integrity="sha256-auNBxJ+1OpvUJfYRsPihqLzJFUM9D3gpb8nOh5v0LiM="
    crossorigin="anonymous"
  />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.css"
    integrity="sha256-Lfe6+s5LEek8iiZ31nXhcSez0nmOxP+3ssquHMR3Alo="
    crossorigin="anonymous"
  />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/list/main.min.css"
    integrity="sha256-saO3mkZVAcyqsfgsGMrmE7Cs/TLN1RgVykZ5dnnJKug="
    crossorigin="anonymous"
  />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/timegrid/main.min.css"
    integrity="sha256-DOWdbe6a1VwJwFpkimY6z5tW9mmrBNre2jZsAige5PE="
    crossorigin="anonymous"
  />
  <link
    rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.css"
    integrity="sha256-QG5qcyovbK2zsUkGMWTVn0PZM1P7RVx0Z05QwB9dCeg=" crossorigin="anonymous" />
  <link
    href="node_modules/@fullcalendar/resource-timeline/main.css" rel="stylesheet"/>


</head>
<body class="bg-gray-100">
    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Sidebar -->
        <aside class="bg-gray-900 text-white w-full md:w-64 p-4 space-y-4">
            <div class="text-xl font-bold">Doctor DASHBOARD</div>
            <nav class="space-y-2">
                <a href="{{route('doctor.dashboard')}}" class="block bg-blue-600 p-2 rounded">Appoinments list</a>
                <a href="{{route('doctorShudule')}}" class="block bg-blue-600 p-2 rounded">doctor shudule</a>
                <a href="{{route('logout')}}" class="block bg-red-600 p-2 rounded">Déconnexion</a>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <main class="flex-1 p-6">
             
            <div id="app"></div>
            
        </main>
    </div>


    <script src="{{ asset('js/index.js') }}"></script>
</body>
</html>
