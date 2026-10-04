<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestUsersSeeder extends Seeder
{
    /**
     * One test account per role. LOCAL DEVELOPMENT ONLY - refuses to run elsewhere.
     * Run: php artisan db:seed --class=TestUsersSeeder   (safe to re-run)
     */
    public function run(): void
    {
        if (! app()->environment('local')) {
            $this->command?->warn('TestUsersSeeder only runs when APP_ENV=local.');

            return;
        }

        $accounts = [
            ['Test Admin', 'admin@samasgift.test', 'Admin@12345', User::ROLE_ADMIN],
            ['Test Salesman', 'salesman@samasgift.test', 'Sales@12345', User::ROLE_SALESMAN],
            ['Test Customer', 'customer@samasgift.test', 'Customer@12345', User::ROLE_CUSTOMER],
        ];

        foreach ($accounts as [$name, $email, $password, $role]) {
            $user = User::firstOrNew(['email' => $email]);
            $user->forceFill([
                'name' => $name,
                'password' => $password, // hashed by the model cast
                'role' => $role,
                'is_active' => true,
                'email_verified_at' => now(),
            ])->save();

            if ($role === User::ROLE_CUSTOMER) {
                DB::table('customers')->updateOrInsert(
                    ['user_id' => $user->id],
                    ['name' => $name, 'email' => $email, 'created_at' => now(), 'updated_at' => now()]
                );
            }
        }

        $this->command?->table(
            ['Role', 'Email', 'Password'],
            array_map(fn ($a) => [$a[3], $a[1], $a[2]], $accounts)
        );
    }
}
