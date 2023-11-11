@if (session('message'))
    <div class="bg-blue-100 border-t border-b border-green-500 text-green-700 px-4 py-3" role="alert">
        <p class="font-bold">Complimenti!</p>
        <p class="text-sm">{{ session('message') }}</p>
    </div>
@endif
