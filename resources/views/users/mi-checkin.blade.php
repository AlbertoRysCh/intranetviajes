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
                    <p>Inicio</p>
                </a>
            </div>
        </div>
    </div>

    <div class="mt-6 text-center sm:text-left">
        <div class="max-w-7xl mx-auto mt-10 mb-8 sm:px-6 lg:px-8">
            <div class="text-center gap-6 mb-8">
                <h3 class=" font-normal text-5xl">Registro de Maleta</h3>
            </div>
            <div class=" text-center px-72">
                <p>En esta sección, puedes agregar tu equipaje para el viaje<br>
                    y ver el quipaje que has agregado</p>
            </div>
        </div>
    </div>


    <div class="mt-6 text-center  pb-6">
        <div class="max-w-7xl mx-auto my-4  flex flex-row">
            <div class=" basis-1/2 px-8">
                <div class="flex flex-row justify-between items-center pb-6">
                    <p class="font-bold text-xl">Agregar Equipaje</p>
                    <a href="#" class="flex flex-row gap-2 border-2
                     rounded-full py-2 px-6">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4">
                            <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336l24 0 0-64-24 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l48
                             0c13.3 0 24 10.7 24 24l0 88 8 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-80 0c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32
                              32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                        </svg>
                        <p>Ver Normativas de Equipaje</p>
                    </a>
                </div>
                <form action="{{ route('mi-checkin.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="border p-6 rounded-3xl border-black grid grid-cols-2 gap-2 bg-white">
                        <div class="col-span-2">
                            <label for="maletatype" class="block text-sm font-semibold leading-6 text-gray-900">
                                Selecciona tu tipo de maleta
                            </label>
                            <select id="maletatype" name="maletatype"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                                placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                                <option selected disabled>Seleccionar</option>
                                @foreach($allTypes as $type)
                                <option value="{{ $type }}" @if(in_array($type, $registeredTypes)) disabled @endif>{{ $type }}</option>
                            @endforeach
                            </select>
                        </div>
                        <p class="py-2 text-gray-400 font-semibold col-span-2 text-left">Detalles</p>
                        <div>
                            <label for="etiquetamaleta" class="block text-sm font-semibold leading-6 text-gray-900">
                                N° de Etiqueta
                            </label>
                            <div class="mt-2.5">
                                <input type="text" name="etiquetamaleta" id="etiquetamaleta" autocomplete="given-name"
                                    value=""
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset
                                    ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="colormaleta" class="block text-sm font-semibold leading-6 text-gray-900">
                                Color
                            </label>
                            <div class="mt-2.5">
                                <input type="text" name="colormaleta" id="colormaleta" autocomplete="given-name"
                                    value=""
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset
                                    ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class=" col-span-2">
                            <label for="caracteristicamaleta" class="block text-sm font-semibold leading-6 text-gray-900">
                                Características distintivos
                            </label>
                            <div class="mt-2.5">
                                <input type="text" name="caracteristicamaleta" id="caracteristicamaleta"
                                    autocomplete="given-name" value=""
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset
                                    ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="pesomaleta" class="block text-sm font-semibold leading-6 text-gray-900">
                                Peso (Kg.)
                            </label>
                            <div class="mt-2.5">
                                <input type="text" name="pesomaleta" id="pesomaleta" autocomplete="given-name"
                                    value=""
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset
                                    ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="fotomaleta" class="block text-sm font-semibold leading-6 text-gray-900">
                                Foto de Maleta
                            </label>
                            <div class="mt-2.5">
                                <input type="file" name="fotomaleta[]" id="fotomaleta" multiple
                                    value=""
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset
                                    ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="lugarmaleta" class="block text-sm font-semibold leading-6 text-gray-900">
                                Lugar de Registro
                            </label>
                            <div class="mt-2.5">
                                <input type="text" name="lugarmaleta" id="lugarmaleta" autocomplete="given-name"
                                    value=""
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset
                                    ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <p class="col-span-2 text-center font-normal text-gray-500 text-sm px-24 py-2">
                            La fecha y hora se registrarán automáticamente el guardar el equipaje.
                        </p>
                        <div class="col-span-2 flex justify-center">
                            <button type="submit"
                                class="block  rounded-full bg-red-rv px-20 py-3
                            text-center text-sm font-semibold text-white shadow-sm 
                            hover:bg-red-rv focus-visible:outline 
                            focus-visible:outline-2 focus-visible:outline-offset-2
                            focus-visible:outline--red-rv ">
                                GUARDAR EQUIPAJE
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class=" basis-1/2 px-8">
                <div class="flex flex-row justify-between items-center pb-6">
                    <p class="font-bold text-xl pb-4">Equipaje Agregado</p>
                </div>

                <div class=" grid grid-cols-1">
                    <div id="accordion-collapse" data-accordion="collapse">
                        @foreach ($checkin as $index => $check)
                        <h2 id="accordion-collapse-heading-{{ $index }}">
                            <button type="button"
                                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                data-accordion-target="#accordion-collapse-body-{{ $index }}" 
                                aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" {{ $index }}>
                                <span>{{ $check->tip_maleta }}</span>
                                <svg data-accordion-icon class="w-3 h-3 {{ $index === 0 ? '' : 'rotate-180' }} shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-body-{{ $index }}" 
                            class="{{ $index === 0 ? '' : 'hidden' }}" {{ $index }}>
                            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                <p><strong>Tipo de Maleta:</strong> {{ $check->tip_maleta }}</p>
                                <p><strong>N° de Etiqueta:</strong> {{ $check->num_etiqueta }}</p>
                                <p><strong>Color:</strong> {{ $check->color }}</p>
                                <p><strong>Características:</strong> {{ $check->caracteristicas }}</p>
                                <p><strong>Peso:</strong> {{ $check->peso }} Kg</p>
                                <p><strong>Lugar de Registro:</strong> {{ $check->lugar_regis }}</p>
                                <p><strong>Fotos de Maleta:</strong></p>
                                @if ($check->images)
                                @php
                                    $imageNames = json_decode($check->images, true); // Decodificar como array
                                @endphp
                                    @if (is_array($imageNames))
                                        @foreach ($imageNames as $imageName)
                                            <img src="{{ asset('images/checkins/' . $imageName) }}" alt="Foto de Maleta" class="max-w-xs mb-2"/>
                                        @endforeach
                                    @else
                                        <p>No hay fotos disponibles.</p>
                                    @endif
                                @else
                                    <p>No hay fotos disponibles.</p>
                                @endif
                                <p><strong>Fecha y hora de ultima actualizacion xd:</strong> {{ $check->updated_at }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>

</x-approxana-layout>
