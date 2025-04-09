<x-app-layout>
    @section('angel')
    <div class="w-full text-center py-32">
        <h1 class="text-2xl md:text-3xl font-bold text-center lg:text-5xl text-gray-700">
            <span class="text-blue-500">Uudenaika</span>
        </h1>
        <p class="text-gray-500 text-lg">Avaa mielesi</p>
        <button onclick="drawAngelCard()" class="px-3 py-2 text-lg text-white bg-blue-800 rounded mt-5 inline-block">
            Nosta Enkelikortti
        </button>
        <div id="angelcard" class="mt-5 text-center hidden bg-blue-100 p-5 rounded-lg shadow-lg w-64 mx-auto">
            <img id="angel-image" width="200" height="100" src="" class="mx-auto rounded-lg shadow-md max-w-md" />
            <p id="angel-message" class="mt-5 text-xl italic text-gray-700"></p>
        </div>
        
        <script>
            async function drawAngelCard() {
                const res = await fetch('/api/angel-card');
                const data = await res.json();
        
                document.getElementById('angel-image').src = data.image;
                document.getElementById('angel-message').textContent = data.message;
                document.getElementById('angelcard').classList.remove('hidden');
            }
        </script>
        
    </div>
    @endsection

    <div class="mb-10 w-full">
        <div class="mb-16">
            <h2 class="mt-16 mb-5 text-3xl text-blue-500 font-bold">Featured Posts</h2>
            <div class="w-full">
                <div class="grid grid-cols-3 gap-10 w-full">
                    @foreach ($featuredPosts as $post)
                        <x-posts.postcard :post="$post" />
                    @endforeach
                </div>
            </div>
            <a class="mt-10 block text-center text-lg text-blue-500 font-semibold"
                href="http://127.0.0.1:8000/blog">More
                Posts</a>
        </div>
        <hr>

        <h2 class="mt-16 mb-5 text-3xl text-blue-500 font-bold">Latest Posts</h2>
        <div class="w-full mb-5">
           
        </div>
        <a class="mt-10 block text-center text-lg text-blue-500 font-semibold" href="http://127.0.0.1:8000/blog">More
            Posts</a>
    </div>
</x-app-layout>
