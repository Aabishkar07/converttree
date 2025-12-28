<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice {{ $invoice->invoice_number }}</title>
    <style>
        @page {
            margin: 0;
            size: A4;
        }

        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 40px;
            color: #000;
            background: #fff;
            font-size: 12px;
            line-height: 1.4;
        }

        /* Watermark */
        .watermark {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            opacity: 0.1;
            z-index: -1;
            pointer-events: none;
        }

        .watermark-text {
            font-size: 120px;
            font-weight: 900;
            color: #6a68af;
            opacity: 0.1;
            text-align: center;
            font-family: "Montserrat", sans-serif;
            letter-spacing: -2px;
            text-shadow: 1px 0 0 #6a68af;
        }

        /* Custom Converttree font styling */
        .Converttree-logo {
            font-family: "Montserrat", sans-serif;
            font-weight: 900;
            font-size: 52px;
            color: #6a68af;
            /* letter-spacing: -1px; */
            text-transform: lowercase;
            text-shadow: 0.5px 0 0 #6a68af;
        }

        .Converttree-logo .connected {
            position: relative;
        }

        .Converttree-logo .connected::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: #6a68af;
        }

        /* Header */
        .header {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 40px;
        }

        .invoice-title {
            font-size: 48px;
            font-weight: bold;
            color: #000;
            margin: 0;
            line-height: 1;
        }

        .invoice-number {
            font-size: 14px;
            color: #000;
            margin-top: 10px;
        }

        .company-logo {
            text-align: right;
        }

        .company-logo .Converttree-logo {
            margin-bottom: 10px;
        }

        .company-name {
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
        }

        /* Client and Date Section */
        .info-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
        }

        .client-info,
        .date-info {
            width: 45%;
        }

        .section-title {
            font-size: 14px;
            font-weight: bold;
            color: #000;
            margin-bottom: 15px;
            text-transform: uppercase;
        }

        .client-details,
        .date-details {
            font-size: 12px;
            line-height: 1.6;
        }

        .client-details p,
        .date-details p {
            margin: 5px 0;
        }

        /* Divider Line */
        .divider {
            height: 2px;
            background: #000;
            margin: 30px 0;
        }

        /* Items Table */
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        .items-table th {
            background: #000;
            color: #fff;
            padding: 12px 8px;
            text-align: left;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .items-table td {
            padding: 12px 8px;
            border-bottom: 1px solid #ddd;
            font-size: 11px;
        }

        .items-table tr:nth-child(even) {
            background: #f9f9f9;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        /* Totals Section */
        .totals-section {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 40px;
        }

        .totals-table {
            width: 250px;
            border-collapse: collapse;
        }

        .totals-table td {
            padding: 8px 0;
            font-size: 11px;
            border: none;
        }

        .totals-table .total-row {
            border-top: 2px solid #000;
            font-weight: bold;
            font-size: 14px;
            padding-top: 12px;
        }

        /* Footer */
        .footer {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
        }

        .payment-info,
        .thank-you {
            width: 45%;
        }

        .payment-title {
            font-size: 12px;
            font-weight: bold;
            color: #000;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .payment-details {
            font-size: 10px;
            line-height: 1.4;
        }

        .thank-you-message {
            text-align: right;
            font-size: 14px;
            font-weight: bold;
            color: #000;
            text-transform: uppercase;
        }

        /* Ensure single page */
        .page-container {
            min-height: 100vh;
            position: relative;
        }
    </style>
</head>

<body>
    <!-- Watermark -->
    <div class="watermark">
        <div class="watermark-text Converttree-logo">Converttree</div>
    </div>

    <div class="page-container">
        <!-- Header -->
        <div class="header">
            <div class="left-header">
                <h1 class="invoice-title">INVOICE</h1>
                <div class="invoice-number">INVOICE NO. {{ $invoice->invoice_number }}</div>
            </div>
            <div class="company-logo">
                <div class="Converttree-logo">Converttree</div>
                {{-- <div class="company-name">Converttree & CO.</div> --}}
            </div>
        </div>

        <!-- Client and Date Information -->
        <div class="info-section">
            <div class="client-info">
                <div class="section-title">ISSUED TO:</div>
                <div class="client-details">
                    <p><strong>{{ $invoice->client->name }}</strong></p>
                    @if ($invoice->client->address)
                        <p>{{ $invoice->client->address }}</p>
                    @endif
                    @if ($invoice->client->phone)
                        <p>Phone: {{ $invoice->client->phone }}</p>
                    @endif
                    @if ($invoice->client->email)
                        <p>Email: {{ $invoice->client->email }}</p>
                    @endif
                    @if ($invoice->client->project_name)
                        <p>Project: {{ $invoice->client->project_name }}</p>
                    @endif
                </div>
            </div>
            <div class="date-info">
                <div class="section-title">Converttree & CO.</div>
                <div class="date-details">
                    <p><strong>Issued Date:</strong> {{ $invoice->invoice_date->format('d F Y') }}</p>
                    <p><strong>Due Date:</strong> {{ $invoice->due_date->format('d F Y') }}</p>
                </div>
            </div>
        </div>

        <!-- Divider Line -->
        <div class="divider"></div>

        <!-- Items Table -->
        <table class="items-table">
            <thead>
                <tr>
                    <th>DESCRIPTION</th>
                    <th class="text-center">QTY</th>
                    <th class="text-right">PRICE</th>
                    <th class="text-right">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoice->items as $item)
                    <tr>
                        <td>{{ $item->description }}</td>
                        <td class="text-center">{{ $item->quantity }}</td>
                        <td class="text-right">{{ $invoice->currency }} {{ number_format($item->unit_price, 0) }}</td>
                        <td class="text-right">{{ $invoice->currency }} {{ number_format($item->total, 0) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Totals Section -->
        <div class="totals-section">
            <table class="totals-table">
                <tr>
                    <td><strong>Subtotal:</strong></td>
                    <td class="text-right">{{ $invoice->currency }} {{ number_format($invoice->subtotal, 0) }}</td>
                </tr>
                <tr>
                    <td><strong>Tax ({{ $invoice->vat_rate }}%):</strong></td>
                    <td class="text-right">{{ $invoice->currency }} {{ number_format($invoice->vat_amount, 0) }}</td>
                </tr>
                <tr class="total-row">
                    <td><strong>Total:</strong></td>
                    <td class="text-right"><strong>{{ $invoice->currency }}
                            {{ number_format($invoice->total_amount, 0) }}</strong></td>
                </tr>
            </table>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="payment-info">
                <div class="payment-title">PAYMENT TO:</div>
                <div class="payment-details">
                    <p><strong>Bank Name:</strong> Your Bank Name</p>
                    <p><strong>Account No.:</strong> XXXX-XXXX-XXXX</p>
                    <p><strong>Account Name:</strong> Converttree Company</p>
                </div>
            </div>
            <div class="thank-you">
                <div class="thank-you-message">THANK YOU FOR ORDERING FROM US</div>
            </div>
        </div>
    </div>
</body>

</html>
