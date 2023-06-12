<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">

        @csrf

        <!-- メールアドレス -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" placeholder="example@example.com" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- パスワード -->
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" type="password" name="password" placeholder="••••••••" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-start">
            <a href="{{ route('password.request') }}" class="ml-auto text-sm text-orange-400 hover:underline">パスワードをお忘れの方</a>
        </div>

        <button type="submit" class="w-full text-white bg-orange-300 hover:bg-orange-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold rounded-lg text-sm px-5 py-2.5 text-center">ログイン</button>

        <div class="text-sm font-medium text-gray-500">
            <a href="{{ route('register') }}" class="text-orange-400 hover:underline">新規登録はこちら</a>
        </div>

    </form>

</x-guest-layout>
