<x-approxana-layout>

    <style>
        .btn {
            padding: 10px 20px;
            margin: 5px;
            cursor: pointer;
        }

        .btn.active {
            background-color: #CC2A41;
            color: white;
        }

        .section {
            display: none;
        }

        .section.active {
            display: block;
        }
    </style>

    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-red-rv dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="p-6 text-white-rv dark:text-gray-100 text-lg pl-16">
                        <div class="text-white-rv text-3xl">
                            {!! __('¡Bienvenido a <i>Viajes Roxana</i>,') !!} <b>{{ Auth::user()->name }}</b>!<br></div>

                        <p class="mt-4 text-white-rv-400 text-base font-normal">
                            {!! __(
                                'En esta página podrás acceder a toda la información de tus viajes y datos. Mantener esta información actualizada es clave para garantizar una experiencia de viaje segura y adaptada a tus necesidades.',
                            ) !!}
                        </p>

                    </div>
                    <div class="p-0 text-white-rv dark:text-gray-100 pr-16 pt-5">
                        <img src="/images/rox.png" alt="" class="pb-0 w-64">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-4">
                <div>
                    <button data-target="miperfilSection"
                        class="w-full rounded-md border-1 border-t-2 border-red-rv bg-white text-black
                         hover:bg-red-rv hover:text-white flex justify-center btn active">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                        </svg>
                        <p class="pl-3">MI PERFIL</p>
                    </button>
                </div>
                <div>
                    <button data-target="miviajeSection"
                        class="w-full rounded-md border-1 px-3.5 py-2 border-t-2 border-red-rv bg-white text-black
                         hover:bg-red-rv hover:text-white flex justify-center btn">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                        </svg>
                        <p class="pl-3">MIS VIAJES</p>
                    </button>
                </div>
                <div>
                    <button data-target="mipagoSection"
                        class="w-full rounded-md border-1 px-3.5 py-2 border-t-2 border-red-rv bg-white text-black
                         hover:bg-red-rv hover:text-white flex justify-center btn">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                        </svg>
                        <p class="pl-3 ">MIS PAGOS</p>
                    </button>
                </div>
                <div>
                    <button data-target="contactoSection"
                        class="w-full rounded-md border-1 px-3.5 py-2 border-t-2 border-red-rv bg-white text-black
                         hover:bg-red-rv hover:text-white flex justify-center btn">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                        </svg>
                        <p class="pl-3">CONTACTO</p>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!---    MI-PERFIL  --->

    <div class="py-10 section active" id="miperfilSection">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 px-12 gap-16 sm:grid-cols-3 bg-white py-8 rounded-s items-stretch">
                <div class="bg-white-rv border-red-rv border-2 rounded-lg flex-col flex p-4 items-center">
                    <div>
                        <h1 class="text-red-rv text-2xl font-bold">MIS DATOS</h1>
                    </div>
                    <div>
                        <img src="/images/data.png" alt="#">
                    </div>
                    <div>
                        <a href="{{ route('mis-datos') }}">
                            <x-roxana-button>
                                {{ __('VER MÁS') }}
                            </x-roxana-button>
                        </a>
                    </div>
                </div>
                <div class="bg-white-rv border-red-rv border-2 rounded-lg flex-col flex p-4 items-center">
                    <div>
                        <h1 class="text-red-rv text-2xl font-bold">MI FICHA MEDICA</h1>
                    </div>
                    <div>
                        <img src="/images/nurse.png" alt="#">
                    </div>
                    <div>
                        <a href="{{ route('mis-datos') }}">
                            <x-roxana-button>
                                {{ __('VER MÁS') }}
                            </x-roxana-button>
                        </a>
                    </div>
                </div>
                <div class="bg-white-rv border-red-rv border-2 rounded-lg flex-col flex p-4 items-center">
                    <div>
                        <h1 class="text-red-rv text-2xl font-bold">MIS DATOS</h1>
                    </div>
                    <div>
                        <img src="/images/health.png" alt="#">
                    </div>
                    <div>
                        <a href="{{ route('mis-datos') }}">
                            <x-roxana-button>
                                {{ __('VER MÁS') }}
                            </x-roxana-button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!---    MI-VIAJE  --->

    <div class="py-10 section" id="miviajeSection">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 px-12 gap-16 sm:grid-cols-3 bg-white py-8 rounded-s items-stretch">
                <div class="bg-white-rv border-red-rv border-2 rounded-lg flex-col flex p-4 items-center">
                    <div>
                        <h1 class="text-red-rv text-2xl font-bold">VIAJE A PUNTA CANA</h1>
                    </div>
                    <div>
                        <a href="{{ route('tu-viaje') }}">
                            <x-roxana-button>
                                {{ __('VER MÁS') }}
                            </x-roxana-button>
                        </a>
                    </div>
                </div>
                <!--
                <div class="bg-white-rv border-red-rv border-2 rounded-lg flex-col flex p-4 items-center">
                    <div>
                        <h1 class="text-red-rv text-2xl font-bold">MI FICHA MEDICA</h1>
                    </div>
                    <div>
                        <a href="{{ route('mis-datos') }}">
                            <x-roxana-button>
                                {{ __('VER MÁS') }}
                            </x-roxana-button>
                        </a>
                    </div>
                </div>
                <div class="bg-white-rv border-red-rv border-2 rounded-lg flex-col flex p-4 items-center">
                    <div>
                        <h1 class="text-red-rv text-2xl font-bold">MIS DATOS</h1>
                    </div>
                    <div>
                        <a href="{{ route('mis-datos') }}">
                            <x-roxana-button>
                                {{ __('VER MÁS') }}
                            </x-roxana-button>
                        </a>
                    </div>
                </div>-->
            </div>
        </div>
    </div>

    <!---    MIS-PAGOS  --->

    <div class="py-10 section" id="mipagoSection">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 px-12 gap-16 sm:grid-cols-3 bg-white py-8 rounded-s items-stretch">
                <div class="bg-white-rv border-red-rv border-2 rounded-lg flex-col flex p-4 items-center">
                    <div>
                        <h1 class="text-red-rv text-2xl font-bold">CRONOGRAMA</h1>
                    </div>
                    <div>
                        <img src="/images/RegPago01.png" alt="#" width="180px">
                    </div>
                    <div>
                        <a>
                            <x-roxana-button-disable>
                                {{ __('VER MÁS') }}
                            </x-roxana-button-disable>
                        </a>
                    </div>
                </div>
                <div class="bg-white-rv border-red-rv border-2 rounded-lg flex-col flex p-4 items-center">
                    <div>
                        <h1 class="text-red-rv text-2xl font-bold">ESTADO DE CUENTA</h1>
                    </div>
                    <div>
                        <img src="/images/RegPago01.png" alt="#" width="180px">
                    </div>
                    <div>
                        <a>
                            <x-roxana-button-disable>
                                {{ __('VER MÁS') }}
                            </x-roxana-button-disable>
                        </a>
                    </div>
                </div>
                <div class="bg-white-rv border-red-rv border-2 rounded-lg flex-col flex p-4 items-center">
                    <div>
                        <h1 class="text-red-rv text-2xl font-bold">REGISTRO DE PAGO</h1>
                    </div>
                    <div>
                        <img src="/images/RegPago01.png" alt="#" width="180px">
                    </div>
                    <div>
                        <a>
                            <x-roxana-button-disable>
                                {{ __('VER MÁS') }}
                            </x-roxana-button-disable>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!---    CONTACTO    --->

    <div class="py-10 section" id="contactoSection">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 px-8 gap-6 sm:grid-cols-3 bg-white py-8 rounded-s items-stretch">
                <div class="bg-white-rv border-red-rv border-2 rounded-lg flex-col flex items-center overflow-hidden">
                    <div class='flex flex-row justify-between flex-grow'>
                        <div>
                            <img src="/images/ale.png">
                        </div>
                        <div class='w-full p-4'>
                            <p class='text-xl italic text-black font-bold'>
                                Alexia Godenzi
                            </p>
                            <p class='text-lg text-red-rv font-medium '>
                                Ventas
                                <hr class="my-2  h-0.5 border-t-0 bg-red-rv dark:bg-white/10 w-1/4" />
                            </p>
                            <p class=' flex items-center pt-1 text-sm text-black '>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-5 text-red-rv">
                                    <path
                                        d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                                    <path
                                        d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                                </svg>&nbsp;
                                alexia@viajesroxana.com
                            </p>
                            <p class=' flex items-center italic pt-1 text-sm text-black '>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="size-5 text-wsp-rv" viewBox="0 0 24 24">
                                    <path
                                        d="M 12.011719 2 C 6.5057187 2 2.0234844 6.478375 2.0214844 11.984375 C 2.0204844 13.744375 2.4814687 15.462563 3.3554688 16.976562 L 2 22 L 7.2324219 20.763672 C 8.6914219 21.559672 10.333859 21.977516 12.005859 21.978516 L 12.009766 21.978516 C 17.514766 21.978516 21.995047 17.499141 21.998047 11.994141 C 22.000047 9.3251406 20.962172 6.8157344 19.076172 4.9277344 C 17.190172 3.0407344 14.683719 2.001 12.011719 2 z M 12.009766 4 C 14.145766 4.001 16.153109 4.8337969 17.662109 6.3417969 C 19.171109 7.8517969 20.000047 9.8581875 19.998047 11.992188 C 19.996047 16.396187 16.413812 19.978516 12.007812 19.978516 C 10.674812 19.977516 9.3544062 19.642812 8.1914062 19.007812 L 7.5175781 18.640625 L 6.7734375 18.816406 L 4.8046875 19.28125 L 5.2851562 17.496094 L 5.5019531 16.695312 L 5.0878906 15.976562 C 4.3898906 14.768562 4.0204844 13.387375 4.0214844 11.984375 C 4.0234844 7.582375 7.6067656 4 12.009766 4 z M 8.4765625 7.375 C 8.3095625 7.375 8.0395469 7.4375 7.8105469 7.6875 C 7.5815469 7.9365 6.9355469 8.5395781 6.9355469 9.7675781 C 6.9355469 10.995578 7.8300781 12.182609 7.9550781 12.349609 C 8.0790781 12.515609 9.68175 15.115234 12.21875 16.115234 C 14.32675 16.946234 14.754891 16.782234 15.212891 16.740234 C 15.670891 16.699234 16.690438 16.137687 16.898438 15.554688 C 17.106437 14.971687 17.106922 14.470187 17.044922 14.367188 C 16.982922 14.263188 16.816406 14.201172 16.566406 14.076172 C 16.317406 13.951172 15.090328 13.348625 14.861328 13.265625 C 14.632328 13.182625 14.464828 13.140625 14.298828 13.390625 C 14.132828 13.640625 13.655766 14.201187 13.509766 14.367188 C 13.363766 14.534188 13.21875 14.556641 12.96875 14.431641 C 12.71875 14.305641 11.914938 14.041406 10.960938 13.191406 C 10.218937 12.530406 9.7182656 11.714844 9.5722656 11.464844 C 9.4272656 11.215844 9.5585938 11.079078 9.6835938 10.955078 C 9.7955938 10.843078 9.9316406 10.663578 10.056641 10.517578 C 10.180641 10.371578 10.223641 10.267562 10.306641 10.101562 C 10.389641 9.9355625 10.347156 9.7890625 10.285156 9.6640625 C 10.223156 9.5390625 9.737625 8.3065 9.515625 7.8125 C 9.328625 7.3975 9.131125 7.3878594 8.953125 7.3808594 C 8.808125 7.3748594 8.6425625 7.375 8.4765625 7.375 z">
                                    </path>
                                </svg>&nbsp;
                                +51 952 172 143
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white-rv border-red-rv border-2 rounded-lg flex-col flex items-center overflow-hidden">
                    <div class='flex flex-row justify-between flex-grow'>
                        <div>
                            <img src="/images/eri.png">
                        </div>
                        <div class='w-full p-4'>
                            <p class='text-xl italic text-black font-bold'>
                                Erick Badajos
                            </p>
                            <p class='text-lg text-red-rv font-medium '>
                                Ventas
                                <hr class="my-2  h-0.5 border-t-0 bg-red-rv dark:bg-white/10 w-1/4" />
                            </p>
                            <p class=' flex items-center pt-1 text-sm text-black '>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-5 text-red-rv">
                                    <path
                                        d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                                    <path
                                        d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                                </svg>&nbsp;
                                erick@viajesroxana.com
                            </p>
                            <p class=' flex items-center italic pt-1 text-sm text-black '>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="size-5 text-wsp-rv" viewBox="0 0 24 24">
                                    <path
                                        d="M 12.011719 2 C 6.5057187 2 2.0234844 6.478375 2.0214844 11.984375 C 2.0204844 13.744375 2.4814687 15.462563 3.3554688 16.976562 L 2 22 L 7.2324219 20.763672 C 8.6914219 21.559672 10.333859 21.977516 12.005859 21.978516 L 12.009766 21.978516 C 17.514766 21.978516 21.995047 17.499141 21.998047 11.994141 C 22.000047 9.3251406 20.962172 6.8157344 19.076172 4.9277344 C 17.190172 3.0407344 14.683719 2.001 12.011719 2 z M 12.009766 4 C 14.145766 4.001 16.153109 4.8337969 17.662109 6.3417969 C 19.171109 7.8517969 20.000047 9.8581875 19.998047 11.992188 C 19.996047 16.396187 16.413812 19.978516 12.007812 19.978516 C 10.674812 19.977516 9.3544062 19.642812 8.1914062 19.007812 L 7.5175781 18.640625 L 6.7734375 18.816406 L 4.8046875 19.28125 L 5.2851562 17.496094 L 5.5019531 16.695312 L 5.0878906 15.976562 C 4.3898906 14.768562 4.0204844 13.387375 4.0214844 11.984375 C 4.0234844 7.582375 7.6067656 4 12.009766 4 z M 8.4765625 7.375 C 8.3095625 7.375 8.0395469 7.4375 7.8105469 7.6875 C 7.5815469 7.9365 6.9355469 8.5395781 6.9355469 9.7675781 C 6.9355469 10.995578 7.8300781 12.182609 7.9550781 12.349609 C 8.0790781 12.515609 9.68175 15.115234 12.21875 16.115234 C 14.32675 16.946234 14.754891 16.782234 15.212891 16.740234 C 15.670891 16.699234 16.690438 16.137687 16.898438 15.554688 C 17.106437 14.971687 17.106922 14.470187 17.044922 14.367188 C 16.982922 14.263188 16.816406 14.201172 16.566406 14.076172 C 16.317406 13.951172 15.090328 13.348625 14.861328 13.265625 C 14.632328 13.182625 14.464828 13.140625 14.298828 13.390625 C 14.132828 13.640625 13.655766 14.201187 13.509766 14.367188 C 13.363766 14.534188 13.21875 14.556641 12.96875 14.431641 C 12.71875 14.305641 11.914938 14.041406 10.960938 13.191406 C 10.218937 12.530406 9.7182656 11.714844 9.5722656 11.464844 C 9.4272656 11.215844 9.5585938 11.079078 9.6835938 10.955078 C 9.7955938 10.843078 9.9316406 10.663578 10.056641 10.517578 C 10.180641 10.371578 10.223641 10.267562 10.306641 10.101562 C 10.389641 9.9355625 10.347156 9.7890625 10.285156 9.6640625 C 10.223156 9.5390625 9.737625 8.3065 9.515625 7.8125 C 9.328625 7.3975 9.131125 7.3878594 8.953125 7.3808594 C 8.808125 7.3748594 8.6425625 7.375 8.4765625 7.375 z">
                                    </path>
                                </svg>&nbsp;
                                +51 945 464 582
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white-rv border-red-rv border-2 rounded-lg flex-col flex items-center overflow-hidden">
                    <div class='flex flex-row justify-between flex-grow'>
                        <div>
                            <img src="/images/lup.png">
                        </div>
                        <div class='w-full p-4'>
                            <p class='text-xl italic text-black font-bold'>
                                Lupe Rios
                            </p>
                            <p class='text-lg text-red-rv font-medium '>
                                Gerente Operacional
                                <hr class="my-2  h-0.5 border-t-0 bg-red-rv dark:bg-white/10 w-1/4" />
                            </p>
                            <p class=' flex items-center pt-1 text-sm text-black '>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-5 text-red-rv">
                                    <path
                                        d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                                    <path
                                        d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                                </svg>&nbsp;
                                luperios@viajesroxana.com
                            </p>
                            <p class=' flex items-center italic pt-1 text-sm text-black '>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="size-5 text-wsp-rv" viewBox="0 0 24 24">
                                    <path
                                        d="M 12.011719 2 C 6.5057187 2 2.0234844 6.478375 2.0214844 11.984375 C 2.0204844 13.744375 2.4814687 15.462563 3.3554688 16.976562 L 2 22 L 7.2324219 20.763672 C 8.6914219 21.559672 10.333859 21.977516 12.005859 21.978516 L 12.009766 21.978516 C 17.514766 21.978516 21.995047 17.499141 21.998047 11.994141 C 22.000047 9.3251406 20.962172 6.8157344 19.076172 4.9277344 C 17.190172 3.0407344 14.683719 2.001 12.011719 2 z M 12.009766 4 C 14.145766 4.001 16.153109 4.8337969 17.662109 6.3417969 C 19.171109 7.8517969 20.000047 9.8581875 19.998047 11.992188 C 19.996047 16.396187 16.413812 19.978516 12.007812 19.978516 C 10.674812 19.977516 9.3544062 19.642812 8.1914062 19.007812 L 7.5175781 18.640625 L 6.7734375 18.816406 L 4.8046875 19.28125 L 5.2851562 17.496094 L 5.5019531 16.695312 L 5.0878906 15.976562 C 4.3898906 14.768562 4.0204844 13.387375 4.0214844 11.984375 C 4.0234844 7.582375 7.6067656 4 12.009766 4 z M 8.4765625 7.375 C 8.3095625 7.375 8.0395469 7.4375 7.8105469 7.6875 C 7.5815469 7.9365 6.9355469 8.5395781 6.9355469 9.7675781 C 6.9355469 10.995578 7.8300781 12.182609 7.9550781 12.349609 C 8.0790781 12.515609 9.68175 15.115234 12.21875 16.115234 C 14.32675 16.946234 14.754891 16.782234 15.212891 16.740234 C 15.670891 16.699234 16.690438 16.137687 16.898438 15.554688 C 17.106437 14.971687 17.106922 14.470187 17.044922 14.367188 C 16.982922 14.263188 16.816406 14.201172 16.566406 14.076172 C 16.317406 13.951172 15.090328 13.348625 14.861328 13.265625 C 14.632328 13.182625 14.464828 13.140625 14.298828 13.390625 C 14.132828 13.640625 13.655766 14.201187 13.509766 14.367188 C 13.363766 14.534188 13.21875 14.556641 12.96875 14.431641 C 12.71875 14.305641 11.914938 14.041406 10.960938 13.191406 C 10.218937 12.530406 9.7182656 11.714844 9.5722656 11.464844 C 9.4272656 11.215844 9.5585938 11.079078 9.6835938 10.955078 C 9.7955938 10.843078 9.9316406 10.663578 10.056641 10.517578 C 10.180641 10.371578 10.223641 10.267562 10.306641 10.101562 C 10.389641 9.9355625 10.347156 9.7890625 10.285156 9.6640625 C 10.223156 9.5390625 9.737625 8.3065 9.515625 7.8125 C 9.328625 7.3975 9.131125 7.3878594 8.953125 7.3808594 C 8.808125 7.3748594 8.6425625 7.375 8.4765625 7.375 z">
                                    </path>
                                </svg>&nbsp;
                                +51 998 678 476
                            </p>
                        </div>
                    </div>
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
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold  text-center tracking-tight text-gray-900 dark:text-white">
                            Términos y Condiciones</h5>
                    </a>
                    <p class="mb-4 px-20 font-normal text-gray-700 text-center dark:text-gray-400">Al ingresar al
                        sistema esta de acuerdo con los <a href="#" target="_blank"
                            class="text-red-rv">términos
                            y condiciones.</a></p>
                    <div class="flex items-center mb-4 justify-center">
                        <input id="default-checkbox" type="checkbox" value=""
                            class="w-4 h-4 text-red-rv bg-gray-100 border-gray-300 rounded focus:ring-red-rv dark:focus:ring-red-rv dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox"
                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Estoy de acuerdo con los
                            terminos y condiciones.</label>
                    </div>
                    <div class="items-center text-center">
                        <a href="#" @click="localStorage.setItem('modalAccepted', 'true'); modalOpen = false;"
                            class="inline-flex items-center h-12 w-60  justify-center px-3 py-2 text-sm font-medium text-white bg-red-rv rounded-lg hover:bg-bdark-rv focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-red-rv dark:focus:ring-blue-800">
                            ACEPTAR
                        </a>
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
