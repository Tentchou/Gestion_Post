<x-default-layout title="Gestion des Posts">

    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Posts</h1>
            <p class="mt-2 text-sm text-gray-700">Interface d'administration du blog.</p>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <a href="{{ route('admin.posts.create') }}" class="inline-flex rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Créer un post</a>
        </div>
    </div>

    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-300 border-solid ">
                    <thead>
                        <tr class="border-solid border-1 bg-white-100">
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">Images publiees</th>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-bold text-black-900 sm:pl-3 ">Titre</th>
                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-bold text-black-900">Actions</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"></th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">

                        @foreach ($posts as $post)

                        <tr class="even:bg-gray-50 bg-blue-100">
                            <td  class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">
                                <img src="{{ asset('storage/'.$post->thumbnail) }}" alt="Thumbnail" class="rounded-full w-20 h-20 object-cover">
                            </td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $post->title }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                <a href="{{ route('posts.show', $post->id) }}" target="_blank" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                                    Voir le post
                                </a>
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                <a href="{{ route('admin.posts.edit', ['post'=>$post]) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                                    Editer
                                </a>
                            </td>
                            <td x-data class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-3">
                                <a href="{{ route('admin.posts.destroy', ['post'=>$post])  }}" @click.prevent="$refs.delete.submit()" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                                    Supprimer
                                </a>
                                <form x-ref="delete" action="{{ route('admin.posts.destroy', ['post'=>$post])  }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-default-layout>
