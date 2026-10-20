<?php

namespace Tests\Feature;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PosAccountSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_optional_migration_and_seeder_support_repeated_seeding(): void
    {
        $this->seed(DatabaseSeeder::class);
        $this->seed(DatabaseSeeder::class);
        $this->assertDatabaseCount('customer_accounts', 5);
        $this->assertDatabaseCount('staff_accounts', 5);
        $this->assertDatabaseHas('customer_accounts', ['full_name' => 'Ana Reyes', 'email' => 'ana.reyes@example.com']);
        $this->assertDatabaseHas('staff_accounts', ['username' => 'stock1', 'role' => 'Inventory Staff']);
    }
}
