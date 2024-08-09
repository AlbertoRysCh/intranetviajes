<x-approxana-layout>
    <div class="mt-6 text-center sm:text-left">
        <div class="max-w-7xl mx-auto my-4 sm:px-6 lg:px-8 flex flex-row justify-between">
            <div>
                <a href="{{ route('dashboard') }}"
                    class="flex flex-row items-center gap-4 border-2 border-gray-400 rounded-full w-48 py-2 justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                    </svg>
                    <p>Ir a Inicio</p>
                </a>
            </div>
        </div>
    </div>


    <div class="mt-6 text-center sm:text-left">
        <div class="max-w-7xl mx-auto mt-10 mb-8 sm:px-6 lg:px-8">
            <div class="text-center gap-6 mb-8">
                <h3 class=" font-normal text-5xl">Mis Viajes</h3>
            </div>
            <div class=" text-center px-64">
                <p>En este área puedes descargar todos los documentos para tu próximo viaje.
                     Además, asegúrate de actualizar tu agenda con los consejos prácticos
                      que hemos preparado para ti. <span class="text-red-rv">¡Explora y prepárate para una experiencia
                       de viaje inolvidable!</span></p>
            </div>
        </div>
    </div>

    <div class="mt-6 text-center sm:text-left">
        <div class="max-w-7xl mx-auto mt-6 sm:px-6 lg:px-8 flex flex-row justify-between">
            <div>
                <h3 class="">2024</h3>
            </div>
            <div>
                <p>Filtrar</p>
            </div>
        </div>
    </div>

    <div class="mt-6 text-center sm:text-left">
        <div class="max-w-7xl mx-auto mt-6 sm:px-6 lg:px-8">
            <div class="grid grid-cols-3 gap-x-14">
                <div class="bg-white rounded-lg overflow-hidden">
                    <div class="py-4 pl-4">
                        <h3 class=" font-bold text-2xl">Cancún</h3>
                        <p class=" font-normal text-base">23 de Setiembre</p>
                    </div>
                    <img src="/images/cancun-viaje.jpg" alt="#">
                </div>
                <div class="bg-white rounded-lg overflow-hidden">
                    <div class="py-4 pl-4">
                        <h3 class=" font-bold text-2xl">Ica</h3>
                        <p class=" font-normal text-base">09 de Julio</p>
                    </div>
                    <img src="/images/cancun-viaje.jpg" alt="#">
                </div>
                <div class="bg-white rounded-lg overflow-hidden">
                    <div class="py-4 pl-4">
                        <h3 class=" font-bold text-2xl">Tarapoto</h3>
                        <p class=" font-normal text-base">30 de Junio</p>
                    </div>
                    <img src="/images/cancun-viaje.jpg" alt="#">
                </div>
            </div>
        </div>
    </div>

    <script>
    </script>

</x-approxana-layout>
