<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class UserController extends Controller
{
    // Staff listings are demonstration records, not authentication credentials.
    public const RECORDS = [
        ['username' => 'admin', 'full_name' => 'Alex Mendoza', 'role' => 'Administrator'],
        ['username' => 'manager1', 'full_name' => 'Bianca Flores', 'role' => 'Manager'],
        ['username' => 'cashier1', 'full_name' => 'Carlos Ramos', 'role' => 'Cashier'],
        ['username' => 'cashier2', 'full_name' => 'Diane Torres', 'role' => 'Cashier'],
        ['username' => 'stock1', 'full_name' => 'Ethan Bautista', 'role' => 'Inventory Staff'],
    ];

    public function index(): View
    {
        return view('users.index', ['title' => 'Users', 'users' => self::RECORDS]);
    }
}
