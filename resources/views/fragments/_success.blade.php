@if (session('status'))
    <div class="flex items-center p-4 mb-4 text-sm text-green-800 bg-green-100 border border-green-300 rounded-lg shadow-md" role="alert">
        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01m-6.938 4h13.856c1.104 0 2-.896 2-2V6c0-1.104-.896-2-2-2H5.062c-1.104 0-2 .896-2 2v12c0 1.104.896 2 2 2z"></path>
        </svg>
        <span class="font-medium">{{ session('status') }}</span>
    </div>
@endif
