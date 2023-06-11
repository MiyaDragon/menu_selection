<x-app-layout>

    <div class="py-12">
        <div class="sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                メールアドレス変更
                            </h2>
                        </header>

                        <div class="p-4 sm:p-8">
                            <x-input-label for="email" :value="__('メールアドレス')" />
                            <x-text-input id="email" type="email" name="email" :value="old('email', $user->email)" required autofocus autocomplete="email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            <button type="button" class="w-1/3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mt-3" onClick="history.back();">キャンセル</button>
                            <button type="submit" class="w-1/3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mt-3">変更</button>
                            </div>

                    </section>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
