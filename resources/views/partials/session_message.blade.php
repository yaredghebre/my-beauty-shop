@if (session('message'))
    <div class="ms_alert_handle bg-blue-100 border-t border-b border-green-500 text-green-700 px-4 py-3" role="alert">
        <p class="font-bold">Complimenti!</p>
        <p class="font-bold">{{ session('message') }}</p>
    </div>
@endif
