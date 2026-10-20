<?php

namespace Database\Seeders;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PosAccountSeeder extends Seeder
{
    public function run(): void
    {
        // Optional database copy for submission; the pages still use static arrays.
        DB::table('customer_accounts')->upsert(CustomerController::RECORDS, ['email'], ['full_name', 'phone']);
        DB::table('staff_accounts')->upsert(UserController::RECORDS, ['username'], ['full_name', 'role']);
    }
}
