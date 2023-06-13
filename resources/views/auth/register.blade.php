<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('register') }}" class="space-y-6">

        @csrf

        <!-- ニックネーム -->
        <div>
            <x-input-label for="nickname" :value="__('NickName')" :required=true />
            <x-text-input id="nickname" type="text" name="nickname" :value="old('nickname')" placeholder="たろう" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- メールアドレス -->
        <div>
            <x-input-label for="email" :value="__('Email')" :required=true />
            <x-text-input id="email" type="email" name="email" :value="old('email')" placeholder="example@example.com" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- パスワード -->
        <div>
            <x-input-label for="password" :value="__('Password')" :required=true />
            <small>8文字以上の半角英数記号</small>
            <x-text-input id="password" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- パスワード（確認） -->
        <div>
            <x-input-label for="password" :value="__('Confirm Password')" :required=true />
            <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <button type="submit" class="w-full text-white bg-orange-300 hover:bg-orange-400 focus:ring-4 focus:outline-none focus:ring-orange-300 font-bold rounded-lg text-sm px-5 py-2.5 text-center">{{ __('Log in') }}</button>

        <div class="text-sm font-medium text-gray-500">
            <a href="{{ route('login') }}" class="text-orange-400 hover:underline">ログインはこちら</a>
        </div>

    </form>

</x-guest-layout>
