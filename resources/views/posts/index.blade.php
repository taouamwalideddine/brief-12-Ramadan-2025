@extends('layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    @if($type === 'experience')
        <h1 class="text-3xl font-bold text-[#c4a484] mb-6">Expériences du Ramadan</h1>
    @else
        <div class="flex space-x-4 mb-6">
            <a href="?category=entrees" class="px-4 py-2 border border-[#c4a484] text-[#c4a484] rounded-lg hover:bg-[#c4a484] hover:text-[#1a1f2c]">
                Entrées
            </a>
            <a href="?category=plats" class="px-4 py-2 border border-[#c4a484] text-[#c4a484] rounded-lg hover:bg-[#c4a484] hover:text-[#1a1f2c]">
                Plats
            </a>
            <a href="?category=desserts" class="px-4 py-2 border border-[#c4a484] text-[#c4a484] rounded-lg hover:bg-[#c4a484] hover:text-[#1a1f2c]">
                Desserts
            </a>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($posts as $post)
            <div class="bg-[#243447] border border-[#c4a484] rounded-lg p-6">
                <h3 class="text-xl font-bold text-[#c4a484] mb-2">{{ $post->title }}</h3>
                <p class="text-[#c4a484] mb-4">{{ $post->content }}</p>
                @if($post->image_url)
                    <img src="{{ asset('storage/' . $post->image_url) }}" class="rounded-lg mb-4">
                @endif
                <!-- Modal Trigger -->
                <button onclick="openModal({{ $post->id }})" class="text-[#c4a484] hover:underline">
                    Voir les commentaires ({{ $post->comments->count() }})
                </button>
            </div>
        @endforeach
    </div>
    <div class="mt-8">
        <a href="{{ route('posts.create') }}?type={{ $type }}" class="px-4 py-2 bg-[#0f4c44] text-[#c4a484] rounded-lg hover:bg-[#c4a484] hover:text-[#1a1f2c]">
            ➕ Créer une nouvelle {{ $type === 'experience' ? 'expérience' : 'recette' }}
        </a>
    </div>
    <!-- Modal Structure -->
    <div id="postModal" class="fixed inset-0 z-50 hidden">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <div class="bg-[#243447] border border-[#c4a484] rounded-lg p-6 w-full max-w-2xl">
                <!-- Modal Content (Loaded via JavaScript) -->
                <div id="modalContent"></div>
                <!-- Close Button -->
                <button onclick="closeModal()" class="mt-4 px-4 py-2 bg-[#0f4c44] text-[#c4a484] rounded-lg hover:bg-[#c4a484] hover:text-[#1a1f2c]">
                    Fermer
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    // Open Modal
    function openModal(postId) {
        fetch(`/posts/${postId}/modal`)
            .then(response => response.text())
            .then(data => {
                document.getElementById('modalContent').innerHTML = data;
                document.getElementById('postModal').classList.remove('hidden');
            });
    }

    // Close Modal
    function closeModal() {
        document.getElementById('postModal').classList.add('hidden');
    }
</script>
@endsection