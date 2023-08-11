<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Добавить статью
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6">
                <a href="{{route('articles.index')}}" class="flex items-center justify-between w-40 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-gray-600 border border-transparent rounded-lg hover:bg-gray-700 ">
                    Статьи
                </a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="bg-red-500 text-white my-2 p-2 rounded">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="my-2">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Name</span>
                            <input
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="Name"
                                name="title"
                            />
                        </label>
                    </div>
                    <div class="my-2">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Контент</span>
                            <textarea
                                id="content"
                                class="block w-full rounded border-gray-300 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="Контент"
                                name="content"
                            ></textarea>
                        </label>
                    </div>
                    <div class="my-2">
                        <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Категория
                </span>
                            <select
                                required
                                name="category_id"
                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            >
                                <option value="">Выберите</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="my-2">
                        <label class="inline-flex items-center mt-3">
                            <input
                                type="checkbox"
                                name="active"
                                class="form-checkbox h-5 w-5 text-gray-600"
                                checked>
                            <span class="ml-2 text-gray-700">Активный</span>
                        </label>
                    </div>

                    <div class="my-2">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Порядок категорий</span>
                            <input
                                type="number"
                                class="block w-1/3 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="Порядок категорий"
                                min=0
                                value="0"
                                name="sort"
                            />
                        </label>
                    </div>

                    <div class="my-4">
                        <input type="file" name="image">
                    </div>

                    <div class="py-3 text-right">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            Создать
                        </button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{asset('/js/jquery-3.6.3.min.js')}}"></script>
        <script src="{{asset('/ckeditor5/ckeditor.js')}}">
        </script>
        <script>
            ClassicEditor
                .create( document.querySelector( '#content' ),{
                    ckfinder:{
                        uploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}"
                    }
                } )
                .then( editor => {
                    console.log('success')
                })
                .catch( error => {
                    console.error( error );
                } );
        </script>

    @endpush
</x-app-layout>


