<x-approxana-layout>
    <div class="mt-6 text-center sm:text-left">
        <div class="max-w-7xl mx-auto my-4 sm:px-6 lg:px-8 flex flex-row justify-between">
            <div>
                <a href="{{ route('mi-perfil') }}"
                    class="flex flex-row items-center gap-4 border-2 border-gray-400 rounded-full w-48 py-2 justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                    </svg>
                    <p>Ir a mi Perfil</p>
                </a>
            </div>
            <div class="flex flex-row gap-6">
                <a href="{{ route('users.mis-datos') }}"
                    class="flex flex-row items-center gap-4 border-2 border-gray-400 rounded-full w-48 py-2 justify-center">
                    <p>Mis Datos</p>
                </a>
                <a href="{{ route('ficha-medica.show') }}"
                    class="flex flex-row items-center gap-4 border-2 border-gray-400 rounded-full w-48 py-2 justify-center">
                    <p>Ficha Médica</p>
                </a>
            </div>
        </div>
    </div>


    <div class="mt-6 text-center sm:text-left">
        <div class="max-w-7xl mx-auto mt-10 sm:px-6 lg:px-8">
            <div class="flex flex-row text-center gap-6 mb-8 items-center">
                <h3 class=" font-normal text-5xl">Ficha Nutricional</h3>
                <div class="w-80 bg-gray-300 rounded-md ">
                    <p class="text-center bg-green-400 border border-green-400 rounded-md w-72 ">95% completado</p>
                </div>
            </div>
            <div class="flex flex-row items-center">
                <img src="/images/health.png" alt="">
                <p>Para asegurar que tus preferencias y restricciones alimentaria<br> 
                    se tengan en cuenta durante tu viaje, por favor completa los <br>
                     siguientes campos con la información requerida.</p>
            </div>
        </div>
    </div>

    <!--- div formulario --->

    <div class="p-6 pt-0 sm:py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('nutritional-sheet.store') }}" method="POST">
                @csrf
                <!-- MIS DATOS PERSONALES -->

                <div class="grid grid-cols-1 gap-4 p-6 my-8  bg-white border border-gray-200 rounded-lg shadow">
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="col-span-3">
                            <x-texthead>
                                {{ __('Mi Ficha Nutricional') }}
                            </x-texthead>
                        </div>
                        <div>
                            <label for="peso"
                                class="block text-sm font-semibold leading-6 text-gray-900">Peso</label>
                            <div class="mt-2.5">
                                <input type="text" name="peso" id="peso" autocomplete="family-name"
                                    value="{{ isset($nutritionalSheet) ? $nutritionalSheet->peso : '' }}"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="talla"
                                class="block text-sm font-semibold leading-6 text-gray-900">Talla</label>
                            <div class="mt-2.5">
                                <input type="text" name="talla" id="talla" autocomplete="family-name"
                                    value="{{ isset($nutritionalSheet) ? $nutritionalSheet->talla : '' }}"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="act_fisica"
                                class="block text-sm font-semibold leading-6 text-gray-900">Actividad
                                Física</label>
                            <div class="mt-2.5">
                                <select id="act_fisica" name="act_fisica"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="Seleccionar opción"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->actividad == 'Seleccionar opción' ? 'selected' : '' }}>
                                        Seleccionar opción</option>
                                    <option value="1 vez a la semana"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->actividad == '1 vez a la semana' ? 'selected' : '' }}>
                                        1 vez a la semana</option>
                                    <option value="2 o 3 veces a la semana"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->actividad == '2 o 3 veces a la semana' ? 'selected' : '' }}>
                                        2 o 3 veces a la semana</option>
                                    <option value="Todos los días"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->actividad == 'Todos los días' ? 'selected' : '' }}>
                                        Todos los días</option>
                                    <option value="Ninguno"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->actividad == 'Ninguno' ? 'selected' : '' }}>
                                        Ninguno</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!--- PRIMERA PREGUNTA --->

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label for="tiposAlimentacion"
                                class="block text-sm font-semibold leading-6 text-gray-900">Tipos de
                                Alimentacion</label>
                            <div class="mt-2.5">
                                <select id="tiposAlimentacion" name="tiposAlimentacion"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm
                                     ring-1 ring-inset ring-gray-300 placeholder:text-gray-400
                                      focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="Seleccionar opcion"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->alimentacion == 'Seleccionar opcion' ? 'selected' : '' }}>
                                        Seleccionar opción</option>
                                    <option value="Vegetariano"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->alimentacion == 'Vegetariano' ? 'selected' : '' }}>
                                        Vegetariano</option>
                                    <option value="Vegano"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->alimentacion == 'Vegano' ? 'selected' : '' }}>
                                        Vegano</option>
                                    <option value="Omnívoboro"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->alimentacion == 'Omnívoboro' ? 'selected' : '' }}>
                                        Omnívoboro</option>
                                    <option value="Macrobiotico"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->alimentacion == 'Macrobiotico' ? 'selected' : '' }}>
                                        Macrobiotico</option>
                                    <option value="Otro"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->alimentacion == 'Otro' ? 'selected' : '' }}>
                                        Otro</option>
                                </select>
                            </div>
                        </div>
                        <div class=" col-span-2">
                            <label for="edtiposAlimentacion"
                                class="block text-sm font-semibold leading-6 text-gray-900">Especificar
                                Detalles</label>
                            <div class="mt-2.5">
                                <input type="text" name="edtiposAlimentacion" id="edtiposAlimentacion" disabled
                                    placeholder="Ejemplo: Omnívoro con preferencia por pescado y pollo."
                                    autocomplete="family-name"
                                    value="{{ isset($nutritionalSheet) ? $nutritionalSheet->detalle_alimentacion : '' }}"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 bg-white
                                    text-black shadow-sm ring-1 ring-inset ring-gray-300
                                     placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                      focus:ring-red-rv sm:text-sm sm:leading-6
                                      disabled:bg-slate-300">
                            </div>
                        </div>
                    </div>

                    <hr>
                    <!--- SEGUNDA PREGUNTA --->

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label for="alergiasAlimentarias"
                                class="block text-sm font-semibold leading-6 text-gray-900">Alergias
                                Alimentarias</label>
                            <div class="mt-2.5">
                                <select id="alergiasAlimentarias" name="alergiasAlimentarias"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="Seleccionar opcion"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->alergias == 'Seleccionar opcion' ? 'selected' : '' }}>
                                        Seleccionar opción</option>
                                    <option value="Mariscos"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->alergias == 'Mariscos' ? 'selected' : '' }}>
                                        Mariscos</option>
                                    <option value="Pescados"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->alergias == 'Pescados' ? 'selected' : '' }}>
                                        Pescados</option>
                                    <option value="Verduras"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->alergias == 'Verduras' ? 'selected' : '' }}>
                                        Verduras</option>
                                    <option value="Citricos"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->alergias == 'Citricos' ? 'selected' : '' }}>
                                        Citricos</option>
                                    <option value="Otro"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->alergias == 'Otro' ? 'selected' : '' }}>
                                        Otro</option>
                                </select>
                            </div>
                        </div>
                        <div class=" col-span-2">
                            <label for="edalergiasAlimentarias"
                                class="block text-sm font-semibold leading-6 text-gray-900">Especificar
                                Detalles</label>
                            <div class="mt-2.5">
                                <input type="text" name="edalergiasAlimentarias" id="edalergiasAlimentarias"
                                    disabled placeholder="Ejemplo: Dificutad para respirar por ingesta de mariscos."
                                    value="{{ isset($nutritionalSheet) ? $nutritionalSheet->detalles_alergias : '' }}"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 bg-white
                                    text-black shadow-sm ring-1 ring-inset ring-gray-300
                                     placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                      focus:ring-red-rv sm:text-sm sm:leading-6 disabled:bg-slate-300">
                            </div>
                        </div>
                    </div>

                    <hr>
                    <!--- TERCERA PREGUNTA --->

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label for="noConsume" class="block text-sm font-semibold leading-6 text-gray-900">¿ Que
                                tipos de Alimentos no consumes ?</label>
                            <div class="mt-2.5">
                                <select id="noConsume" name="noConsume"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="Seleccionar opcion"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->no_consume == 'Seleccionar opcion' ? 'selected' : '' }}>
                                        Seleccionar opción</option>
                                    <option value="Leche"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->no_consume == 'Leche' ? 'selected' : '' }}>
                                        Leche</option>
                                    <option value="Mariscos"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->no_consume == 'Mariscos' ? 'selected' : '' }}>
                                        Mariscos</option>
                                    <option value="Huevo"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->no_consume == 'Huevo' ? 'selected' : '' }}>
                                        Huevo</option>
                                    <option value="Queso"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->no_consume == 'Queso' ? 'selected' : '' }}>
                                        Queso</option>
                                    <option value="Otro"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->no_consume == 'Otro' ? 'selected' : '' }}>
                                        Otro</option>
                                </select>
                            </div>
                        </div>
                        <div class=" col-span-2">
                            <label for="ednoConsume"
                                class="block text-sm font-semibold leading-6 text-gray-900">Especificar
                                Detalles</label>
                            <div class="mt-2.5">
                                <input type="text" name="ednoConsume" id="ednoConsume" disabled
                                    placeholder="Ejemplos: Gluten" autocomplete="family-name"
                                    value="{{ isset($nutritionalSheet) ? $nutritionalSheet->detalles_consume : '' }}"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 bg-white
                                    text-black shadow-sm ring-1 ring-inset ring-gray-300
                                     placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                      focus:ring-red-rv sm:text-sm sm:leading-6 disabled:bg-slate-300">
                            </div>
                        </div>
                    </div>

                    <hr>

                    <!--- CUARTA PREGUNTA --->

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label for="habitosAlimentarios"
                                class="block text-sm font-semibold leading-6 text-gray-900">Habitos
                                Alimentarios</label>
                            <div class="mt-2.5">
                                <select id="habitosAlimentarios" name="habitosAlimentarios"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="Seleccionar opcion"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->habitos == 'Seleccionar opcion' ? 'selected' : '' }}>
                                        Seleccionar opción</option>
                                    <option value="Comer 1 solo plato"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->habitos == 'Comer 1 solo plato' ? 'selected' : '' }}>
                                        Comer 1 solo plato</option>
                                    <option value="Comer solo postre"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->habitos == 'Comer solo postre' ? 'selected' : '' }}>
                                        Comer solo postre</option>
                                    <option value="Comer despacio"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->habitos == 'Comer despacio' ? 'selected' : '' }}>
                                        Comer despacio</option>
                                    <option value="Otro"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->habitos == 'Otro' ? 'selected' : '' }}>
                                        Otro</option>
                                </select>
                            </div>
                        </div>
                        <div class=" col-span-2">
                            <label for="edhabitosAlimentarios"
                                class="block text-sm font-semibold leading-6 text-gray-900">Especificar
                                Detalles</label>
                            <div class="mt-2.5">
                                <input type="text" name="edhabitosAlimentarios" id="edhabitosAlimentarios"
                                    disabled placeholder="Ejemplo: Come 3 veces al dia." autocomplete="family-name"
                                    value="{{ isset($nutritionalSheet) ? $nutritionalSheet->detalles_habitos : '' }}"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 bg-white
                                    text-black shadow-sm ring-1 ring-inset ring-gray-300
                                     placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                      focus:ring-red-rv sm:text-sm sm:leading-6 disabled:bg-slate-300">
                            </div>
                        </div>
                    </div>

                    <hr>

                    <!--- QUINTA PREGUNTA --->

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label for="preferenciaComida"
                                class="block text-sm font-semibold leading-6 text-gray-900">Preferencias de
                                Comidas</label>
                            <div class="mt-2.5">
                                <select id="preferenciaComida" name="preferenciaComida"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="Seleccionar opcion"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->pref_comida == 'Seleccionar opcion' ? 'selected' : '' }}>
                                        Seleccionar opción</option>
                                    <option value="Marina"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->pref_comida == 'Marina' ? 'selected' : '' }}>
                                        Marina</option>
                                    <option value="Criollo"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->pref_comida == 'Criollo' ? 'selected' : '' }}>
                                        Criollo</option>
                                    <option value="Mediterraneo"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->pref_comida == 'Mediterraneo' ? 'selected' : '' }}>
                                        Mediterraneo</option>
                                    <option value="Frituras"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->pref_comida == 'Frituras' ? 'selected' : '' }}>
                                        Frituras</option>
                                    <option value="Otro"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->pref_comida == 'Otro' ? 'selected' : '' }}>
                                        Otro</option>
                                </select>
                            </div>
                        </div>
                        <div class=" col-span-2">
                            <label for="edpreferenciaComida"
                                class="block text-sm font-semibold leading-6 text-gray-900">Especificar
                                Detalles</label>
                            <div class="mt-2.5">
                                <input type="text" name="edpreferenciaComida" id="edpreferenciaComida" disabled
                                    placeholder="Ejemplo: Frituras" autocomplete="family-name"
                                    value="{{ isset($nutritionalSheet) ? $nutritionalSheet->detalles_pref_comida : '' }}"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 bg-white
                                    text-black shadow-sm ring-1 ring-inset ring-gray-300
                                     placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                      focus:ring-red-rv sm:text-sm sm:leading-6 disabled:bg-slate-300">
                            </div>
                        </div>
                    </div>

                    <hr>

                    <!--- SEXTA PREGUNTA --->

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label for="siguesDieta"
                                class="block text-sm font-semibold leading-6 text-gray-900">¿Sigues algun tipo de
                                Dieta?</label>
                            <div class="mt-2.5">
                                <select id="siguesDieta" name="siguesDieta"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="Seleccionar opcion"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->tipo_dieta == 'Seleccionar opcion' ? 'selected' : '' }}>
                                        Seleccionar opción</option>
                                    <option value="No"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->tipo_dieta == 'No' ? 'selected' : '' }}>
                                        No</option>
                                    <option value="Si"
                                        {{ isset($nutritionalSheet) && $nutritionalSheet->tipo_dieta == 'Si' ? 'selected' : '' }}>
                                        Si</option>
                                </select>
                            </div>
                        </div>
                        <div class=" col-span-2">
                            <label for="edsiguesDieta"
                                class="block text-sm font-semibold leading-6 text-gray-900">Especificar
                                Detalles</label>
                            <div class="mt-2.5">
                                <input type="text" name="edsiguesDieta" id="edsiguesDieta" disabled
                                    placeholder="Ejemplo: Como ensaladas" autocomplete="family-name"
                                    value="{{ isset($nutritionalSheet) ? $nutritionalSheet->detalles_dieta : '' }}"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 bg-white
                                    text-black shadow-sm ring-1 ring-inset ring-gray-300
                                     placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                      focus:ring-red-rv sm:text-sm sm:leading-6 disabled:bg-slate-300">
                            </div>
                        </div>
                    </div>

                </div>

                <!-- BOTONES GUARDAR -->
                <div class="flex  flex-row justify-between pb-8">
                    <div>
                        <a href="{{ route('mi-perfil') }}"
                            class="flex flex-row items-center gap-4 border-2 border-gray-400 rounded-full w-48 py-5 justify-center">
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
        document.addEventListener('DOMContentLoaded', function() {
            const tiposAlimentacion = document.getElementById('tiposAlimentacion');
            const edtiposAlimentacion = document.getElementById('edtiposAlimentacion');
            const alergiasAlimentarias = document.getElementById('alergiasAlimentarias');
            const edalergiasAlimentarias = document.getElementById('edalergiasAlimentarias');
            const noConsume = document.getElementById('noConsume');
            const ednoConsume = document.getElementById('ednoConsume');
            const habitosAlimentarios = document.getElementById('habitosAlimentarios');
            const edhabitosAlimentarios = document.getElementById('edhabitosAlimentarios');
            const preferenciaComida = document.getElementById('preferenciaComida');
            const edpreferenciaComida = document.getElementById('edpreferenciaComida');
            const siguesDieta = document.getElementById('siguesDieta');
            const edsiguesDieta = document.getElementById('edsiguesDieta');

            function toggleInput1() {
                edtiposAlimentacion.disabled = tiposAlimentacion.value !== 'Otro';
            }

            function toggleInput2() {
                edalergiasAlimentarias.disabled = alergiasAlimentarias.value !== 'Otro';
            }

            function toggleInput3() {
                ednoConsume.disabled = noConsume.value !== 'Otro';
            }

            function toggleInput4() {
                edhabitosAlimentarios.disabled = habitosAlimentarios.value !== 'Otro';
            }

            function toggleInput5() {
                edpreferenciaComida.disabled = preferenciaComida.value !== 'Otro';
            }

            function toggleInput6() {
                edsiguesDieta.disabled = siguesDieta.value !== 'Si';
            }

            // Inicializar campos al cargar la página
            toggleInput1();
            toggleInput2();
            toggleInput3();
            toggleInput4();
            toggleInput5();
            toggleInput6();

            // Evento cuando cambia la opción seleccionada del select
            tiposAlimentacion.addEventListener('change', toggleInput1);
            alergiasAlimentarias.addEventListener('change', toggleInput2);
            noConsume.addEventListener('change', toggleInput3);
            habitosAlimentarios.addEventListener('change', toggleInput4);
            preferenciaComida.addEventListener('change', toggleInput5);
            siguesDieta.addEventListener('change', toggleInput6);
        });
    </script>

</x-approxana-layout>
