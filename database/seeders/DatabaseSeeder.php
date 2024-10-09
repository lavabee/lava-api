<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Task;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Carbon\CarbonPeriod;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $start = now()->startOfMonth()->subMonthsNoOverflow();
        $end = now();
        $period = CarbonPeriod::create($start, '1 day', $end);

        User::factory(5)->create()->each(function ($user) use($period) {
            foreach ($period as $date) {
                $date->hour(rand(0, 23))->minute(rand(0, 6) * 10);

                Task::factory()->create([
                    'user_id' => $user->id,
                    'created_at' => $date,
                    'updated_at' => $date
                ]);
            }
        });
    }
}
