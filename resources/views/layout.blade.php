<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ramadan 2025</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-[#1a1f2c]">
    <!-- Navigation Bar -->
    <nav class="bg-[#0f4c44] py-4">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <!-- Logo and Title -->
            <a href="{{ route('welcome') }}" class="text-2xl font-bold text-[#c4a484]">Ramadan 2025</a>

            <!-- Navigation Links -->
            <div class="flex items-center space-x-8">
                <!-- Experiences Link -->
                <a href="{{ route('experiences') }}" class="text-[#c4a484] hover:underline">
                    Expériences
                </a>

                <!-- Recipes Link -->
                <a href="{{ route('recipes') }}" class="text-[#c4a484] hover:underline">
                    Recettes
                </a>
            </div>
        </div>
    </nav>

    <!-- Content Section -->
    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>
</body>
</html>