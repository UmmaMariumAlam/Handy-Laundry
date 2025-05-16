<h1>Welcome, {{ session('customer')->name }}</h1>
<p>Email: {{ session('customer')->email }}</p>
<a href="{{ route('customer.logout') }}">Logout</a>
