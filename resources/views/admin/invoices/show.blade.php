@extends('admin.layouts.app')

@section('body')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-900">Invoice Details</h3>
            <div class="flex space-x-2">
                <a href="{{ route('admin.invoices.edit', $invoice) }}"
                   class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit
                </a>
                <a href="{{ route('admin.invoices.pdf', $invoice) }}"
                   class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Download PDF
                </a>
                <a href="{{ route('admin.invoices.preview', $invoice) }}"
                   class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" target="_blank">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    Preview
                </a>
                <a href="{{ route('admin.invoices.index') }}"
                   class="inline-flex items-center px-3 py-2 border border-gray-300 text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back
                </a>
            </div>
        </div>

        <div class="p-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <div>
                    <h5 class="text-lg font-medium text-gray-900 mb-4">Invoice Information</h5>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="font-medium text-gray-700">Invoice Number:</span>
                                <span class="text-gray-900">{{ $invoice->invoice_number }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-medium text-gray-700">Invoice Date:</span>
                                <span class="text-gray-900">{{ $invoice->invoice_date->format('M d, Y') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-medium text-gray-700">Due Date:</span>
                                <span class="{{ $invoice->isOverdue() ? 'text-red-600' : 'text-gray-900' }}">
                                    {{ $invoice->due_date->format('M d, Y') }}
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-medium text-gray-700">Status:</span>
                                @php
                                    $statusClasses = [
                                        'draft' => 'bg-gray-100 text-gray-800',
                                        'sent' => 'bg-blue-100 text-blue-800',
                                        'paid' => 'bg-green-100 text-green-800',
                                        'overdue' => 'bg-red-100 text-red-800',
                                        'cancelled' => 'bg-yellow-100 text-yellow-800'
                                    ];
                                    $statusClass = $statusClasses[$invoice->status] ?? 'bg-gray-100 text-gray-800';
                                @endphp
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $statusClass }}">
                                    {{ ucfirst($invoice->status) }}
                                </span>
                            </div>
                            @if($invoice->payment_method)
                            <div class="flex justify-between">
                                <span class="font-medium text-gray-700">Payment Method:</span>
                                <span class="text-gray-900">{{ $invoice->payment_method }}</span>
                            </div>
                            @endif
                            @if($invoice->paid_date)
                            <div class="flex justify-between">
                                <span class="font-medium text-gray-700">Paid Date:</span>
                                <span class="text-gray-900">{{ $invoice->paid_date->format('M d, Y') }}</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div>
                    <h5 class="text-lg font-medium text-gray-900 mb-4">Client Information</h5>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="font-medium text-gray-700">Name:</span>
                                <span class="text-gray-900">{{ $invoice->client->name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-medium text-gray-700">Email:</span>
                                <span class="text-gray-900">{{ $invoice->client->email }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-medium text-gray-700">Phone:</span>
                                <span class="text-gray-900">{{ $invoice->client->phone }}</span>
                            </div>
                            @if($invoice->client->project_name)
                            <div class="flex justify-between">
                                <span class="font-medium text-gray-700">Project:</span>
                                <span class="text-gray-900">{{ $invoice->client->project_name }}</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-8">
                <h5 class="text-lg font-medium text-gray-900 mb-4">Invoice Items</h5>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unit Price</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($invoice->items as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->description }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->quantity }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $invoice->currency }} {{ number_format($item->unit_price, 2) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $invoice->currency }} {{ number_format($item->total, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-gray-50 rounded-lg p-6 mb-8">
                <div class="flex justify-end">
                    <div class="w-64">
                        <div class="flex justify-between py-2">
                            <span class="font-medium text-gray-700">Subtotal:</span>
                            <span class="text-gray-900">{{ $invoice->currency }} {{ number_format($invoice->subtotal, 2) }}</span>
                        </div>
                        <div class="flex justify-between py-2">
                            <span class="font-medium text-gray-700">VAT ({{ $invoice->vat_rate }}%):</span>
                            <span class="text-gray-900">{{ $invoice->currency }} {{ number_format($invoice->vat_amount, 2) }}</span>
                        </div>
                        <div class="flex justify-between py-2 border-t border-gray-300">
                            <span class="font-bold text-gray-900">Total:</span>
                            <span class="font-bold text-gray-900">{{ $invoice->currency }} {{ number_format($invoice->total_amount, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            @if($invoice->notes || $invoice->terms_conditions)
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                @if($invoice->notes)
                <div>
                    <h5 class="text-lg font-medium text-gray-900 mb-4">Notes</h5>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-gray-700">{{ $invoice->notes }}</p>
                    </div>
                </div>
                @endif

                @if($invoice->terms_conditions)
                <div>
                    <h5 class="text-lg font-medium text-gray-900 mb-4">Terms & Conditions</h5>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-gray-700">{{ $invoice->terms_conditions }}</p>
                    </div>
                </div>
                @endif
            </div>
            @endif

            <div class="bg-blue-50 rounded-lg p-6">
                <h5 class="text-lg font-medium text-gray-900 mb-4">Update Invoice Status</h5>
                <form action="{{ route('admin.invoices.updateStatus', $invoice) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <select name="status" id="status"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                    onchange="togglePaymentFields()">
                                <option value="draft" {{ $invoice->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="sent" {{ $invoice->status == 'sent' ? 'selected' : '' }}>Sent</option>
                                <option value="paid" {{ $invoice->status == 'paid' ? 'selected' : '' }}>Paid</option>
                                <option value="overdue" {{ $invoice->status == 'overdue' ? 'selected' : '' }}>Overdue</option>
                                <option value="cancelled" {{ $invoice->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>
                        <div id="payment-method-field" style="display: none;">
                            <label for="payment_method" class="block text-sm font-medium text-gray-700 mb-2">Payment Method</label>
                            <input type="text" name="payment_method" id="payment_method"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                   value="{{ $invoice->payment_method }}">
                        </div>
                        <div id="paid-date-field" style="display: none;">
                            <label for="paid_date" class="block text-sm font-medium text-gray-700 mb-2">Paid Date</label>
                            <input type="date" name="paid_date" id="paid_date"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                   value="{{ $invoice->paid_date ? $invoice->paid_date->format('Y-m-d') : '' }}">
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Update Status
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function togglePaymentFields() {
    const status = document.getElementById('status').value;
    const paymentMethodField = document.getElementById('payment-method-field');
    const paidDateField = document.getElementById('paid-date-field');

    if (status === 'paid') {
        paymentMethodField.style.display = 'block';
        paidDateField.style.display = 'block';
    } else {
        paymentMethodField.style.display = 'none';
        paidDateField.style.display = 'none';
    }
}

document.addEventListener('DOMContentLoaded', function() {
    togglePaymentFields();
});
</script>
@endsection
