<x-app-layout>

    <form method="post" action="{{ route('account.password.update') }}">
        @csrf
        @method('patch')

        <div class="py-12">
            <div class="sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <section>
                            <header>
                                <h2 class="text-lg font-medium text-gray-900">
                                    パスワード変更
                                </h2>
                            </header>

                            <div class="p-4 sm:p-8">
                                <x-input-label for="current_password" :value="__('Current Password')" :required=true />
                                <x-text-input id="current_password" type="password" name="current_password" required autofocus autocomplete="password" />
                                <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
                                <x-input-label for="password" :value="__('Password')" :required=true class="mt-2" />
                                <x-text-input id="password" type="password" name="password" required autofocus autocomplete="password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" :required=true class="mt-2" />
                                <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autofocus autocomplete="password" />
                                <x-cancel-button>キャンセル</x-cancel-button>
                                <x-submit-button>変更</x-submit-button>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </form>

</x-app-layout>
