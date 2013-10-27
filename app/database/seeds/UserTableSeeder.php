<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('users')->delete();

        $users = array(
            array(
                'email' => 'admin@admin.com',
                'name' => 'Administrator',
                'password' => Hash::make('admin'),
                // 'is_active' => true,
                // 'group_id' => 1,
                'created_at' => DB::raw('NOW()'),
                'updated_at' => DB::raw('NOW()'),
            ),
        );

        $faker = \Faker\Factory::create();
        $i = 1;

        while ($i <= 99) {
            $data[$i]['email'] = $faker->email;
            $data[$i]['name'] = $faker->name;
            $data[$i]['password'] = Hash::make('123456');
            // $data[$i]['is_active'] = rand(0,1);
            // $data[$i]['group_id'] = rand(1,10);
            // $data[$i]['created_at'] = DB::raw('NOW()');
            // $data[$i]['updated_at'] = DB::raw('NOW()');
            $i++;
        }

        // Uncomment the below to run the seeder
        DB::table('users')->insert($data);
    }

}
