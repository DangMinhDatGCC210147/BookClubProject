<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = json_decode(
            '
            [
                {
                  "idSt": "GCC123456",
                  "name": "John Smith",
                  "gender": "0",
                  "dateOfBirth": "1995-08-10",
                  "course": "K10",
                  "Email": "johnsmith@example.com",
                  "Phone Number": "0123456789",
                  "Joining Date": "2021-01-15"
                },
                {
                  "idSt": "GBC987654",
                  "name": "Jane Doe",
                  "gender": "0",
                  "dateOfBirth": "1998-03-25",
                  "course": "K11",
                  "Email": "janedoe@example.com",
                  "Phone Number": "0987654321",
                  "Joining Date": "2020-09-30"
                },
                {
                  "idSt": "GDC246813",
                  "name": "DavidSt Johnson",
                  "gender": "0",
                  "dateOfBirth": "1997-11-02",
                  "course": "K12",
                  "Email": "davidStjohnson@example.com",
                  "Phone Number": "0369852147",
                  "Joining Date": "2021-03-20"
                },
                {
                  "idSt": "GCC135792",
                  "name": "Emily Wilson",
                  "gender": "1",
                  "dateOfBirth": "1996-06-15",
                  "course": "K9",
                  "Email": "emilywilson@example.com",
                  "Phone Number": "0712345678",
                  "Joining Date": "2020-12-05"
                },
                {
                  "idSt": "GBC579246",
                  "name": "Michael Brown",
                  "gender": "1",
                  "dateOfBirth": "1999-01-20",
                  "course": "K10",
                  "Email": "michaelbrown@example.com",
                  "Phone Number": "0845678912",
                  "Joining Date": "2021-02-10"
                },
                {
                  "idSt": "GDC864209",
                  "name": "Sophia Lee",
                  "gender": "1",
                  "dateOfBirth": "1997-04-05",
                  "course": "K11",
                  "Email": "sophialee@example.com",
                  "Phone Number": "0932145678",
                  "Joining Date": "2020-11-25"
                },
                {
                  "idSt": "GCC951753",
                  "name": "William Taylor",
                  "gender": "1",
                  "dateOfBirth": "1998-07-18",
                  "course": "K12",
                  "Email": "williamtaylor@example.com",
                  "Phone Number": "0654321987",
                  "Joining Date": "2021-04-05"
                },
                {
                  "idSt": "GBC357159",
                  "name": "Olivia Anderson",
                  "gender": "1",
                  "dateOfBirth": "1996-10-30",
                  "course": "K9",
                  "Email": "oliviaanderson@example.com",
                  "Phone Number": "0798765432",
                  "Joining Date": "2020-10-20"
                },
                {
                  "idSt": "GDC753951",
                  "name": "James Martinez",
                  "gender": "0",
                  "dateOfBirth": "1999-02-12",
                  "course": "K10",
                  "Email": "jamesmartinez@example.com",
                  "Phone Number": "0823456789",
                  "Joining Date": "2021-03-10"
                },
                {
                  "idSt": "GCC159753",
                  "name": "Ava Thomas",
                  "gender": "0",
                  "dateOfBirth": "1997-05-25",
                  "course": "K11",
                  "Email": "avathomas@example.com",
                  "Phone Number": "0976543210",
                  "Joining Date": "2020-12-30"
                },
                {
                  "idSt": "GBC951753",
                  "name": "Liam Clark",
                  "gender": "0",
                  "dateOfBirth": "1998-08-08",
                  "course": "K12",
                  "Email": "liamclark@example.com",
                  "Phone Number": "0732165498",
                  "Joining Date": "2021-05-15"
                },
                {
                  "idSt": "GDC220159",
                  "name": "Isabella Rodriguez",
                  "gender": "1",
                  "dateOfBirth": "1996-11-21",
                  "course": "K9",
                  "Email": "isabellarodriguez@example.com",
                  "Phone Number": "0865432198",
                  "Joining Date": "2020-11-05"
                },
                {
                  "idSt": "GCC357951",
                  "name": "Benjamin Lewis",
                  "gender": "0",
                  "dateOfBirth": "1999-03-06",
                  "course": "K10",
                  "Email": "benjaminlewis@example.com",
                  "Phone Number": "0912345678",
                  "Joining Date": "2021-02-25"
                },
                {
                  "idSt": "GBC951357",
                  "name": "Mia Walker",
                  "gender": "0",
                  "dateOfBirth": "1997-06-19",
                  "course": "K11",
                  "Email": "miawalker@example.com",
                  "Phone Number": "0956781234",
                  "Joining Date": "2021-01-10"
                },
                {
                  "idSt": "GDC753159",
                  "name": "Alexander Hall",
                  "gender": "0",
                  "dateOfBirth": "1998-09-02",
                  "course": "K12",
                  "Email": "alexanderhall@example.com",
                  "Phone Number": "0987654321",
                  "Joining Date": "2020-10-30"
                },
                {
                  "idSt": "GCC210753",
                  "name": "Charlotte Young",
                  "gender": "1",
                  "dateOfBirth": "1996-12-15",
                  "course": "K9",
                  "Email": "charlotteyoung@example.com",
                  "Phone Number": "0765432198",
                  "Joining Date": "2020-12-20"
                },
                {
                  "idSt": "GBC753951",
                  "name": "Ethan King",
                  "gender": "0",
                  "dateOfBirth": "1999-04-28",
                  "course": "K10",
                  "Email": "ethanking@example.com",
                  "Phone Number": "0898765432",
                  "Joining Date": "2021-03-15"
                },
                {
                  "idSt": "GDC159753",
                  "name": "Scarlett Hernandez",
                  "gender": "0",
                  "dateOfBirth": "1997-07-11",
                  "course": "K11",
                  "Email": "scarletthernandez@example.com",
                  "Phone Number": "0923456781",
                  "Joining Date": "2021-01-30"
                },
                {
                  "idSt": "GCC753951",
                  "name": "AidSten Green",
                  "gender": "1",
                  "dateOfBirth": "1998-10-24",
                  "course": "K12",
                  "Email": "aidStengreen@example.com",
                  "Phone Number": "0956784321",
                  "Joining Date": "2020-11-20"
                }
              ]'
        );
        foreach ($data as $memberData) {
            Member::create([
                'idSt' => $memberData->idSt,
                'name' => $memberData->name,
                'gender' => $memberData->gender,
                'dateOfBirth' => $memberData->dateOfBirth,
                'course' => $memberData->course,
                'Email' => $memberData->Email,
                'PhoneNumber' => $memberData->{'Phone Number'},
                'joiningDate' => $memberData->{'Joining Date'},
            ]);
        }
    }
}
