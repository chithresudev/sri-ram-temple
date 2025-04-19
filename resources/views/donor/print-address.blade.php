<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devotee Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }

        @page {
            size: A4;
            margin: 20mm;
        }

        .donor-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
        }

        .donor {
            width: 48%;
            border: 1px solid #000;
            padding: 10px;
            box-sizing: border-box;
            page-break-inside: avoid;
            /* Prevent donor details from breaking across pages */
        }

        .donor h3 {
            margin-top: 0;
            font-size: 14px;
        }

        .donor p {
            margin: 5px 0;
        }

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 10px;
            padding: 10px;
        }

        /* Print Button */
        .print-btn {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 5px;
        }

        .print-btn:hover {
            background-color: #0056b3;
        }

        /* Hide the print button when printing */
        @media print {
            .print-btn {
                display: none;
            }

            /* Ensure the donor-list fills the page */
            .donor-list {
                display: block;
                padding-bottom: 50px;
                /* Optional space to prevent footer overlap */
            }

            /* Control the number of donor items per page */
            .donor:nth-child(10),
            .donor:nth-child(11),
            .donor:nth-child(12) {
                page-break-before: always;
                /* Create a new page after every 10-12 donors */
            }
        }
    </style>
</head>

<body>
    <div class="donor-list">
        @foreach ($donors->chunk(3) as $donorChunk)
            <div style="width: 100%; display: flex; justify-content: space-between; margin-bottom: 20px;">
                @foreach ($donorChunk as $donor)
                    <div class="donor">
                        <h3>{{ $donor->name }}</h3>

                        <p>{{ $donor->address1 }},</p>
                        <p>{{ $donor->address2 }},</p>
                        <p>{{ $donor->city }},</p>
                        <p>{{ Str::before($donor->district, '_') . ', ' . $donor->state . ' - ' . $donor->pincode . ' - ' . $donor->country }}
                        </p>
                        <p>Phone: {{ $donor->phone_details }}</p>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

    <!-- Print Button -->
    <button class="print-btn" onclick="window.print();">Print Donor Details</button>


</body>

</html>
