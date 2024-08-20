<x-approxana-layout>
    <div class="m-6 text-center sm:pt-12 sm:text-left">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-red-rv dark:bg-gray-800 rounded-lg overflow-hidden shadow-sm sm:rounded-lg grid grid-cols-1 sm:grid-cols-3 p-6 gap-4">
                <div class="flex flex-col md:flex-row justify-between items-center sm:col-span-2">
                    <div class="p-5 text-white-rv dark:text-gray-100 text-lg sm:pl-16">
                        <div class="text-white-rv text-3xl">
                            {!! __('¡Hola ,') !!} <b>{{ explode(' ', Auth::user()->name)[0] }}
                                {{ explode(' ', Auth::user()->apellidos)[0] }}</b>!<br>
                        </div>

                        <p class="mt-4 text-white-rv-400 text-base font-Light">
                            {!! __(
                                'Para brindarte un servicio más personalizado y eficiente, por favor completa la siguiente información médica:',
                            ) !!}
                        </p>
                    </div>
                </div>
                <div class="flex align-middle p-0 text-white-rv dark:text-gray-100 sm:pr-16 pt-5">
                    <img src="/images/nurse.png" alt="" class="pb-0 w-64">
                </div>
            </div>
        </div>
    </div>


    <!--- div formulario --->

    <div class="p-6 pt-0 sm:py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('ficha-medica.store') }}" method="POST">
                @csrf
                <!-- MIS DATOS PERSONALES -->
                <x-texthead>
                    {{ __('Mi Ficha Médica') }}
                </x-texthead>
                <div class="grid grid-cols-1 gap-4 p-6  bg-white border border-gray-200 rounded-lg shadow">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="g_sanguineo" class="block text-sm font-semibold leading-6 text-gray-900">Grupo
                                Sanguíneo</label>
                            <div class="mt-2.5">
                                <select id="g_sanguineo" name="g_sanguineo"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option value="Seleccionar opción" {{ isset($healthSheet) && $healthSheet->grupo_sanguineo == 'Seleccionar opción' ? 'selected' : '' }}>Seleccionar opción</option>
                                <option value="Tipo O" {{ isset($healthSheet) && $healthSheet->grupo_sanguineo == 'Tipo O' ? 'selected' : '' }}>Tipo O</option>
                                <option value="Tipo A" {{ isset($healthSheet) && $healthSheet->grupo_sanguineo == 'Tipo A' ? 'selected' : '' }}>Tipo A</option>
                                <option value="Tipo B" {{ isset($healthSheet) && $healthSheet->grupo_sanguineo == 'Tipo B' ? 'selected' : '' }}>Tipo B</option>
                                <option value="Tipo AB" {{ isset($healthSheet) && $healthSheet->grupo_sanguineo == 'Tipo AB' ? 'selected' : '' }}>Tipo AB</option>
                            </select>
                            </div>
                        </div>

                        <div>
                            <label for="factor_rh" class="block text-sm font-semibold leading-6 text-gray-900">Factor
                                Rh</label>
                            <div class="mt-2.5">
                                <select id="factor_rh" name="factor_rh"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="seleccionar opcion" {{ isset($healthSheet) && $healthSheet->factor_rh == 'Seleccionar opción' ? 'selected' : '' }}>Seleccionar opción</option>
                                    <option value="Positivo" {{ isset($healthSheet) && $healthSheet->factor_rh == 'Positivo' ? 'selected' : '' }}>+ Positivo</option>
                                    <option value="Negativo" {{ isset($healthSheet) && $healthSheet->factor_rh == 'Negativo' ? 'selected' : '' }}>- Negativo</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!--- PRIMERA PREGUNTA --->

                    <div class="grid grid-cols-3 gap-4p-6">
                        <div class="col-span-2 flex items-center">
                            <p>¿Recibes algun tratamiento de salud actual?</p>
                        </div>
                        <div class="w-full flex ">
                            <ul class="grid w-full md:grid-cols-2">
                                <li>
                                    <input type="radio" id="tratamientosi" name="tratamiento" value="0"
                                        class="hidden peer" {{ isset($healthSheet) && $healthSheet->tratamiento == 0 ? 'checked' : '' }} />
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
                                    <input type="radio" id="tratamientono" name="tratamiento" value="1"
                                        class="hidden peer" checked {{ isset($healthSheet) && $healthSheet->tratamiento == 1 ? 'checked' : '' }}>
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

                    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-3" id="qpreuno" style="display:none" >
                        <div>
                            <label for="obs_tratamiento"
                                class="block text-sm font-semibold leading-6 text-gray-900">Observaciones</label>
                            <div class="mt-2.5">
                                <input type="text" name="obs_tratamiento" id="obs_tratamiento" autocomplete="given-name" value="{{ isset($healthSheet) ? $healthSheet->tratamiento_obs : ''}}"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="rec_tratamiento" class="block text-sm font-semibold leading-6 text-gray-900">Recibe
                                Tratamiento</label>
                            <div class="mt-2.5">
                                <input type="text" name="rec_tratamiento" id="rec_tratamiento" autocomplete="family-name" value="{{ isset($healthSheet) ? $healthSheet->tratamiento_rec : ''}}"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="nom_tratamiento" class="block text-sm font-semibold leading-6 text-gray-900">Nombre
                                del Medicamento</label>
                            <div class="mt-2.5">
                                <input type="text" name="nom_tratamiento" id="nom_tratamiento" autocomplete="family-name" value="{{ isset($healthSheet) ? $healthSheet->tratamiento_med : '' }}"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="sum_tratamiento" class="block text-sm font-semibold leading-6 text-gray-900">Quien lo Suministra</label>
                            <div class="mt-2.5">
                                <select id="sum_tratamiento" name="sum_tratamiento"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="seleccionar opcion" {{ isset($healthSheet) && $healthSheet->tratamiento_sum == 'seleccionar opcion' ? 'selected' : '' }}>Seleccionar opción</option>
                                    <option value="El responsabel" {{ isset($healthSheet) && $healthSheet->tratamiento_sum == 'El responsabel' ? 'selected' : '' }}>El responsable</option>
                                    <option value="El pasajero" {{ isset($healthSheet) && $healthSheet->tratamiento_sum == 'El pasajero' ? 'selected' : '' }}>El pasajero</option>
                                    <option value="El doctor" {{ isset($healthSheet) && $healthSheet->tratamiento_sum == 'El doctor' ? 'selected' : '' }}>El doctor</option>
                                    <option value="Solicita Ayuda" {{ isset($healthSheet) && $healthSheet->tratamiento_sum == 'Solicita Ayuda' ? 'selected' : '' }}>Solicita Ayuda</option>
                                    <option value="Ninguno" {{ isset($healthSheet) && $healthSheet->tratamiento_sum == 'Ninguno' ? 'selected' : '' }}>Ninguno</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="dosi_tratamiento" class="block text-sm font-semibold leading-6 text-gray-900">Dosis
                                al
                                Dia</label>
                            <div class="mt-2.5">
                                <select id="dosi_tratamiento" name="dosi_tratamiento"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="seleccionar opcion" {{ isset($healthSheet) && $healthSheet->tratamiento_dosis == 'seleccionar opcion' ? 'selected' : '' }}>Seleccionar opción</option>
                                    <option value="1 vez al día" {{ isset($healthSheet) && $healthSheet->tratamiento_dosis == '1 vez al día' ? 'selected' : '' }}>1 vez al día</option>
                                    <option value="2 veces al día" {{ isset($healthSheet) && $healthSheet->tratamiento_dosis == '2 veces al día' ? 'selected' : '' }}>2 veces al día</option>
                                    <option value="3 veces al día" {{ isset($healthSheet) && $healthSheet->tratamiento_dosis == '3 veces al día' ? 'selected' : '' }}>3 veces al día</option>
                                    <option value="4 veces al día" {{ isset($healthSheet) && $healthSheet->tratamiento_dosis == '4 veces al día' ? 'selected' : '' }}>4 veces al día</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <!--- SEGUNDA PREGUNTA --->

                    <div class="grid grid-cols-3 gap-4p-6">
                        <div class="col-span-2 flex items-center">
                            <p>¿Presenta alguna enfermedad Pre-existente?</p>
                        </div>
                        <div class="w-full flex ">
                            <ul class="grid w-full md:grid-cols-2">
                                <li>
                                    <input type="radio" id="enfermedadsi" name="enfermedad" value="0"
                                        class="hidden peer" />
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
                                    <input type="radio" id="enfermedadno" name="enfermedad" value="1"
                                        class="hidden peer" checked>
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

                    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-3" id="qpredos" style="display:none" >
                        <div>
                            <label for="obs_enfermedad"
                                class="block text-sm font-semibold leading-6 text-gray-900">Observaciones</label>
                            <div class="mt-2.5">
                                <input type="text" name="obs_enfermedad" id="obs_enfermedad" autocomplete="given-name" value="{{ isset($healthSheet) ? $healthSheet->enfermedad_obs : ''}}"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="rec_enfermedad" class="block text-sm font-semibold leading-6 text-gray-900">Recibe
                                Tratamiento</label>
                            <div class="mt-2.5">
                                <input type="text" name="rec_enfermedad" id="rec_enfermedad" autocomplete="family-name" value="{{ isset($healthSheet) ? $healthSheet->enfermedad_rec : ''}}"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="nom_enfermedad" class="block text-sm font-semibold leading-6 text-gray-900">Nombre
                                del Medicamento</label>
                            <div class="mt-2.5">
                                <input type="text" name="nom_enfermedad" id="nom_enfermedad" autocomplete="family-name" value="{{ isset($healthSheet) ? $healthSheet->enfermedad_med : ''}}"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="sum_enfermedad" class="block text-sm font-semibold leading-6 text-gray-900">Quien
                                lo Suministra</label>
                            <div class="mt-2.5"> 
                                <select id="sum_enfermedad" name="sum_enfermedad"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="seleccionar opcion" {{ isset($healthSheet) && $healthSheet->enfermedad_sum == 'seleccionar opcion' ? 'selected' : '' }}>Seleccionar opción</option>
                                    <option value="El responsabe" {{ isset($healthSheet) && $healthSheet->enfermedad_sum == 'El responsabe' ? 'selected' : '' }}>El responsable</option>
                                    <option value="El pasajero" {{ isset($healthSheet) && $healthSheet->enfermedad_sum == 'El pasajero' ? 'selected' : '' }}>El pasajero</option>
                                    <option value="El doctor" {{ isset($healthSheet) && $healthSheet->enfermedad_sum == 'El doctor' ? 'selected' : '' }}>El doctor</option>
                                    <option value="Solicita Ayuda" {{ isset($healthSheet) && $healthSheet->enfermedad_sum == 'Solicita Ayuda' ? 'selected' : '' }}>Solicita Ayuda</option>
                                    <option value="Ninguno" {{ isset($healthSheet) && $healthSheet->enfermedad_sum == 'Ninguno' ? 'selected' : '' }}>Ninguno</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="dosi_enfermedad" class="block text-sm font-semibold leading-6 text-gray-900">Dosis
                                al Dia</label>
                            <div class="mt-2.5">
                                <select id="dosi_enfermedad" name="dosi_enfermedad"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="seleccionar opcion" {{ isset($healthSheet) && $healthSheet->enfermedad_dosis == 'seleccionar opcion' ? 'selected' : '' }}>Seleccionar opción</option>
                                    <option value="1 vez al día" {{ isset($healthSheet) && $healthSheet->enfermedad_dosis == '1 vez al día' ? 'selected' : '' }}>1 vez al día</option>
                                    <option value="2 veces al día" {{ isset($healthSheet) && $healthSheet->enfermedad_dosis == '2 veces al día' ? 'selected' : '' }}>2 veces al día</option>
                                    <option value="3 veces al día" {{ isset($healthSheet) && $healthSheet->enfermedad_dosis == '3 veces al día' ? 'selected' : '' }}>3 veces al día</option>
                                    <option value="4 veces al día" {{ isset($healthSheet) && $healthSheet->enfermedad_dosis == 's4 veces al día' ? 'selected' : '' }}>4 veces al día</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <!--- TERCERA PREGUNTA --->

                    <div class="grid grid-cols-3 gap-4p-6">
                        <div class="col-span-2 flex items-center">
                            <p>¿Es usted alergico a algun medicamento?</p>
                        </div>
                        <div class="w-full flex ">
                            <ul class="grid w-full md:grid-cols-2">
                                <li>
                                    <input type="radio" id="medicamentosi" name="medicamento" value="0"
                                        class="hidden peer" />
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
                                    <input type="radio" id="medicamentono" name="medicamento" value="1"
                                        class="hidden peer" checked>
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

                    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-3" id="qpretres" style="display:none" >
                        <div>
                            <label for="obs_alergico"
                                class="block text-sm font-semibold leading-6 text-gray-900">Observaciones</label>
                            <div class="mt-2.5">
                                <input type="text" name="obs_alergico" id="obs_alergico" autocomplete="given-name" value="{{ isset($healthSheet) ? $healthSheet->alergia_obs : ''}}"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="rec_alergico" class="block text-sm font-semibold leading-6 text-gray-900">Recibe
                                Tratamiento</label>
                            <div class="mt-2.5">
                                <input type="text" name="rec_alergico" id="rec_alergico" autocomplete="family-name" value="{{ isset($healthSheet) ? $healthSheet->alergia_rec : ''}}"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="nom_alergico" class="block text-sm font-semibold leading-6 text-gray-900">Nombre
                                del Medicamento</label>
                            <div class="mt-2.5">
                                <input type="text" name="nom_alergico" id="nom_alergico" autocomplete="family-name" value="{{ isset($healthSheet) ? $healthSheet->alergia_med : ''}}"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="sum_alergico" class="block text-sm font-semibold leading-6 text-gray-900">Quien
                                lo Suministra</label>
                            <div class="mt-2.5">
                                <select id="sum_alergico" name="sum_alergico"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="seleccionar opcion" {{ isset($healthSheet) && $healthSheet->alergia_sum == 'seleccionar opcion' ? 'selected' : '' }}>Seleccionar opción</option>
                                    <option value="El responsable" {{ isset($healthSheet) && $healthSheet->alergia_sum == 'El responsable' ? 'selected' : '' }}>El responsable</option>
                                    <option value="El pasajero" {{ isset($healthSheet) && $healthSheet->alergia_sum == 'El pasajero' ? 'selected' : '' }}>El pasajero</option>
                                    <option value="El doctor" {{ isset($healthSheet) && $healthSheet->alergia_sum == 'El doctor' ? 'selected' : '' }}>El doctor</option>
                                    <option value="Solicita Ayuda" {{ isset($healthSheet) && $healthSheet->alergia_sum == 'Solicita Ayuda' ? 'selected' : '' }}>Solicita Ayuda</option>
                                    <option value="Ninguno" {{ isset($healthSheet) && $healthSheet->alergia_sum == 'Ninguno' ? 'selected' : '' }}>Ninguno</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="dosi_alergico" class="block text-sm font-semibold leading-6 text-gray-900">Dosis
                                al Dia</label>
                            <div class="mt-2.5">
                                <select id="dosi_alergico" name="dosi_alergico"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="seleccionar opcion" {{ isset($healthSheet) && $healthSheet->alergia_dosis == 'seleccionar opcion' ? 'selected' : '' }}>Seleccionar opción</option>
                                    <option value="1 vez al día" {{ isset($healthSheet) && $healthSheet->alergia_dosis == '1 vez al día' ? 'selected' : '' }}>1 vez al día</option>
                                    <option value="2 veces al día" {{ isset($healthSheet) && $healthSheet->alergia_dosis == '2 veces al día' ? 'selected' : '' }}>2 veces al día</option>
                                    <option value="3 veces al día" {{ isset($healthSheet) && $healthSheet->alergia_dosis == '3 veces al día' ? 'selected' : '' }}>3 veces al día</option>
                                    <option value="4 veces al día" {{ isset($healthSheet) && $healthSheet->alergia_dosis == '4 veces al día' ? 'selected' : '' }}>4 veces al día</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <!--- CUARTA PREGUNTA --->

                    <div class="grid grid-cols-3 gap-4p-6">
                        <div class="col-span-2 flex items-center">
                            <p>¿Presenta alguna alergia adicional?</p>
                        </div>
                        <div class="w-full flex ">
                            <ul class="grid w-full md:grid-cols-2">
                                <li>
                                    <input type="radio" id="alergiasi" name="alergia" value="0"
                                        class="hidden peer" />
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
                                    <input type="radio" id="alergiano" name="alergia" value="1"
                                        class="hidden peer" checked>
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

                    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-3" id="qprecuatro" style="display:none" >
                        <div>
                            <label for="obs_alerg_ad"
                                class="block text-sm font-semibold leading-6 text-gray-900">Observaciones</label>
                            <div class="mt-2.5">
                                <input type="text" name="obs_alerg_ad" id="obs_alerg_ad" autocomplete="given-name" value="{{ isset($healthSheet) ? $healthSheet->alergia_ad_obs : ''}}"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="rec_alerg_ad" class="block text-sm font-semibold leading-6 text-gray-900">Recibe
                                Tratamiento</label>
                            <div class="mt-2.5">
                                <input type="text" name="rec_alerg_ad" id="rec_alerg_ad" autocomplete="family-name" value="{{ isset($healthSheet) ? $healthSheet->alergia_ad_rec : ''}}"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="nom_alerg_ad" class="block text-sm font-semibold leading-6 text-gray-900">Nombre
                                del Medicamento</label>
                            <div class="mt-2.5">
                                <input type="text" name="nom_alerg_ad" id="nom_alerg_ad" autocomplete="family-name" value="{{ isset($healthSheet) ? $healthSheet->alergia_ad_med : ''}}"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="sum_alerg_ad" class="block text-sm font-semibold leading-6 text-gray-900">Quien
                                lo Suministra</label>
                            <div class="mt-2.5">
                                <select id="sum_alerg_ad" name="sum_alerg_ad"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="seleccionar opcion" {{ isset($healthSheet) && $healthSheet->alergia_ad_sum == 'seleccionar opcion' ? 'selected' : '' }}>Seleccionar opción</option>
                                    <option value="El responsable" {{ isset($healthSheet) && $healthSheet->alergia_ad_sum == 'El responsable' ? 'selected' : '' }}>El responsable</option>
                                    <option value="El pasajero" {{ isset($healthSheet) && $healthSheet->alergia_ad_sum == 'El pasajero' ? 'selected' : '' }}>El pasajero</option>
                                    <option value="El doctor" {{ isset($healthSheet) && $healthSheet->alergia_ad_sum == 'El doctor' ? 'selected' : '' }}>El doctor</option>
                                    <option value="Solicita Ayuda" {{ isset($healthSheet) && $healthSheet->alergia_ad_sum == 'Solicita Ayuda' ? 'selected' : '' }}>Solicita Ayuda</option>
                                    <option value="Ninguno" {{ isset($healthSheet) && $healthSheet->alergia_ad_sum == 'Ninguno' ? 'selected' : '' }}>Ninguno</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="dosi_alerg_ad" class="block text-sm font-semibold leading-6 text-gray-900">Dosis
                                al Dia</label>
                            <div class="mt-2.5">
                                <select id="dosi_alerg_ad" name="dosi_alerg_ad"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="seleccionar opcion" {{ isset($healthSheet) && $healthSheet->alergia_ad_dosis == 'seleccionar opcion' ? 'selected' : '' }}>Seleccionar opción</option>
                                    <option value="1 vez al día" {{ isset($healthSheet) && $healthSheet->alergia_ad_dosis == '1 vez al día' ? 'selected' : '' }}>1 vez al día</option>
                                    <option value="2 veces al día" {{ isset($healthSheet) && $healthSheet->alergia_ad_dosis == '2 veces al día' ? 'selected' : '' }}>2 veces al día</option>
                                    <option value="3 veces al día" {{ isset($healthSheet) && $healthSheet->alergia_ad_dosis == '3 veces al día' ? 'selected' : '' }}>3 veces al día</option>
                                    <option value="4 veces al día" {{ isset($healthSheet) && $healthSheet->alergia_ad_dosis == '4 veces al día' ? 'selected' : '' }}>4 veces al día</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <H2 class="mt-5 font-bold">Inmunizaciones Recibidas</H2>

                    <div class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg">
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
                                        <input id="hepatitis B" type="checkbox" name="inmunizacion[]" value="Hepatitis B"
                                            class="w-4 h-4 text-red-rv bg-gray-100 border-gray-300 rounded focus:ring-red-rv dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                            {{ isset($healthSheet->inmunizacion) && in_array('Hepatitis B', $healthSheet->inmunizacion) ? 'checked' : '' }}>
                                        <label for="angular-checkbox-list"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hepatitis B</label>
                                    </div>
                                </li>
                                <li class="w-full">
                                    <div class="flex items-center ps-3">
                                        <input id="sarampion" type="checkbox" name="inmunizacion[]" value="Sarampión"
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
                                        <input id="influenza" type="checkbox" name="inmunizacion[]" value="Influenza"
                                            class="w-4 h-4 text-red-rv bg-gray-100 border-gray-300 rounded focus:ring-red-rv dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                            {{ isset($healthSheet->inmunizacion) && in_array('Influenza', $healthSheet->inmunizacion) ? 'checked' : '' }}>
                                        <label for="vue-checkbox-list"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Influenza</label>
                                    </div>
                                </li>
                                <li class="w-full">
                                    <div class="flex items-center ps-3">
                                        <input id="fiebre amarilla" type="checkbox" name="inmunizacion[]" value="Fiebre Amarilla"
                                            class="w-4 h-4 text-red-rv bg-gray-100 border-gray-300 rounded focus:ring-red-rv dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                            {{ isset($healthSheet->inmunizacion) && in_array('Fiebre Amarilla', $healthSheet->inmunizacion) ? 'checked' : '' }}>
                                        <label for="react-checkbox-list"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Fiebre Amarilla</label>
                                    </div>
                                </li>
                                <li class="w-full">
                                    <div class="flex items-center ps-3">
                                        <input id="tuberculosis" type="checkbox" name="inmunizacion[]" value="Tuberculosis"
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
                            <label for="vac_adicionales" class="block text-sm font-semibold leading-6 text-gray-900">Vacunas
                                Adicionales</label>
                            <div class="mt-2.5">
                                <input type="text" name="vac_adicionales" id="vac_adicionales" autocomplete="family-name" value="{{ isset($healthSheet) ? $healthSheet->vacunas_adicionales : ''}}"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="vacunas_covid" class="block text-sm font-semibold leading-6 text-gray-900">Vacunas Covid</label>
                            <div class="mt-2.5">
                                <select id="vacunas_covid" name="vacunas_covid"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="seleccionar opcion" {{ isset($healthSheet) && $healthSheet->vacunas_covid == 'seleccionar opcion' ? 'selected' : '' }}>Seleccionar opción</option>
                                    <option value="Primera Dosis" {{ isset($healthSheet) && $healthSheet->vacunas_covid == 'Primera Dosis' ? 'selected' : '' }}>Primera Dosis</option>
                                    <option value="Segunda Dosis" {{ isset($healthSheet) && $healthSheet->vacunas_covid == 'Segunda Dosis' ? 'selected' : '' }}>Segunda Dosis</option>
                                    <option value="Tercera Dosis" {{ isset($healthSheet) && $healthSheet->vacunas_covid == 'Tercera Dosis' ? 'selected' : '' }}>Tercera Dosis</option>
                                    <option value="Cuarta Dosis" {{ isset($healthSheet) && $healthSheet->vacunas_covid == 'Cuarta Dosis' ? 'selected' : '' }}>Cuarta Dosis</option>
                                    <option value="Quinta Dosis" {{ isset($healthSheet) && $healthSheet->vacunas_covid == 'Quinta Dosis' ? 'selected' : '' }}>Quinta Dosis</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="efec_secund" class="block text-sm font-semibold leading-6 text-gray-900">Efectos
                                Secundarios</label>
                            <div class="mt-2.5">
                                <input type="text" name="efec_secund" id="efec_secund" autocomplete="family-name" value="{{ isset($healthSheet) ? $healthSheet->efecto_secundarios : ''}}"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>

                    <hr>

                    <H2 class="mt-5 font-bold">Cuentanos mas sobre tu salud: </H2>

                    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-1">
                        <div>
                            <label for="info_ad"
                                class="block text-sm font-semibold leading-6 text-gray-900">Informacion Adicional</label>
                            <div class="mt-2.5">
                                <input type="text" name="info_ad" id="info_ad" autocomplete="family-name" value="{{ isset($healthSheet) ? $healthSheet->informacion_adicional_salud : '' }}"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>

                    <H2 class="mt-5 font-bold">Tarjetas de seguro de Viaje: </H2>

                    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                        <div>
                            <label for="tar_seguro" class="block text-sm font-semibold leading-6 text-gray-900">Tarjeta
                                de Seguro de Viaje</label>
                            <div class="mt-2.5">
                                <input type="text" name="tar_seguro" id="tar_seguro" disabled value="Medix Travel"
                                    autocomplete="family-name"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 bg-slate-300
                                    text-black shadow-sm ring-1 ring-inset ring-gray-300
                                     placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                      focus:ring-red-rv sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="tar_seguro_pri" class="block text-sm font-semibold leading-6 text-gray-900">Tarjeta
                                de Seguro Privado</label>
                            <div class="mt-2.5">
                                <input type="text" name="tar_seguro_priv" id="tar_seguro_priv"
                                    placeholder="Ejemplo: Rimac plan Familiar" autocomplete="family-name" value="{{ isset($healthSheet) ? $healthSheet->tarjeta_seguro_privado : ''}}"
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
                                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                                
                            </div>
                        </div>
                        <div>
                            <label for="hist_salud_em"
                                class="block text-sm font-semibold leading-6 text-gray-900">Historial
                                de Salud Emocional (opcional)</label>
                            <div class="mt-2.5">
                                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                            </div>
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
                        <a href="/ficha-nutritional">Siguiente</a>
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
                        <a href="/ficha-nutricional">Siguiente</a>
                    </div>
                </div>
            </form>

            <!-- Tarjeta de Seguro Médico -->

            <x-texthead>
                {{ __('Tratamiento Médico Recibido Durante el Viaje') }}
            </x-texthead>
            <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-4 p-6 py-8 mb-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
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
                    <button type="submit" class="block w-full rounded-md bg-red-rv px-3.5 py-6 text-center text-sm font-semibold text-white shadow-sm hover:bg-red-rv focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-rv">DESCARGAR FICHA</button>
                </div>
            </div>
        </div>
    </div>

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

</x-approxana-layout>