<x-approxana-layout>
    <div class="mt-6 text-center sm:text-left">
        <div class="max-w-7xl mx-auto my-4 sm:px-6 lg:px-8 max-sm:pl-8">
            <a href="{{ route('mis-pagos') }}"
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
        <div class="max-w-6xl mx-auto my-10">
            <div class="flex flex-col max-sm:px-3">
                <p class="text-5xl">Viaje a <span class="font-bold">Cancún</span></p>
            </div>
            <div class="flex flex-row pt-4 gap-6">
                <p>Fecha <span>23 de Setiembre</span> </p>
                <p>Codigo de programa: <span>VPPE01</span> </p>
            </div>
        </div>
    </div>

    <div class="pb-6">
        <div class="max-w-6xl mx-auto">
            <div class="bg-white p-6">
                <div class="flex flex-row justify-between items-center border-b-2 border-gray-400 pb-4">
                    <p class="font-bold text-xl">Cronograma</p>
                    <a href="" class="border px-8 py-2 rounded-full border-gray-500 hover:bg-red-rv hover:border-red-rv hover:text-white">Estado de Pagos</a>
                </div>

                <div class="py-6 w-full">
                    <table class="table-fixed w-full text-center">
                        <thead>
                            <tr class="text-gray-400 my-4">
                                <th class="py-4 font-semibold">Cuota N°</th>
                                <th class="py-4 font-semibold">Fecha de Vencimiento</th>
                                <th class="py-4 font-semibold">Moneda</th>
                                <th class="py-4 font-semibold">Monto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class=" bg-gray-100 py-4 ">
                                <td class="py-4">1</td>
                                <td class="py-4">04/02/24</td>
                                <td class="py-4">Dólares ($USD)</td>
                                <td class="py-4">300</td>
                            </tr>
                            <tr class="py-4">
                                <td class="py-4">2</td>
                                <td class="py-4">04/03/24</td>
                                <td class="py-4">Dólares ($USD)</td>
                                <td class="py-4">300</td>
                            </tr>
                            <tr class="bg-gray-100 py-4">
                                <td class="py-4">3</td>
                                <td class="py-4">04/04/24</td>
                                <td class="py-4">Dólares ($USD)</td>
                                <td class="py-4">300</td>
                            </tr>
                            <tr class="">
                                <td class="py-4">4</td>
                                <td class="py-4">04/05/24</td>
                                <td class="py-4">Dólares ($USD)</td>
                                <td class="py-4">300</td>
                            </tr>
                            <tr class="bg-gray-100 py-4">
                                <td class="py-4">5</td>
                                <td class="py-4">04/06/24</td>
                                <td class="py-4">Dólares ($USD)</td>
                                <td class="py-4">300</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="flex flex-row justify-between items-center  py-4">
                    <div>
                        <p>Monto Total: <span>$USD</span> <span>1500.00</span> <span>dolares</span></p>
                    </div>

                    <div>
                        <a href="" class="border px-10 py-2 rounded-full border-gray-500 hover:bg-red-rv hover:border-red-rv hover:text-white">Descargar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-approxana-layout>