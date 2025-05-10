<title>Chat List</title>
<link rel="icon" type="image/x-icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cd/WebSocket_colored_logo.svg/1200px-WebSocket_colored_logo.svg.png">

<x-app-layout>
      <!-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> -->
    <div class="py-12">
        <div class="m-auto max-w-5xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-md sm:rounded-lg">
                <div class="p-6 bg-gradient-to-br from-green-50 to-green-100 border-b border-green-200">
                    <h2 class="text-xl font-semibold text-green-800 mb-6">Conversations</h2>

                    <div class="grid grid-cols-1 gap-4">
                        @foreach ($users as $user)
                            <div class="bg-white shadow hover:shadow-lg transition duration-200 rounded-xl p-4 flex items-center justify-between">
                                <a href="{{ route('chat', $user) }}" class="flex items-center space-x-4">
                                    <img src="https://i.pravatar.cc/50?u={{ $user->id }}" alt="{{ $user->name }}"
                                         class="w-12 h-12 rounded-full shadow" />

                                    <div>
                                        <div class="text-base font-semibold text-gray-800 hover:text-green-600">{{ $user->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $user->email }}</div>
                                    </div>
                                </a>

                                <div class="flex gap-3">
                                    <a href="#" title="Call">
                                        <img src="https://static.thenounproject.com/png/1197999-200.png"
                                             class="h-6 hover:scale-110 transition-transform" alt="Call Icon" />
                                    </a>
                                    <a href="#" title="Archive">
                                        <img src="https://cdn.iconscout.com/icon/premium/png-256-thumb/archive-2651503-2198444.png?f=webp&w=256"
                                             class="h-6 hover:scale-110 transition-transform" alt="Archive Icon" />
                                    </a>
                                    <a href="#" title="Delete">
                                        <img src="https://cdn-icons-png.flaticon.com/512/3161/3161358.png"
                                             class="h-6 hover:scale-110 transition-transform" alt="Delete Icon" />
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
