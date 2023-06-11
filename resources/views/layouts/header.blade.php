<!-- Page Heading -->
<nav class="bg-orange-300 border-gray-200">

  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

    <a href="/" class="flex items-center">
        <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap">Flowbite</span>
    </a>

    <div class="flex items-center md:order-2">

      <button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
        <span class="sr-only">Open user menu</span>
        <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="user photo">
      </button>

      <!-- Dropdown menu -->
      <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow" id="user-dropdown">

        @auth
          <div class="px-4 py-3">
            <span class="block text-sm text-gray-900">{{ auth()->user()->nickname }}</span>
            <span class="block text-sm  text-gray-500 truncate">{{ auth()->user()->email }}</span>
          </div>
        @endauth

        <ul class="py-2" aria-labelledby="user-menu-button">

          <li>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
          </li>
          <li>
            <a href="{{ route('account.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">アカウント設定</a>
          </li>
          @auth
            <li>
              <form action="{{ route('logout') }}" method="POST" name="logout">
                @csrf
                <a href="javascript:logout.submit()" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">ログアウト</a>
              </form>
            </li>
          @endauth

        </ul>

      </div>

      <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="mobile-menu-2" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
      </button>

    </div>

    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">

      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-orange-300 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-orange-300">

        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-white bg-wihte rounded md:bg-transparent md:text-wihte md:p-0" aria-current="page">Home</a>
        </li>
        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-wihte md:hover:bg-transparent md:hover:text-blue-700 md:p-0">About</a>
        </li>
        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Services</a>
        </li>
        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Pricing</a>
        </li>
        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Contact</a>
        </li>

      </ul>

    </div>

  </div>

</nav>
