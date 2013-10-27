<?php

class ProjectTableSeeder extends Seeder {

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('project')->delete();

        $faker = \Faker\Factory::create();
        $i = 1;

        while ($i <= 10) {
            $data[$i]['name'] = $faker->name;
            $i++;
        }

        // Uncomment the below to run the seeder
        DB::table('project')->insert($data);
    }

}
