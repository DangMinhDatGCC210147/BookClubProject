<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonString = '[
            {
                "idSt": "GCC210147",
                "name": "Đặng Minh Đạt",
                "role": 0,
                "email": "datdmgcc210147@fpt.edu.vn",
                "password": "12345678"
            },
            {
                "idSt": "GDC210099",
                "name": "Nguyễn Huỳnh Ngọc Thi",
                "role": 1,
                "email": "thinhngdc210099@fpt.edu.vn",
                "password": "12345678"
            },
            {
                "idSt": "GBC200062",
                "name": "Nguyễn Hoàng Kha",
                "role": 1,
                "email": "khanhgbc200062@fpt.edu.vn",
                "password": "12345678"
            }
        ]';

        $data = json_decode($jsonString);

        // Kiểm tra xem $data có phải là mảng hoặc đối tượng hay không
        if (!is_array($data) && !is_object($data)) {
            printf('Error decoding JSON data');
            return;
        }

        // Kiểm tra xem $data là mảng hoặc có phải là đối tượng có phương thức count hay không
        if (!is_array($data) && !method_exists($data, 'count')) {
            printf('Invalid data format');
            return;
        }

        foreach ($data as $userData) {
            // Kiểm tra xem $userData có phải là đối tượng hay không
            if (!is_object($userData)) {
                printf('Invalid user data');
                continue; // Bỏ qua lần lặp nếu dữ liệu người dùng không hợp lệ
            }

            User::create([
                'idSt' => $userData->idSt,
                'name' => $userData->name,
                'role' => $userData->role,
                'email' => $userData->email,
                'password' => Hash::make($userData->password),
            ]);
        }
    }
}
