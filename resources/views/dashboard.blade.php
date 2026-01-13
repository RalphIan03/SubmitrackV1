@extends('layouts.mainLayout')

@section('content')
<div class="min-h-screen bg-gray-50 p-6">

    <!-- 1️⃣ Welcome Section -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-maroon">
            Welcome back, Administrator 👋
        </h1>
        <p class="text-gray-600 mt-1">
            Here’s an overview of today’s examination activities.
        </p>
    </div>

    <!-- 2️⃣ Counters Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

        <!-- Card -->
        <div class="bg-white rounded-xl shadow p-6 border-l-4 border-maroon">
            <h3 class="text-sm text-gray-500">Total Exams</h3>
            <p class="text-3xl font-bold text-maroon mt-2">128</p>
        </div>

        <div class="bg-white rounded-xl shadow p-6 border-l-4 border-gold">
            <h3 class="text-sm text-gray-500">Submissions Today</h3>
            <p class="text-3xl font-bold text-gold mt-2">42</p>
        </div>

        <div class="bg-white rounded-xl shadow p-6 border-l-4 border-maroon">
            <h3 class="text-sm text-gray-500">Pending Reviews</h3>
            <p class="text-3xl font-bold text-maroon mt-2">17</p>
        </div>

        <div class="bg-white rounded-xl shadow p-6 border-l-4 border-gold">
            <h3 class="text-sm text-gray-500">Registered Students</h3>
            <p class="text-3xl font-bold text-gold mt-2">1,254</p>
        </div>

    </div>

    <!-- 3️⃣ Main Content Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Recent Exam Submissions -->
        <div class="lg:col-span-2 bg-white rounded-xl shadow p-6">
            <h2 class="text-lg font-semibold text-maroon mb-4">
                Recent Exam Submissions
            </h2>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-left text-gray-500 border-b">
                            <th class="pb-2">Student</th>
                            <th class="pb-2">Exam</th>
                            <th class="pb-2">Date</th>
                            <th class="pb-2">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <tr class="border-b">
                            <td class="py-2">Juan Dela Cruz</td>
                            <td>Midterm – IT101</td>
                            <td>Jan 12, 2026</td>
                            <td>
                                <span class="px-3 py-1 rounded-full text-xs bg-gold/20 text-gold font-medium">
                                    Submitted
                                </span>
                            </td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2">Maria Santos</td>
                            <td>Final – CS202</td>
                            <td>Jan 12, 2026</td>
                            <td>
                                <span class="px-3 py-1 rounded-full text-xs bg-maroon/20 text-maroon font-medium">
                                    Pending
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2">Pedro Reyes</td>
                            <td>Quiz – SE301</td>
                            <td>Jan 11, 2026</td>
                            <td>
                                <span class="px-3 py-1 rounded-full text-xs bg-green-100 text-green-700 font-medium">
                                    Reviewed
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-xl shadow p-6">
            <h2 class="text-lg font-semibold text-maroon mb-4">
                Quick Actions
            </h2>

            <div class="space-y-3">
                <a href="#" class="block w-full text-center bg-maroon text-white py-2 rounded-lg hover:bg-gold hover:text-maroon transition">
                    Create New Exam
                </a>
                <a href="#" class="block w-full text-center bg-gold text-maroon py-2 rounded-lg hover:bg-maroon hover:text-white transition">
                    View Submissions
                </a>
                <a href="#" class="block w-full text-center border border-maroon text-maroon py-2 rounded-lg hover:bg-maroon hover:text-white transition">
                    Manage Users
                </a>
            </div>
        </div>

    </div>

</div>
@endsection