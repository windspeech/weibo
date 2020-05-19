<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class)->times(50)->make();
        $list = $users->makeVisible(['password', 'remember_token'])->toArray();
        User::insert($list);

        $user = User::find(1);
        $user->name = 'Summer';
        $user->email = 'summer@example.com';
        $user->password = bcrypt(12345678);
        $user->is_admin = true;
        $user->save();
    }
}
