<x-approxana-layout>
    <div class="mt-10 text-center sm:text-left">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-3">
                <div class="flex justify-center">
                    <img src="/images/rox-left.png" alt="" class="pb-0 w-60">
                </div>
                <div class="text-black col-span-2 flex flex-col justify-center">
                    <p class="font-bold text-4xl">
                        ¡Hola {{ explode(' ', Auth::user()->name)[0] }}
                        {{ explode(' ', Auth::user()->apellidos)[0] }}!
                    </p>
                    <p class="mt-4 text-white-rv-400 text-base font-normal">
                        Aquí podras acceder a toda información de tus viajes y datos
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-3">
                <div>
                    <a href="{{ route('mi-perfil') }}"
                    class=" w-11/12 border-2 border-gray-400 px-3.5 py-2 rounded-xl
                     bg-white flex flex-col justify-center items-center hover:shadow-xl">
                        <p class="font-bold text-3xl py-10">Mi Perfil</p>
                        <p class="text-center px-8">En esta sección encontraras tus datos, ficha médica y ficha nutricional.</p>
                        <img src="/images/perfil_vr.png" alt="#" class="py-8">
                        <hr class="my-3 w-full border border-gray-300">
                        <div class="flex flex-row items-center pb-2 gap-4">
                            <p class="text-2xl">
                                Entrar                                
                            </p>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                  </svg>
                            </div>                           
                        </div>                        
                    </a>
                </div>
                <div>
                    <a href="{{ route('viajes') }}"
                    class=" w-11/12 border-2 border-gray-400 px-3.5 py-2 rounded-xl
                     bg-white flex flex-col justify-center items-center hover:shadow-xl">
                        <p class="font-bold text-3xl py-10">Mis Viajes</p>
                        <p class="text-center px-8">Aquí encontraras tus viajes con el itinerario, fotos/videos 
                            documentos y 'check-in'.</p>
                        <img src="/images/miviaje_vr.png" alt="#" class="py-8">
                        <hr class="my-3 w-full border border-gray-300">
                        <div class="flex flex-row items-center pb-2 gap-4">
                            <p class="text-2xl">
                                Entrar                                
                            </p>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                  </svg>
                            </div>                           
                        </div>                        
                    </a>
                </div>
                <div>
                    <a href="{{ route('nutritional-sheet.show') }}"
                    class=" w-11/12 border-2 border-gray-400 px-3.5 py-2 rounded-xl
                     bg-white flex flex-col justify-center items-center hover:shadow-xl cursor-pointer">
                        <p class="font-bold text-3xl py-10">Mis Pagos</p>
                        <p class="text-center px-8">En esta sección encontraras cronograma, estado de cuenta y registro de pagos.
                        </p>
                        <img src="/images/mipago_vr.png" alt="#" class="py-8">
                        <hr class="my-3 w-full border border-gray-300">
                        <div class="flex flex-row items-center pb-2 gap-4">
                            <p class="text-2xl">
                                Entrar                                
                            </p>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                  </svg>
                            </div>                           
                        </div>                        
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div x-data="{ modalOpen: true }" x-show="modalOpen && !localStorage.getItem('modalAccepted')"
        @click.away="modalOpen = false" class="fixed z-10 inset-0 overflow-y-auto" style="display: none;" x-cloak>
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <!-- Modal panel -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div
                    class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a>
                        <h5 class="mb-2 text-2xl font-bold text-center tracking-tight text-gray-900 dark:text-white">
                            Términos y Condiciones</h5>
                    </a>
                    <p class="mb-4 px-4 font-normal text-gray-700 text-center dark:text-gray-400">Al ingresar al
                        sistema, Usted acepta los términos y condiciones:<br>
                        <a href="/pdfs/terminos-condiciones-generales.pdf" target="_blank"
                            class="text-red-rv text-left">1.Términos y condiciones generales.</a><br>
                        <a href="/pdfs/terminos-condiciones-intranet.pdf" target="_blank"
                            class="text-red-rv text-left">2.Términos y condiciones del intranet.
                        </a>
                    </p>
                    <div class="flex items-center mb-4 justify-center">
                        <input id="default-checkbox" type="checkbox" value=""
                            class="w-4 h-4 text-red-rv bg-gray-100 border-red-rv rounded ring-2 ring-red-rv  focus:ring-red-rv dark:focus:ring-red-rv dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox"
                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Estoy de acuerdo con los
                            términos y condiciones.</label>
                    </div>
                    <div class="items-center text-center">
                        <button
                            @click="if (document.getElementById('default-checkbox').checked) { localStorage.setItem('modalAccepted', 'true'); modalOpen = false; }"
                            class="inline-flex items-center h-12 w-60 justify-center px-3 py-2 text-sm font-medium text-white bg-red-rv rounded-lg hover:bg-bdark-rv focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-red-rv dark:focus:ring-blue-800">
                            ACEPTAR
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-approxana-layout>


<script>
    // Asegúrate de tener Alpine.js cargado para controlar el modal
    window.addEventListener('DOMContentLoaded', () => {
        const modal = document.querySelector('.fixed');
        if (!localStorage.getItem('modalAccepted')) {
            modal.style.display = 'block'; // Muestra el modal si no se ha aceptado todavía
        }
    });


    document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.btn');
        const sections = document.querySelectorAll('.section');

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons
                buttons.forEach(btn => btn.classList.remove('active'));
                // Add active class to the clicked button
                button.classList.add('active');

                // Hide all sections
                sections.forEach(section => section.classList.remove('active'));
                // Show the target section
                const target = document.getElementById(button.getAttribute('data-target'));
                target.classList.add('active');
            });
        });
    });
</script>
