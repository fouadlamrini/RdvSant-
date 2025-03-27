<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Doctor Sign Up</title>
</head>

<body
    class="flex items-center justify-center min-h-screen md:bg-[url('/images/360_F_424309320_UkOxg2z3sq7yXwGnWCO6xBXkRI4byhnI.jpg')] bg-cover bg-center">
    <div
        class="flex flex-col md:flex-row bg-white shadow-lg rounded-lg overflow-hidden w-11/12 sm:w-5/6 lg:w-3/4 max-w-4xl mx-4 my-8">
        <!-- Image Section - Hidden on mobile -->
        <div class="hidden md:block md:w-1/2 lg:w-2/5">
            <img src="{{ asset('images/pngtree-handsome-young-male-doctor-in-white-uniform-with-stethoscope-png-image_15738886.png') }}"
                alt="Doctor" class="w-full h-full object-contain p-6 max-h-[600px]">
        </div>

        <!-- Form Section -->
        <div class="w-full md:w-1/2 lg:w-3/5 p-6 sm:p-8 md:p-10">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-6 text-center md:text-left">Sign Up</h2>
            <form method="POST" action="{{ route('signup.doctor') }}">
                @csrf
                <!-- Name Fields -->
                <div class="flex flex-col sm:flex-row gap-4 mb-4">
                    <div class="w-full sm:w-1/2">
                        <label for="First_Name" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                        <input type="text" id="First_Name" name="first_name" placeholder="First Name"
                            class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('first_name')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full sm:w-1/2">
                        <label for="Last_Name" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                        <input type="text" id="Last_Name" name="last_name" placeholder="Last Name"
                            class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('last_name')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Email Field -->
                <div class="mb-4">
                    <label for="Email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="Email" name="email" placeholder="Email Address"
                        class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('email')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="mb-4">
                    <label for="Password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" id="Password" name="password" placeholder="Password"
                        class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('password')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Speciality Field -->
                <div class="mb-4">
                    <label for="Speciality" class="block text-sm font-medium text-gray-700 mb-1">Speciality</label>
                    <input type="text" id="Speciality" name="speciality" placeholder="Speciality"
                        class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('speciality')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Bio Field -->
                <div class="mb-6">
                    <label for="Bio" class="block text-sm font-medium text-gray-700 mb-1">Bio</label>
                    <textarea placeholder="Bio" id="Bio" name="bio" rows="3"
                        class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                    @error('Bio')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full p-3 bg-black text-white font-semibold rounded-lg shadow-md ">
                    Sign Up
                </button>
            </form>

            <!-- Login Link -->
            <p class="mt-4 text-center text-gray-600">
                Already have an account?
                <a href="#"
                    class="text-blue-600 font-semibold hover:text-blue-800 transition duration-300">Login</a>
            </p>
            @if (session('success'))
                <div class="bg-green-50  p-4 mb-4">

                    <p class="text-sm text-green-700">
                        {{ session('success') }}
                    </p>

                </div>
            @endif
        </div>
    </div>
</body>

</html>
