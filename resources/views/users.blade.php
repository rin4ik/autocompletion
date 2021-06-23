@extends('layout')

@section('content')

<header class="bg-white shadow">
  <div class="max-w-6xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <div class="md:flex md:items-center md:justify-between">
      <div class="flex-1 min-w-0">
        <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">
          Users
        </h2>
      </div> 
    </div>
  </div>
</header>

<main class="max-w-6xl mx-auto sm:px-6 lg:px-8 py-12">
  <form class="max-w-lg">
    <label for="search" class="sr-only">Search</label>
    <div class="relative rounded-md shadow-sm">
      <div class=" inset-y-0 left-0 pl-3 flex items-center pointer-events-none"></div>
      <Search/>
    </div>
  </form>
  <div class="mt-8 flex flex-col">
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
      <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg">
        <table class="min-w-full">
          <thead>
            <tr>
              <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                Name
              </th>
              <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                Email
              </th>
              <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                Company
              </th> 
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
              <tr class="bg-white">
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium text-gray-900">
                  {{ $user->first_name }} {{ $user->last_name }}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                  {{ $user->email }}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                  {{ $user->company->name }}
                </td> 
              </tr>
            @endforeach
          </tbody>
        </table>
        {{ $users->withQueryString()->links() }}
      </div>
    </div>
  </div>
</main>

@endsection
