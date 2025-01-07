<div class="bg-gray-800 text-white h-screen w-64 fixed">
    <div class="p-4 text-lg font-bold border-b border-gray-700">
        Sistema de Gestión
    </div>
    <nav class="mt-4">
        <ul class="space-y-2">
            <li>
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-gray-700 rounded">
                    Dashboard
                </a>
            </li>
            @if(auth()->user()->isSupervisor() || auth()->user()->isCoordinator())
                <li>
                    <a href="{{ route('users.create') }}" class="block px-4 py-2 hover:bg-gray-700 rounded">
                        Registrar Usuario
                    </a>
                </li>
                <li>
                    <a href="{{ route('users.manage') }}" class="block px-4 py-2 hover:bg-gray-700 rounded">
                        Gestionar Usuarios
                    </a>
                </li>
            @endif
        </ul>
    </nav>
</div>
