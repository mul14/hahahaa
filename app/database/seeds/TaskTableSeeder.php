<?php

class TaskTableSeeder extends Seeder {

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('task')->delete();

        $faker = \Faker\Factory::create();
        $i = 1;

        while ($i <= 200) {
            $data[$i]['name'] = $faker->name;
            $data[$i]['project_id'] = (int) rand(1, 10);
            $i++;
        }

        // Uncomment the below to run the seeder
        DB::table('task')->insert($data);
    }

}
