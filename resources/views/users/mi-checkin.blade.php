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
            <div class=" text-center px-72 max-sm:px-12">
                <p>Ingresa los detalles de tus maletas para facilitar su gestión y evitar<br>
                 pérdidas. Esta información se reflejará en tu identificador de maleta</p>
            </div>
        </div>
    </div>


    <div class="mt-6 text-center  pb-6">
        <div class="max-w-7xl mx-auto my-4  flex flex-row max-sm:flex-col">
            <div class=" basis-1/2 px-8">
                <div class="flex flex-row justify-between items-center pb-6 max-sm:flex-col">
                    <p class="font-bold text-xl">Añadir Equipaje</p>
                    <a href="/pdfs/normativas-equipaje.pdf" target="_blank" class="flex flex-row gap-2 border-2
                     rounded-full py-2 px-6">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4">
                            <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336l24 0 0-64-24 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l48
                             0c13.3 0 24 10.7 24 24l0 88 8 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-80 0c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32
                              32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                        </svg>
                        <p>Consulta Normativas de Equipaje</p>
                    </a>
                </div>
                <form  action="{{ route('mi-checkin.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="border p-6 rounded-3xl border-black grid grid-cols-2 gap-2 bg-white">
                        <div class="col-span-2">
                            <label for="maletatype" class="block text-sm font-semibold leading-6 text-gray-900 text-left">
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
                        <div class="max-sm:col-span-2">
                            <label for="colormaleta" class="block text-sm font-semibold leading-6 text-gray-900 text-left">
                                Color
                            </label>
                            <div class="mt-2.5">
                                <input type="text"
                                    name="colormaleta"
                                    id="colormaleta"
                                    value=""
                                    placeholder="Ingresa el color de tu maleta" 
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset
                                    ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="max-sm:col-span-2">
                            <label for="pesomaleta" class="block text-sm font-semibold leading-6 text-gray-900 text-left">
                                Peso (Kg.)
                            </label>
                            <div class="mt-2.5">
                                <input type="number" name="pesomaleta" id="pesomaleta" autocomplete="given-name"
                                    value=""
                                    placeholder="Ingresa el peso en numero" 
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset
                                    ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="caracteristicamaleta" class="block text-sm font-semibold leading-6 text-gray-900 text-left">
                                Características
                            </label>
                            <div class="mt-2.5">
                                <input type="text" 
                                    name="caracteristicamaleta" 
                                    id="caracteristicamaleta" 
                                    value=""
                                    placeholder="Indica marca o otro distintivo" 
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset
                                    ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        
                        <div class="col-span-2">
                            <label for="fotomaleta" class="block text-sm font-semibold leading-6 text-gray-900 text-left">
                                Foto Lateral de la Maleta
                            </label>
                            <div class="mt-2.5">
                                <input type="file" name="fotomaleta[]" id="fotomaleta" accept="image/*"
                                    value=""
                                    class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset
                                    ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="col-span-2">
                            <label for="fotomaleta1" class="block text-sm font-semibold leading-6 text-gray-900 text-left">
                                Foto Frontal de la Maleta
                            </label>
                            <div class="mt-2.5">
                                <input type="file" name="fotomaleta1[]" id="fotomaleta1" accept="image/*"
                                    value=""
                                    class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset
                                    ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="col-span-2">
                            <label for="fotomaleta2" class="block text-sm font-semibold leading-6 text-gray-900 text-left">
                                Foto Posterior de la Maleta
                            </label>
                            <div class="mt-2.5">
                                <input type="file" name="fotomaleta2[]" id="fotomaleta2" accept="image/*"
                                    value=""
                                    class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset
                                    ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <!--<div class="col-span-2">
                            <label for="lugarmaleta" class="block text-sm font-semibold leading-6 text-gray-900 text-left">
                                Lugar de Registro
                            </label>
                            <div class="mt-2.5">
                                <input type="text" name="lugarmaleta" id="lugarmaleta" 
                                    value=""
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset
                                    ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                            </div>
                        </div>-->
                        <p class="col-span-2 text-center font-normal text-gray-500 text-sm px-24 py-2 max-sm:px-2">
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
                    @if (session('success'))
                        <div class="max-w-7xl mx-auto mt-6" id="success-alert">
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                <strong class="font-bold">{{ session('success') }}</strong>
                                <span class="block sm:inline">Tu equipaje se ha guardado correctamente.</span>
                            </div>
                        </div>
                    @endif
                </form>
            </div>

            <div class=" basis-1/2 px-8">
                <div class="flex flex-row justify-between items-center pb-6 max-sm:pt-6">
                    <p class="font-bold text-xl pb-4">Equipaje Agregado</p>
                </div>

                <div class=" grid grid-cols-1">
                    <div id="accordion-collapse" data-accordion="collapse">
                        @foreach ($checkin as $index => $check)
                        <h2 id="accordion-collapse-heading-{{ $index }}">
                            <button type="button"
                                class="flex items-center justify-between w-full p-5 font-medium bg-red-700
                                 text-white border border-gray-200 rounded-t-xl gap-3"
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
                            class="{{ $index === 0 ? '' : 'hidden' }} bg-white p-4 border border-gray-200" {{ $index }}>
                            <div class="p-5">
                                <p class="text-left text-gray-500 font-bold pb-4">Detalles</p>
                                <div class="flex flex-row pb-4">
                                    <div class="flex flex-col text-left basis-1/2">
                                        <p class="font-normal">Tipo de Maleta:</p>
                                        <p class=" font-bold"> {{ $check->tip_maleta }}</p>
                                    </div>
                                    <div class="flex flex-col text-left basis-1/2">
                                        <p class=" font-normal">Color:</p>
                                        <p class=" font-bold">{{ $check->color }}</p>
                                    </div>
                                </div>
                                <div class="flex flex-row pb-4">
                                    <div class="flex flex-col text-left">
                                        <p class=" font-normal">Características:</p>
                                        <p class=" font-bold">{{ $check->caracteristicas }}</p>
                                    </div>
                                </div>
                                <div class="flex flex-row pb-4">
                                    <div class="flex flex-col text-left basis-1/2">
                                        <p class=" font-normal">Peso:</p>
                                        <p class=" font-bold">{{ $check->peso }} Kg</p>
                                    </div>
                                </div>
                                <div class="flex flex-col pb-4">
                                    <p class=" font-normal text-left">Fotos de Maleta:</p>
                                    <div class="flex flex-row gap-4">
                                    @if ($check->images)
                                        @php
                                            $imageNames = json_decode($check->images, true); // Decodificar como array
                                        @endphp
                                            @if (is_array($imageNames))
                                                @foreach ($imageNames as $imageName) 
                                            
                                                    <div class="basis-1/2 border-2 border-gray-700">
                                                        <img src="{{ asset('images/checkins/' . $imageName) }}" alt="Foto de Maleta"
                                                            class="max-w-xs w-full mb-2 " />
                                                    </div>
                                                @endforeach
                                            @else
                                                <p>No hay fotos disponibles.</p>
                                            @endif
                                        @else
                                        <p>No hay fotos disponibles.</p>
                                    @endif
                                    </div>
                                </div>

                                <div class="flex flex-col pb-4">
                                    <p class="font-normal text-left">Fotos de Maleta Frontal:</p>
                                    <div class="flex flex-row gap-4">
                                        @if ($check->images1)
                                            @php
                                                $imageNames1 = json_decode($check->images1, true); // Decodificar como array
                                            @endphp
                                            @if (is_array($imageNames1))
                                                @foreach ($imageNames1 as $imageName1)
                                                <div class="basis-1/2 border-2 border-gray-700">
                                                    <img src="{{ asset('images/checkins/' . $imageName1) }}" alt="Foto de Maleta Frontal"
                                                         class="max-w-xs w-full mb-2" />
                                                </div>
                                                @endforeach
                                            @else
                                                <p>No hay fotos disponibles.</p>
                                            @endif
                                        @else
                                            <p>No hay fotos disponibles.</p>
                                        @endif
                                    </div>
                                </div>


                                <div class="flex flex-col pb-4">
                                    <p class="font-normal text-left">Fotos de Maleta Superior:</p>
                                    <div class="flex flex-row gap-4">
                                        @if ($check->images2)
                                            @php
                                                $imageNames2 = json_decode($check->images2, true); // Decodificar como array
                                            @endphp
                                            @if (is_array($imageNames2))
                                                @foreach ($imageNames2 as $imageName2)
                                                <div class="basis-1/2 border-2 border-gray-700">
                                                    <img src="{{ asset('images/checkins/' . $imageName2) }}" alt="Foto de Maleta Superior"
                                                         class="max-w-xs w-full mb-2" />
                                                </div>
                                                @endforeach
                                            @else
                                                <p>No hay fotos disponibles.</p>
                                            @endif
                                        @else
                                            <p>No hay fotos disponibles.</p>
                                        @endif
                                    </div>
                                </div>

                                <div  class="flex flex-col pb-4 text-left">
                                    <p class=" font-normal">Fecha y hora de ultima actualizacion:</p>
                                    <p class="font-bold">{{ $check->updated_at->subHours(5) }}</p>
                                </div>
                                <form id="delete-form-{{ $check->id }}" action="{{ route('mi-checkin.destroy', $check->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="mt-4 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-700" 
                                        onclick="confirmDelete('{{ $check->id }}')">
                                        Eliminar Equipaje
                                    </button>
                                </form>                                
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <script>
        // Espera 5 segundos antes de ocultar la alerta
        setTimeout(function() {
            var alert = document.getElementById('success-alert');
            if (alert) {
                alert.style.display = 'none'; // Ocultar la alerta
            }
        }, 5000); // 5000 ms = 5 segundos

        function confirmDelete(checkId) {
        Swal.fire({
            title: "¿Estás seguro?",
            text: "¡No podrás revertir esta acción!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, eliminarlo",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                // Mostrar alerta de éxito y enviar el formulario
                Swal.fire({
                    title: "¡Eliminado!",
                    text: "El equipaje ha sido eliminado correctamente.",
                    icon: "success",
                }).then(() => {
                    // Enviar el formulario una vez que el usuario confirme la eliminación
                    document.getElementById('delete-form-' + checkId).submit();
                });
            }
        });
    }
    </script>
</x-approxana-layout>
