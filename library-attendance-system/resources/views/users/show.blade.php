<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi User</h3>
                    <dl class="space-y-3">
                        <div class="flex">
                            <dt class="font-medium text-gray-700 w-40">Nama:</dt>
                            <dd class="text-gray-900">{{ $user->name }}</dd>
                        </div>
                        <div class="flex">
                            <dt class="font-medium text-gray-700 w-40">Email:</dt>
                            <dd class="text-gray-900">{{ $user->email }}</dd>
                        </div>
                        <div class="flex">
                            <dt class="font-medium text-gray-700 w-40">Role:</dt>
                            <dd>
                                @if($user->role === 'administrator')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">Administrator</span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Petugas</span>
                                @endif
                            </dd>
                        </div>
                        <div class="flex">
                            <dt class="font-medium text-gray-700 w-40">Dibuat:</dt>
                            <dd class="text-gray-900">{{ $user->created_at->format('d/m/Y H:i') }}</dd>
                        </div>
                        <div class="flex">
                            <dt class="font-medium text-gray-700 w-40">Terakhir Diupdate:</dt>
                            <dd class="text-gray-900">{{ $user->updated_at->format('d/m/Y H:i') }}</dd>
                        </div>
                    </dl>

                    <div class="mt-6">
                        <a href="{{ route('users.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Kembali
                        </a>
                        <a href="{{ route('users.edit', $user) }}" class="inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700 focus:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
