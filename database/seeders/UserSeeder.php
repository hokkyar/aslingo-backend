<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // ADMIN
    DB::table('users')->insert([
      'name' => 'Admin',
      'email' => 'admin@gmail.com',
      'role' => 'admin',
      'password' => Hash::make('anggi123'),
    ]);


  }
}
