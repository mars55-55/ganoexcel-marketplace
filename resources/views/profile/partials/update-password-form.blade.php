<section>
    <header>
        <h2 class="text-lg font-medium text-[#1e1e1e]">
            {{ __('Actualizar Contraseña') }}
        </h2>

        <p class="mt-1 text-sm text-[#FFD700]">
            {{ __('Asegúrate de que tu cuenta esté utilizando una contraseña larga y aleatoria para mantenerla segura.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="mb-4">
            <x-input-label for="update_password_current_password" :value="__('Contraseña Actual')" class="text-[#FFD700]" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full border border-[#1e1e1e] bg-[#1e1e1e] text-white focus:ring-[#FFD700] focus:border-[#FFD700]" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-red-500" />
        </div>

        <div class="mb-4">
            <x-input-label for="update_password_password" :value="__('Nueva Contraseña')" class="text-[#FFD700]" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full border border-[#1e1e1e] bg-[#1e1e1e] text-white focus:ring-[#FFD700] focus:border-[#FFD700]" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-red-500" />
        </div>

        <div class="mb-4">
            <x-input-label for="update_password_password_confirmation" :value="__('Confirmar Contraseña')" class="text-[#FFD700]" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full border border-[#1e1e1e] bg-[#1e1e1e] text-white focus:ring-[#FFD700] focus:border-[#FFD700]" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-red-500" />
        </div>

        <div class="flex items-center gap-4 mt-6">
            <x-primary-button class="bg-[#FFD700] text-[#1e1e1e] hover:bg-[#DAA520]">
                {{ __('Guardar') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
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
