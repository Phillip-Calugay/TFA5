@extends('layouts.app')

@section('content')
    <h2>Customer Accounts</h2>
    <p>List of customer records.</p>
    <div class="table-wrap">
        <table aria-label="Customer accounts">
            <thead><tr><th scope="col">Full Name</th><th scope="col">Email</th><th scope="col">Phone</th></tr></thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer['full_name'] }}</td>
                        <td>{{ $customer['email'] }}</td>
                        <td>{{ $customer['phone'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
