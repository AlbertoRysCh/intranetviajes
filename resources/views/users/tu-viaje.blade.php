<x-approxana-layout>

    <div class="m-6 text-center sm:pt-12 sm:text-left">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-red-rv dark:bg-gray-800 rounded-lg overflow-hidden shadow-sm sm:rounded-lg grid grid-cols-1 sm:grid-cols-3 p-6 pb-0 gap-4">
                <div class="flex flex-col md:flex-row justify-between items-center col-span-2">
                    <div class="p-5 text-white-rv dark:text-gray-100 text-lg sm:pl-16">
                        <div class="text-white-rv text-3xl">
                            {!! __('Tu viaje a , ') !!} <b> Punta Cana{{ Auth::user()->viaje }}
                                {{ Auth::user()->nameviaje }}</b>!<br>
                        </div>

                        <p class="mt-4 text-white-rv-400 text-base font-Light">
                            {!! __(
                                'En esta sección, puedes descargar documentos esenciales para tu próximo viaje a Cancún. También encontrarás recomendaciones personalizadas y consejos prácticos para asegurarte de que tu experiencia sea excepcional.',
                            ) !!}
                        </p>
                    </div>
                </div>
                <div class="p-0 text-white-rv dark:text-gray-100 pr-16 pt-5">
                    <img src="/images/rox.png" alt="" class="pb-0 w-64">
                </div>
            </div>
        </div>
    </div>

    <div class="p-6 pt-0 sm:py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid  grid-cols-1 sm:grid-cols-3 gap-8 p-8 bg-white border border-gray-200 rounded-lg shadow">
                <div class="bg-white-rv border-red-rv border-2 rounded-lg flex-col flex p-4 items-center">
                    <div>
                        <h1 class="text-red-rv text-2xl font-bold">ITINERARIO</h1>
                    </div>
                    <div>
                        <img src="/images/Desc-Ficha01.png" alt="#" width="200px">
                    </div>
                    <div>
                        <a href="{{ route('mi-itinerario') }}">
                            <x-roxana-button>
                                {{ __('VER MÁS') }}
                            </x-roxana-button>
                        </a>
                    </div>
                </div>
                <div class="bg-white-rv border-red-rv border-2 rounded-lg flex-col flex p-4 items-center">
                    <div>
                        <h1 class="text-red-rv text-2xl font-bold">FOTOS Y VIDEOS</h1>
                    </div>
                    <div>
                        <img src="/images/FotosyVideos01.png" alt="#" width="200px">
                    </div>
                    <div>
                        <a href="{{ route('mi-fotoyvideo') }}">
                            <x-roxana-button>
                                {{ __('VER MÁS') }}
                            </x-roxana-button>
                        </a>
                    </div>
                </div>
                <div class="bg-white-rv border-red-rv border-2 rounded-lg flex-col flex p-4 items-center">
                    <div>
                        <h1 class="text-red-rv text-2xl font-bold">DOCUMENTOS</h1>
                    </div>
                    <div>
                        <img src="/images/Doc-viajes01.png" alt="#" width="200px">
                    </div>
                    <div>
                        <a href="{{ route('mi-documento') }}">
                            <x-roxana-button>
                                {{ __('VER MÁS') }}
                            </x-roxana-button>
                        </a>
                    </div>
                </div>
                <div></div>
                <div class="bg-white-rv border-red-rv border-2 rounded-lg flex-col flex p-4 items-center">
                    <div>
                        <h1 class="text-red-rv text-2xl font-bold">CHECK - IN</h1>
                    </div>
                    <div>
                        <img src="/images/data.png" alt="#">
                    </div>
                    <div>
                        <a href="{{ route('mi-checkin') }}">
                            <x-roxana-button>
                                {{ __('VER MÁS') }}
                            </x-roxana-button>
                        </a>
                    </div>
                </div>
                <div></div>
            </div>
        </div>
    </div>

    
</x-approxana-layout>
