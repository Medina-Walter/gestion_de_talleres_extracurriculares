<div class="p-6 max-w-5xl mx-auto">

    @if (session()->has('mensaje'))
        <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
            {{ session('mensaje') }}
        </div>
    @endif

    <h2 class="text-2xl font-bold mb-4">Gestión de Alumnos</h2>

    <table class="w-full table-auto bg-white shadow rounded-lg">
        <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="p-2 text-left">Nombre</th>
                <th class="p-2 text-left">Apellido</th>
                <th class="p-2 text-left">Email</th>
                <th class="p-2 text-left">DNI</th>
                <th class="p-2 text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alumnos as $alumno)
                <tr class="border-b">
                    <td class="p-2">
                        <input type="text" 
                               wire:model.defer="datos.{{ $alumno->id }}.nombre"
                               class="border rounded p-1 w-full"
                               placeholder="Nombre"
                               @if (!$modoEdicion[$alumno->id]) readonly @endif>
                    </td>
                    <td class="p-2">
                        <input type="text" 
                               wire:model.defer="datos.{{ $alumno->id }}.apellido"
                               class="border rounded p-1 w-full"
                               placeholder="Apellido"
                               @if (!$modoEdicion[$alumno->id]) readonly @endif>
                    </td>
                    <td class="p-2">
                        <input type="email" 
                               wire:model.defer="datos.{{ $alumno->id }}.email"
                               class="border rounded p-1 w-full"
                               placeholder="Email"
                               @if (!$modoEdicion[$alumno->id]) readonly @endif>
                    </td>
                    <td class="p-2">
                        <input type="text" 
                               wire:model.defer="datos.{{ $alumno->id }}.dni"
                               class="border rounded p-1 w-full"
                               placeholder="DNI"
                               @if (!$modoEdicion[$alumno->id]) readonly @endif>
                    </td>
                    <td class="p-2 text-center space-x-2">
                        @if (!$modoEdicion[$alumno->id])
                            <button wire:click="editar({{ $alumno->id }})"
                                    class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                Editar
                            </button>
                        @else
                            <button wire:click="actualizar({{ $alumno->id }})"
                                    class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                Actualizar
                            </button>
                        @endif

                        <button wire:click="eliminar({{ $alumno->id }})"
                                class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700"
                                onclick="return confirm('¿Estás seguro de eliminar este alumno?')">
                            Eliminar alumno
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
