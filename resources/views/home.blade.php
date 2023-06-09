<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Home</title>
  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

  @include('layouts.header')

  <section class="text-gray-600 body-font">

    <form method="get" action="{{ route('home') }}">

      <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">

        <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero" src="{{ $menu['foodImageUrl'] }}">

        <div class="text-center lg:w-2/3 w-full">

          <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $menu['recipeTitle'] }}</h1>

          <div class="my-3">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">ジャンル</label>
            <select name="category" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
              @foreach ($categories as $id => $category)
                <option value={{ $id }} @if (request()->query('category') == $id) selected @endif>{{ $category }}</option>
              @endforeach
            </select>
          </div>

          <div class="flex justify-center">
            <button type="submit" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">送信</button>
          </div>

        </div>

      </div>

    </form>

  </section>

</body>
</html>
