<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CustomerController extends Controller
{
    // Temporary data source for TFA5; no database query is needed.
    public const RECORDS = [
        ['full_name' => 'Ana Reyes', 'email' => 'ana.reyes@example.com', 'phone' => '0917 123 4567'],
        ['full_name' => 'Ben Santos', 'email' => 'ben.santos@example.com', 'phone' => '0918 234 5678'],
        ['full_name' => 'Carla Cruz', 'email' => 'carla.cruz@example.com', 'phone' => '0919 345 6789'],
        ['full_name' => 'Daniel Lim', 'email' => 'daniel.lim@example.com', 'phone' => '0920 456 7890'],
        ['full_name' => 'Ella Garcia', 'email' => 'ella.garcia@example.com', 'phone' => '0921 567 8901'],
    ];

    public function index(): View
    {
        return view('customers.index', ['title' => 'Customers', 'customers' => self::RECORDS]);
    }
}
