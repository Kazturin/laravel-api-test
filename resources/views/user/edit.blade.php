<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Пользователи
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6">
                <a href="{{route('users.index')}}"
                   class="flex items-center justify-between w-40 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-gray-600 border border-transparent rounded-lg hover:bg-gray-700 ">
                    Пользователи
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

                    <form action="{{ route('users.update',$user->id) }}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="my-2">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Name</span>
                                <input
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="Name"
                                    name="name"
                                    value="{{ $user->name }}"
                                />
                            </label>
                        </div>
                        <div class="my-2">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Email</span>
                                <input
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="Email"
                                    name="email"
                                    value="{{ $user->email }}"
                                />
                            </label>
                        </div>
                        <div class="my-2">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Password</span>
                                <input
                                    type="password"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="Password"
                                    name="password"
                                />
                            </label>
                        </div>
                        <div class="my-2">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Confirm Password</span>
                                <input
                                    type="password"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="Confirm Password"
                                    name="password_confirmation"
                                />
                            </label>
                        </div>
                        <div class="my-2">
                            <label class="block text-sm">
                             <span class="text-gray-700 dark:text-gray-400">
                                Статус
                              </span>
                                <select
                                    required
                                    name="status"
                                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                >
                                    <option value="">Выберите</option>
                                    @foreach(\App\Models\User::getStatusesDropdown() as $key => $value)
                                        <option
                                            value="{{$key}}" {{$user->status==$key?'selected':''}}>{{$value}}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        <div class="py-3 text-right">
                            <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                Изменить
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


