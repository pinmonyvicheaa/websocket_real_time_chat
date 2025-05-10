<title>Chat</title>
<link rel="icon" type="image/x-icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cd/WebSocket_colored_logo.svg/1200px-WebSocket_colored_logo.svg.png">

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-green-700">
            {{ $friend->name }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-2xl rounded-2xl overflow-hidden">
                
                <!-- Header Bar -->
                <div class="flex items-center justify-between px-6 py-4 bg-gradient-to-r from-green-300 to-green-200 border-b border-green-300">
                    <div class="flex items-center gap-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/1177/1177568.png"
                             class="w-12 h-12 rounded-full border border-white shadow"
                             alt="Avatar">
                        <h2 class="text-lg font-semibold text-gray-800">
                            {{ $friend->name }}
                        </h2>
                    </div>
                    <div class="flex gap-4 items-center">
                        <img src="https://www.freeiconspng.com/thumbs/phone-icon/phone-icon-png--clipart-best-17.png"
                             class="w-7 h-7 hover:scale-110 transition-transform cursor-pointer"
                             alt="Call">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ee/Icons8_flat_video_call.svg/800px-Icons8_flat_video_call.svg.png"
                             class="w-7 h-7 hover:scale-110 transition-transform cursor-pointer"
                             alt="Video Call">
                        <img src="https://img.icons8.com/ios_filled/512/40C057/info.png"
                             class="w-6 h-6 hover:scale-110 transition-transform cursor-pointer"
                             alt="Info">
                    </div>
                </div>

                <!-- Chat Component Container -->
                <div class="p-6 bg-white h-[70vh] overflow-y-auto scrollbar-thin scrollbar-thumb-green-300 scrollbar-track-green-100">
                    <chat-component :friend="{{ $friend }}" :current-user="{{ auth()->user() }}" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
