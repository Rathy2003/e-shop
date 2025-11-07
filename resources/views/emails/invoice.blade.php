<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - Bold Minimal Exact</title>
    <!--
        Standard practice for email HTML:
        1. Use tables for layout.
        2. Use inline styles for maximum compatibility.
        3. Use a <style> block for responsive media queries.
    -->
    <style>
        /* Base Styles for Email Compatibility */
        body {
            margin: 0;
            padding: 0;
            background-color: #ffffff;
            font-family: 'Inter', Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        table {
            border-collapse: collapse;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }
        td {
            padding: 0;
        }

        /* Typography */
        /* Adjusted for bold, tight heading - slightly wider than before to match the image better */
        .h1 { font-size: 48px; font-weight: 900; letter-spacing: -1.5px; line-height: 1.0; color: #1f2937; }
        .h2 { font-size: 16px; font-weight: 700; line-height: 1.4; color: #1f2937; }
        .text-sm { font-size: 14px; line-height: 1.5; color: #374151; }
        .text-base { font-size: 16px; line-height: 1.6; color: #374151; }
        .text-label { font-size: 12px; font-weight: 400; color: #1f2937; text-transform: uppercase; }

        /* Responsive Styles (for modern clients) */
        @media only screen and (max-width: 600px) {
            .container {
                width: 100% !important;
                padding: 0 10px !important;
            }
            .totals-table {
                width: 100% !important;
            }
            /* Adjust H1 size for better fit on small screens */
            .h1 {
                font-size: 36px !important;
                letter-spacing: -1px !important;
            }
            /* Stack columns on mobile */
            .stack-on-mobile {
                display: block !important;
                width: 100% !important;
                padding-top: 20px !important;
                padding-bottom: 0 !important;
            }
            .stack-on-mobile table {
                width: 100% !important;
            }
        }
    </style>
</head>

<body style="margin: 0; padding: 0; background-color: #ffffff;">

<!-- 1. Main Wrapper Table -->
<table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff;">
    <tr>
        <td align="center" style="padding: 30px 0 0 0;">

            <!-- Invoice Content Container (Max width) -->
            <table class="container" role="presentation" width="600" cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff;">

                <!-- 2. Header Section: Logo, NO. & INVOICE Title -->
                <tr>
                    <td style="padding: 0 30px 0 30px;">
                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <!-- YOUR LOGO -->
                                <td align="left" style="padding-bottom: 30px;display: flex;align-items: center;gap: 8px;">
                                    <!-- <p class="text-label" style="font-size: 12px; color: #374151; margin: 0;">YOUR LOGO</p> -->
                                    <svg class="h-8 w-8 text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path><path d="M3 6h18"></path><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                                    <span class="h1" style="font-size: 23px;margin: 0;padding: 0;">KHMART</span>
                                </td>
                                <!-- NO. 000001 -->
                                <td align="right" style="padding-bottom: 30px;">
                                    <p class="text-sm" style="font-size: 14px; font-weight: 500; color: #374151; margin: 0;">NO. 000001</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="left">
                                    <!-- INVOICE Main Title -->
                                    <p class="h1" style="font-size: 48px; font-weight: 900; letter-spacing: -1.5px; color: #1f2937; margin: 0 0 10px 0;">INVOICE</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="left">
                                    <!-- Date -->
                                    <p class="text-sm" style="font-size: 14px; color: #1f2937; margin: 0 0 40px 0;">Date: {{ date_format(date_create($order->date_time),"d/m/Y")}}</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- 3. Billed To / From Addresses -->
                <tr>
                    <td style="padding: 0 30px 40px 30px;">
                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <!-- Billed To -->
                                <td class="stack-on-mobile" width="50%" align="left" valign="top" style="padding-right: 15px;">
                                    <p class="h2" style="margin: 0 0 5px 0;">Billed to:</p>
                                    <p class="text-sm" style="font-size: 14px; color: #1f2937; margin: 0 0 2px 0; font-weight: 600;">Studio Shodwe</p>
                                    <p class="text-sm" style="font-size: 14px; color: #374151; margin: 0;">
                                        123 Anywhere St., Any City<br>
                                        hello@reallygreatsite.com
                                    </p>
                                </td>
                                <!-- From -->
                                <td class="stack-on-mobile" width="50%" align="left" valign="top" style="padding-left: 15px;">
                                    <p class="h2" style="margin: 0 0 5px 0;">From:</p>
                                    <p class="text-sm" style="font-size: 14px; color: #1f2937; margin: 0 0 2px 0; font-weight: 600;">{{env("APP_NAME")}}</p>
                                    <p class="text-sm" style="font-size: 14px; color: #374151; margin: 0;">
                                        #217, Chamkardoung, Dangkor, Phnom Penh<br>
                                        support@eshopcambodia.shop
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- 4. Line Items Table -->
                <tr>
                    <td style="padding: 0 30px 20px 30px;">
                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">

                            <!-- Table Header - Light gray background -->
                            <tr style="background-color: #f3f4f6;">
                                <td width="50%" style="padding: 15px;">
                                    <p style="font-size: 14px; font-weight: 700; color: #1f2937; margin: 0;">Item</p>
                                </td>
                                <td align="right" width="15%" style="padding: 15px;">
                                    <p style="font-size: 14px; font-weight: 700; color: #1f2937; margin: 0;">Quantity</p>
                                </td>
                                <td align="right" width="15%" style="padding: 15px;">
                                    <p style="font-size: 14px; font-weight: 700; color: #1f2937; margin: 0;">Price</p>
                                </td>
                                <td align="right" width="20%" style="padding: 15px;">
                                    <p style="font-size: 14px; font-weight: 700; color: #1f2937; margin: 0;">Amount</p>
                                </td>
                            </tr>
                            <!-- Item 1: Logo -->
                            @php
                                $total_amount = 0;
                            @endphp
                            @foreach($order->items as $item)
                                @php
                                    $total_amount = $total_amount + ($item->price * $item->quantity)
                                @endphp
                                <tr>
                                    <td style="padding: 12px 0;">
                                        <p class="text-base" style="font-size: 16px; color: #374151; margin: 0;">{{$item->product->name}}</p>
                                    </td>
                                    <td align="right" style="padding: 12px 0;">
                                        <p class="text-base" style="font-size: 16px; color: #374151; margin: 0;">{{$item->quantity}}</p>
                                    </td>
                                    <td align="right" style="padding: 12px 0;">
                                        <p class="text-base" style="font-size: 16px; color: #374151; margin: 0;">${{$item->price}}</p>
                                    </td>
                                    <td align="right" style="padding: 12px 0;">
                                        <p class="text-base" style="font-size: 16px; color: #374151; margin: 0;">${{$item->price * $item->quantity}}</p>
                                    </td>
                                </tr>
                            @endforeach

                            <!-- Total Row (Simple line from image) -->
                            <tr>
                                <td colspan="2"></td>
                                <td align="right" style="padding: 15px 10px 15px 0;">
                                    <p class="h2" style="font-size: 16px; font-weight: 700; color: #1f2937; margin: 0;">Total</p>
                                </td>
                                <td align="right" style="padding: 15px 0;">
                                    <p class="h2" style="font-size: 16px; font-weight: 900; color: #1f2937; margin: 0;">${{$total_amount}}</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- 5. Payment Method & Note -->
                <tr>
                    <td style="padding: 20px 30px 0 30px;text-align: center;">
                        <p class="h2" style="font-size: 30px; font-weight: 700; color: #1f2937; margin: 0 0 5px 0;">🙏</p>
                        <p class="h2" style="font-size: 16px; font-weight: 700; color: #1f2937; margin: 0 0 0 0;"><span style="font-weight: 400;">Thank you for choosing us!</span></p>
                    </td>
                </tr>

                <!-- White space before footer starts (adjusting this for closer match) -->
                <tr>
                    <td height="50"></td>
                </tr>
            </table>
            <!-- End Invoice Content Container -->

        </td>
    </tr>
</table>
<!-- End Main Wrapper Table -->

</body>
</html>
