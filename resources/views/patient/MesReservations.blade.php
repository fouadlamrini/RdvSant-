<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Réservations</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">
    <header class="bg-gradient-to-r from-blue-600 to-blue-800 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">Espace Patient</h1>
            <div class="flex items-center space-x-4">
                <span class="hidden sm:inline">Bienvenue, {{ Auth::user()->name }}</span>
                <a href="{{ route('logout') }}" class="flex items-center text-white hover:text-blue-200 transition-colors">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Déconnexion
                </a>
            </div>
        </div>
    </header>

    <nav class="bg-white shadow-sm">
        <div class="container mx-auto px-4">
            <div class="flex justify-center space-x-8 py-3">
                <a href="{{ route('patient.dashboard') }}" class="text-gray-600 hover:text-blue-600 transition-colors pb-2 px-1">Accueil</a>
                <a href="{{ route('patient.mesRendezVous') }}" class="text-gray-600 hover:text-blue-600 transition-colors pb-2 px-1">Mes Rendez-Vous</a>
                <a href="{{ route('patient.mesReservations') }}" class="text-blue-600 font-medium border-b-2 border-blue-600 pb-2 px-1">Mes Réservations</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4 text-center">Mes Réservations</h2>

            <div class="mb-6">
                <div class="bg-white p-4 rounded-lg shadow-sm">
                    @if ($appointmentsPending->isEmpty())
                        <p class="text-gray-600">Aucune réservation en attente.</p>
                    @else
                        <div class="space-y-4">
                            @foreach ($appointmentsPending as $appointment)
                                <div class="border rounded-lg p-3">
                                    <h4 class="font-semibold">Dr. {{ $appointment->doctor->first_name }} {{ $appointment->doctor->last_name }} ({{ $appointment->doctor->speciality }})</h4>
                                    <p class="text-gray-600">Date : {{ $appointment->appointment_date }}</p>
                                    <p class="text-gray-600">Heure : {{ $appointment->start_time }} - {{ $appointment->end_time }}</p>
                                    <p class="text-yellow-600 font-medium">Statut : En attente</p>
                                    <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="mt-3 cancel-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="cancel-btn bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700" data-action="{{ route('appointments.destroy', $appointment->id) }}">Annuler</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div id="confirmModal" class="fixed inset-0 bg-black bg-opacity-40 hidden items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 w-11/12 sm:w-96 shadow-lg">
            <h3 class="text-lg font-semibold mb-4">Confirmer l'annulation</h3>
            <p class="text-gray-700 mb-5">Voulez-vous vraiment annuler cette réservation ?</p>
            <div class="flex justify-end gap-3">
                <button id="cancelModalBtn" class="px-4 py-2 rounded border border-gray-300 hover:bg-gray-100">Annuler</button>
                <button id="confirmModalBtn" class="px-4 py-2 rounded bg-red-600 text-white hover:bg-red-700">Oui, annuler</button>
            </div>
        </div>
    </div>

    <script>
        const modal = document.getElementById('confirmModal');
        const cancelModalBtn = document.getElementById('cancelModalBtn');
        const confirmModalBtn = document.getElementById('confirmModalBtn');
        let activeForm = null;

        document.querySelectorAll('.cancel-btn').forEach(button => {
            button.addEventListener('click', function() {
                const form = this.closest('form');
                activeForm = form;
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            });
        });

        cancelModalBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            activeForm = null;
        });

        confirmModalBtn.addEventListener('click', () => {
            if (activeForm) {
                activeForm.submit();
            }
        });
    </script>
</body>

</html>