<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>requested products</title>
</head>
<body>
<div class="container">
    <h2>Customer Requests</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Company</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Product Details</th>
                <th>File</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->company }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->product_details }}</td>
                    <td>
                        @if($customer->file)
                            <a href="{{ asset('storage/' . $customer->file) }}" target="_blank">View File</a>
                        @else
                            No File
                        @endif
                    </td>
                    <td>{{ $customer->created_at->format('d-m-Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $customers->links() }}
    </div>
    
</body>
</html>