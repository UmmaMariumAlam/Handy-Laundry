<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            <a href="{{route('customer.create')}}">Create New Customer</a>
        </button>
    <h1>This is the Customers List</h1>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <div>
        {{-- <div>
            <a href="{{route('product.create')}}">Create a Product</a>
        </div> --}}
        <table border="1">
            <tr  class="p-2 border rounded">
                <th class="p-4 border rounded">Customer_ID</th>
                <th class="p-4 border rounded">Name</th>
                <th class="p-4 border rounded">Email</th>
                <th class="p-4 border rounded">Address</th>
                <th class="p-4 border rounded">Edit</th>
                <th class="p-4 border rounded">Delete</th>
            </tr>
            @foreach($customer as $customer )
                <tr class="p-2 border rounded">
                    <td class="p-4 border rounded" >{{$customer->customer_id}}</td>
                    <td class="p-4 border rounded" >{{$customer->name}}</td>
                    <td class="p-4 border rounded">{{$customer->email}}</td>
                    <td class="p-4 border rounded">{{$customer->address}}</td>
                    {{-- <td>{{$c->description}}</td> --}}
                    <td class="p-4 border rounded">
                        <button class="bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700">
                            <a href="{{route('customer.edit', ['customer' => $customer])}}">Edit</a>
                        </button>
                    </td>
                    <td class="p-4 border rounded">
                        <form method="post" action="{{route('customer.destroy', ['customer' => $customer])}}">
                            @csrf 
                            <button class="bg-red-600 text-white px-4 py-1 rounded hover:bg-red-700" type="submit" value="Delete" onclick="Are you sure you want to delete this customer?">Delete </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
        

</body>
</html>
