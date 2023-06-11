<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">

        @csrf

        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">メールアドレス</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@company.com" required>
        </div>

        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">パスワード</label>
            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
        </div>

        <div class="flex items-start">
            <a href="{{ route('password.request') }}" class="ml-auto text-sm text-blue-700 hover:underline">パスワードをお忘れの方</a>
        </div>

        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">ログイン</button>

        <div class="text-sm font-medium text-gray-500">
            <a href="{{ route('register') }}" class="text-blue-700 hover:underline">新規登録はこちら</a>
        </div>

    </form>

</x-guest-layout>
