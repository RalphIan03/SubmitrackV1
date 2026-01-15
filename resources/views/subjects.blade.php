@extends('layouts.mainLayout')

@section('content')
<div class="space-y-6">

    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-maroon">Subject Management</h1>
            <p class="text-gray-600 text-sm">
                Manage class subjects.
            </p>
        </div>
        <button onclick="openModal()"
            class="bg-maroon-500 text-white px-5 py-2 rounded-lg hover:bg-gold-500 hover:text-maroon transition">
            + Add New Subject
        </button>
    </div>

    <!-- Users Table -->
    <div class="bg-white rounded-xl shadow overflow-hidden">

        <table class="w-full text-sm">
            <thead class="bg-gray-100 text-gray-600">
                <tr>
                    <th class="px-4 py-3 text-left">Subject Code</th>
                    <th class="px-4 py-3 text-left">Subject Name</th>
                    <th class="px-4 py-3 text-left">Department</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                <tr>
                    <td class="px-4 py-3">jdelacruz</td>
                    <td class="px-4 py-3">Juan Dela Cruz</td>
                    <td class="px-4 py-3">IT Department</td>
                    <td class="px-4 py-3 text-center space-x-2">
                        <button class="text-blue-600 hover:underline">View</button>
                        <button class="text-maroon hover:underline">Edit</button>
                        <button class="text-red-600 hover:underline">Delete</button>
                    </td>
                </tr>

                <tr>
                    <td class="px-4 py-3">msantos</td>
                    <td class="px-4 py-3">Maria Santos</td>
                    <td class="px-4 py-3">CS Department</td>
                    <td class="px-4 py-3 text-center space-x-2">
                        <button class="text-blue-600 hover:underline">View</button>
                        <button class="text-maroon hover:underline">Edit</button>
                        <button class="text-red-600 hover:underline">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</div>

<!-- Add User Modal -->
<div id="userModal"
    class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div class="bg-white rounded-xl shadow-xl w-full max-w-lg p-6">

        <h2 class="text-xl font-bold text-maroon mb-4">
            Add New Subject
        </h2>

        <form class="space-y-4">

            <!-- Username -->
            <div>
                <label class="block text-sm font-medium">Subject Code</label>
                <input type="text" name="sub_code"
                    class="w-full border rounded-lg px-4 py-2 focus:ring-gold focus:border-gold"
                    required>
            </div>

            <!-- Faculty Name -->
            <div>
                <label class="block text-sm font-medium">Subject Name</label>
                <input type="text" name="sub_name"
                    class="w-full border rounded-lg px-4 py-2 focus:ring-gold focus:border-gold"
                    required>
            </div>

            <!-- Department -->
            <div>
                <label class="block text-sm font-medium">Department</label>
                <select name="sub_department" id="" class="w-full border rounded-lg px-4 py-2 focus:ring-gold focus:border-gold">
                    <option value="DBA">DBA</option>
                    <option value="DTE">DTE</option>
                    <option value="DTP">DTP</option>
                    <option value="DAS">DAS</option>
                    <option value="DAE">DAE</option>
                    <option value="DHE">DHE</option>
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
@endsection