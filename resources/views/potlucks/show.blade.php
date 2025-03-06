<x-app-layout>


    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">{{ $potluck->name }} - {{ $potluck->date }}</h1>
        <a href="{{ route('items.create', $potluck) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Add Item</a>
        <a href="{{ route('categories.create') }}" class="bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Add Category</a>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Item</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Category</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Added By</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($potluck->items as $item)
                        <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
                            <td class="px-6 py-4 whitespace-no-wrap">{{ $item->name }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap">{{ $item->category->name }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap">{{ $item->user->name }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap">{{ $item->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <a href="{{ route('potlucks.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mt-4 inline-block">Back to Potlucks</a>
    </div>
</x-app-layout>
