<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devotee Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
            /* Smaller font size for thermal label */
            margin: 0;
            padding: 0;
        }

        @page {
            size: 58mm 100mm;
            /* Width: 58mm, Height: 100mm */
            margin: 0;
            /* Remove margin for thermal printing */
        }

        /* Container for donor details */
        .donor-list {
            padding: 3mm;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            gap: 5mm;
            page-break-before: always;
            /* Ensure each chunk starts on a new page */
        }

        .donor {
            width: 100%;
            /* Full width of the label */
            border: 1px solid #000;
            padding: 2mm;
            box-sizing: border-box;
            font-size: 8px;
            /* Smaller font size */
            word-wrap: break-word;
            text-align: left;
            line-height: 1.3;
            /* Adjust line height to ensure proper spacing */
        }

        .donor h3 {
            margin: 0;
            font-size: 9px;
            font-weight: bold;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            /* Prevent name from overflowing */
        }

        .donor p {
            margin: 2px 0;
            font-size: 8px;
            /* Ensure text fits within label */
        }

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 6px;
            padding: 2mm;
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

            .donor-list {
                padding: 0;
                /* Remove padding to save space */
            }

            .footer {
                position: fixed;
                bottom: 0;
                width: 100%;
                font-size: 6px;
            }

            /* Control page break for each donor's content */
            .donor {
                page-break-inside: avoid;
            }

            /* Ensure the donor list doesn’t break across pages */
            .donor-list {
                display: block;
            }

            /* Start a new page after every 3 donors */
            .donor:nth-child(4n+1) {
                page-break-before: always;
            }
        }
    </style>
</head>

<body>
    <div class="donor-list">
        @foreach ($donors->chunk(4) as $donorChunk)
            @foreach ($donorChunk as $donor)
                <div class="donor">
                    <h3>{{ $donor->name }}</h3>
                    <p>{{ $donor->address1 }},</p>
                    <p>{{ $donor->address2 }},</p>
                    <p>{{ $donor->city }},</p>
                    <p>{{ Str::before($donor->district, '_') . ', ' . $donor->state . ' - ' . $donor->pincode }}</p>
                    <p>Phone: {{ $donor->phone_details }}</p>
                </div>
            @endforeach
        @endforeach
    </div>

    <!-- Print Button -->

    <button class="print-btn" onclick="window.print();">Thermal label Print Address</button>



</body>

</html>
