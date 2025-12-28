@extends('admin.layouts.app')

@section('head')
<!-- Alpine.js CDN for conditional logic -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection

@section('body')
<div class="max-w-screen-2xl mx-auto p-6 bg-white rounded-xl shadow-md mt-10" x-data="{ dealDone: false, amcYes: false }">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2">Add New Client</h2>

    <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Client Name<span class="text-red-500">*</span></label>
            <input type="text" name="name" id="name" required class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        <!-- Email & Phone -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" name="phone" id="phone" class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
        </div>

        <!-- Project Name -->
        <div>
            <label for="project_name" class="block text-sm font-medium text-gray-700">Project Name</label>
            <input type="text" name="project_name" id="project_name" class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2">
        </div>

        <!-- Quotation PDF -->
        <div>
            <label for="quotation_file" class="block text-sm font-medium text-gray-700">Quotation PDF</label>
            <input type="file" name="quotation_file" id="quotation_file" accept="application/pdf" class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2">
        </div>

        <!-- Deal Done -->
        <div class="flex items-center space-x-2">
            <input type="checkbox" name="deal_done" id="deal_done" value="1" class="w-5 h-5 text-blue-600 border-gray-300 rounded" x-model="dealDone">
            <label for="deal_done" class="text-sm text-gray-700">Deal Done</label>
        </div>

        <!-- Deal Done Details -->
        <template x-if="dealDone">
            <div class="p-6 bg-gray-50 border rounded-lg space-y-6 mt-4">
                <!-- Referred Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="referred_by_name" class="block text-sm font-medium text-gray-700">Referred By (Name)</label>
                        <input type="text" name="referred_by_name" id="referred_by_name" class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2">
                    </div>
                    <div>
                        <label for="referred_by_phone" class="block text-sm font-medium text-gray-700">Referred By (Phone)</label>
                        <input type="text" name="referred_by_phone" id="referred_by_phone" class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2">
                    </div>
                </div>

                <!-- Bank Account -->
                <div>
                    <label for="bank_account" class="block text-sm font-medium text-gray-700">Bank Account Details</label>
                    <input type="text" name="bank_account" id="bank_account" class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2">
                </div>

                <!-- Start & Due Date -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                        <input type="date" name="start_date" id="start_date" class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2">
                    </div>
                    <div>
                        <label for="due_date" class="block text-sm font-medium text-gray-700">Due Date</label>
                        <input type="date" name="due_date" id="due_date" class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2">
                    </div>
                </div>


                <!-- Commission / Price Section -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="project_commission" class="block text-sm font-medium text-gray-700">Project Commission (%)</label>
                        <input type="number" name="project_commission" id="project_commission" step="0.01" class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2">
                    </div>
                    <div>
                        <label for="project_price" class="block text-sm font-medium text-gray-700">Project Price</label>
                        <input type="number" name="project_price" id="project_price" step="0.01" class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2">
                    </div>
                    <div>
                        <label for="final_price" class="block text-sm font-medium text-gray-700">Final Price</label>
                        <input type="number" name="final_price" id="final_price" step="0.01" class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2">
                    </div>
                </div>

                <!-- Priority & Status -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="priority" class="block text-sm font-medium text-gray-700">Priority</label>
                        <select name="priority" id="priority" class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2">
                            <option value="Low">Low</option>
                            <option value="Medium" selected>Medium</option>
                            <option value="High">High</option>
                        </select>
                    </div>
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" id="status" class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2">
                            <option value="Not Started">Not Started</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>
                </div>


                <!-- AMC -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="amc" class="block text-sm font-medium text-gray-700">AMC</label>
                        <select name="amc" id="amc" class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2" x-model="amcYes">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <template x-if="amcYes == 1">
                        <div>
                            <label for="amc_price" class="block text-sm font-medium text-gray-700">AMC Price</label>
                            <input type="number" name="amc_price" id="amc_price" class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2">
                        </div>
                    </template>
                </div>

                <!-- Reference Website -->
                <div>
                    <label for="reference_website" class="block text-sm font-medium text-gray-700">Reference Website Link</label>
                    <input type="url" name="reference_website" id="reference_website" class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2">
                </div>
            </div>
        </template>

        <!-- Remarks -->
        <div>
            <label for="remarks" class="block text-sm font-medium text-gray-700">Remarks</label>
            <textarea name="remarks" id="remarks" rows="3" class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2"></textarea>
        </div>

        <!-- Submit Button -->
        <div class="text-right">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-200">
                Save Client
            </button>
        </div>
    </form>
</div>
@endsection
