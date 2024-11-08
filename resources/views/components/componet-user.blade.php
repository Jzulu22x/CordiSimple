<div class="col-span-3 bg-white p-6 shadow-md rounded">
    <section class="widget locations">
        <div class="avatar mb-4 text-center">
            <img src="https://cdn-icons-png.flaticon.com/512/1057/1057231.png" alt="Avatar" class="w-24 h-24 rounded-full mx-auto" />
        </div>
        <div class="details text-center">
            <h2 class="text-xl font-semibold">{{ Auth::user()->name }}</h2>
            <p class="text-gray-600">{{ Auth::user()->email }}</p>
        </div>
    </section>
</div>