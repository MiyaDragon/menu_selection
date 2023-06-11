<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('register') }}" class="space-y-6">

        @csrf

        <!-- 名前 -->
        <div>
            <x-input-label for="name" :value="__('名前')" />
            <x-text-input id="name" type="text" name="name" :value="old('name')" placeholder="山田 太郎" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- メールアドレス -->
        <div>
            <x-input-label for="email" :value="__('メールアドレス')" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" placeholder="example@example.com" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- パスワード -->
        <div>
            <x-input-label for="password" :value="__('パスワード')" />
            <x-text-input id="password" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- パスワード（確認） -->
        <div>
            <x-input-label for="password" :value="__('パスワード（確認）')" />
            <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">ログイン</button>

        <div class="text-sm font-medium text-gray-500">
            <a href="{{ route('login') }}" class="text-blue-700 hover:underline">ログインはこちら</a>
        </div>

    </form>

</x-guest-layout>
