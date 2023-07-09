<x-app-layout>

    <form method="post" action="{{ route('account.nickname.update') }}">
        @csrf
        @method('patch')

        <div class="py-12">
            <div class="sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <section>
                            <header>
                                <h2 class="text-lg font-medium text-gray-900">
                                    ニックネーム変更
                                </h2>
                            </header>

                            <div class="p-4 sm:p-8">
                                <x-input-label for="nickname" :value="__('NickName')" :required=false/>
                                <x-text-input id="nickname" type="text" name="nickname" :value="old('nickname', $user->nickname)" required autofocus autocomplete="nickname" />
                                <x-input-error :messages="$errors->get('nickname')" class="mt-2" />
                                <x-cancel-button>キャンセル</x-cancel-button>
                                <x-submit-button>変更</x-submit-button>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </form>

</x-app-layout>
