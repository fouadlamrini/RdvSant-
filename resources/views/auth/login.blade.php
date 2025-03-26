<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Connectez-vous à votre compte pour gérer vos rendez-vous médicaux, consulter les disponibilités des professionnels et accéder à vos informations personnelles.">
    <title>Sign In</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body
    class="flex min-h-screen items-center justify-center  h-screen p-4 md:bg-[url('/images/360_F_424309320_UkOxg2z3sq7yXwGnWCO6xBXkRI4byhnI.jpg')] bg-cover bg-center">

    <div
        class="bg-white p-6 md:p-8 rounded-2xl shadow-lg flex flex-col md:flex-row items-center gap-8 w-full max-w-4xl border border-gray-100">
        <!-- Image -->
        <div class="hidden md:block w-full md:w-1/2">
            <img src="{{ asset('images/daily-031015-x.jpg.webp') }}" alt="Doctor"
                class="w-full h-auto rounded-xl object-cover max-h-[500px] shadow-md">
        </div>

        <!-- Form -->
        <div class="w-full md:w-1/2 px-0 md:px-4">
            <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Sign in</h2>

            <form class="space-y-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="email" placeholder="   Email"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" id="password" placeholder="  password"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white">
                </div>

                <button type="submit"
                    class="w-full bg-black text-white py-3 rounded-xl hover:bg-gray-800 transition duration-300 font-medium mt-2 shadow-md">
                    Continue
                </button>

                <p class="text-center text-sm text-gray-600 mt-4">
                    You don't have an account?
                    <a href="#" class="font-semibold text-blue-600 hover:underline ml-1">Sign up</a>
                </p>
            </form>
        </div>
    </div>

</body>

</html>
