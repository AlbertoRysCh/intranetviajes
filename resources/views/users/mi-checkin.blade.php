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
        <form action="{{ route('mi-checkin.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-4 p-6  bg-white border border-gray-200 rounded-lg shadow">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class=" col-span-2">
                        <p class="text-red-rv mb-4 text-2xl font-bold">Documento del Pasajero</p>
                    </div>

                    <div class="max-sm:col-span-2">
                        <label for="documentoci"
                            class="block text-sm font-semibold leading-6 text-gray-900">Documento</label>
                        <div class="mt-2.5">
                            <select id="documentoci" name="documentoci"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                                <option value="Seleccionar opción" {{ isset($checkin) && $checkin->tip_documento == 'Seleccionar opción' ? 'selected' : '' }}>Seleccionar opción</option>
                                <option value="Dni" {{ isset($checkin) && $checkin->tip_documento == 'Dni' ? 'selected' : '' }}>Dni</option>
                                <option value="Carnet de Extranjeria" {{ isset($checkin) && $checkin->tip_documento == 'Carnet de Extranjeria' ? 'selected' : '' }}>Carnet de Extranjeria</option>
                                <option value="Pasaporte" {{ isset($checkin) && $checkin->tip_documento == 'Pasaporte' ? 'selected' : '' }}>Pasaporte</option>
                            </select>
                        </div>
                    </div>

                    <div  class="max-sm:col-span-2">
                        <label for="numero-document-ci"
                            class="block text-sm font-semibold leading-6 text-gray-900">Numero de Documento</label>
                        <div class="mt-2.5">
                            <input type="text" name="numero-document-ci" id="nummero-document-ci"
                                autocomplete="given-name"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6" value="{{ isset($checkin) ? $checkin->num_documento : '' }}">
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
                            <input datepicker id="default-datepicker" name="fecha-emision" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-rv focus:border-red-rv block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-rv dark:focus:border-red-rv"
                                placeholder="Selecciona fecha" value="{{ isset($checkin) && $checkin->fecha_emi ? \Carbon\Carbon::parse($checkin->fecha_emi)->format('d/m/Y') : '' }}">
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
                            <input datepicker id="default-datepicker_1" name="fecha-vencimiento" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-rv focus:border-red-rv block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-rv dark:focus:border-red-rv"
                                placeholder="Selecciona fecha" value="{{ isset($checkin) && $checkin->fecha_venc ? \Carbon\Carbon::parse($checkin->fecha_venc)->format('d/m/Y') : '' }}">
                        </div>
                    </div>

                    <div class="col-span-2">
                        <p class="text-red-rv mb-4 text-2xl font-bold">Sube foto de tu documento</p>
                    </div>
                    
                    <div class="col-span-2">
                        <input type="file" name="image_documento" id="image_documento" accept="image/*" style="display: none;">
                        <div id="image_preview" class="rounded-lg border-2 border-dashed border-black py-8 flex flex-col justify-center items-center" onclick="triggerFileInput()">
                            @if($checkin->image_documento)
                                <img src="{{ asset('images/' . $checkin->image_documento) }}" width="120px" id="preview">
                                <p id="preview_text" style="display: none;">Sube tu archivo o documento</p>
                            @else
                                <img src="/images/identifiacion-vr.png" width="120px" id="preview">
                                <p id="preview_text">Sube tu archivo o documento</p>
                            @endif
                        </div>
                    </div>
                    
                    
                        <div class="col-span-2">
                            <p class="text-red-rv mb-4 text-2xl font-bold">Pass Boarding</p>
                        </div>
                        
                        

                        <div class="col-span-2" id="pass_boarding_section" style="cursor: pointer;">
                            <div class="rounded-lg border-2 border-dashed border-black py-8 flex flex-col justify-center items-center">
                                <img src="{{ $checkin->pass_board ? asset('images/' . $checkin->pass_board) : '/images/pase.png' }}" width="120px" id="pass_boarding_image">
                                <p id="pass_boarding_message">El pass Boarding se habilitara para</p>
                                <p id="pass_boarding_message">ser descargado 24 horas antes del viaje</p>
                                <p class="font-bold text-red-600" id="pass_boarding_warning">SOLO SI LA AEROLINEA LO PERMITE</p>
                            </div>
                            <input type="file" name="pass_boarding_file" id="pass_boarding_file" style="display: none;" accept="image/*">
                        </div>

                    <div  class="max-sm:col-span-2">
                        <div
                            class="rounded-lg border-2 border-dashed border-black py-10 flex flex-col justify-center items-center">
                            <img src="{{ $checkin->equipaje_8kg ? asset('images/' . $checkin->equipaje_8kg) : '/images/maleta-vr.png' }}" width="120px" id="luggage_preview">
                            <p class="pt-4"><b>Equipaje de 8KG</b></p>
                            Dimensiones máximas: 55*24*25cm
                            <input type="file" id="luggage_file" name="luggage_file" accept="image/*" style="display: none;">
                            <label class="py-6 text-blue-600" id="upload_label" style="cursor: pointer;">Subir Foto</label>
                            <p class=" font-bold ">Disponible 2 dias antes del viaje</p>
                        </div>

                        <label for="descrip_equi_8kg"
                            class="block text-sm font-semibold leading-6 text-gray-900 mt-3">Descripción de la maleta de
                            8KG</label>
                        <div class="mt-2.5">
                            <input type="text" name="descrip_equi_8kg" id="descrip_equi_8kg"
                                autocomplete="given-name"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6"
                                value="{{ isset($checkin) ? $checkin->descrip_8kg : '' }}">
                        </div>
                    </div>

                    <div>
                        <div class="rounded-lg border-2 border-dashed border-black py-10 flex flex-col justify-center items-center">
                            <!-- Mostrar la imagen guardada -->
                            <img src="{{ $checkin->equipaje_23kg ? asset('images/' . $checkin->equipaje_23kg) : '/images/maleta-vr.png' }}" width="120px" id="luggage_23kg_preview">
                            <p class="pt-4"><b>Equipaje de 23KG</b></p>
                            Dimensiones máximas: 55*24*25cm
                            <input type="file" id="luggage_23kg_file" name="equipa_23_file" accept="image/*" style="display: none;">
                            <label class="py-6 text-blue-600" id="upload_23kg_label" style="cursor: pointer;">Subir Foto</label>
                            <p class="font-bold">Disponible 2 días antes del viaje</p>
                        </div>

                        <label for="descrip_equi_23kg"
                            class="block text-sm font-semibold leading-6 text-gray-900 mt-3">Descripción de la maleta de
                            23KG</label>
                        <div class="mt-2.5">
                            <input type="text" name="descrip_equi_23kg" id="descrip_equi_23kg"
                                autocomplete="given-name"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6"
                                value="{{ isset($checkin) ? $checkin->descrip_23kg : '' }}">
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

        </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>

    <script>
        // Función para abrir el selector de archivos al hacer clic en la sección de vista previa
        function triggerFileInput() {
            document.getElementById('image_documento').click();
        }
    
        // Función para actualizar la vista previa de la imagen seleccionada
        function uploadImage(event) {
            const input = event.target;
            const preview = document.getElementById('preview');
    
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.style.display = 'none';
            }
        }
    
        // Función para guardar los cambios (subir la imagen)
        function saveChanges() {
            const fileInput = document.getElementById('image_documento');
            const file = fileInput.files[0];
            const formData = new FormData();
    
            if (file) {
                formData.append('image_documento', file);
                formData.append('_token', '{{ csrf_token() }}'); // Agrega el token CSRF si estás usando Laravel
    
                fetch('{{ route('mi-checkin.store') }}', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Success:', data);
                    // Maneja la respuesta del servidor aquí
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            } else {
                alert('Por favor, selecciona una imagen antes de guardar.');
            }
        }
    
        // Asignar funciones a eventos
    
        document.addEventListener('DOMContentLoaded', function () {
            // Asignar la función uploadImage al evento change del campo de entrada de archivo
            document.getElementById('image_documento').addEventListener('change', uploadImage);
    
            // Manejo de la sección de Pass Boarding
            const passBoardingSection = document.getElementById('pass_boarding_section');
            const passBoardingFileInput = document.getElementById('pass_boarding_file');
            const passBoardingImage = document.getElementById('pass_boarding_image');
    
            passBoardingSection.addEventListener('click', function() {
                passBoardingFileInput.click(); // Abre el selector de archivos
            });
    
            passBoardingFileInput.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        passBoardingImage.src = e.target.result; // Actualiza la imagen mostrada
                    }
                    reader.readAsDataURL(file);
                }
            });
        });


    // Funcionalidad para la sección de Equipaje de 8KG
    document.getElementById('upload_label').addEventListener('click', function() {
        document.getElementById('luggage_file').click();
    });

    document.getElementById('luggage_file').addEventListener('change', function(event) {
        const input = event.target;
        const preview = document.getElementById('luggage_preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.style.display = 'none';
        }
    });

    // Funcionalidad para la sección de Equipaje de 23KG
    document.getElementById('upload_23kg_label').addEventListener('click', function() {
        document.getElementById('luggage_23kg_file').click();
    });

    document.getElementById('luggage_23kg_file').addEventListener('change', function(event) {
        const input = event.target;
        const preview = document.getElementById('luggage_23kg_preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.style.display = 'none';
        }
    });



    document.getElementById('image_documento').addEventListener('change', function(event) {
    const [file] = this.files;
    if (file) {
        const preview = document.getElementById('preview');
        const previewText = document.getElementById('preview_text');
        preview.src = URL.createObjectURL(file);
        previewText.style.display = 'none';
    }
});

function triggerFileInput() {
    document.getElementById('image_documento').click();
}

    </script>
    
</x-approxana-layout>