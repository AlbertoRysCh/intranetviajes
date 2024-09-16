<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


    <div class="mt-8 text-center max-sm:px-6 mb-6">
        <p class="text-2xl font-bold text-red-rv italic "> !Bienvenido/a a tu próxima aventura¡ </p>
    </div>
    <div class=" max-w-screen-lg mx-auto">
        <div class="bg-white border-t-4 border-red-rv rounded-lg shadow-2xl shadow-current ">
            <div class="px-12 py-12">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="pb-12">
                        <img src="/images/logo-viajesroxana.png" class="w-72">
                    </div>
                    <div class="text-left font-normal text-3xl mb-5">
                        Inicia Sesión
                    </div>

                    <div>
                        <x-input-label for="username" :value="__('Usuario')" />
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-6">
                                    <path fill-rule="evenodd"
                                        d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <x-text-input id="username"
                                class="bg-white text-gray-rv rounded-lg text-base block w-full ps-10 p-2.5 my-2"
                                type="text" name="username" :value="old('username')" placeholder="Usuario" required
                                autofocus autocomplete="username" />
                        </div>
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>
                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Contraseña')" />
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-6">
                                    <path fill-rule="evenodd"
                                        d="M12 1.5a5.25 5.25 0 0 0-5.25 5.25v3a3 3 0 0 0-3 3v6.75a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3v-6.75a3 3 0 0 0-3-3v-3c0-2.9-2.35-5.25-5.25-5.25Zm3.75 8.25v-3a3.75 3.75 0 1 0-7.5 0v3h7.5Z"
                                        clip-rule="evenodd" />
                                </svg>

                            </div>
                            <x-text-input id="password"
                                class="bg-white text-gray-rv rounded-lg text-base block w-full ps-10 p-2.5 my-2"
                                type="password" name="password" required placeholder="Contraseña"
                                autocomplete="current-password" />
                            <button type="button" id="togglePassword"
                                class="absolute inset-y-0 right-0 flex items-center pe-3 px-3 bg-bdark-rv rounded-r-lg">
                                <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor"
                                    class="size-5 text-white-rv dark:text-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center text-red-rv">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-red-rv shadow-sm" name="remember">
                            <span class="ml-2 text-sm text-red-rv">{{ __('Recordar') }}</span>
                        </label>
                    </div>

                    
                    <div class="text-center justify-center py-2">
                        <x-primary-button class="h-14 justify-center text-lg hover:bg-gray-rv w-full">
                            {{ __('Ingresar') }}
                        </x-primary-button>
                    </div>
                    

                    <hr class="my-4">
                    <div class="flex flex-row justify-between">
                        <div class="flex items-center justify-start mt-2 gap-2"> 
                            <p 
                            class="text-sm text-black rounded-md">¿Olvidaste tu contraseña? </p>
                            @if (Route::has('password.request'))
                                <a class="text-sm text-red-rv hover:underline"
                                    href="{{ route('password.request') }}">
                                    {{ __(' Recupera el acceso') }}
                                </a>
                            @endif
                        </div>
                    </div>                    
                </form>
            </div>
        </div>
    </div>

    <div>
        <div class="mt-8 text-center max-sm:px-6 pt-8">
            <p class=" text-sm text-gray-rv">
                Protegido por reCAPTCHA, se aplica a las <br><a target="_blank" href="https://viajesroxana.com/archive/politicas-privacidad.pdf" class="text-black underline hover:text-red-rv"> Políticas de Privacidad</a> y 
                a los <a target="_blank" href="https://viajesroxana.com/archive/terminos-condiciones-intranet.pdf" class="text-black underline hover:text-red-rv">Términos y Condiciones.</a>
            </p>
        </div>
    </div>

</x-guest-layout>


<script>
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordField = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');
        const isPassword = passwordField.getAttribute('type') === 'password';
        passwordField.setAttribute('type', isPassword ? 'text' : 'password');

        // Toggle eye icon
        if (isPassword) {
            eyeIcon.innerHTML = `
            <path sstroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
        `;
        } else {
            eyeIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
        `;
        }
    });
</script>

