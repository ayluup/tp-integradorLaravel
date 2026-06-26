<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Laboratorio</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100">

<div class="max-w-7xl mx-auto p-6">

    <h1 class="text-3xl font-bold text-center mb-8">
        Sistema de Gestión del Laboratorio
    </h1>

    @if(session('success'))

        <div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded-md mb-6">

            {{ session('success') }}

        </div>

    @endif


    <!-- FORMULARIO -->

    <div class="bg-white rounded-xl shadow-md p-6 mb-8">

        <h2 class="text-xl font-semibold mb-4">

            Agregar equipo

        </h2>

        <form method="POST"
              action="{{ route('equipos.store') }}"
              enctype="multipart/form-data">

            @csrf

            <input
                type="text"
                name="nombre"
                placeholder="Nombre del equipo"

                class="w-full rounded-md border-gray-300 shadow-sm border p-2 focus:border-blue-500 focus:ring focus:ring-blue-200 mb-3"
            >

            <input
                type="text"
                name="numero_serie"
                placeholder="Número de serie"

                class="w-full rounded-md border-gray-300 shadow-sm border p-2 focus:border-blue-500 focus:ring focus:ring-blue-200 mb-3"
            >

            <textarea
                name="descripcion"

                placeholder="Descripción"

                class="w-full rounded-md border-gray-300 shadow-sm border p-2 focus:border-blue-500 focus:ring focus:ring-blue-200 mb-3"

            ></textarea>


            <select

                name="aula_id"

                class="w-full rounded-md border-gray-300 shadow-sm border p-2 focus:border-blue-500 focus:ring focus:ring-blue-200 mb-3"

            >

                <option value="">

                    Seleccionar ubicación

                </option>

                @foreach($aulas as $aula)

                    <option value="{{ $aula->id }}">

                        {{ $aula->nombre_sala }}

                    </option>

                @endforeach

            </select>


            <input

                type="file"

                name="imagen"

                accept=".jpg,.jpeg,.png"

                class="w-full rounded-md border-gray-300 shadow-sm border p-2 focus:border-blue-500 focus:ring focus:ring-blue-200 mb-4"

            >


            <button

                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md transition"

            >

                Guardar Equipo

            </button>

        </form>

    </div>


    <!-- LISTADO -->

    <h2 class="text-xl font-semibold mb-6">

        Listado de Equipos

    </h2>


    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-2">

        @forelse($equipos as $equipo)

            <div class="bg-white rounded-xl shadow-md border border-gray-100 transition hover:shadow-lg overflow-hidden">


                @if($equipo->imagen_ruta)

                    <img

                        src="{{ asset($equipo->imagen_ruta) }}"

                        class="w-full h-48 object-cover"

                    >

                @else

                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">

                        <span class="text-gray-500">

                            Sin imagen

                        </span>

                    </div>

                @endif


                <div class="p-4">

                    <h3 class="text-lg font-bold text-gray-800">

                        {{ $equipo->nombre }}

                    </h3>


                    <p class="text-gray-500 mt-1">

                        Serie: {{ $equipo->numero_serie }}

                    </p>


                    <div class="mt-3">

                        <span class="bg-blue-50 text-blue-700 px-2.5 py-0.5 rounded-full text-xs font-semibold">

                            {{ $equipo->aula ? $equipo->aula->nombre_sala : 'Sin ubicación' }}

                        </span>

                    </div>


                    <p class="text-gray-700 mt-3">

                        {{ $equipo->descripcion }}

                    </p>

                </div>

            </div>

        @empty

            <div class="col-span-3">

                <div class="bg-yellow-100 text-yellow-700 p-4 rounded">

                    No hay equipos cargados.

                </div>

            </div>

        @endforelse

    </div>

</div>

</body>
</html>