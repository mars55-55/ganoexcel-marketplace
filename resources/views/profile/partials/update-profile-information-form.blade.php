<section>
    <header>
        <h2 class="text-lg font-medium text-[#1e1e1e]">
            {{ __('Información del Perfil') }}
        </h2>

        <p class="mt-1 text-sm text-[#FFD700]">
            {{ __("Actualiza la información de tu perfil y dirección de correo electrónico.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="mb-4">
            <x-input-label for="name" :value="__('Nombre')" class="text-[#FFD700]" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full border border-[#1e1e1e] bg-[#1e1e1e] text-white focus:ring-[#FFD700] focus:border-[#FFD700]" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2 text-red-500" :messages="$errors->get('name')" />
        </div>

        <div class="mb-4">
            <x-input-label for="email" :value="__('Correo Electrónico')" class="text-[#FFD700]" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full border border-[#1e1e1e] bg-[#1e1e1e] text-white focus:ring-[#FFD700] focus:border-[#FFD700]" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2 text-red-500" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-[#FFD700]">
                        {{ __('Tu dirección de correo electrónico no está verificada.') }}

                        <button form="send-verification" class="underline text-sm text-[#FFD700] hover:text-[#DAA520] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#FFD700]">
                            {{ __('Haz clic aquí para re-enviar el correo de verificación.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('Se ha enviado un nuevo enlace de verificación a tu dirección de correo electrónico.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 mt-6">
            <x-primary-button class="bg-[#FFD700] text-[#1e1e1e] hover:bg-[#DAA520]">
                {{ __('Guardar') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-[#FFD700]"
                >{{ __('Guardado.') }}</p>
            @endif
        </div>
    </form>
</section>
