@extends('admin.layouts.app')

@section('page-title', 'User')
@section('title', 'Blog Farrel | User')

@section('content')
<div class="p-6 max-w-6xl mx-auto" x-data="{ open: false, user: {}, updateUrl: '' }">
    <div class="bg-[#EBE5C2] p-6 rounded-xl shadow-md">
        <h2 class="text-2xl font-semibold text-[#3d3928] mb-6">Daftar User</h2>

        <div class="overflow-x-auto rounded-lg shadow-md">
            <table class="min-w-full text-left rounded-lg shadow-lg">
                <thead class="bg-[#B9B28A] text-[#3d3928]">
                    <tr>
                        <th class="py-3 px-4">No</th>
                        <th class="py-3 px-4">Nama</th>
                        <th class="py-3 px-4">Email</th>
                        <th class="py-3 px-4">Role</th>
                        <th class="py-3 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-[#F8F3D9] text-[#504B38]">
                    @forelse ($users as $index => $user)
                        <tr class="hover:bg-[#e2dbb3] transition">
                            <td class="py-3 px-4">{{ $index + 1 }}</td>
                            <td class="py-3 px-4">{{ $user->username }}</td>
                            <td class="py-3 px-4">{{ $user->email }}</td>
                            <td class="py-3 px-4 capitalize">{{ $user->role ?? 'user' }}</td>
                            <td class="py-3 px-4 text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="#" 
                                        @click.prevent="
                                            open = true;
                                            user = {{ $user->toJson() }};
                                            updateUrl = '{{ route('admin.user.update', $user->id) }}';
                                        " 
                                        class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500 text-sm">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 italic text-gray-600">
                                Tidak ada data user.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Modal Edit -->
        <div x-show="open" class="fixed inset-0 bg-black/30 flex items-center justify-center z-50">
            <div @click.away="open = false" class="bg-[#EBE5C2] p-6 rounded-xl shadow-lg w-full max-w-md">
                <h2 class="text-xl font-semibold mb-4 text-gray-700">Edit User</h2>
                <form :action="updateUrl" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block mb-1 text-sm text-gray-600">Username</label>
                        <input type="text" name="username" x-model="user.username" class="w-full border p-2 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1 text-sm text-gray-600">Email</label>
                        <input type="email" name="email" x-model="user.email" class="w-full border p-2 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1 text-sm text-gray-600">Role</label>
                        <select name="role" x-model="user.role" class="w-full border p-2 rounded" required>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="flex justify-end gap-2">
                        <button type="button" @click="open = false" class="px-4 py-2 shadow-sm font-medium text-[#504B38] bg-[#B9B28A] rounded hover:bg-[#EBE5C2]">Batal</button>
                        <button type="submit" class="px-4 py-2 shadow-sm font-medium bg-[#504B38] text-[#F8F3D9] rounded hover:bg-[#504b38af] hover:text-[#fffcec]">Update</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-6 flex justify-center">
            {{ $users->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</div>
@endsection
