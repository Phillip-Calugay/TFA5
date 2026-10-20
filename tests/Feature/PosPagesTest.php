<?php

namespace Tests\Feature;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PosPagesTest extends TestCase
{
    public function test_four_pages_and_navigation_work_without_a_database(): void
    {
        DB::shouldReceive('connection')->never();

        foreach (['/' => 'Welcome', '/about' => 'About', '/customers' => 'Customer Accounts', '/users' => 'User Accounts'] as $path => $heading) {
            $response = $this->get($path)->assertOk()->assertSeeText($heading);
            foreach (['home', 'about', 'customers', 'users'] as $route) {
                $response->assertSee('href="'.route($route).'"', false);
            }
            $response->assertSee('aria-current="page"', false);
        }
    }

    public function test_customer_table_contains_five_records_and_required_columns(): void
    {
        $response = $this->get('/customers')->assertOk()->assertSeeInOrder(['Full Name', 'Email', 'Phone']);
        foreach (CustomerController::RECORDS as $record) {
            foreach ($record as $value) {
                $response->assertSeeText($value);
            }
        }
        $this->assertCount(5, CustomerController::RECORDS);
        $this->assertSame(6, substr_count($response->getContent(), '<tr>'));
    }

    public function test_staff_table_contains_five_records_and_roles(): void
    {
        $response = $this->get('/users')->assertOk()->assertSeeInOrder(['Username', 'Full Name', 'Role']);
        foreach (UserController::RECORDS as $record) {
            foreach ($record as $value) {
                $response->assertSeeText($value);
            }
        }
        $this->assertCount(5, UserController::RECORDS);
        $this->assertSame(6, substr_count($response->getContent(), '<tr>'));
    }

    public function test_record_values_are_escaped_in_both_views(): void
    {
        $unsafe = '<script>alert("example")</script>';
        $this->view('customers.index', [
            'title' => 'Customers',
            'customers' => [['full_name' => $unsafe, 'email' => 'example@example.com', 'phone' => '0917']],
        ])->assertSee($unsafe)->assertDontSee($unsafe, false);
        $this->view('users.index', [
            'title' => 'Users',
            'users' => [['username' => 'example', 'full_name' => $unsafe, 'role' => 'Cashier']],
        ])->assertSee($unsafe)->assertDontSee($unsafe, false);
    }
}
