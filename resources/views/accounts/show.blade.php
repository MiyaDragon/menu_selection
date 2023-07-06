<x-app-layout>

    <div class="py-12">
        <div class="sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                アカウント
                            </h2>
                        </header>

                        <div class="p-4 sm:p-8">
                            <x-input-label for="nickname" :value="__('ニックネーム')" :required=false />
                            <div class="flex">
                                <p class="flex-auto">{{ $user->nickname }}</p>
                                <a href="{{ route('account.nickname.edit') }}" class="flex-auto"><small>変更 ></small></a>
                            </div>
                        </div>

                        <div class="p-4 sm:p-8">
                            <x-input-label for="email" :value="__('メールアドレス')" :required=false />
                            <div class="flex">
                                <p class="flex-auto">{{ $user->email }}</p>
                                <a href="{{ route('account.email.edit') }}" class="flex-auto"><small>変更 ></small></a>
                            </div>
                        </div>

                        <div class="p-4 sm:p-8">
                            <x-input-label for="password" :value="__('パスワード')" :required=false />
                            <div class="flex">
                                <p class="flex-auto">********</p>
                                <a href="{{ route('account.password.edit') }}" class="flex-auto"><small>変更 ></small></a>
                            </div>
                        </div>

                        <div class="text-sm font-medium text-gray-500">
                            <a href="{{ route('account.withdrawal.edit') }}" class="text-blue-700 hover:underline">退会手続きへ</a>
                        </div>

                    </section>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
