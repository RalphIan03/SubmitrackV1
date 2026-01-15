@extends('layouts.mainLayout')

@section('content')
<div class="space-y-6">

    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-maroon">User Management</h1>
            <p class="text-gray-600 text-sm">
                Manage system users, roles, and access.
            </p>
        </div>

        <button onclick="openModal()"
            class="bg-maroon-500 text-white px-5 py-2 rounded-lg hover:bg-gold-500 hover:text-maroon transition">
            + Add New User
        </button>
    </div>

    <!-- Users Table -->
    <div class="bg-white rounded-xl shadow overflow-hidden">

        <table class="w-full text-sm">
            <thead class="bg-gray-100 text-gray-600">
                <tr>
                    <th class="px-4 py-3 text-left">Username</th>
                    <th class="px-4 py-3 text-left">Faculty Name</th>
                    <th class="px-4 py-3 text-left">Department</th>
                    <th class="px-4 py-3 text-left">Role</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($userList as $user)
                <tr>
                    <td class="px-4 py-3">{{$user->sys_username}}</td>
                    <td class="px-4 py-3">{{$user->sys_name}}</td>
                    <td class="px-4 py-3">{{$user->sys_dept}}</td>
                    <td class="px-4 py-3">
                        @if($user->sys_role == 'Faculty')
                        <span class="bg-gold-500 text-gold px-3 py-1 rounded-full text-xs font-medium">
                            {{$user->sys_role}}
                        </span>
                        @elseif($user->sys_role == 'Admin')
                        <span class="bg-maroon-500 text-white px-3 py-1 rounded-full text-xs font-medium">
                            {{$user->sys_role}}
                        </span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-center space-x-2">
                        <button class="text-blue-600 hover:underline"
                            data-user='@json($user)'
                            onclick="openViewModal(this)">View</button>
                        <button class="text-red-600 hover:underline">Delete</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="p-3 text-center text-gray-500" colspan="5">No user information is retrieved</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{$userList->appends(request()->query())->links() }}
    </div>

    @if($errors->any())

    <div class="bg-red-500 p-1 rounded-2xl">
        <p class="my-2 text-white">Invalid input</p>
        <ul>
            @foreach($errors->all() as $error)
            <li class="my-2 text-white">{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

<!-- Add User Modal -->
<div id="userModal"
    class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div class="bg-white rounded-xl shadow-xl w-full max-w-lg p-6">

        <h2 class="text-xl font-bold text-maroon mb-4">
            Add New User
        </h2>

        <form class="space-y-4" method="POST" action="{{route('adduser')}} " enctype="multipart/form-data">
            @csrf
            <!-- Username -->
            <div>
                <label class="block text-sm font-medium">Username</label>
                <input type="text" name="sys_username"
                    class="w-full border rounded-lg px-4 py-2 focus:ring-gold focus:border-gold"
                    required>
            </div>

            <!-- Faculty Name -->
            <div>
                <label class="block text-sm font-medium">Faculty Name</label>
                <input type="text" name="sys_name"
                    class="w-full border rounded-lg px-4 py-2 focus:ring-gold focus:border-gold"
                    required>
            </div>

            <!-- Department -->
            <div>
                <label class="block text-sm font-medium">Department</label>
                <select name="sys_dept" id="" class="w-full border rounded-lg px-4 py-2 focus:ring-gold focus:border-gold">
                    <option value="DBA">DBA</option>
                    <option value="DTE">DTE</option>
                    <option value="DTP">DTP</option>
                    <option value="DAS">DAS</option>
                    <option value="DAE">DAE</option>
                    <option value="DHE">DHE</option>
                </select>
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium">Password</label>
                <input type="password" name="sys_password"
                    class="w-full border rounded-lg px-4 py-2 focus:ring-gold focus:border-gold"
                    required>
            </div>

            <!-- Role -->
            <div>
                <label class="block text-sm font-medium">Role</label>
                <select name="sys_role"
                    class="w-full border rounded-lg px-4 py-2 focus:ring-gold focus:border-gold">
                    <option value="Faculty">Faculty</option>
                    <option value="Admin">Admin</option>
                </select>
            </div>

            <!-- Actions -->
            <div class="flex justify-end gap-3 pt-4">
                <button type="button"
                    onclick="closeModal()"
                    class="px-4 py-2 rounded-lg border">
                    Cancel
                </button>
                <button type="submit"
                    class="bg-maroon-500 text-white px-6 py-2 rounded-lg hover:bg-gold-500 hover:text-maroon transition">
                    Save User
                </button>
            </div>

        </form>
    </div>
</div>

<!-- View / Edit User Modal -->
<div id="viewModal"
    class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div class="bg-white rounded-xl shadow-xl w-full max-w-lg p-6">

        <h2 id="viewModalTitle" class="text-xl font-bold text-maroon mb-4">
            View User
        </h2>

        <form id="viewForm" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" id="v_user_id">

            <div class="space-y-4">

                <!-- Username -->
                <div>
                    <label class="block text-sm font-medium">Username</label>
                    <input type="text" id="v_sys_username" name="sys_username"
                        class="w-full border rounded-lg px-4 py-2"
                        readonly>
                </div>

                <!-- Faculty Name -->
                <div>
                    <label class="block text-sm font-medium">Faculty Name</label>
                    <input type="text" id="v_sys_name" name="sys_name"
                        class="w-full border rounded-lg px-4 py-2"
                        readonly>
                </div>

                <!-- Department -->
                <div>
                    <label class="block text-sm font-medium">Department</label>
                    <select id="v_sys_dept" name="sys_dept"
                        class="w-full border rounded-lg px-4 py-2" disabled>
                        <option>DBA</option>
                        <option>DTE</option>
                        <option>DTP</option>
                        <option>DAS</option>
                        <option>DAE</option>
                        <option>DHE</option>
                    </select>
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium">Password</label>
                    <div class="relative">
                        <input type="password" id="v_sys_password"
                            class="w-full border rounded-lg px-4 py-2 pr-12"
                            value="********" readonly>
                        <button type="button"
                            onclick="togglePassword()"
                            class="absolute inset-y-0 right-3 text-sm text-gray-500">
                            Show
                        </button>
                    </div>
                </div>

                <!-- Role -->
                <div>
                    <label class="block text-sm font-medium">Role</label>
                    <select id="v_sys_role" name="sys_role"
                        class="w-full border rounded-lg px-4 py-2" disabled>
                        <option>Faculty</option>
                        <option>Admin</option>
                    </select>
                </div>

                <!-- Actions -->
                <div class="flex justify-between items-center pt-4">

                    <button type="button"
                        id="editToggleBtn"
                        onclick="enableEditMode()"
                        class="text-sm text-maroon hover:underline">
                        Edit Information
                    </button>

                    <div class="flex gap-3">
                        <button type="button"
                            onclick="closeViewModal()"
                            class="px-4 py-2 rounded-lg border">
                            Close
                        </button>

                        <button type="submit"
                            id="saveChangesBtn"
                            class="hidden bg-maroon-500 text-white px-4 py-2 rounded-lg">
                            Save Changes
                        </button>
                    </div>

                </div>

            </div>
        </form>
    </div>
</div>



<!-- Modal Script -->
<script>
    function openModal() {
        document.getElementById('userModal').classList.remove('hidden');
        document.getElementById('userModal').classList.add('flex');
    }

    function closeModal() {
        document.getElementById('userModal').classList.add('hidden');
        document.getElementById('userModal').classList.remove('flex');
    }
</script>

<script>
    function openViewModal(button) {
        const user = JSON.parse(button.dataset.user);

        document.getElementById('viewModal').classList.remove('hidden');
        document.getElementById('viewModal').classList.add('flex');

        document.getElementById('viewModalTitle').innerText = 'View User';
        document.getElementById('saveChangesBtn').classList.add('hidden');
        document.getElementById('editToggleBtn').classList.remove('hidden');

        // Populate fields safely
        document.getElementById('v_user_id').value = user.id;
        document.getElementById('v_sys_username').value = user.sys_username;
        document.getElementById('v_sys_name').value = user.sys_name;
        document.getElementById('v_sys_dept').value = user.sys_dept;
        document.getElementById('v_sys_role').value = user.sys_role;

        // Never show real password
        document.getElementById('v_sys_password').value = '********';

        // Set form action
        document.getElementById('viewForm').action = `/users/${user.id}`;

        setReadOnly(true);
    }

    function enableEditMode() {
        document.getElementById('viewModalTitle').innerText = 'Edit User';
        document.getElementById('saveChangesBtn').classList.remove('hidden');
        document.getElementById('editToggleBtn').classList.add('hidden');

        setReadOnly(false);
    }

    function setReadOnly(state) {
        document.querySelectorAll('#viewForm input').forEach(i => i.readOnly = state);
        document.querySelectorAll('#viewForm select').forEach(s => s.disabled = state);
    }

    function togglePassword() {
        const input = document.getElementById('v_sys_password');
        input.type = input.type === 'password' ? 'text' : 'password';
    }

    function closeViewModal() {
        document.getElementById('viewModal').classList.add('hidden');
        document.getElementById('viewModal').classList.remove('flex');
    }
</script>


@endsection