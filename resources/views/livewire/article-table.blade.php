<table class="w-full whitespace-no-wrap">
    <thead>
    <tr
        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
    >
        <th class="px-4 py-3 cursor-pointer" wire:click="sortBy('title')">
            <span class="mr-2">Title</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"/> <line x1="17" y1="3" x2="17" y2="21" /> <path d="M10 18l-3 3l-3 -3" /> <line x1="7" y1="21" x2="7" y2="3" /> <path d="M20 6l-3 -3l-3 3" /> </svg>
        </th>
        <th class="px-4 py-3">
            <span class="mr-2">Category</span>
         </th>
        <th class="px-4 py-3">Photo</th>
        <th class="px-4 py-3 cursor-pointer" wire:click="sortBy('sort')">
            <span class="mr-2">Sorting</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"/> <line x1="17" y1="3" x2="17" y2="21" /> <path d="M10 18l-3 3l-3 -3" /> <line x1="7" y1="21" x2="7" y2="3" /> <path d="M20 6l-3 -3l-3 3" /> </svg>
        </th>
        <th class="px-4 py-3 cursor-pointer" wire:click="sortBy('created_at')">
            <span class="mr-2">Created at</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"/> <line x1="17" y1="3" x2="17" y2="21" /> <path d="M10 18l-3 3l-3 -3" /> <line x1="7" y1="21" x2="7" y2="3" /> <path d="M20 6l-3 -3l-3 3" /> </svg>
        </th>
        <th class="px-4 py-3 cursor-pointer" wire:click="sortBy('status')">
            <span class="mr-2">Status</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"/> <line x1="17" y1="3" x2="17" y2="21" /> <path d="M10 18l-3 3l-3 -3" /> <line x1="7" y1="21" x2="7" y2="3" /> <path d="M20 6l-3 -3l-3 3" /> </svg>
        </th>
    </tr>
    </thead>
    <tbody
        class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
    >
    @foreach($articles as $article)
        <tr class="text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3 text-sm">
                {{$article->title}}
            </td>
            <td class="px-4 py-3 text-sm">
                {{$article->category->name}}
            </td>
            <td class="px-4 py-3">
                <div
                    class="w-16 h-16 rounded overflow-hidden"
                >
                    <img
                        class="object-cover w-full h-full"
                        src="{{isset($article->image) ? asset('/storage/'.$article->image) : '/img/no-photo.png'}}"
                        alt=""
                        loading="lazy"
                    />
                </div>
            </td>
            <td class="px-4 py-3 text-sm">
                {{$article->sort}}
            </td>
            <td class="px-4 py-3 text-sm">
                {{$article->created_at}}
            </td>
            <td class="px-4 py-3 text-sm">
                @livewire('toggle-switch', [
                'model' => $article,
                'field' => 'active'
                ],
                key($article->id)
                )
            </td>
            <td class="px-4 py-3">
                <div class="flex items-center space-x-4 text-sm">
                    <a href="{{route('articles.edit',$article->id)}}"
                       class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                       aria-label="Edit"
                    >
                        <svg
                            class="w-5 h-5"
                            aria-hidden="true"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                            ></path>
                        </svg>
                    </a>
                    <form action="{{ route('articles.destroy',$article->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                            aria-label="Delete"
                        >
                            <svg
                                class="w-5 h-5"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div>
    {{ $articles->links() }}
</div>
