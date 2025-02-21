<div>
    <!-- Post Details -->
    <h1 class="text-2xl font-bold text-[#c4a484] mb-4">{{ $post->title }}</h1>
    <p class="text-[#c4a484] mb-4">{{ $post->content }}</p>
    @if($post->image_url)
        <img src="{{ asset('storage/' . $post->image_url) }}" class="rounded-lg mb-4">
    @endif

    <!-- Comment Form -->
    <form method="POST" action="{{ route('comments.store', $post) }}" class="mb-6">
        @csrf
        <div class="mb-4">
            <label class="block text-[#c4a484] mb-2">Your Name</label>
            <input type="text" name="name" class="w-full p-2 rounded-md bg-[#1a1f2c] border border-[#c4a484] text-[#c4a484]" placeholder="Enter your name" required>
        </div>
        <div class="mb-4">
            <label class="block text-[#c4a484] mb-2">Your Comment</label>
            <textarea name="content" class="w-full h-32 p-2 rounded-md bg-[#1a1f2c] border border-[#c4a484] text-[#c4a484]" placeholder="Write your comment..." required></textarea>
        </div>
        <button type="submit" class="px-4 py-2 bg-[#0f4c44] text-[#c4a484] rounded-lg hover:bg-[#c4a484] hover:text-[#1a1f2c]">
            Submit Comment
        </button>
    </form>

    <!-- Comments List -->
    <div class="space-y-4">
        @forelse($post->comments as $comment)
            <div class="bg-[#1a1f2c] p-4 rounded-lg">
                <h4 class="text-lg font-bold text-[#c4a484]">{{ $comment->name }}</h4>
                <p class="text-[#c4a484]">{{ $comment->content }}</p>
                <p class="text-sm text-[#c4a484] mt-2">{{ $comment->created_at->diffForHumans() }}</p>
                <form method="POST" action="{{ route('comments.destroy', $comment) }}" class="mt-2">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                </form>
            </div>
        @empty
            <p class="text-[#c4a484]">No comments yet.</p>
        @endforelse
    </div>
</div>