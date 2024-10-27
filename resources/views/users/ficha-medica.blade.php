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
                <a href="{{ route('users.mis-datos') }}"
                    class="flex items-center gap-4 border-2 border-gray-400 rounded-full w-48 py-2 justify-center">
                    <p>Mis Datos</p>
                </a>
                <a href="{{ route('nutritional-sheet.show') }}"
                    class="flex items-center gap-4 border-2 border-gray-400 rounded-full w-48 py-2 justify-center">
                    <p>Ficha Nutricional</p>
                </a>
            </div>
        </div>
    </div>


    <div class="mt-6 text-center sm:text-left">
        <div class="max-w-7xl mx-auto mt-10 sm:px-6 lg:px-8 max-sm:px-4">
            <div class="flex flex-row text-center gap-6 mb-8 items-center max-sm:flex-col">
                <h3 class=" font-normal text-5xl">Ficha Médica</h3>
                <div class="progress w-80 bg-gray-300 rounded-md">
                    <p class="progress-bar text-center bg-green-400 border border-green-400 rounded-md w-72" role="progressbar" id="progress-bar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0% completado</p>
                </div>
            </div>
            <div class="flex flex-row items-center">
                <img src="/images/nurse.png" alt="">
                <p>Para brindarte un servicio más personalizado<br>
                    y eficiente, por favor completa la siguiente<br>
                    información médica:</p>
            </div>
        </div>
    </div>


    <!--- div formulario --->

    <div class="p-6 pt-0 sm:py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('ficha-medica.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- MIS DATOS PERSONALES -->

                <div class="grid grid-cols-1 gap-4 p-6 p-6 py-8 my-8   bg-white border border-gray-200 rounded-lg shadow">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-2">
                            <x-texthead>
                                {{ __('Mi Ficha de Salud') }}
                            </x-texthead>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div class="max-sm:col-span-3 max-sm:py-2">
                            <label for="g_sanguineo" class="block text-sm font-semibold leading-6 text-gray-900">Grupo
                                Sanguíneo</label>
                            <div class="mt-2.5">
                                <select id="g_sanguineo" name="g_sanguineo"
                                    class="progress-field block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="Seleccionar opción"
                                        {{ isset($healthSheet) && $healthSheet->grupo_sanguineo == 'Seleccionar opción' ? 'selected' : '' }}>
                                        Seleccionar opción</option>
                                    <option value="Tipo O"
                                        {{ isset($healthSheet) && $healthSheet->grupo_sanguineo == 'Tipo O' ? 'selected' : '' }}>
                                        Tipo O</option>
                                    <option value="Tipo A"
                                        {{ isset($healthSheet) && $healthSheet->grupo_sanguineo == 'Tipo A' ? 'selected' : '' }}>
                                        Tipo A</option>
                                    <option value="Tipo B"
                                        {{ isset($healthSheet) && $healthSheet->grupo_sanguineo == 'Tipo B' ? 'selected' : '' }}>
                                        Tipo B</option>
                                    <option value="Tipo AB"
                                        {{ isset($healthSheet) && $healthSheet->grupo_sanguineo == 'Tipo AB' ? 'selected' : '' }}>
                                        Tipo AB</option>
                                </select>
                            </div>
                        </div>
                        <div class="max-sm:col-span-3 max-sm:py-2">
                            <label for="factor_rh" class="block text-sm font-semibold leading-6 text-gray-900">Factor
                                Rh</label>
                            <div class="mt-2.5">
                                <select id="factor_rh" name="factor_rh" 
                                    class="progress-field block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="seleccionar opcion"
                                        {{ isset($healthSheet) && $healthSheet->factor_rh == 'Seleccionar opción' ? 'selected' : '' }}>
                                        Seleccionar opción</option>
                                    <option value="Positivo"
                                        {{ isset($healthSheet) && $healthSheet->factor_rh == 'Positivo' ? 'selected' : '' }}>
                                        + Positivo</option>
                                    <option value="Negativo"
                                        {{ isset($healthSheet) && $healthSheet->factor_rh == 'Negativo' ? 'selected' : '' }}>
                                        - Negativo</option>
                                </select>
                            </div>
                        </div>
                        <!--- PRIMERA PREGUNTA --->
                        <div class="col-span-2 grid grid-cols-3 gap-4 py-6 max-sm:col-span-3 max-sm:py-2">
                            <div class="col-span-2 flex items-center">
                                <p>¿Recibes algun tratamiento de salud actual?</p>
                            </div>
                            <div class="w-full flex ">
                                <ul class="grid w-full md:grid-cols-2">
                                    <li>
                                        <input type="radio" id="tratamientosi" name="tratamiento"
                                            value="si" class="progress-field hidden peer" {{ isset($healthSheet->tratamiento) && $healthSheet->tratamiento == 'si' ? 'checked' : '' }} />
                                        <label for="tratamientosi"
                                            class="inline-flex justify-center w-full p-1.5 text-gray-500 bg-white border
                                             border-gray-200 rounded-lg rounded-r-none cursor-pointer dark:hover:text-gray-300
                                              dark:border-gray-700 dark:peer-checked:text-red-rv
                                              peer-checked:border-red-rv peer-checked:text-white peer-checked:bg-red-rv
                                                 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold text-center">SI</div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="radio" id="tratamientono" name="tratamiento"
                                            value="no" class="hidden peer" {{ isset($healthSheet->tratamiento) && $healthSheet->tratamiento == 'no' ? 'checked' : '' }} />
                                        <label for="tratamientono"
                                            class="inline-flex justify-center w-full p-1.5
                                             text-gray-500 bg-white border border-gray-200
                                              rounded-lg rounded-l-none cursor-pointer dark:hover:text-gray-300
                                               dark:border-gray-700 dark:peer-checked:text-red-rv
                                                peer-checked:border-red-rv peer-checked:text-white peer-checked:bg-red-rv
                                                 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">NO</div>
                                            </div>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- PREGUNTAS DE PRIMERA PREGUNTA -->
                        <div class="col-span-2 grid grid-cols-3 gap-x-8 gap-y-6" id="qpreuno"
                            style="display:none">
                            <div class="max-sm:col-span-3">
                                <label for="obs_tratamiento"
                                    class="block text-sm font-semibold leading-6 text-gray-900">Observaciones</label>
                                <div class="mt-2.5">
                                    <input type="text" name="obs_tratamiento" id="obs_tratamiento"
                                        autocomplete="given-name"
                                        value="{{ isset($healthSheet) ? $healthSheet->tratamiento_obs : '' }}"
                                        class="progress-field block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <div class="max-sm:col-span-3">
                                <label for="rec_tratamiento"
                                    class="block text-sm font-semibold leading-6 text-gray-900">Recibe
                                    Tratamiento</label>
                                <div class="mt-2.5">
                                    <input type="text" name="rec_tratamiento" id="rec_tratamiento"
                                        autocomplete="family-name"
                                        value="{{ isset($healthSheet) ? $healthSheet->tratamiento_rec : '' }}"
                                        class="progress-field block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <div class="max-sm:col-span-3">
                                <label for="nom_tratamiento"
                                    class="block text-sm font-semibold leading-6 text-gray-900">Nombre
                                    del Medicamento</label>
                                <div class="mt-2.5">
                                    <input type="text" name="nom_tratamiento" id="nom_tratamiento"
                                        autocomplete="family-name"
                                        value="{{ isset($healthSheet) ? $healthSheet->tratamiento_med : '' }}"
                                        class="progress-field block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <div class="max-sm:col-span-3">
                                <label for="sum_tratamiento"
                                    class="block text-sm font-semibold leading-6 text-gray-900">Quien lo
                                    Suministra</label>
                                <div class="mt-2.5">
                                    <select id="sum_tratamiento" name="sum_tratamiento"
                                        class="progress-field block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <option value="seleccionar opcion"
                                            {{ isset($healthSheet) && $healthSheet->tratamiento_sum == 'seleccionar opcion' ? 'selected' : '' }}>
                                            Seleccionar opción</option>
                                        <option value="El responsabel"
                                            {{ isset($healthSheet) && $healthSheet->tratamiento_sum == 'El responsabel' ? 'selected' : '' }}>
                                            El responsable</option>
                                        <option value="El pasajero"
                                            {{ isset($healthSheet) && $healthSheet->tratamiento_sum == 'El pasajero' ? 'selected' : '' }}>
                                            El pasajero</option>
                                        <option value="El doctor"
                                            {{ isset($healthSheet) && $healthSheet->tratamiento_sum == 'El doctor' ? 'selected' : '' }}>
                                            El doctor</option>
                                        <option value="Solicita Ayuda"
                                            {{ isset($healthSheet) && $healthSheet->tratamiento_sum == 'Solicita Ayuda' ? 'selected' : '' }}>
                                            Solicita Ayuda</option>
                                        <option value="Ninguno"
                                            {{ isset($healthSheet) && $healthSheet->tratamiento_sum == 'Ninguno' ? 'selected' : '' }}>
                                            Ninguno</option>
                                    </select>
                                </div>
                            </div>
                            <div class="max-sm:col-span-3">
                                <label for="dosi_tratamiento"
                                    class="block text-sm font-semibold leading-6 text-gray-900">Dosis
                                    al
                                    Dia</label>
                                <div class="mt-2.5">
                                    <select id="dosi_tratamiento" name="dosi_tratamiento"
                                        class="progress-field block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <option value="seleccionar opcion"
                                            {{ isset($healthSheet) && $healthSheet->tratamiento_dosis == 'seleccionar opcion' ? 'selected' : '' }}>
                                            Seleccionar opción</option>
                                        <option value="1 vez al día"
                                            {{ isset($healthSheet) && $healthSheet->tratamiento_dosis == '1 vez al día' ? 'selected' : '' }}>
                                            1 vez al día</option>
                                        <option value="2 veces al día"
                                            {{ isset($healthSheet) && $healthSheet->tratamiento_dosis == '2 veces al día' ? 'selected' : '' }}>
                                            2 veces al día</option>
                                        <option value="3 veces al día"
                                            {{ isset($healthSheet) && $healthSheet->tratamiento_dosis == '3 veces al día' ? 'selected' : '' }}>
                                            3 veces al día</option>
                                        <option value="4 veces al día"
                                            {{ isset($healthSheet) && $healthSheet->tratamiento_dosis == '4 veces al día' ? 'selected' : '' }}>
                                            4 veces al día</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr class="max-sm:col-span-3 col-span-2">
                        <!--- SEGUNDA PREGUNTA --->
                        <div class="col-span-2 grid grid-cols-3 gap-4 py-6 max-sm:col-span-3 max-sm:py-2">
                            <div class="col-span-2 flex items-center">
                                <p>¿Presenta alguna enfermedad Pre-existente?</p>
                            </div>
                            <div class="w-full flex ">
                                <ul class="grid w-full md:grid-cols-2">
                                    <li>
                                        <input type="radio" id="enfermedadsi" name="enfermedad"
                                            value="si" class="progress-field hidden peer" {{ isset($healthSheet->enfermedad) && $healthSheet->enfermedad == 'si' ? 'checked' : '' }}/>
                                        <label for="enfermedadsi"
                                            class="inline-flex justify-center w-full p-1.5 text-gray-500 bg-white border
                                             border-gray-200 rounded-lg rounded-r-none cursor-pointer dark:hover:text-gray-300
                                              dark:border-gray-700 dark:peer-checked:text-red-rv
                                              peer-checked:border-red-rv peer-checked:text-white peer-checked:bg-red-rv
                                                 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold text-center">SI</div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="radio" id="enfermedadno" name="enfermedad"
                                            value="no" class="hidden peer" {{ isset($healthSheet->enfermedad) && $healthSheet->enfermedad == 'no' ? 'checked' : '' }} />
                                        <label for="enfermedadno"
                                            class="inline-flex justify-center w-full p-1.5
                                             text-gray-500 bg-white border border-gray-200
                                              rounded-lg rounded-l-none cursor-pointer dark:hover:text-gray-300
                                               dark:border-gray-700 dark:peer-checked:text-red-rv
                                                peer-checked:border-red-rv peer-checked:text-white peer-checked:bg-red-rv
                                                 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">NO</div>
                                            </div>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- PREGUNTAS DE SEGUNDA PREGUNTA -->
                        <div class=" col-span-2 grid grid-cols-3 gap-x-8 gap-y-6" id="qpredos"
                            style="display:none">
                            <div class="max-sm:col-span-3">
                                <label for="obs_enfermedad"
                                    class="block text-sm font-semibold leading-6 text-gray-900">Observaciones</label>
                                <div class="mt-2.5">
                                    <input type="text" name="obs_enfermedad" id="obs_enfermedad"
                                        autocomplete="given-name"
                                        value="{{ isset($healthSheet) ? $healthSheet->enfermedad_obs : '' }}"
                                        class="progress-field block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <div class="max-sm:col-span-3">
                                <label for="rec_enfermedad"
                                    class="block text-sm font-semibold leading-6 text-gray-900">Recibe
                                    Tratamiento</label>
                                <div class="mt-2.5">
                                    <input type="text" name="rec_enfermedad" id="rec_enfermedad"
                                        autocomplete="family-name"
                                        value="{{ isset($healthSheet) ? $healthSheet->enfermedad_rec : '' }}"
                                        class="progress-field block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <div class="max-sm:col-span-3">
                                <label for="nom_enfermedad"
                                    class="block text-sm font-semibold leading-6 text-gray-900">Nombre
                                    del Medicamento</label>
                                <div class="mt-2.5">
                                    <input type="text" name="nom_enfermedad" id="nom_enfermedad"
                                        autocomplete="family-name"
                                        value="{{ isset($healthSheet) ? $healthSheet->enfermedad_med : '' }}"
                                        class="progress-field block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <div class="max-sm:col-span-3">
                                <label for="sum_enfermedad"
                                    class="block text-sm font-semibold leading-6 text-gray-900">Quien
                                    lo Suministra</label>
                                <div class="mt-2.5">
                                    <select id="sum_enfermedad" name="sum_enfermedad"
                                        class="progress-field block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <option value="seleccionar opcion"
                                            {{ isset($healthSheet) && $healthSheet->enfermedad_sum == 'seleccionar opcion' ? 'selected' : '' }}>
                                            Seleccionar opción</option>
                                        <option value="El responsabe"
                                            {{ isset($healthSheet) && $healthSheet->enfermedad_sum == 'El responsabe' ? 'selected' : '' }}>
                                            El responsable</option>
                                        <option value="El pasajero"
                                            {{ isset($healthSheet) && $healthSheet->enfermedad_sum == 'El pasajero' ? 'selected' : '' }}>
                                            El pasajero</option>
                                        <option value="El doctor"
                                            {{ isset($healthSheet) && $healthSheet->enfermedad_sum == 'El doctor' ? 'selected' : '' }}>
                                            El doctor</option>
                                        <option value="Solicita Ayuda"
                                            {{ isset($healthSheet) && $healthSheet->enfermedad_sum == 'Solicita Ayuda' ? 'selected' : '' }}>
                                            Solicita Ayuda</option>
                                        <option value="Ninguno"
                                            {{ isset($healthSheet) && $healthSheet->enfermedad_sum == 'Ninguno' ? 'selected' : '' }}>
                                            Ninguno</option>
                                    </select>
                                </div>
                            </div>
                            <div class="max-sm:col-span-3">
                                <label for="dosi_enfermedad"
                                    class="block text-sm font-semibold leading-6 text-gray-900">Dosis
                                    al Dia</label>
                                <div class="mt-2.5">
                                    <select id="dosi_enfermedad" name="dosi_enfermedad"
                                        class="progress-field block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <option value="seleccionar opcion"
                                            {{ isset($healthSheet) && $healthSheet->enfermedad_dosis == 'seleccionar opcion' ? 'selected' : '' }}>
                                            Seleccionar opción</option>
                                        <option value="1 vez al día"
                                            {{ isset($healthSheet) && $healthSheet->enfermedad_dosis == '1 vez al día' ? 'selected' : '' }}>
                                            1 vez al día</option>
                                        <option value="2 veces al día"
                                            {{ isset($healthSheet) && $healthSheet->enfermedad_dosis == '2 veces al día' ? 'selected' : '' }}>
                                            2 veces al día</option>
                                        <option value="3 veces al día"
                                            {{ isset($healthSheet) && $healthSheet->enfermedad_dosis == '3 veces al día' ? 'selected' : '' }}>
                                            3 veces al día</option>
                                        <option value="4 veces al día"
                                            {{ isset($healthSheet) && $healthSheet->enfermedad_dosis == 's4 veces al día' ? 'selected' : '' }}>
                                            4 veces al día</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr class="max-sm:col-span-3 col-span-2 ">
                        <!--- TERCERA PREGUNTA --->
                        <div class="col-span-2 grid grid-cols-3 gap-4 py-6">
                            <div class="col-span-2 flex items-center">
                                <p>¿Es usted alergico a algun medicamento?</p>
                            </div>
                            <div class="w-full flex ">
                                <ul class="grid w-full md:grid-cols-2">
                                    <li>
                                        <input type="radio" id="medicamentosi" name="medicamento"
                                            value="si" class="progress-field hidden peer" {{ isset($healthSheet->alergia) && $healthSheet->alergia == 'si' ? 'checked' : '' }}/>
                                        <label for="medicamentosi"
                                            class="inline-flex justify-center w-full p-1.5 text-gray-500 bg-white border
                                             border-gray-200 rounded-lg rounded-r-none cursor-pointer dark:hover:text-gray-300
                                              dark:border-gray-700 dark:peer-checked:text-red-rv
                                              peer-checked:border-red-rv peer-checked:text-white peer-checked:bg-red-rv
                                                 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold text-center">SI</div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="radio" id="medicamentono" name="medicamento"
                                            value="no" class="hidden peer" {{ isset($healthSheet->alergia) && $healthSheet->alergia == 'no' ? 'checked' : '' }}/>
                                        <label for="medicamentono"
                                            class="inline-flex justify-center w-full p-1.5
                                             text-gray-500 bg-white border border-gray-200
                                              rounded-lg rounded-l-none cursor-pointer dark:hover:text-gray-300
                                               dark:border-gray-700 dark:peer-checked:text-red-rv
                                                peer-checked:border-red-rv peer-checked:text-white peer-checked:bg-red-rv
                                                 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">NO</div>
                                            </div>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- PREGUNTAS DE TERCERA PREGUNTA -->
                        <div class="col-span-2 grid grid-cols-3 gap-x-8 gap-y-6" id="qpretres"
                            style="display:none">
                            <div class="max-sm:col-span-3">
                                <label for="obs_alergico"
                                    class="block text-sm font-semibold leading-6 text-gray-900">Observaciones</label>
                                <div class="mt-2.5">
                                    <input type="text" name="obs_alergico" id="obs_alergico"
                                        autocomplete="given-name"
                                        value="{{ isset($healthSheet) ? $healthSheet->alergia_obs : '' }}"
                                        class="progress-field block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <div class="max-sm:col-span-3">
                                <label for="rec_alergico"
                                    class="block text-sm font-semibold leading-6 text-gray-900">Recibe
                                    Tratamiento</label>
                                <div class="mt-2.5">
                                    <input type="text" name="rec_alergico" id="rec_alergico"
                                        autocomplete="family-name"
                                        value="{{ isset($healthSheet) ? $healthSheet->alergia_rec : '' }}"
                                        class="progress-field block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <div class="max-sm:col-span-3">
                                <label for="nom_alergico"
                                    class="block text-sm font-semibold leading-6 text-gray-900">Nombre
                                    del Medicamento</label>
                                <div class="mt-2.5">
                                    <input type="text" name="nom_alergico" id="nom_alergico"
                                        autocomplete="family-name"
                                        value="{{ isset($healthSheet) ? $healthSheet->alergia_med : '' }}"
                                        class="progress-field block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <div class="max-sm:col-span-3">
                                <label for="sum_alergico"
                                    class="block text-sm font-semibold leading-6 text-gray-900">Quien
                                    lo Suministra</label>
                                <div class="mt-2.5">
                                    <select id="sum_alergico" name="sum_alergico"
                                        class="progress-field block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <option value="seleccionar opcion"
                                            {{ isset($healthSheet) && $healthSheet->alergia_sum == 'seleccionar opcion' ? 'selected' : '' }}>
                                            Seleccionar opción</option>
                                        <option value="El responsable"
                                            {{ isset($healthSheet) && $healthSheet->alergia_sum == 'El responsable' ? 'selected' : '' }}>
                                            El responsable</option>
                                        <option value="El pasajero"
                                            {{ isset($healthSheet) && $healthSheet->alergia_sum == 'El pasajero' ? 'selected' : '' }}>
                                            El pasajero</option>
                                        <option value="El doctor"
                                            {{ isset($healthSheet) && $healthSheet->alergia_sum == 'El doctor' ? 'selected' : '' }}>
                                            El doctor</option>
                                        <option value="Solicita Ayuda"
                                            {{ isset($healthSheet) && $healthSheet->alergia_sum == 'Solicita Ayuda' ? 'selected' : '' }}>
                                            Solicita Ayuda</option>
                                        <option value="Ninguno"
                                            {{ isset($healthSheet) && $healthSheet->alergia_sum == 'Ninguno' ? 'selected' : '' }}>
                                            Ninguno</option>
                                    </select>
                                </div>
                            </div>
                            <div class="max-sm:col-span-3">
                                <label for="dosi_alergico"
                                    class="block text-sm font-semibold leading-6 text-gray-900">Dosis
                                    al Dia</label>
                                <div class="mt-2.5">
                                    <select id="dosi_alergico" name="dosi_alergico"
                                        class="progress-fieldblock w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <option value="seleccionar opcion"
                                            {{ isset($healthSheet) && $healthSheet->alergia_dosis == 'seleccionar opcion' ? 'selected' : '' }}>
                                            Seleccionar opción</option>
                                        <option value="1 vez al día"
                                            {{ isset($healthSheet) && $healthSheet->alergia_dosis == '1 vez al día' ? 'selected' : '' }}>
                                            1 vez al día</option>
                                        <option value="2 veces al día"
                                            {{ isset($healthSheet) && $healthSheet->alergia_dosis == '2 veces al día' ? 'selected' : '' }}>
                                            2 veces al día</option>
                                        <option value="3 veces al día"
                                            {{ isset($healthSheet) && $healthSheet->alergia_dosis == '3 veces al día' ? 'selected' : '' }}>
                                            3 veces al día</option>
                                        <option value="4 veces al día"
                                            {{ isset($healthSheet) && $healthSheet->alergia_dosis == '4 veces al día' ? 'selected' : '' }}>
                                            4 veces al día</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr class=" col-span-2">
                        <!--- CUARTA PREGUNTA --->
                        <div class="col-span-2 grid grid-cols-3 gap-4 py-6">
                            <div class="col-span-2 flex items-center">
                                <p>¿Presenta alguna alergia adicional?</p>
                            </div>
                            <div class="w-full flex ">
                                <ul class="grid w-full md:grid-cols-2">
                                    <li>
                                        <input type="radio" id="alergiasi" name="alergia" value="si"
                                            class="progress-field hidden peer" {{ isset($healthSheet->alergia_ad) && $healthSheet->alergia_ad == 'si' ? 'checked' : '' }}/>
                                        <label for="alergiasi"
                                            class="inline-flex justify-center w-full p-1.5 text-gray-500 bg-white border
                                             border-gray-200 rounded-lg rounded-r-none cursor-pointer dark:hover:text-gray-300
                                              dark:border-gray-700 dark:peer-checked:text-red-rv
                                              peer-checked:border-red-rv peer-checked:text-white peer-checked:bg-red-rv
                                                 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold text-center">SI</div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="radio" id="alergiano" name="alergia" value="no"
                                            class="hidden peer" {{ isset($healthSheet->alergia_ad) && $healthSheet->alergia_ad == 'no' ? 'checked' : '' }}/>
                                        <label for="alergiano"
                                            class="inline-flex justify-center w-full p-1.5
                                             text-gray-500 bg-white border border-gray-200
                                              rounded-lg rounded-l-none cursor-pointer dark:hover:text-gray-300
                                               dark:border-gray-700 dark:peer-checked:text-red-rv
                                                peer-checked:border-red-rv peer-checked:text-white peer-checked:bg-red-rv
                                                 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">NO</div>
                                            </div>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- PREGUNTAS DE CUARTA PREGUNTA -->
                        <div class="col-span-2 grid grid-cols-3 gap-x-8 gap-y-6" id="qprecuatro"
                            style="display:none">
                            <div class="max-sm:col-span-3">
                                <label for="obs_alerg_ad"
                                    class="block text-sm font-semibold leading-6 text-gray-900">Observaciones</label>
                                <div class="mt-2.5">
                                    <input type="text" name="obs_alerg_ad" id="obs_alerg_ad"
                                        autocomplete="given-name"
                                        value="{{ isset($healthSheet) ? $healthSheet->alergia_ad_obs : '' }}"
                                        class="progress-field block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <div class="max-sm:col-span-3">
                                <label for="rec_alerg_ad"
                                    class="block text-sm font-semibold leading-6 text-gray-900">Recibe
                                    Tratamiento</label>
                                <div class="mt-2.5">
                                    <input type="text" name="rec_alerg_ad" id="rec_alerg_ad"
                                        autocomplete="family-name"
                                        value="{{ isset($healthSheet) ? $healthSheet->alergia_ad_rec : '' }}"
                                        class="progress-field block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <div class="max-sm:col-span-3">
                                <label for="nom_alerg_ad"
                                    class="block text-sm font-semibold leading-6 text-gray-900">Nombre
                                    del Medicamento</label>
                                <div class="mt-2.5">
                                    <input type="text" name="nom_alerg_ad" id="nom_alerg_ad"
                                        autocomplete="family-name"
                                        value="{{ isset($healthSheet) ? $healthSheet->alergia_ad_med : '' }}"
                                        class="progress-field block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <div class="max-sm:col-span-3">
                                <label for="sum_alerg_ad"
                                    class="block text-sm font-semibold leading-6 text-gray-900">Quien
                                    lo Suministra</label>
                                <div class="mt-2.5">
                                    <select id="sum_alerg_ad" name="sum_alerg_ad"
                                        class="progress-field block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <option value="seleccionar opcion"
                                            {{ isset($healthSheet) && $healthSheet->alergia_ad_sum == 'seleccionar opcion' ? 'selected' : '' }}>
                                            Seleccionar opción</option>
                                        <option value="El responsable"
                                            {{ isset($healthSheet) && $healthSheet->alergia_ad_sum == 'El responsable' ? 'selected' : '' }}>
                                            El responsable</option>
                                        <option value="El pasajero"
                                            {{ isset($healthSheet) && $healthSheet->alergia_ad_sum == 'El pasajero' ? 'selected' : '' }}>
                                            El pasajero</option>
                                        <option value="El doctor"
                                            {{ isset($healthSheet) && $healthSheet->alergia_ad_sum == 'El doctor' ? 'selected' : '' }}>
                                            El doctor</option>
                                        <option value="Solicita Ayuda"
                                            {{ isset($healthSheet) && $healthSheet->alergia_ad_sum == 'Solicita Ayuda' ? 'selected' : '' }}>
                                            Solicita Ayuda</option>
                                        <option value="Ninguno"
                                            {{ isset($healthSheet) && $healthSheet->alergia_ad_sum == 'Ninguno' ? 'selected' : '' }}>
                                            Ninguno</option>
                                    </select>
                                </div>
                            </div>
                            <div class="max-sm:col-span-3">
                                <label for="dosi_alerg_ad"
                                    class="block text-sm font-semibold leading-6 text-gray-900">Dosis
                                    al Dia</label>
                                <div class="mt-2.5">
                                    <select id="dosi_alerg_ad" name="dosi_alerg_ad"
                                        class="progress-field block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <option value="seleccionar opcion"
                                            {{ isset($healthSheet) && $healthSheet->alergia_ad_dosis == 'seleccionar opcion' ? 'selected' : '' }}>
                                            Seleccionar opción</option>
                                        <option value="1 vez al día"
                                            {{ isset($healthSheet) && $healthSheet->alergia_ad_dosis == '1 vez al día' ? 'selected' : '' }}>
                                            1 vez al día</option>
                                        <option value="2 veces al día"
                                            {{ isset($healthSheet) && $healthSheet->alergia_ad_dosis == '2 veces al día' ? 'selected' : '' }}>
                                            2 veces al día</option>
                                        <option value="3 veces al día"
                                            {{ isset($healthSheet) && $healthSheet->alergia_ad_dosis == '3 veces al día' ? 'selected' : '' }}>
                                            3 veces al día</option>
                                        <option value="4 veces al día"
                                            {{ isset($healthSheet) && $healthSheet->alergia_ad_dosis == '4 veces al día' ? 'selected' : '' }}>
                                            4 veces al día</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <H2 class="mt-5 font-bold">Inmunizaciones Recibidas</H2>

                    <div
                        class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg">
                        <div class="m-0">
                            <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white sm:flex">
                                <li class="w-full">
                                    <div class="flex items-center ps-3">
                                        <input id="tetano" type="checkbox" name="inmunizacion[]" value="Tetano"
                                            class="w-4 h-4 text-red-rv bg-gray-100 border-gray-300 rounded focus:ring-red-rv dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                            {{ isset($healthSheet->inmunizacion) && in_array('Tetano', $healthSheet->inmunizacion) ? 'checked' : '' }}>
                                        <label for="vue-checkbox-list"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tetano</label>
                                    </div>
                                </li>
                                <li class="w-full">
                                    <div class="flex items-center ps-3">
                                        <input id="rubiola" type="checkbox" name="inmunizacion[]" value="Rubiola"
                                            class="w-4 h-4 text-red-rv bg-gray-100 border-gray-300 rounded focus:ring-red-rv dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                            {{ isset($healthSheet->inmunizacion) && in_array('Rubiola', $healthSheet->inmunizacion) ? 'checked' : '' }}>
                                        <label for="react-checkbox-list"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Rubiola</label>
                                    </div>
                                </li>
                                <li class="w-full">
                                    <div class="flex items-center ps-3">
                                        <input id="hepatitis B" type="checkbox" name="inmunizacion[]"
                                            value="Hepatitis B"
                                            class="w-4 h-4 text-red-rv bg-gray-100 border-gray-300 rounded focus:ring-red-rv dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                            {{ isset($healthSheet->inmunizacion) && in_array('Hepatitis B', $healthSheet->inmunizacion) ? 'checked' : '' }}>
                                        <label for="angular-checkbox-list"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hepatitis
                                            B</label>
                                    </div>
                                </li>
                                <li class="w-full">
                                    <div class="flex items-center ps-3">
                                        <input id="sarampion" type="checkbox" name="inmunizacion[]"
                                            value="Sarampión"
                                            class="w-4 h-4 text-red-rv bg-gray-100 border-gray-300 rounded focus:ring-red-rv dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                            {{ isset($healthSheet->inmunizacion) && in_array('Sarampión', $healthSheet->inmunizacion) ? 'checked' : '' }}>
                                        <label for="laravel-checkbox-list"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sarampión</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="m-0">
                            <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white sm:flex">
                                <li class="w-full">
                                    <div class="flex items-center ps-3">
                                        <input id="influenza" type="checkbox" name="inmunizacion[]"
                                            value="Influenza"
                                            class="w-4 h-4 text-red-rv bg-gray-100 border-gray-300 rounded focus:ring-red-rv dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                            {{ isset($healthSheet->inmunizacion) && in_array('Influenza', $healthSheet->inmunizacion) ? 'checked' : '' }}>
                                        <label for="vue-checkbox-list"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Influenza</label>
                                    </div>
                                </li>
                                <li class="w-full">
                                    <div class="flex items-center ps-3">
                                        <input id="fiebre amarilla" type="checkbox" name="inmunizacion[]"
                                            value="Fiebre Amarilla"
                                            class="w-4 h-4 text-red-rv bg-gray-100 border-gray-300 rounded focus:ring-red-rv dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                            {{ isset($healthSheet->inmunizacion) && in_array('Fiebre Amarilla', $healthSheet->inmunizacion) ? 'checked' : '' }}>
                                        <label for="react-checkbox-list"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Fiebre
                                            Amarilla</label>
                                    </div>
                                </li>
                                <li class="w-full">
                                    <div class="flex items-center ps-3">
                                        <input id="tuberculosis" type="checkbox" name="inmunizacion[]"
                                            value="Tuberculosis"
                                            class="w-4 h-4 text-red-rv bg-gray-100 border-gray-300 rounded focus:ring-red-rv dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                            {{ isset($healthSheet->inmunizacion) && in_array('Tuberculosis', $healthSheet->inmunizacion) ? 'checked' : '' }}>
                                        <label for="angular-checkbox-list"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tuberculosis</label>
                                    </div>
                                </li>
                                <li class="w-full">
                                    <div class="flex items-center ps-3">
                                        <input id="otro" type="checkbox" name="inmunizacion[]" value="Otro"
                                            class="w-4 h-4 text-red-rv bg-gray-100 border-gray-300 rounded focus:ring-red-rv dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                            {{ isset($healthSheet->inmunizacion) && in_array('Otro', $healthSheet->inmunizacion) ? 'checked' : '' }}>
                                        <label for="laravel-checkbox-list"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Otro</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-3">
                        <div>
                            <label for="vac_adicionales"
                                class="block text-sm font-semibold leading-6 text-gray-900">Vacunas
                                Adicionales</label>
                            <div class="mt-2.5">
                                <input type="text" name="vac_adicionales" id="vac_adicionales"
                                    autocomplete="family-name"
                                    value="{{ isset($healthSheet) ? $healthSheet->vacunas_adicionales : '' }}"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="vacunas_covid"
                                class="block text-sm font-semibold leading-6 text-gray-900">Vacunas Covid</label>
                            <div class="mt-2.5">
                                <select id="vacunas_covid" name="vacunas_covid"
                                    class="progress-field block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="seleccionar opcion"
                                        {{ isset($healthSheet) && $healthSheet->vacunas_covid == 'seleccionar opcion' ? 'selected' : '' }}>
                                        Seleccionar opción</option>
                                    <option value="Primera Dosis"
                                        {{ isset($healthSheet) && $healthSheet->vacunas_covid == 'Primera Dosis' ? 'selected' : '' }}>
                                        Primera Dosis</option>
                                    <option value="Segunda Dosis"
                                        {{ isset($healthSheet) && $healthSheet->vacunas_covid == 'Segunda Dosis' ? 'selected' : '' }}>
                                        Segunda Dosis</option>
                                    <option value="Tercera Dosis"
                                        {{ isset($healthSheet) && $healthSheet->vacunas_covid == 'Tercera Dosis' ? 'selected' : '' }}>
                                        Tercera Dosis</option>
                                    <option value="Cuarta Dosis"
                                        {{ isset($healthSheet) && $healthSheet->vacunas_covid == 'Cuarta Dosis' ? 'selected' : '' }}>
                                        Cuarta Dosis</option>
                                    <option value="Quinta Dosis"
                                        {{ isset($healthSheet) && $healthSheet->vacunas_covid == 'Quinta Dosis' ? 'selected' : '' }}>
                                        Quinta Dosis</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="efec_secund"
                                class="block text-sm font-semibold leading-6 text-gray-900">Efectos
                                Secundarios</label>
                            <div class="mt-2.5">
                                <input type="text" name="efec_secund" id="efec_secund" autocomplete="family-name"
                                    value="{{ isset($healthSheet) ? $healthSheet->efecto_secundarios : '' }}"
                                    class="progress-field block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>

                    <hr>

                    <H2 class="mt-5 font-bold">Cuentanos mas sobre tu salud: </H2>

                    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-1">
                        <div>
                            <label for="info_ad"
                                class="block text-sm font-semibold leading-6 text-gray-900">Informacion
                                Adicional</label>
                            <div class="mt-2.5">
                                <input type="text" name="info_ad" id="info_ad" autocomplete="family-name"
                                    value="{{ isset($healthSheet) ? $healthSheet->informacion_adicional_salud : '' }}"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>

                    <H2 class="mt-5 font-bold">Tarjetas de seguro de Viaje: </H2>

                    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                        <div>
                            <label for="tar_seguro"
                                class="block text-sm font-semibold leading-6 text-gray-900">Tarjeta
                                de Seguro de Viaje</label>
                            <div class="mt-2.5">
                                <input type="text" name="tar_seguro" id="tar_seguro" disabled
                                    value="Medix Travel" autocomplete="family-name"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 bg-slate-300
                                    text-black shadow-sm ring-1 ring-inset ring-gray-300
                                     placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                      focus:ring-red-rv sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="tar_seguro_pri"
                                class="block text-sm font-semibold leading-6 text-gray-900">Tarjeta
                                de Seguro Privado</label>
                            <div class="mt-2.5">
                                <input type="text" name="tar_seguro_priv" id="tar_seguro_priv"
                                    placeholder="Ejemplo: Rimac plan Familiar" autocomplete="family-name"
                                    value="{{ isset($healthSheet) ? $healthSheet->tarjeta_seguro_privado : '' }}"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                        <div>
                            <label for="hist_medic" class="block text-sm font-semibold leading-6 text-gray-900">
                                Historial Médico (opcional)
                            </label>
                            <div class="mt-2.5">
                                <input type="file" name="hist_medic" id="hist_medic" accept=".pdf"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @if(isset($healthSheet) && $healthSheet->hist_medico)
                                        <p class="mt-2 text-sm text-gray-600">
                                            Archivo existente:
                                            <a href="{{ asset('storage/' . $healthSheet->hist_medico) }}" target="_blank" class="text-blue-600 underline">Ver PDF</a>
                                        </p>
                                    @endif
                            </div>
                        </div>
                        <div>
                            <label for="hist_salud_em"
                                class="block text-sm font-semibold leading-6 text-gray-900">Historial
                                de Salud Emocional (opcional)</label>
                            <div class="mt-2.5">
                                <input type="file" name="hist_salud_em" id="hist_salud_em"  accept=".pdf"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @if(isset($healthSheet) && $healthSheet->hist_med_em)
                                        <p class="mt-2 text-sm text-gray-600">
                                            Archivo existente:
                                            <a href="{{ asset('storage/' . $healthSheet->hist_med_em) }}" target="_blank" class="text-blue-600 underline">Ver PDF</a>
                                        </p>
                                    @endif
                            </div>
                        </div>
                    </div>

                </div>

                <div class="flex  flex-row justify-between pb-8 max-sm:flex-col gap-3">
                    <div>
                        <a href="{{ route('dashboard') }}"
                            class="flex flex-row items-center gap-4 max-sm:w-full border-2 border-gray-400 rounded-full w-48 py-5 justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                            </svg>
                            <p>Ir a mi Perfil</p>
                        </a>
                    </div>
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
                        <button type="submit" id="guardar-cambios-btn"
                            class="block w-full rounded-full bg-red-rv px-16 py-5
                                text-center text-sm font-semibold text-white shadow-sm
                                hover:bg-red-rv">
                            GUARDAR CAMBIOS
                        </button>
                    </div>
                </div>
            </form>

            <!-- Tarjeta de Seguro Médico -->

            <!--<x-texthead>
                {{ __('Tratamiento Médico Recibido Durante el Viaje') }}
            </x-texthead>
            <div
                class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-4 p-6 py-8 mb-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div>
                    <label for="doc_viaje" class="block text-sm font-semibold leading-6 text-gray-900">Tu Doctor
                        Viajero</label>
                    <div class="mt-2.5">
                        <input type="text" name="doc_viaje" id="doc_viaje" disabled value="Nombre del Doctor"
                            autocomplete="family-name"
                            class="block w-full rounded-md border-0 px-3.5 py-2 bg-slate-300
                            text-black shadow-sm ring-1 ring-inset ring-gray-300
                             placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                              focus:ring-red-rv sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <label for="trata_recib" class="block text-sm font-semibold leading-6 text-gray-900">Tratamiento
                        Recibido</label>
                    <div class="mt-2.5">
                        <input type="text" name="trata_recib" id="trata_recib" disabled value="---"
                            autocomplete="family-name"
                            class="block w-full rounded-md border-0 px-3.5 py-2 bg-slate-300
                            text-black shadow-sm ring-1 ring-inset ring-gray-300
                             placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                              focus:ring-red-rv sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <label for="indic_medi" class="block text-sm font-semibold leading-6 text-gray-900">Indicaciones
                        Médicas</label>
                    <div class="mt-2.5">
                        <input type="text" name="indic_medi" id="indic_medi" disabled value="---"
                            autocomplete="family-name"
                            class="block w-full rounded-md border-0 px-3.5 py-2 bg-slate-300
                            text-black shadow-sm ring-1 ring-inset ring-gray-300
                             placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                              focus:ring-red-rv sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <button type="submit"
                        class="block w-full rounded-md bg-red-rv px-3.5 py-6 text-center text-sm font-semibold text-white shadow-sm hover:bg-red-rv focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-rv">DESCARGAR
                        FICHA</button>
                </div>
            </div>-->
        </div>
    </div>

    @if(session('success'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
@endif
    <script>
        // Seleccionamos los radio buttons y el div de preguntas
        const tratamientosi = document.getElementById('tratamientosi');
        const tratamientono = document.getElementById('tratamientono');
        const enfermedadsi = document.getElementById('enfermedadsi');
        const enfermedadno = document.getElementById('enfermedadno');
        const medicamentosi = document.getElementById('medicamentosi');
        const medicamentono = document.getElementById('medicamentono');
        const alergiasi = document.getElementById('alergiasi');
        const alergiano = document.getElementById('alergiano');
        const qpreuno = document.getElementById('qpreuno');
        const qpredos = document.getElementById('qpredos');
        const qpretres = document.getElementById('qpretres');
        const qprecuatro = document.getElementById('qprecuatro');

        // Función para mostrar u ocultar el div de preguntas
        function togglePreguntas1() {
            if (tratamientosi.checked) {
                qpreuno.style.display = 'grid';
            } else if (tratamientono.checked) {
                qpreuno.style.display = 'none';
            }
        }

        function togglePreguntas2() {
            if (enfermedadsi.checked) {
                qpredos.style.display = 'grid';
            } else if (enfermedadno.checked) {
                qpredos.style.display = 'none';
            }
        }

        function togglePreguntas3() {
            if (medicamentosi.checked) {
                qpretres.style.display = 'grid';
            } else if (medicamentono.checked) {
                qpretres.style.display = 'none';
            }
        }

        function togglePreguntas4() {
            if (alergiasi.checked) {
                qprecuatro.style.display = 'grid';
            } else if (alergiano.checked) {
                qprecuatro.style.display = 'none';
            }
        }

        // Evento al cargar la página
        window.addEventListener('load', togglePreguntas1);
        window.addEventListener('load', togglePreguntas2);
        window.addEventListener('load', togglePreguntas3);
        window.addEventListener('load', togglePreguntas4);

        // Evento cuando cambia el estado de los radio buttons
        tratamientosi.addEventListener('change', togglePreguntas1);
        tratamientono.addEventListener('change', togglePreguntas1);
        enfermedadsi.addEventListener('change', togglePreguntas2);
        enfermedadno.addEventListener('change', togglePreguntas2);
        medicamentosi.addEventListener('change', togglePreguntas3);
        medicamentono.addEventListener('change', togglePreguntas3);
        alergiasi.addEventListener('change', togglePreguntas4);
        alergiano.addEventListener('change', togglePreguntas4);
    </script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fields = document.querySelectorAll('.progress-field');
        let progress = 0;

        function updateProgressBar() {
            const enabledFields = Array.from(fields).filter(field => !field.disabled && !field.readOnly);
            const filledFields = enabledFields.filter(field => field.value.trim() !== '');
            progress = Math.round((filledFields.length / enabledFields.length) * 100);
            const progressBar = document.getElementById('progress-bar');
            progressBar.style.width = progress + '%';
            progressBar.setAttribute('aria-valuenow', progress);
            progressBar.textContent = progress + '% completado';
        }

        function enviarCorreoF() {
            fetch('/enviar-correo-ficham', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    mensaje: 'Tus datos fueron completados al 100%'
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Correo enviado con éxito!');
                } else {
                    alert('Hubo un error al enviar el correo.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        const guardarCambiosBtn = document.getElementById('guardar-cambios-btn');
        guardarCambiosBtn.addEventListener('click', function(event) {
            if (progress === 100) {
                enviarCorreoF();
            }
        });

        updateProgressBar();

        fields.forEach(field => {
            field.addEventListener('input', updateProgressBar);
            field.addEventListener('change', updateProgressBar);
        });
    });
</script>
</x-approxana-layout>
