<x-admin-layout 
    title="Soporte | Nuevo Ticket"
    :breadcrumbs="[
        [
            'name' => 'Dashboard',
            'href' => route('admin.dashboard'),
        ],
        [
            'name' => 'Soporte',
            'href' => route('support.index'),
        ],
        [
            'name' => 'Nuevo Ticket',
        ],
    ]">

    <div class="bg-white border border-gray-200 shadow-sm rounded-xl p-6 lg:p-8 dark:bg-slate-900 dark:border-slate-800">
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                Reportar un problema
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                Describe tu problema o duda y nuestro equipo de soporte se pondrá en contacto contigo.
            </p>
        </div>

        <form action="{{ route('support.store') }}" method="POST">
            @csrf
            
            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Título del problema
                </label>
                <input type="text" id="title" name="title" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-800 dark:border-slate-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="">
                @error('title')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Descripción detallada
                </label>
                <textarea id="description" name="description" rows="5" required
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-800 dark:border-slate-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder=""></textarea>
                @error('description')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-x-4">
                <a href="{{ route('support.index') }}"
                    class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                    Cancelar
                </a>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Enviar Ticket
                </button>
            </div>
        </form>
    </div>

</x-admin-layout>
