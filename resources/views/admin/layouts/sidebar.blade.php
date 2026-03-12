<aside class="w-64 bg-red-900 min-h-screen text-white p-5 flex flex-col">
    
    <div>
        <h2 class="text-xl font-bold mb-6">ADMIN PANEL</h2>

        <ul class="space-y-3">
            <li>
                <a href="{{ route('dashboard') }}" class="block hover:bg-gray-700 p-2 rounded">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ url('/') }}" class="block hover:bg-gray-700 p-2 rounded">
                    Home
                </a>
            </li>
            
        </ul>

        <!-- Logout tepat di bawah menu -->
        <div class="pt-6">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full bg-red-500 hover:bg-red-600 p-2 rounded text-white">
                    Logout
                </button>
            </form>
        </div>

    </div>

</aside>