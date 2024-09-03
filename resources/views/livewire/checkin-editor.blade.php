<div id="accordion-collapse" data-accordion="collapse">
    <h2 id="accordion-collapse-heading-{{ $checkin->id }}">
        <button type="button"
            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
            data-accordion-target="#accordion-collapse-body-{{ $checkin->id }}" 
            aria-expanded="false">
            <span>{{ $checkin->tip_maleta }}</span>
            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" d="M9 5 5 1 1 5" />
            </svg>
        </button>
    </h2>
    <div id="accordion-collapse-body-{{ $checkin->id }}" 
        class="hidden">
       <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
           @if ($editMode)
                <form wire:submit.prevent="save">
                    <div>
                        <label for="tip_maleta">Tipo de Maleta</label>
                        <input id="tip_maleta" type="text" wire:model.defer="checkin.tip_maleta">
                    </div>
                    <div>
                        <label for="num_etiqueta">N° de Etiqueta</label>
                        <input id="num_etiqueta" type="text" wire:model.defer="checkin.num_etiqueta">
                    </div>
                    <div>
                        <label for="color">Color</label>
                        <input id="color" type="text" wire:model.defer="checkin.color">
                    </div>
                    <div>
                        <label for="caracteristicas">Características</label>
                        <input id="caracteristicas" type="text" wire:model.defer="checkin.caracteristicas">
                    </div>
                    <div>
                        <label for="peso">Peso</label>
                        <input id="peso" type="number" wire:model.defer="checkin.peso">
                    </div>
                    <div>
                        <label for="lugar_regis">Lugar de Registro</label>
                        <input id="lugar_regis" type="text" wire:model.defer="checkin.lugar_regis">
                    </div>
                    <button type="submit">Guardar</button>
                    <button type="button" wire:click="cancelEdit">Cancelar</button>
                </form>
            @else
                <p><strong>Tipo de Maleta:</strong> {{ $checkin->tip_maleta }}</p>
                <p><strong>N° de Etiqueta:</strong> {{ $checkin->num_etiqueta }}</p>
                <p><strong>Color:</strong> {{ $checkin->color }}</p>
                <p><strong>Características:</strong> {{ $checkin->caracteristicas }}</p>
                <p><strong>Peso:</strong> {{ $checkin->peso }} Kg</p>
                <p><strong>Lugar de Registro:</strong> {{ $checkin->lugar_regis }}</p>
                <button wire:click="edit">Editar</button>
            @endif
        </div>
    </div>
</div>

@if (session()->has('message'))
    <div>{{ session('message') }}</div>
@endif
