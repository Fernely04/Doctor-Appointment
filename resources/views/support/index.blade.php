<x-admin-layout 
    title="Soporte | MediLink"
    :breadcrumbs="[
        [
            'name' => 'Dashboard',
            'href' => route('admin.dashboard'),
        ],
        [
            'name' => 'Soporte',
        ],
    ]">

    <div class="flex items-center justify-end mb-4">
        <a href="{{ route('support.create') }}" 
           class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Nuevo Ticket
        </a>
    </div>

    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-slate-800 dark:text-green-400" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-slate-800 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        USUARIO
                    </th>
                    <th scope="col" class="px-6 py-3">
                        TÍTULO
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ESTADO
                    </th>
                    <th scope="col" class="px-6 py-3">
                        FECHA
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tickets as $ticket)
                    <tr class="bg-white border-b dark:bg-slate-900 dark:border-slate-800 hover:bg-gray-50 dark:hover:bg-slate-800">
                        <td class="px-6 py-4">
                            #{{ $ticket->id }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ optional($ticket->user)->name ?? 'N/A' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $ticket->title }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($ticket->status === 'Abierto')
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">
                                    {{ $ticket->status }}
                                </span>
                            @else
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300">
                                    {{ $ticket->status }}
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            {{ $ticket->created_at->format('d/m/Y H:i') }}
                        </td>
                    </tr>
                @empty
                    <tr class="bg-white dark:bg-slate-900">
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                            No hay tickets registrados.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-admin-layout>
