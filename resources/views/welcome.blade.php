@extends('layout')

@section('content')
<div class="text-center">
    <h1 class="text-4xl font-bold text-[#c4a484] mb-4">Bienvenue sur Ramadan 2025</h1>
    <p class="text-[#c4a484] mb-8">Partagez vos expériences et découvrez des recettes pour le mois sacré.</p>

    <!-- Statistics Section -->
    <div class="bg-[#243447] border border-[#c4a484] rounded-lg p-6 max-w-md mx-auto mb-8">
        <h2 class="text-2xl font-bold text-[#c4a484] mb-4">Statistiques</h2>
        <div class="space-y-2">
            <p class="text-[#c4a484]">Expériences: {{ $stats['experiences'] }}</p>
            <p class="text-[#c4a484]">Recettes: {{ $stats['recipes'] }}</p>
            <p class="text-[#c4a484]">Total Posts: {{ $stats['total_posts'] }}</p>
        </div>
    </div>

    <!-- Navigation Buttons -->
    <div class="space-x-4">
        <a href="{{ route('experiences') }}" class="px-4 py-2 bg-[#0f4c44] text-[#c4a484] rounded-lg hover:bg-[#c4a484] hover:text-[#1a1f2c]">
            Voir les expériences
        </a>
        <a href="{{ route('recipes') }}" class="px-4 py-2 bg-[#0f4c44] text-[#c4a484] rounded-lg hover:bg-[#c4a484] hover:text-[#1a1f2c]">
            Voir les recettes
        </a>
    </div>
</div>
@endsection