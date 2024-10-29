<x-approxana-layout>
    <div class="mt-6 text-center sm:text-left">
        <div class="max-w-7xl mx-auto my-4 sm:px-6 lg:px-8 max-sm:pl-8">
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
        <div class="max-w-7xl mx-auto my-20 max-sm:my-10 sm:px-6 lg:px-8">
            <div class="flex flex-col text-center gap-6 px-40 max-sm:px-3">
                <h3 class="font-normal text-5xl">Mis Pagos</h3>
                <p class="px-36">Aquí puedes visualizar tu cronograma de pagos de manera sencilla y rápida.
                    Revisa las fechas de vencimiento, el monto y el número de cuota.
                </p>
            </div>
        </div>
    </div>

    <div class="pb-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
                @foreach($groups as $group)
                    <div class="border rounded-xl p-6 border-gray-700">
                        <p class="font-bold text-2xl">{{ $group->travel->nombre_viaje }}</p>
                        <p class="text-sm italic">{{ Carbon\Carbon::parse($group->travel->fecha_viaje)->format('d \\d\\e F Y') }}</p>
                        <p class="bg-yellow-400 text-center py-1 my-3 font-semibold text-white">Estado: Pendiente de Pago</p>
                        <p class="text-ls">Código de Programa</p>
                        <p class="text-xl font-bold">{{ $group->travel->codigo_viaje }}</p>
                        <div class="flex flex-col gap-3 py-3">
                            <a href="{{ route('mi-estado', ['groupId' => $group->groupID]) }}" class="border border-gray-400 text-center rounded-full py-2">Estado de pagos</a>
                            <a href="{{ route('users.mi-cronograma', ['groupId' => $group->groupID]) }}" class="border border-gray-400 text-center rounded-full py-2">Cronograma</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-approxana-layout>
