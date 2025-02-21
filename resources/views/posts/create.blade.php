@extends('layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-[#c4a484] mb-6">Créer une nouvelle {{ $type === 'experience' ? 'expérience' : 'recette' }}</h1>
    
    <form method="POST" action="{{ route('posts.store') }}" class="space-y-6">
        @csrf
        <input type="hidden" name="type" value="{{ $type }}">
        
        <div>
            <label class="block text-[#c4a484] mb-2">Titre</label>
            <input type="text" name="title" required class="w-full p-2 rounded-md bg-[#1a1f2c] border border-[#c4a484] text-[#c4a484]">
        </div>

        <div>
            <label class="block text-[#c4a484] mb-2">Contenu</label>
            <textarea name="content" required class="w-full h-32 p-2 rounded-md bg-[#1a1f2c] border border-[#c4a484] text-[#c4a484]"></textarea>
        </div>

        @if($type === 'recipe')
            <div>
                <label class="block text-[#c4a484] mb-2">Catégorie</label>
                <select name="category_id" class="w-full p-2 rounded-md bg-[#1a1f2c] border border-[#c4a484] text-[#c4a484]">
                    <option value="">Sélectionner une catégorie</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        @endif

        <button type="submit" class="px-6 py-3 bg-[#0f4c44] text-[#c4a484] rounded-lg hover:bg-[#c4a484] hover:text-[#1a1f2c] transition-all">
            Publier
        </button>
    </form>
</div>
@endsection