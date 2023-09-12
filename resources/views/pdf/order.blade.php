<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>

        body{
            padding: 30px;
        }

        table{
            border-collapse: collapse
        }

        .table{
            width: 100%;
            margin-bottom: 20px;
        }

        .table-bordered{
            border: 1px solid black;
        }

        .table thead th{
            vertical-align: bottom;
            border-bottom: 1px solid #ffffff;
        }

        .table-bordered tbody td,
        .table-bordered thead th{
            border: 1px solid black;
            padding: 10px;
        }

        .text-center{
            text-align: center;
        }

    </style>
</head>
<body>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">Tracking No</th>
                <th class="text-center">Total Price</th>
                <th class="text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td class="text-center">{{ $order->tracking_no }}</td>
                    <td class="text-center">{{ $order->total_price }}</td>
                    <td class="text-center">{{ $order->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
