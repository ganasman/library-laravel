<x-app-layout>
    <div class="container mx-auto px-4 py-8 lg:pl-64">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Daftar Buku</h2>

        <div class="relative overflow-x-auto shadow-lg sm:rounded-lg border border-gray-200 dark:border-gray-700">
            <table class="w-full text-sm text-gray-600 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-800 dark:text-gray-300">
                    <tr>
                        <th scope="col" class="px-6 py-4">Judul Buku</th>
                        <th scope="col" class="px-6 py-4">Penulis</th>
                        <th scope="col" class="px-6 py-4">Stok</th>
                        <th scope="col" class="px-6 py-4">Tahun Terbit</th>
                        <th scope="col" class="px-6 py-4">Kategori</th>
                        <th scope="col" class="px-6 py-4">Status</th>
                        <th scope="col" class="px-6 py-4">Deskripsi</th>
                        <th scope="col" class="px-6 py-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($books as $book)
                        <tr class="bg-white hover:bg-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800">
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                {{ $book->judul }}
                            </td>
                            <td class="px-6 py-4">{{ $book->penulis }}</td>
                            <td class="px-6 py-4">{{ $book->stok }}</td>
                            <td class="px-6 py-4">{{ $book->terbit }}</td>
                            <td class="px-6 py-4">{{ $book->kategori }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 rounded-full text-xs font-semibold 
                                    {{ $book->status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ $book->status ? 'Tersedia' : 'Tidak Tersedia' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 truncate" style="max-width: 150px;">
                                {{ $book->deskripsi }}
                            </td>
                            <td class="px-6 py-4 flex space-x-4">
                                <a href="{{ route('books.edit', $book->id) }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-500 dark:hover:text-blue-300 font-medium">Edit</a>

                                <!-- Delete Button -->
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this book?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 dark:text-red-500 dark:hover:text-red-300 font-medium">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
