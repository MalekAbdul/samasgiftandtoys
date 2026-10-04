<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class CreateAdminUser extends Command
{
    protected $signature = 'app:create-admin {--name=} {--email=} {--role=admin : admin|salesman|customer}';

    protected $description = 'Create a user with a given role (default: admin)';

    public function handle(): int
    {
        $data = [
            'name' => $this->option('name') ?: $this->ask('Name'),
            'email' => $this->option('email') ?: $this->ask('Email'),
            'password' => $this->secret('Password (min 8 characters)'),
            'role' => $this->option('role'),
        ];

        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', 'in:admin,salesman,customer'],
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            return self::FAILURE;
        }

        // forceCreate: 'role' is intentionally NOT mass-assignable.
        // The 'hashed' cast on User::password hashes the password automatically.
        User::forceCreate([
            ...$data,
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        $this->info("Created {$data['role']} user {$data['email']}.");

        return self::SUCCESS;
    }
}
