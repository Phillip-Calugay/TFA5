@extends('layouts.app')

@section('content')
    <h2>User Accounts</h2>
    <p>List of system users and staff.</p>
    <div class="table-wrap">
        <table aria-label="User accounts">
            <thead><tr><th scope="col">Username</th><th scope="col">Full Name</th><th scope="col">Role</th></tr></thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user['username'] }}</td>
                        <td>{{ $user['full_name'] }}</td>
                        <td>{{ $user['role'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
