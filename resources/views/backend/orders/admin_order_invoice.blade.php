<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Invoice</title>
    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }

        .font {
            font-size: 15px;
        }

        .authority {
            /*text-align: center;*/
            float: right
        }

        .authority h5 {
            margin-top: -10px;
            color: green;
            /*text-align: center;*/
            margin-left: 35px;
        }

        .thanks p {
            color: green;
            ;
            font-size: 16px;
            font-weight: normal;
            font-family: serif;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
        <tr>
            <td valign="top">
                <img src="{{ public_path('/upload/logo.png') }}" alt="" style="width: 200px; height: 70px;" />
                <h2 style="color: green; font-size: 26px;"><strong>Nest Shop</strong></h2>
            </td>
            <td align="right">
                <pre class="font">
               Nest Shop Head Office
               Address: Ho Chi Minh city, Viet Nam
               Hotline: 1900 900
            </pre>
            </td>
        </tr>
    </table>
    <table width="100%" style="background:white; padding:2px;"></table>

    <table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
        <tr>
            <td>
                <p class="font" style="margin-left: 20px;">
                    <strong>Full Name: </strong> {{ $order->name }}<br>
                    <strong>Email: </strong> {{ $order->email }}<br>
                    <strong>Phone Number: </strong> {{ $order->phone }} <br>
                    <strong>Address: </strong> {{ $order->address }} <br>
                    <strong>Postal Code: </strong> {{ $order->post_code }}
                </p>
            </td>
            <td>
                <p class="font">
                <h3><span style="color: green;">Invoice Number :</span> #{{ $order->invoice_number }}</h3>
                @php
                    $order_date = strtotime($order->order_date);
                    $order_date_format = date('d-m-Y H:i:s', $order_date);

                    $delivered_date = strtotime($order->delivered_date);
                    $delivered_date_format = date('d-m-Y H:i:s', $delivered_date);
                @endphp
                <strong>Order Date: </strong> {{ $order_date_format }}<br>
                @if ($order->status == 'delivered' && $order->return_order_status == 0)
                <strong>Delivery Date: </strong> {{ $delivered_date_format }}<br>
                @endif
                <strong>Payment Type: </strong> {{ $order->payment_type }}<br>
                <strong>Payment Method: </strong> {{ $order->payment_method }}<br>
                <strong>Notes: </strong> {{ $order->notes }}
                </p>
            </td>
        </tr>
    </table>
    <br />
    <h3>Products</h3>
    <table width="100%">
        <thead style="background-color: green; color:#FFFFFF;">
            <tr class="font">
                <th>Image</th>
                <th>Product Code</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php
                $subtotal = 0;
            @endphp
            @foreach ($orderItem as $item)
                @php
                    $subtotal = $subtotal + $item->price * $item->quantity;
                @endphp
                <tr class="font">
                    <td align="center">
                        <img src="{{ public_path($item->product->product_thumbnail) }}" height="60px;" width="60px;"
                            alt="">
                    </td>
                    <td align="center">{{ $item->product->product_code }}</td>
                    <td align="center">{{ $item->product->product_name }}</td>
                    <td align="center">${{ $item->price }}</td>
                    <td align="center">{{ $item->quantity }}</td>
                    <td align="center">${{ $item->price * $item->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <table width="100%" style=" padding:0 10px 0 10px;">
        <tr>
            <td align="right">
                <h2><span style="color: green;">Subtotal: </span>${{ $subtotal }}</h2>
                @if ($order->discount == 0)
                    <h2><span style="color: green;">Discount: </span>$0</h2>
                @else
                    <h2><span style="color: green;">Discount: </span>${{ $order->discount }}</h2>
                @endif
                <h2><span style="color: green;">Total: </span>${{ $order->amount }}</h2>
            </td>
        </tr>
    </table>
    <div class="thanks mt-3">
        <p>Thanks For Buying Products . . . !!!</p>
    </div>
    <div class="authority float-right mt-5">
        <p>-----------------------------------</p>
        <h5>Authority Signature:</h5>
    </div>
</body>

</html>
