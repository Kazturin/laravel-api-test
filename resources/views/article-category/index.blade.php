<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Категории статей
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session()->get('success'))
                <div class="py-2 px-4 font-semibold bg-green-400 text-white mt-4 rounded-md">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="my-6">
                <a href="{{route('article-categories.create')}}" class="flex items-center justify-between w-40 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-gray-600 border border-transparent rounded-lg hover:bg-gray-700 ">
                    Добавить категорию
                    <span class="ml-2" aria-hidden="true">+</span>
                </a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="w-full overflow-x-auto">
                        @livewire('table.article-category-table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
