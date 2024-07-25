<x-approxana-layout>
    <div class="m-6 text-center sm:pt-12 sm:text-left">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-red-rv shadow-sm rounded-lg grid grid-cols-1 sm:grid-cols-4 p-6 gap-4">
                <div class="flex flex-col justify-between items-center col-span-1 sm:col-span-2 w-full">
                    <div class="p-4 text-white-rv dark:text-gray-100 text-lg sm:pl-16">
                        <div class="text-white-rv text-3xl">
                            {!! __('¡Hola ,') !!} <b>{{ explode(' ', Auth::user()->name)[0] }}
                                {{ explode(' ', Auth::user()->apellidos)[0] }}</b>!<br>
                        </div>

                        <p class="mt-4 text-white-rv-400 text-base font-Light">
                            En esta sección, puedes actualizar tu perfil personal. Esto nos permitirá ofrecerte un
                            servicio más personalizado y eficiente. Recuerda que tu foto de perfil debe ser de
                            un tamaño de 512 x 512 píxeles.
                        </p>

                    </div>
                </div>
                <div class="w-full">
                    <form id="photo-form" action="{{ route('usuarios.updateFoto') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class=" flex flex-col items-center">
                            <div class="w-40 rounded-lg overflow-hidden border-2">
                                <img id="user-avatar"
                                    src="{{ $user->foto ? asset('storage/' . $user->foto) : '/images/avatar-user.jpg' }}"
                                    alt="User Avatar">
                            </div>
                            <div class="mt-6 flex flex-col items-center">
                                <input type="file" name="avatar" id="avatar" class="hidden" accept="image/*">
                                <label for="avatar"
                                    class="border-1 bg-slate-700 text-white text-sm rounded-lg p-4 hover:bg-white hover:border-white hover:text-red-rv font-semibold">
                                    CAMBIAR FOTO
                                </label>
                            </div>
                            <div id="error-message" class="text-white-rv mt-2 pt-3" style="display: none;">
                                La imagen debe tener un tamaño de 512x512 píxeles.
                            </div>
                        </div>
                    </form>
                </div>
                <div class="flex flex-col align-middle  justify-center justify-self-center	">
                    <div class="flex flex-row text-white pb-3">
                        <p class="font-bold">Nombre:&nbsp;</p>
                        <p class="font-Light"> {{ explode(' ', Auth::user()->name)[0] }} {{ explode(' ', Auth::user()->apellidos)[0] }} </p>
                    </div>
                    <div class="flex flex-row text-white pb-3">
                        <p class=" font-bold">Correo:&nbsp;</p>
                        <p> {{ Auth::user()->email }}</p>
                    </div>
                    <div class="flex flex-row  text-white pb-3">
                        <p class="font-bold">Celular:&nbsp;</p>
                        <p>{{ Auth::user()->telefono }}</p>
                    </div>
                    <div class="flex flex-row  text-white pb-3">
                        <p class="font-bold">Grupo:&nbsp;</p>
                        <p> Grupo 01</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--- div formulario --->

    <div class="p-6 pt-0 sm:py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('user.update') }}" method="POST">
                @csrf
                <!-- MIS DATOS PERSONALES -->

                <x-texthead>
                    {{ __('Mis Datos Personales') }}
                </x-texthead>
                <div
                    class="grid grid-cols-2 gap-x-8 gap-y-6 sm:grid-cols-3 p-6 py-8 bg-white border
                 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div>
                        <label for="name"
                            class="block text-sm font-semibold leading-6 text-gray-900">Nombres</label>
                        <div class="mt-2.5">
                            <input type="text" name="name" id="name" autocomplete="given-name"
                                value="{{ $user->name }}" readonly disabled
                                class="bg-gray-50 block w-full rounded-md border-0 px-3.5 py-2 text-gray-500 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="apellidos"
                            class="block text-sm font-semibold leading-6 text-gray-900">Apellidos</label>
                        <div class="mt-2.5">
                            <input type="text" name="apellidos" id="apellidos" autocomplete="family-name"
                                value="{{ $user->apellidos }}" readonly disabled
                                class="bg-gray-50  block w-full rounded-md border-0 px-3.5 py-2 text-gray-500 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
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
                    <div>
                        <label for="tipo_documento" class="block text-sm font-semibold leading-6 text-gray-900">Tipo
                            Documento</label>
                        <div class="mt-2.5">
                            <select id="tipo_documento" name="tipo_documento"
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
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="documento" class="block text-sm font-semibold leading-6 text-gray-900">N°
                            Documento</label>
                        <div class="mt-2.5">
                            <input type="text" name="documento" id="documento" autocomplete="family-name"
                                value="{{ $user->documento }}"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
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
                    <div>
                        <label for="edad" class="block text-sm font-semibold leading-6 text-gray-900">Edad</label>
                        <div class="mt-2.5">
                            <input type="text" name="edad" id="edad" autocomplete="given-name"
                                value="{{ $user->edad }}"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="direccion"
                            class="block text-sm font-semibold leading-6 text-gray-900">Dirección</label>
                        <div class="mt-2.5">
                            <input type="text" name="direccion" id="direccion" autocomplete="family-name"
                                value="{{ $user->direccion }}"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="correo"
                            class="block text-sm font-semibold leading-6 text-gray-900">Correo</label>
                        <div class="mt-2.5">
                            <input type="text" name="correo" id="correo" autocomplete="family-name"
                                value="{{ $user->email }}" readonly disabled
                                class="bg-gray-50  block w-full rounded-md border-0 px-3.5 py-2 text-gray-500 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="celular" class="block text-sm font-semibold leading-6 text-gray-900">Celular
                            Pasajero</label>
                        <div class="mt-2.5">
                            <input type="text" name="celular" id="celular" autocomplete="family-name"
                                value="{{ $user->telefono }}" readonly disabled
                                class="bg-gray-50  block w-full rounded-md border-0 px-3.5 py-2 text-gray-500 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
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
                </div>
                <!-- CONTACTO DE EMERGENCIA -->
                <x-texthead>
                    {{ __('Contacto de Emergencia') }}
                </x-texthead>
                <div
                    class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-3 p-6 py-8 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div>
                        <label for="nombre_emer"
                            class="block text-sm font-semibold leading-6 text-gray-900">Nombres</label>
                        <div class="mt-2.5">
                            <input type="text" name="nombre_emer" id="nombre_emer" autocomplete="given-name"
                                value="{{ $user->nombre_emer }}"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="apellido_emer"
                            class="block text-sm font-semibold leading-6 text-gray-900">Apellidos</label>
                        <div class="mt-2.5">
                            <input type="text" name="apellido_emer" id="apellido_emer" autocomplete="family-name"
                                value="{{ $user->apellido_emer }}"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="celular_emer"
                            class="block text-sm font-semibold leading-6 text-gray-900">Celular</label>
                        <div class="mt-2.5">
                            <input type="text" name="celular_emer" id="celular_emer" autocomplete="family-name"
                                value="{{ $user->celular_emer }}"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                </div>

                <!-- SOBRE MÍ -->
                <x-texthead>
                    {{ __('Sobre Mí (opcional)') }}
                </x-texthead>
                <div
                    class="grid grid-cols-2 gap-x-8 gap-y-6 sm:grid-cols-3 p-6 py-8 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div>
                        <label for="hobbie"
                            class="block text-sm font-semibold leading-6 text-gray-900">Hobbies</label>
                        <div class="mt-2.5">
                            <input type="text" name="hobbie" id="hobbie" autocomplete="given-name"
                                value="{{ $user->hobbies }}"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="deporte"
                            class="block text-sm font-semibold leading-6 text-gray-900">Deporte</label>
                        <div class="mt-2.5">
                            <input type="text" name="deporte" id="deporte" autocomplete="family-name"
                                value="{{ $user->deportes }}"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="plato_fav" class="block text-sm font-semibold leading-6 text-gray-900">Plato
                            Favorito</label>
                        <div class="mt-2.5">
                            <input type="text" name="plato_fav" id="plato_fav" autocomplete="family-name"
                                value="{{ $user->plato_fav }}"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="color"
                            class="block text-sm font-semibold leading-6 text-gray-900">Color</label>
                        <div class="mt-2.5">
                            <input type="text" name="color" id="color" autocomplete="given-name"
                                value="{{ $user->color_fav }}"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="act_relacional"
                            class="block text-sm font-semibold leading-6 text-gray-900">Actitud Relacional</label>
                        <div class="mt-2.5">
                            <select id="act_relacional" name="act_relacional"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                                <option value="Selecionar opcion"
                                    {{ $user->acti_relacional == 'Selecionar opcion' ? 'selected' : '' }}>Seleccionar
                                    opción</option>
                                <option value="Confianza"
                                    {{ $user->acti_relacional == 'Confianza' ? 'selected' : '' }}>Confianza</option>
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
                    <div>
                        <label for="esp_detalles_r"
                            class="block text-sm font-semibold leading-6 text-gray-900">Especifiar Detalles</label>
                        <div class="mt-2.5">
                            <input type="text" name="esp_detalles_r" id="esp_detalles_r" disabled
                                value="{{ $user->espe_detalles_r }}" placeholder="Indica tu otra actitud Relacional"
                                autocomplete="family-name"
                                class="bg-gray-50 text-gray-500 block w-full rounded-md border-0 px-3.5 py-2 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="otr_conductas" class="block text-sm font-semibold leading-6 text-gray-900">Otras
                            Conductas</label>
                        <div class="mt-2.5">
                            <select id="otr_conductas" name="otr_conductas"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                                <option value="Seleccionar opcion"
                                    {{ $user->otr_conductas == 'Seleccionar opcion' ? 'selected' : '' }}>Seleccionar
                                    opción</option>
                                <option value="Juega Solo"
                                    {{ $user->otr_conductas == 'Juega Solo' ? 'selected' : '' }}>Juega Solo</option>
                                <option value="Juega con Otras Personas"
                                    {{ $user->otr_conductas == 'Juega con Otras Personas' ? 'selected' : '' }}>Juega
                                    con Otras Personas</option>
                                <option value="Otro" {{ $user->otr_conductas == 'Otro' ? 'selected' : '' }}>Otro
                                </option>
                            </select>
                        </div>
                    </div>
                    <div>
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
                    <div>
                        <label for="informacion_ad"
                            class="block text-sm font-semibold leading-6 text-gray-900">Información Adicional</label>
                        <div class="mt-2.5">
                            <input type="text" name="informacion_ad" id="informacion_ad"
                                autocomplete="family-name" value="{{ $user->informacion_ad }}"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                </div>

                <!-- RESPONSABLE GRUPO -->
                <x-texthead>
                    {{ __('Responsable del Grupo') }}
                </x-texthead>
                <div
                    class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2 p-6 py-8
                 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div>
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
                    <div>
                        <label for="numero_c" class="block text-sm font-semibold leading-6 text-gray-900">Número de
                            Contacto</label>
                        <div class="mt-2.5">
                            <input type="text" name="numero_c" id="numero_c" disabled
                                value="51 993 540 492" autocomplete="family-name"
                                class="block w-full rounded-md border-0 px-3.5 py-2 bg-slate-300
                                text-black shadow-sm ring-1 ring-inset ring-gray-300
                                 placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                  focus:ring-red-rv sm:text-sm sm:leading-6">
                        </div>
                    </div>
                </div>


                <!-- CORREO PARA NOTIFICACIONES -->
                <x-texthead>
                    {{ __('Correo para Notificaciones') }}
                </x-texthead>
                <div
                    class="grid grid-cols-1 gap-x-8 sm:grid-cols-2
                     bg-white border border-gray-200 rounded-lg
                      shadow dark:bg-gray-800 dark:border-gray-700 overflow-hidden">
                    <div class="p-6">
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
                    <div class="bg-slate-900 p-6 rounded-lg ">
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
                <!-- BOTONES GUARDAR -->

                <div class="my-10 grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-3 max-sm:hidden">
                    <div class="text-start">
                        <a href="{{ URL::previous() }}">Volver</a>
                    </div>
                    <div>
                        <button type="submit"
                            class="block w-full rounded-md bg-red-rv px-3.5 py-2.5 
                        text-center text-sm font-semibold text-white shadow-sm 
                        hover:bg-red-rv focus-visible:outline 
                        focus-visible:outline-2 focus-visible:outline-offset-2
                         focus-visible:outline--red-rv">
                            GUARDAR CAMBIOS
                        </button>
                    </div>
                    <div class="text-end">
                        <a href="/ficha-medica">Siguiente</a>
                    </div>
                </div>

                <!-- BOTONES GUARDAR PHONE -->
                <div class="my-10 grid grid-cols-2 gap-x-8 gap-y-6 sm:grid-cols-3 sm:hidden">
                    
                    <div class="col-span-2">
                        <button type="submit"
                            class="block w-full rounded-md bg-red-rv px-3.5 py-2.5 
                        text-center text-sm font-semibold text-white shadow-sm 
                        hover:bg-red-rv focus-visible:outline 
                        focus-visible:outline-2 focus-visible:outline-offset-2
                         focus-visible:outline--red-rv ">
                            GUARDAR CAMBIOS
                        </button>
                    </div>
                    <div class="text-start">
                        <a href="{{ URL::previous() }}">Volver</a>
                    </div>
                    <div class="text-end">
                        <a href="/ficha-medica">Siguiente</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>

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
        document.getElementById('avatar').addEventListener('change', function() {
            const file = event.target.files[0];
            if (file) {
                const img = new Image();
                img.src = URL.createObjectURL(file);
                img.onload = function() {
                    if (img.width !== 512 || img.height !== 512) {
                        document.getElementById('error-message').style.display = 'block';
                    } else {
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
                                    window.location.reload();
                                }
                            })
                            .catch(error => console.error('Error:', error));
                    }
                }
            }
        });
    </script>

</x-approxana-layout>
