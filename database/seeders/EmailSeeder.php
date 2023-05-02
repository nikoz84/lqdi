<?php

namespace Database\Seeders;

use App\Models\Email;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Email::create([
            'nome' => 'Niko Romero',
            'email' => 'teste@gmail.com'
        ]);

        Email::create([
            'nome' => 'Isabel Hernández',
            'email' => 'outro@gmail.com'
        ]);
    }
}
