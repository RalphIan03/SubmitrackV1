<!-- Delete User Modal -->
<div id="deleteModal"
    class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-6">

        <h2 class="text-xl font-bold text-red-600 mb-3">
            Delete <span id="deleteUsername" class="font-semibold"></span>
        </h2>

        <p class="text-gray-700 mb-4">
            You are about to delete a subject, do you want to proceed?
        </p>

        <p class="text-sm text-gray-500 mb-6">
            This action cannot be undone.
        </p>

        <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')

            <div class="flex justify-end gap-3">
                <button type="button"
                    onclick="closeDeleteModal()"
                    class="px-4 py-2 rounded-lg border">
                    Cancel
                </button>

                <button type="submit"
                    class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                    Yes, Delete
                </button>
            </div>
        </form>

    </div>
</div>

<script>
    function openDeleteModal(button) {
        const userId = button.dataset.userId;
        const whereDelete = button.dataset.whereDelete;

        console.log(button.dataset);

        document.getElementById('deleteUsername').innerText = whereDelete;

        // Set form action dynamically
        document.getElementById('deleteForm').action = `/users/${userId}`;

        document.getElementById('deleteModal').classList.remove('hidden');
        document.getElementById('deleteModal').classList.add('flex');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
        document.getElementById('deleteModal').classList.remove('flex');
    }
</script>