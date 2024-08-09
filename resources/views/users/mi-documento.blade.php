<x-approxana-layout>

    <div class="m-6 text-center sm:pt-12 sm:text-left">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-red-rv dark:bg-gray-800 rounded-lg overflow-hidden shadow-sm sm:rounded-lg grid grid-cols-1 sm:grid-cols-3 p-6 pb-0 gap-4">
                <div class="flex flex-col md:flex-row justify-between items-center col-span-2">
                    <div class="p-5 text-white-rv dark:text-gray-100 text-lg sm:pl-16">
                        <div class="text-white-rv text-3xl">
                            {!! __('Estas en tus ,') !!} <b>Documentos</b> de tu Viaje a <b> Punta Cana
                                Viaje{{ Auth::user()->viaje }} {{ Auth::user()->nameviaje }}</b>!<br>
                        </div>

                        <p class="mt-4 text-white-rv-400 text-base font-Light">
                            {!! __(
                                'Sube y descarga todos los documentos importantes relacionados con tu viaje. Asegúrate de tener todo en orden para evitar inconvenientes.',
                            ) !!}
                        </p>
                    </div>
                </div>
                <div class="p-0 text-white-rv dark:text-gray-100 sm:pr-16 pt-5 pb-0 flex justify-center">
                    <img src="/images/rox.png" alt="" class="pb-0 w-64">
                </div>
            </div>
        </div>
    </div>


    <!--- div formulario --->

    <div class="p-6 pt-0 sm:py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- DOCUMENTOS PERSONALES -->
            <x-texthead>
                {{ __('Documentos del viaje') }}
            </x-texthead>
            <div class="grid grid-cols-1 gap-4 p-6  bg-white border border-gray-200 rounded-lg shadow">
                <div class="grid grid-cols-1 sm:grid-cols-6 gap-4">
                    <div class=" col-span-1 sm:col-span-2">
                        <p class="text-center  text-red-rv mb-4 text-2xl font-bold">Indicaciones</p>
                        <div
                            class="rounded-lg border-2 border-dashed border-black py-8 flex flex-col justify-center items-center">
                            <a href="/pdfs/indicaciones-puntacana.pdf">
                                <img src="/images/indica.png" width="120px">
                                <p class="mt-2">Descarga tu archivo</p>
                            </a>
                        </div>
                        <a href="/pdfs/indicaciones-puntacana.pdf"
                            class="block w-40 mt-6 items-center rounded-md bg-red-rv px-3.5 py-2.5 
                            text-center text-sm font-semibold text-white shadow-sm 
                            hover:bg-red-rv focus-visible:outline 
                            focus-visible:outline-2 focus-visible:outline-offset-2
                             focus-visible:outline--red-rv mx-auto">
                            DESCARGAR
                        </a>
                    </div>

                    <div class=" col-span-1 sm:col-span-2">
                        <p class="text-center  text-red-rv mb-4 text-2xl font-bold">Agenda</p>
                        <div
                            class="rounded-lg border-2 border-dashed border-black py-8 flex flex-col justify-center items-center">
                            <a href="/pdfs/agenda-puntacana.pdf">
                                <img src="/images/calendario.png" width="120px">
                                <p class="mt-2">Descarga tu archivo</p>
                            </a>
                        </div>
                        <div></div>
                        <a href="/pdfs/agenda-puntacana.pdf"
                            class="block w-40 mt-6 items-center rounded-md bg-red-rv px-3.5 py-2.5 
                            text-center text-sm font-semibold text-white shadow-sm 
                            hover:bg-red-rv focus-visible:outline 
                            focus-visible:outline-2 focus-visible:outline-offset-2
                             focus-visible:outline--red-rv mx-auto">
                            DESCARGAR
                        </a>
                    </div>

                    <div class=" col-span-1 sm:col-span-2">
                        <p class="text-center  text-red-rv mb-4 text-2xl font-bold">Normas Viajes Roxana</p>
                        <div
                            class="rounded-lg border-2 border-dashed border-black py-8 flex flex-col justify-center items-center">
                            <a href="/pdfs/normas-puntacana.pdf">
                                <img src="/images/hecho.png" width="120px">
                                <p class="mt-2">Descarga tu archivo</p>
                            </a>
                        </div>
                        <a href="/pdfs/normas-puntacana.pdf"
                            class="block w-40 mt-6 items-center rounded-md bg-red-rv px-3.5 py-2.5 
                            text-center text-sm font-semibold text-white shadow-sm 
                            hover:bg-red-rv focus-visible:outline 
                            focus-visible:outline-2 focus-visible:outline-offset-2
                             focus-visible:outline--red-rv mx-auto">
                            DESCARGAR
                        </a>
                    </div>

                    <hr class="col-span-1 sm:col-span-6">

                    <div class=" col-span-1 sm:col-span-3">
                        <p class="text-center  text-red-rv mb-4 text-2xl font-bold">¿Que ropa llevar a mi viaje?</p>
                        <div
                            class="rounded-lg border-2 border-dashed border-black py-8 flex flex-col justify-center items-center">
                            <a href="/pdfs/ropa-puntacana.pdf" target="_blank">
                                <img src="/images/playa.png" width="150px">
                                Descarga tu archivo
                            </a>
                        </div>
                        <a href="/pdfs/ropa-puntacana.pdf" target="_blank"
                            class="block w-40 mt-6 items-center rounded-md bg-red-rv px-3.5 py-2.5 
                            text-center text-sm font-semibold text-white shadow-sm 
                            hover:bg-red-rv focus-visible:outline 
                            focus-visible:outline-2 focus-visible:outline-offset-2
                             focus-visible:outline--red-rv mx-auto">
                            DESCARGAR
                        </a>
                    </div>

                    <div class=" col-span-1 sm:col-span-3">
                        <p class="text-center  text-red-rv mb-4 text-2xl font-bold">Permiso Notarial</p>
                        <div
                            class="rounded-lg border-2 border-dashed border-black py-8 flex flex-col justify-center items-center">
                            <a href="/pdfs/permiso-notarial-puntacana.pdf" target="_blank">
                                <img src="/images/Icons_PermisoNotarial.png" width="150px">
                                Descarga tu archivo
                            </a>
                        </div>
                        <a href="/pdfs/permiso-notarial-puntacana.pdf" target="_blank"
                            class="block w-40 mt-6 items-center rounded-md bg-red-rv px-3.5 py-2.5 
                            text-center text-sm font-semibold text-white shadow-sm 
                            hover:bg-red-rv focus-visible:outline 
                            focus-visible:outline-2 focus-visible:outline-offset-2
                             focus-visible:outline--red-rv mx-auto">
                            DESCARGAR
                        </a>
                    </div>

                    <hr class="col-span-1 sm:col-span-6">

                    <x-texthead class=" col-span-1 sm:col-span-6 text-center">
                        {{ __('Tarjeta de Asistencia Médica') }}
                    </x-texthead>

                    <div class=" col-span-1 sm:col-span-3">
                        <div
                            class="rounded-lg border-2 border-dashed border-black py-8 flex flex-col justify-center items-center">
                            <a href="voucher/voucher_{{ Auth::user()->documento }}.pdf" target="_blank">
                                <img src="/images/Icons_Vaucher.png" width="180px">
                                Voucher Medico<br>
                            </a>
                        </div>
                        <a href="voucher/voucher_{{ Auth::user()->documento }}.pdf" target="_blank"
                            class="block w-40 mt-6 items-center rounded-md bg-red-rv px-3.5 py-2.5 
                            text-center text-sm font-semibold text-white shadow-sm 
                            hover:bg-red-rv focus-visible:outline 
                            focus-visible:outline-2 focus-visible:outline-offset-2
                             focus-visible:outline--red-rv mx-auto">
                            DESCARGAR
                        </a>
                    </div>

                    <div class=" col-span-1 sm:col-span-3">
                        <div
                            class="rounded-lg border-2 border-dashed border-black py-8 flex flex-col justify-center items-center">
                            <a href="pdfs/clinicas-cercanas-puntacana.pdf" target="_blank">
                                <img src="/images/Icons_Clinicas.png" width="180px">
                                Lista de Clinicas Cercanas
                            </a>

                        </div>
                        <a href="pdfs/clinicas-cercanas-puntacana.pdf" target="_blank"
                            class="block w-40 mt-6 items-center rounded-md bg-red-rv px-3.5 py-2.5 
                            text-center text-sm font-semibold text-white shadow-sm 
                            hover:bg-red-rv focus-visible:outline 
                            focus-visible:outline-2 focus-visible:outline-offset-2
                             focus-visible:outline--red-rv mx-auto">
                            DESCARGAR
                        </a>
                    </div>
                </div>
            </div>


            <!-- BOTONES GUARDAR -->

            <div class="my-10 grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-3 max-sm:hidden">
                <div class="text-start">
                    <a href="{{ URL::previous() }}">Volver</a>
                </div>
                <div>
                    <button
                        class="block w-full rounded-md bg-red-rv px-3.5 py-2.5 
                    text-center text-sm font-semibold text-white shadow-sm 
                    hover:bg-red-rv focus-visible:outline 
                    focus-visible:outline-2 focus-visible:outline-offset-2
                     focus-visible:outline--red-rv">
                        DESCARGAR TODO
                    </button>
                </div>
                <div class="text-end">
                    <a href="/mi-checkin">Siguiente</a>
                </div>
            </div>
        </div>
    </div>



</x-approxana-layout>
