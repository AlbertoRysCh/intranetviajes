<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nombres -->
        <div>
            <x-input-label for="name" :value="__('Nombres')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Apellidos -->
        <div class="mt-4">
            <x-input-label for="apellidos" :value="__('Apellidos')" />
            <x-text-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos" :value="old('apellidos')" required autofocus autocomplete="apellidos" />
            <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />
        </div>

        <!-- Tipo de documento -->
        <div class="mt-4">
            <label for="tipo_documento" class="block text-sm font-semibold leading-6 text-gray-900">Tipo
                Documento</label>
            <div class="mt-2.5">
                <select id="tipo_documento" name="tipo_documento"
                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-rv sm:text-sm sm:leading-6">
                    <option value="Seleccionar opción">Seleccionar opción</option>
                    <option value="pasaporte">Pasaporte</option>
                    <option value="dni">Dni</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
        </div>

        <!-- Documento -->
        <div class="mt-4">
            <x-input-label for="documento" :value="__('Documento')" />
            <x-text-input id="documento" class="block mt-1 w-full" type="text" name="documento" :value="old('documento')" required autofocus autocomplete="documento" />
            <x-input-error :messages="$errors->get('documento')" class="mt-2" />
        </div>

        <!-- Telefono -->
        <div class="mt-4">
            <x-input-label for="telefono" :value="__('Telefono')" />
            <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" required autofocus autocomplete="telefono" />
            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
        </div>

        

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Correo')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            
        </div>

        <!-- username -->
      
        <x-text-input id="username" type="text" name="username" :value="old('username')" />
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('¿Ya estas Registrado?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Registrarme') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Obtener los elementos del formulario
            const nameField = document.getElementById('name');
            const surnameField = document.getElementById('apellidos');
            const documentField = document.getElementById('documento');
            const usernameField = document.getElementById('username');

            function generateUsername() {
                const name = nameField.value.substring(0, 2).toUpperCase();
                const surname = surnameField.value.substring(0, 2).toUpperCase();
                const documentNumber = documentField.value;
                const username = name + surname + documentNumber;

                usernameField.value = username;
            }

            // Generar el username cada vez que se cambien estos campos
            nameField.addEventListener('input', generateUsername);
            surnameField.addEventListener('input', generateUsername);
            documentField.addEventListener('input', generateUsername);

            // Generar el username al cargar la página
            generateUsername();
        });
    </script>
</x-guest-layout>
