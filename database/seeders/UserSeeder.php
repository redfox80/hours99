<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;

        $user->firstname = "Bob";
        $user->lastname = "Bobmann";
        $user->email = "bob@bob.bob";
        $user->password = Hash::make('bob123');
        $user->created_at = Carbon::now();
        $user->updated_at = Carbon::now();

        $user->save();
    }
}
