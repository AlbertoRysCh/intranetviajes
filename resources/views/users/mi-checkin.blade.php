<x-approxana-layout>

    <div class="m-6 text-center sm:pt-12 sm:text-left">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-red-rv dark:bg-gray-800 rounded-lg overflow-hidden shadow-sm sm:rounded-lg grid grid-cols-1 sm:grid-cols-3 p-6 pb-0 gap-4">
                <div class="flex flex-col md:flex-row justify-between items-center col-span-2">
                    <div class="p-5 text-white-rv dark:text-gray-100 text-lg sm:pl-16">
                        <div class="text-white-rv text-3xl">
                            {!! __('Estas en tu ,') !!} <b> Check-In</b> de tu Viaje a<b> Punta Cana
                                {{ Auth::user()->viaje }} {{ Auth::user()->nameviaje }}</b><br>
                        </div>

                        <p class="mt-4 text-white-rv-400 text-base font-Light">
                            {!! __(
                                'Sube y descarga todos los documentos importantes relacionados con tu viaje. Asegúrate de tener todo en orden para evitar inconvenientes.',
                            ) !!}
                        </p>
                    </div>
                </div>
                <div class="p-0 text-white-rv dark:text-gray-100 sm:pr-16 pt-5 pb-0 ">
                    <img src="/images/rox.png" alt="" class="pb-0 w-64">
                </div>
            </div>
        </div>
    </div>


    <!--- div formulario --->

    <div class="p-6 pt-0 sm:py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- MIS DATOS PERSONALES -->
            <x-texthead>
                {{ __('Check - In') }}
            </x-texthead>
            <div class="grid grid-cols-1 gap-4 p-6  bg-white border border-gray-200 rounded-lg shadow">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class=" col-span-2">
                        <p class="text-red-rv mb-4 text-2xl font-bold">Documento del Pasajero</p>
                    </div>

                    <div class="max-sm:col-span-2">
                        <label for="documentoci"
                            class="block text-sm font-semibold leading-6 text-gray-900">Documento</label>
                        <div class="mt-2.5">
                            <select id="documentoci"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                                <option selected>Seleccionar opción</option>
                                <option value="Dni">Dni</option>
                                <option value="Carnet de Extranjeria">Carnet de Extranjeria</option>
                                <option value="Pasaporte">Pasaporte</option>
                            </select>
                        </div>
                    </div>

                    <div  class="max-sm:col-span-2">
                        <label for="nummero-document-ci"
                            class="block text-sm font-semibold leading-6 text-gray-900">Numero de Documento</label>
                        <div class="mt-2.5">
                            <input type="text" name="nummero-document-ci" id="nummero-document-ci"
                                autocomplete="given-name"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div  class="max-sm:col-span-2">
                        <label for="fecha-emision" class="block text-sm font-semibold leading-6 text-gray-900">Fecha de
                            Emisión</label>
                        <div class="relative w-full mt-2.5">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input datepicker id="fecha-emision" type="date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-rv focus:border-red-rv block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-rv dark:focus:border-red-rv"
                                placeholder="Selecciona fecha">
                        </div>
                    </div>

                    <div  class="max-sm:col-span-2">
                        <label for="fecha-vencimiento" class="block text-sm font-semibold leading-6 text-gray-900">Fecha
                            de
                            Vencimiento</label>
                        <div class="relative w-full mt-2.5">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input datepicker id="fecha-vencimiento" type="date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-rv focus:border-red-rv block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-rv dark:focus:border-red-rv"
                                placeholder="Selecciona fecha">
                        </div>
                    </div>

                    <div class=" col-span-2">
                        <p class="text-red-rv mb-4 text-2xl font-bold">Sube foto de tu documento</p>
                    </div>

                    <div class=" col-span-2">
                        <div
                            class="rounded-lg border-2 border-dashed border-black py-8 flex flex-col justify-center items-center">
                            <img src="/images/identifiacion-vr.png" width="120px">
                            Sube tu archivo
                        </div>
                    </div>

                    <div class=" col-span-2">
                        <p class="text-red-rv mb-4 text-2xl font-bold">Pass Boarding</p>
                    </div>

                    <div class=" col-span-2">
                        <div
                            class="rounded-lg border-2 border-dashed border-black py-8 flex flex-col justify-center items-center">
                            <img src="/images/pase.png" width="120px">
                            <p>El pass Boarding se habilitara para</p>
                            <p>ser descargado 24 horas antes del viaje</p>
                            <p class=" font-bold text-red-600">SOLO SI LA AEROLINEA LO PERMITE</p>
                        </div>
                    </div>

                    <div class=" col-span-2">
                        <p class="text-red-rv mb-4 text-2xl font-bold">Registro de la Maleta</p>
                    </div>

                    <div  class="max-sm:col-span-2">
                        <div
                            class="rounded-lg border-2 border-dashed border-black py-10 flex flex-col justify-center items-center">
                            <img src="/images/maleta-vr.png" width="120px">
                            <p class="pt-4"><b>Equipaje de 8KG</b></p>
                            Dimensiones máximas: 55*24*25cm
                            <label class="py-6 text-blue-600">Subir Foto</label>
                            <p class=" font-bold ">Disponible 2 dias antes del viaje</p>
                        </div>

                        <label for="nummero-document-ci"
                            class="block text-sm font-semibold leading-6 text-gray-900 mt-3">Descripción de la maleta de
                            8KG</label>
                        <div class="mt-2.5">
                            <input type="text" name="nummero-document-ci" id="nummero-document-ci"
                                autocomplete="given-name"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <div
                            class="rounded-lg border-2 border-dashed border-black py-10 flex flex-col justify-center items-center">
                            <img src="/images/maleta-vr.png" width="120px">
                            <p class="pt-4"><b>Equipaje de 23KG</b></p>
                            Dimensiones máximas: 55*24*25cm
                            <label class="py-6 text-blue-600">Subir Foto</label>
                            <p class=" font-bold ">Disponible 2 dias antes del viaje</p>
                        </div>

                        <label for="nummero-document-ci"
                            class="block text-sm font-semibold leading-6 text-gray-900 mt-3">Descripción de la maleta de
                            23KG</label>
                        <div class="mt-2.5">
                            <input type="text" name="nummero-document-ci" id="nummero-document-ci"
                                autocomplete="given-name"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
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
                    <a href="/dashboard">Inicio</a>
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
                    <a href="/dashboard">Inicio</a>
                </div>
            </div>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>

</x-approxana-layout>
