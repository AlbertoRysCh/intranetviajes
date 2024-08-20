<x-approxana-layout>
    <div class="mt-6 text-center sm:text-left">
        <div class="max-w-7xl mx-auto my-4 sm:px-6 lg:px-8 flex flex-row justify-between max-sm:flex-col max-sm:px-4">
            <div>
                <a href="{{ route('dashboard') }}"
                    class="flex flex-row items-center gap-4 border-2 border-gray-400 rounded-full w-48 py-2 justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                    </svg>
                    <p>Ir a mi Perfil</p>
                </a>
            </div>
            <div class="flex flex-row gap-4 max-sm:pt-4">
                <a href="{{ route('ficha-medica.show') }}"
                    class="flex items-center gap-4 border-2 border-gray-400 rounded-full w-48 py-2 justify-center">
                    <p>Ficha Médica</p>
                </a>
                <a href="{{ route('nutritional-sheet.show') }}"
                    class="flex items-center gap-4 border-2 border-gray-400 rounded-full w-48 py-2 justify-center">
                    <p>Ficha Nutricional</p>
                </a>
            </div>
        </div>
    </div>


    <div class="mt-6 text-center sm:text-left ">
        <div class="max-w-7xl mx-auto mt-10 mb-8 sm:px-6 lg:px-8 max-sm:px-6" >
            <div class="flex flex-row text-center gap-6 mb-8 items-center max-sm:flex-col">
                <h3 class=" font-normal text-5xl">Mis Datos</h3>
                <div class="w-80 bg-gray-300 rounded-md ">
                    <p class="text-center bg-green-400 border border-green-400 rounded-md w-72 ">95% completado</p>
                </div>
            </div>
            <div>
                <p>En esta sección, puedes actualizar tu perfil personal.
                    Esto nos permitirá ofrecerte un servicio más personalizado y eficiente.</p>
            </div>
        </div>
    </div>

    <div class="p-6 pt-0 sm:py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div
                class="grid grid-cols-2 gap-x-8 gap-y-6 sm:grid-cols-3 p-6 py-8 bg-white border
                 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class=" col-span-1 max-sm:col-span-3">
                    <x-texthead>
                        {{ __('Mis Datos Personales') }}
                    </x-texthead>
                </div>

                <div class="col-span-3 grid grid-cols-3 w-full">
                    <div class="row-span-2 col-span-1 max-sm:col-span-3 max-sm:row-span-1">
                        <form id="photo-form" action="{{ route('usuarios.updateFoto') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class=" flex flex-col items-center relative">
                                <div class=" w-52 h-52  border-2 border-gray-500 rounded-full overflow-hidden">
                                    <img id="user-avatar"
                                        src="{{ $user->foto ? asset('storage/' . $user->foto) : '/images/avatar-user.jpg' }}"
                                        alt="User Avatar">
                                </div>
                                <div class="flex flex-col items-center absolute right-16 top-32">
                                    <input type="file" name="avatar" id="avatar" class="hidden" accept="image/*">
                                    <label for="avatar"
                                        class="border border-gray-600 bg-white text-gray-600 text-sm rounded-full p-4 
                                        hover:border-red-rv hover:bg-red-rv hover:text-white cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1
                                             1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5
                                              4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75
                                               21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </label>
                                </div>
                                <div id="error-message" class="text-white-rv mt-2 pt-3" style="display: none;">
                                    La imagen debe tener un tamaño de 512x512 píxeles.
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class=" max-sm:col-span-3 col-span-2 grid grid-cols-1">
                        <form action="{{ route('user.update') }}" method="POST" id="user-form">
                            @csrf
                            <div class="mt-2.5">
                                <label for="name"
                                    class="block text-sm font-semibold leading-6 text-gray-900">Nombres</label>
                                <div class="mt-2.5">
                                    <input type="text" name="name" id="name" autocomplete="given-name"
                                        value="{{ $user->name }}" readonly disabled
                                        class="bg-gray-50 block w-full rounded-md border-0 px-3.5 py-2 text-gray-500 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <div class="mt-2.5">
                                <label for="apellidos"
                                    class="block text-sm font-semibold leading-6 text-gray-900">Apellidos</label>
                                <div class="mt-2.5">
                                    <input type="text" name="apellidos" id="apellidos" autocomplete="family-name"
                                        value="{{ $user->apellidos }}" readonly disabled
                                        class="bg-gray-50  block w-full rounded-md border-0 px-3.5 py-2 text-gray-500 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                                </div>
                            </div>
                    </div>
                </div>
                <div class="max-sm:col-span-3">
                    <label for="tipo_documento" class="block text-sm font-semibold leading-6 text-gray-900">Tipo
                        Documento</label>
                    <div class="mt-2.5">
                        <!--<select id="tipo_documento" name="tipo_documento"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                                <option value="Seleccionar opción"
                                    {{ $user->tip_documento == 'Seleccionar opción' ? 'selected' : '' }}>Seleccionar
                                    opción</option>
                                <option value="pasaporte" {{ $user->tip_documento == 'pasaporte' ? 'selected' : '' }}>
                                    Pasaporte</option>
                                <option value="dni" {{ $user->tip_documento == 'dni' ? 'selected' : '' }}>Dni
                                </option>
                                <option value="Otro" {{ $user->tip_documento == 'Otro' ? 'selected' : '' }}>Otro
                                </option>
                            </select>-->
                        <input type="text" name="tipo_documento" id="tipo_documento" autocomplete="family-name"
                            readonly value="{{ $user->tip_documento }}"
                            class="bg-gray-50 block w-full rounded-md border-0 px-3.5 py-2 text-gray-500 shadow-sm ring-1 ring-inset
                                 ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-gray-400 sm:text-sm sm:leading-6">

                    </div>
                </div>

                <div class="max-sm:col-span-3">
                    <label for="documento" class="block text-sm font-semibold leading-6 text-gray-900">N°
                        Documento</label>
                    <div class="mt-2.5">
                        <input type="text" name="documento" id="documento" autocomplete="family-name" readonly
                            value="{{ $user->documento }}"
                            class="bg-gray-50 block w-full rounded-md border-0 px-3.5 py-2 text-gray-500 shadow-sm ring-1 ring-inset
                                 ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-gray-400 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="max-sm:col-span-3">
                    <label for="nacimiento" class="block text-sm font-semibold leading-6 text-gray-900">Fecha de
                        Nacimiento</label>
                    <div class="relative max-w-sm mt-2.5">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input datepicker id="default-datepicker" name="nacimiento" type="text"
                            value="{{ $user->nacimiento ? \Carbon\Carbon::parse($user->nacimiento)->format('m/d/Y') : '' }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-rv focus:border-red-rv block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-rv dark:focus:border-red-rv"
                            placeholder="Selecciona fecha">
                    </div>
                </div>

                <div class="max-sm:col-span-3">
                    <label for="genero" class="block text-sm font-semibold leading-6 text-gray-900">Género</label>
                    <div class="mt-2.5">
                        <select id="genero" name="genero"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                            <option value="Seleccionar opción"
                                {{ $user->sexo == 'Seleccionar opción' ? 'selected' : '' }}>Seleccionar opción
                            </option>
                            <option value="Masculino" {{ $user->sexo == 'Masculino' ? 'selected' : '' }}>Masculino
                            </option>
                            <option value="Femenino" {{ $user->sexo == 'Femenino' ? 'selected' : '' }}>Femenino
                            </option>
                            <option value="Otro" {{ $user->sexo == 'Otro' ? 'selected' : '' }}>Otro</option>
                        </select>

                    </div>
                </div>

                <div class="max-sm:col-span-3">
                    <label for="edad" class="block text-sm font-semibold leading-6 text-gray-900">Edad</label>
                    <div class="mt-2.5">
                        <input type="text" name="edad" id="edad" autocomplete="given-name"
                            value="{{ $user->edad }}"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="max-sm:col-span-3">
                    <label for="direccion"
                        class="block text-sm font-semibold leading-6 text-gray-900">Dirección</label>
                    <div class="mt-2.5">
                        <input type="text" name="direccion" id="direccion" autocomplete="family-name"
                            value="{{ $user->direccion }}"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="max-sm:col-span-3">
                    <label for="correo" class="block text-sm font-semibold leading-6 text-gray-900">Correo</label>
                    <div class="mt-2.5">
                        <input type="text" name="correo" id="correo" autocomplete="family-name"
                            value="{{ $user->email }}" readonly disabled
                            class="bg-gray-50  block w-full rounded-md border-0 px-3.5 py-2 text-gray-500 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="max-sm:col-span-3">
                    <label for="celular" class="block text-sm font-semibold leading-6 text-gray-900">Celular
                        Pasajero</label>
                    <div class="mt-2.5">
                        <input type="text" name="celular" id="celular" autocomplete="family-name"
                            value="{{ $user->telefono }}" readonly disabled
                            class="bg-gray-50  block w-full rounded-md border-0 px-3.5 py-2 text-gray-500 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="max-sm:col-span-3">
                    <label for="p_origen" class="block text-sm font-semibold leading-6 text-gray-900">País de
                        Origen</label>
                    <div class="mt-2.5">
                        <select id="countries" name="p_origen"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                            @foreach ($countries as $country)
                                <option value="{{ $country->es_name }}"
                                    {{ $user->pais_origen == $country->es_name ? 'selected' : '' }}>
                                    {{ $country->es_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class=" col-span-3">
                    <x-texthead>
                        {{ __('Contacto de Emergencia') }}
                    </x-texthead>
                </div>
                <div class="max-sm:col-span-3">
                    <label for="nombre_emer"
                        class="block text-sm font-semibold leading-6 text-gray-900">Nombres</label>
                    <div class="mt-2.5">
                        <input type="text" name="nombre_emer" id="nombre_emer" autocomplete="given-name"
                            value="{{ $user->nombre_emer }}"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="max-sm:col-span-3">
                    <label for="apellido_emer"
                        class="block text-sm font-semibold leading-6 text-gray-900">Apellidos</label>
                    <div class="mt-2.5">
                        <input type="text" name="apellido_emer" id="apellido_emer" autocomplete="family-name"
                            value="{{ $user->apellido_emer }}"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="max-sm:col-span-3">
                    <div class="flex flex-row gap-2">
                        <label for="celular_emer"
                            class="block text-sm font-semibold leading-6 text-gray-900">Celular</label>

                        <button data-tooltip-target="tooltip-default" type="button"
                            class="text-white bg-red-rv hover:bg-red-rv
                             font-medium rounded-full text-sm text-center">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0
                                 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                              </svg>                              
                        </button>

                        <div id="tooltip-default" role="tooltip"
                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium
                             text-white transition-opacity duration-300 bg-gray-900 rounded-lg
                              shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Este numero servira para enviar<br>
                             las notificaciones acerca de las<br>
                              acciones del alumno en el viaje.
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </div>
                    <div class="mt-2.5">
                        <input type="text" name="celular_emer" id="celular_emer" autocomplete="family-name"
                            value="{{ $user->celular_emer }}"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>

            <!-- SOBRE MÍ -->
            <div
                class="grid grid-cols-2 gap-x-8 gap-y-6 sm:grid-cols-3 p-6 py-8 my-8 bg-white border
                 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="col-span-3">
                    <x-texthead>
                        {{ __('Sobre Mí (opcional)') }}
                    </x-texthead>
                </div>
                <div class="max-sm:col-span-3">
                    <label for="hobbie" class="block text-sm font-semibold leading-6 text-gray-900">Hobbies</label>
                    <div class="mt-2.5">
                        <input type="text" name="hobbie" id="hobbie" autocomplete="given-name"
                            value="{{ $user->hobbies }}"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="max-sm:col-span-3">
                    <label for="deporte" class="block text-sm font-semibold leading-6 text-gray-900">Deporte</label>
                    <div class="mt-2.5">
                        <input type="text" name="deporte" id="deporte" autocomplete="family-name"
                            value="{{ $user->deportes }}"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="max-sm:col-span-3">
                    <label for="plato_fav" class="block text-sm font-semibold leading-6 text-gray-900">Plato
                        Favorito</label>
                    <div class="mt-2.5">
                        <input type="text" name="plato_fav" id="plato_fav" autocomplete="family-name"
                            value="{{ $user->plato_fav }}"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="max-sm:col-span-3">
                    <label for="color" class="block text-sm font-semibold leading-6 text-gray-900">Color</label>
                    <div class="mt-2.5">
                        <input type="text" name="color" id="color" autocomplete="given-name"
                            value="{{ $user->color_fav }}"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="max-sm:col-span-3">
                    <label for="act_relacional" class="block text-sm font-semibold leading-6 text-gray-900">Actitud
                        Relacional</label>
                    <div class="mt-2.5">
                        <select id="act_relacional" name="act_relacional"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                            <option value="Selecionar opcion"
                                {{ $user->acti_relacional == 'Selecionar opcion' ? 'selected' : '' }}>Seleccionar
                                opción</option>
                            <option value="Confianza" {{ $user->acti_relacional == 'Confianza' ? 'selected' : '' }}>
                                Confianza</option>
                            <option value="Timidez" {{ $user->acti_relacional == 'Timidez' ? 'selected' : '' }}>
                                Timidez</option>
                            <option value="Facilidad de Trato"
                                {{ $user->acti_relacional == 'Facilidad de Trato' ? 'selected' : '' }}>Facilidad de
                                Trato</option>
                            <option value="Otro" {{ $user->acti_relacional == 'Otro' ? 'selected' : '' }}>Otro
                            </option>
                        </select>
                    </div>
                </div>
                <div class="max-sm:col-span-3">
                    <label for="esp_detalles_r" class="block text-sm font-semibold leading-6 text-gray-900">Especifiar
                        Detalles</label>
                    <div class="mt-2.5">
                        <input type="text" name="esp_detalles_r" id="esp_detalles_r" disabled
                            value="{{ $user->espe_detalles_r }}" placeholder="Indica tu otra actitud Relacional"
                            autocomplete="family-name"
                            class="bg-gray-50 text-gray-500 block w-full rounded-md border-0 px-3.5 py-2 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="max-sm:col-span-3">
                    <label for="otr_conductas" class="block text-sm font-semibold leading-6 text-gray-900">Otras
                        Conductas</label>
                    <div class="mt-2.5">
                        <select id="otr_conductas" name="otr_conductas"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                            <option value="Seleccionar opcion"
                                {{ $user->otr_conductas == 'Seleccionar opcion' ? 'selected' : '' }}>Seleccionar
                                opción</option>
                            <option value="Juega Solo" {{ $user->otr_conductas == 'Juega Solo' ? 'selected' : '' }}>
                                Juega Solo</option>
                            <option value="Juega con Otras Personas"
                                {{ $user->otr_conductas == 'Juega con Otras Personas' ? 'selected' : '' }}>Juega
                                con Otras Personas</option>
                            <option value="Otro" {{ $user->otr_conductas == 'Otro' ? 'selected' : '' }}>Otro
                            </option>
                        </select>
                    </div>
                </div>
                <div class="max-sm:col-span-3">
                    <label for="esp_detalles_c"
                        class="block text-sm font-semibold leading-6 text-gray-900">Especificar Detalles</label>
                    <div class="mt-2.5">
                        <input type="text" name="esp_detalles_c" id="esp_detalles_c" disabled
                            value="{{ $user->espe_detalles_c }}" placeholder="Especifica tu conducta relacional"
                            autocomplete="family-name"
                            class="block w-full rounded-md border-0 px-3.5 py-2 bg-gray-50 text-gray-500 shadow-sm 
                                ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 
                                focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="max-sm:col-span-3">
                    <label for="informacion_ad"
                        class="block text-sm font-semibold leading-6 text-gray-900">Información Adicional</label>
                    <div class="mt-2.5">
                        <input type="text" name="informacion_ad" id="informacion_ad" autocomplete="family-name"
                            value="{{ $user->informacion_ad }}"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>

            <!-- RESPONSABLE GRUPO -->
            <div
                class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2 p-6 py-8 my-8
                 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                <div class="col-span-3">
                    <x-texthead>
                        {{ __('Responsable del Grupo') }}
                    </x-texthead>
                </div>

                <div class="max-sm:col-span-3">
                    <label for="nombre_r" class="block text-sm font-semibold leading-6 text-gray-900">Nombre del
                        Responsable</label>
                    <div class="mt-2.5">
                        <input type="text" name="nombre_r" id="nombre_r" disabled value="Sandra Quispe"
                            autocomplete="given-name"
                            class="block w-full rounded-md border-0 px-3.5 py-2 bg-slate-300
                                text-black shadow-sm ring-1 ring-inset ring-gray-300
                                 placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                  focus:ring-red-rv sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="max-sm:col-span-3">
                    <label for="numero_c" class="block text-sm font-semibold leading-6 text-gray-900">Número de
                        Contacto</label>
                    <div class="mt-2.5">
                        <input type="text" name="numero_c" id="numero_c" disabled value="51 993 540 492"
                            autocomplete="family-name"
                            class="block w-full rounded-md border-0 px-3.5 py-2 bg-slate-300
                                text-black shadow-sm ring-1 ring-inset ring-gray-300
                                 placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                  focus:ring-red-rv sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>


            <!-- CORREO PARA NOTIFICACIONES -->

            <div
                class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2 p-6 py-8 my-8
                 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">


                <div class="col-span-3">
                    <x-texthead>
                        {{ __('Correo para Notificaciones') }}
                    </x-texthead>
                </div>
                <div class="p-6 max-sm:col-span-3">
                    <label>Por favor, ingrese su correo electrónico para recibir notificaciones </label>
                    <label for="email_r" class="block text-sm font-semibold leading-6 text-gray-900 mt-4">Correo
                        de
                        Notificaciones</label>
                    <div class="mt-2.5">
                        <input type="text" name="email_r" id="email_r" autocomplete="given-name"
                            value="{{ $user->noti_email }}"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="bg-slate-900 p-6 rounded-lg max-sm:col-span-3">
                    <div class="flex flex-row font-bold text-white-rv gap-x-3">
                        <label class="text-xl">
                            IMPORTANTE
                        </label>
                        <label>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-8">
                                <path fill-rule="evenodd"
                                    d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </label>
                    </div>
                    <div class="mt-2.5">
                        <label class="text-white-rv font-Light">
                            Al registrar su correo electrónico, recibirá notificaciones en tiempo real
                            sobre cada etapa del viaje, incluyendo salidas, llegadas, actividades programadas,
                            cualquier cambio en el itinerario, comprobante de pago, estado de cuenta y otros.
                        </label>
                    </div>
                </div>
            </div>

            <!-- BOTON GUARDAR -->

            <div class="flex flex-row justify-between pb-8 max-sm:flex-col gap-3">
                <div>
                    <a href="{{ route('dashboard') }}"
                        class="flex flex-row items-center gap-4  max-sm:w-full border-2 border-gray-400 rounded-full w-48 py-5 justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                        </svg>
                        <p>Ir a mi Perfil</p>
                    </a>
                </div>

                <x-danger-button
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                        >{{ __('Eliminar Cuenta') }}
                        </x-danger-button>
                
                        <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                                @csrf
                                @method('delete')
                    
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('¿Estás seguro de que deseas eliminar tu cuenta?') }}
                                </h2>
                    
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('Una vez que se elimine su cuenta, todos sus recursos y datos se eliminarán de forma permanente. Ingrese su contraseña para confirmar que desea eliminar su cuenta de forma permanente.') }}
                                </p>
                    
                                <div class="mt-6">
                                    <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
                    
                                    <x-text-input
                                        id="password"
                                        name="password"
                                        type="password"
                                        class="mt-1 block w-3/4"
                                        placeholder="{{ __('Contraseña') }}"
                                    />
                    
                                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                                </div>
                    
                                <div class="mt-6 flex justify-end">
                                    <x-secondary-button x-on:click="$dispatch('close')">
                                        {{ __('Cancelar') }}
                                    </x-secondary-button>
                    
                                    <x-danger-button class="ml-3">
                                        {{ __('Eliminar Cuenta') }}
                                    </x-danger-button>
                                </div>
                            </form>
                        </x-modal>


                <div id="success-message"
                    class="flex items-center text-green-600 hidden
                     bg-green-100 border border-green-600 rounded p-2 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-6 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    <span id="success-text"></span>
                </div>
                <div>
                    <button type="submit"
                        class="block w-full rounded-full bg-red-rv px-16 py-5
                            text-center text-sm font-semibold text-white shadow-sm
                            hover:bg-red-rv">
                        GUARDAR CAMBIOS
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('user-form').addEventListener('submit', function(event) {
            event.preventDefault();

            let formData = new FormData(this);

            fetch("{{ route('user.update') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const successMessage = document.getElementById('success-message');
                        const successText = document.getElementById('success-text');

                        successText.textContent = data.message;
                        successMessage.classList.remove('hidden');

                        // Opción: Puedes ocultar el mensaje después de unos segundos
                        setTimeout(() => {
                            successMessage.classList.add('hidden');
                        }, 4000);
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var selectElement = document.getElementById('act_relacional');
            var inputElement = document.getElementById('esp_detalles_r');

            selectElement.addEventListener('change', function() {
                if (selectElement.value === 'Otro') {
                    inputElement.removeAttribute('disabled');
                    inputElement.classList.remove('bg-gray-50', 'text-gray-500');
                    inputElement.classList.add('bg-white', 'text-gray-900');
                } else {
                    inputElement.setAttribute('disabled', 'disabled');
                    inputElement.classList.remove('bg-white', 'text-gray-900');
                    inputElement.classList.add('bg-gray-50', 'text-gray-500');
                }
            });

            // Ejecuta una vez al cargar la página para verificar el estado inicial
            if (selectElement.value === 'Otro') {
                inputElement.removeAttribute('disabled');
                inputElement.classList.remove('bg-gray-50', 'text-gray-500');
                inputElement.classList.add('bg-white', 'text-gray-900');
            } else {
                inputElement.setAttribute('disabled', 'disabled');
                inputElement.classList.remove('bg-white', 'text-gray-900');
                inputElement.classList.add('bg-gray-50', 'text-gray-500');
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
            var selectElement = document.getElementById('otr_conductas');
            var inputElement = document.getElementById('esp_detalles_c');

            selectElement.addEventListener('change', function() {
                if (selectElement.value === 'Otro') {
                    inputElement.removeAttribute('disabled');
                    inputElement.classList.remove('bg-gray-50', 'text-gray-500');
                    inputElement.classList.add('bg-white', 'text-gray-900');
                } else {
                    inputElement.setAttribute('disabled', 'disabled');
                    inputElement.classList.remove('bg-white', 'text-gray-900');
                    inputElement.classList.add('bg-gray-50', 'text-gray-500');
                }
            });

            // Ejecuta una vez al cargar la página para verificar el estado inicial
            if (selectElement.value === 'Otro') {
                inputElement.removeAttribute('disabled');
                inputElement.classList.remove('bg-gray-50', 'text-gray-500');
                inputElement.classList.add('bg-white', 'text-gray-900');
            } else {
                inputElement.setAttribute('disabled', 'disabled');
                inputElement.classList.remove('bg-white', 'text-gray-900');
                inputElement.classList.add('bg-gray-50', 'text-gray-500');
            }
        });

        document.getElementById('avatar').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const img = new Image();
                img.src = URL.createObjectURL(file);
                img.onload = function() {

                    document.getElementById('error-message').style.display = 'none';
                    const form = document.getElementById('photo-form');
                    const formData = new FormData(form);

                    fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content'),
                                'X-HTTP-Method-Override': 'PUT'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                document.getElementById('user-avatar').src = data.avatar_url;
                            } else {
                                console.error('Error:', data.message);
                            }
                        })
                        .catch(error => console.error('Error:', error));

                }
            }
        });
    </script>

</x-approxana-layout>
