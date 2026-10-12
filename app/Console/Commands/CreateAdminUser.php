<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class CreateAdminUser extends Command
{
    protected $signature = 'admin:create {--email=} {--name=} {--password=} {--force}';
    protected $description = 'Create or promote a user to administrator (secure, interactive)';

    public function handle(): int
    {
        $name = $this->option('name') ?: $this->ask('Name');
        $email = $this->option('email') ?: $this->ask('Email');
        $password = $this->option('password');

        if (empty($password)) {
            $password = $this->secret('Password');
            $confirm = $this->secret('Confirm password');
            if ($password !== $confirm) {
                $this->error('Passwords do not match');
                return self::FAILURE;
            }
        }

        $validator = Validator::make([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ], [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', Password::min(8)],
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return self::FAILURE;
        }

        $user = User::where('email', $email)->first();

        if ($user) {
            if (!$this->option('force') && !$this->confirm("User $email exists. Promote to admin?")) {
                $this->info('Aborted');
                return self::SUCCESS;
            }
            $user->is_admin = true;
            $user->save();
            $this->info("Promoted existing user $email to admin");
            return self::SUCCESS;
        }

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password; // hashed via casts
        $user->is_admin = true;
        $user->save();

        $this->info("Created admin user $email");
        return self::SUCCESS;
    }
}
