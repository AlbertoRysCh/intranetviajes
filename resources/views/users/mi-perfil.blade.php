<x-approxana-layout>
    <div class="mt-6 text-center sm:text-left">
        <div class="max-w-7xl mx-auto my-4 sm:px-6 lg:px-8">
            <a href="{{ route('dashboard') }}"
                class="flex flex-row items-center gap-4 border-2 border-gray-400 rounded-full w-48 py-2 justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                </svg>
                <p>Ir Inicio</p>
            </a>
        </div>
    </div>


    <div class="mt-6 text-center sm:text-left">
        <div class="max-w-7xl mx-auto my-20 sm:px-6 lg:px-8">
            <div class="flex flex-col text-center gap-6 px-40">
                <h3 class=" font-normal text-5xl">Mi perfil</h3>
                <p>Mantener esta información actualizada es clave para garantizar una<br>
                      experiencia de viaje segura y adaptada a tus necesidades.</p>
            </div>
        </div>
    </div>

    <div class="mb-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-3">
                <div>
                    <a href="{{ route('users.mis-datos') }}"
                        class=" w-11/12 border-2 border-gray-500 px-3.5 py-2 rounded-xl
                     bg-white flex flex-col justify-center items-center hover:shadow-xl">
                        <p class="font-bold text-3xl pt-10 pb-2">Mis Datos</p>
                        <p class="text-center px-8 bg-green-400 border border-green-400 rounded-md">95% completado</p>
                        <img src="/images/data.png" alt="#" class="py-6">
                        <hr class="my-3 w-full border border-gray-300">
                        <div class="flex flex-row items-center pb-2 gap-4">
                            <p class="text-2xl">
                                Ver / editar                                
                            </p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                              </svg>
                                                         
                        </div>   
                    </a>
                </div>
                <div>
                    <a href="{{ route('ficha-medica.show') }}"
                        class=" w-11/12 border-2 border-gray-500 px-3.5 py-2 rounded-xl
                     bg-white flex flex-col justify-center items-center hover:shadow-xl">
                        <p class="font-bold text-3xl pt-10 pb-2">Ficha Médica</p>
                        <p class="text-center px-8 bg-green-400 border border-green-400 rounded-md">95% completado</p>
                        <img src="/images/nurse.png" alt="#" class="py-6">
                        <hr class="my-3 w-full border border-gray-300">
                        <div class="flex flex-row items-center pb-2 gap-4">
                            <p class="text-2xl">
                                Ver / editar                                
                            </p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                              </svg>
                                                         
                        </div>   
                    </a>
                </div>
                <div>
                    <a href="{{ route('nutritional-sheet.show') }}"
                        class=" w-11/12 border-2 border-gray-500 px-3.5 py-2 rounded-xl
                     bg-white flex flex-col justify-center items-center hover:shadow-xl">
                        <p class="font-bold text-3xl pt-10 pb-2">Ficha Nutricional</p>
                        <p class="text-center px-8 bg-green-400">95% completado</p>
                        <img src="/images/health.png" alt="#" class="py-6">
                        <hr class="my-3 w-full border border-gray-300">
                        <div class="flex flex-row items-center pb-2 gap-4">
                            <p class="text-2xl">
                                Ver / editar                                
                            </p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                              </svg>
                                                         
                        </div>   
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-approxana-layout>