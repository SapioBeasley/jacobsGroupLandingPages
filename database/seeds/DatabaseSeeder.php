<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Program;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(ProgramsTableSeeder::class);

        Model::reguard();
    }
}

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $programs = [
            [
                'titleStrong' => 'Hotel &amp; Casino Employee',
                'title' => 'Home Assistance Program',
                'secondHead' => NULL,
                'bullet1' => 'For Hotel & Casino Employees and their families',
                'bullet2' => 'Discounts offered for Hotel & Casino Employee selling their homes too!',
                'disclaimerAdd' => NULL,
                'slug' => 'hotel-casino-employee-home-assistance-program'
            ],
            [
                'titleStrong' => 'Home Assistance Program',
                'title' => 'offered to Cosmopolitan Employees',
                'secondHead' => 'Presented by The Jacobs Group',
                'bullet1' => 'For Team Members And Their Families',
                'bullet2' => 'Discounts offered for Hotel & Casino Employee selling their homes too!',
                'disclaimerAdd' => 'The program is for team members, but is not in any way represented by, associated with, or sponsored by the Cosmopolitan.',
                'slug' => 'home-assistance-program-offered-to-cosmopolitan-employees'
            ],
            [
                'titleStrong' => 'Las Vegas Incentive',
                'title' => 'Home Assistance Program',
                'secondHead' => NULL,
                'bullet1' => ' For Las Vegas Hotel/Resort and Casino Professionals and their families',
                'bullet2' => 'Discounts offered for Las Vegas employees selling their homes too!',
                'disclaimerAdd' => NULL,
                'slug' => 'las-vegas-incentive-home-assistance-program'
            ],
            [
                'titleStrong' => 'Teachers',
                'title' => 'Home Assistance Program',
                'secondHead' => NULL,
                'bullet1' => 'For Teachers and their families',
                'bullet2' => 'Discounts offered for Teachers selling their homes too!',
                'disclaimerAdd' => NULL,
                'slug' => 'teachers-home-assistance-program'
            ],
            [
                'titleStrong' => 'Clear Skies',
                'title' => 'Housing Assistance Program',
                'secondHead' => 'US Airways, Boeing, Southwest Airlines',
                'bullet1' => 'For Airline team members and their families',
                'bullet2' => 'Discounts offered for Airline employees selling their homes too!',
                'disclaimerAdd' => 'The program is for team members, but is not in any way represented by, associated with, or sponsored by the Airlines.',
                'slug' => 'clear-skies-housing-assistance-program'
            ],
            [
                'titleStrong' => 'Doctor&#39;s Reward',
                'title' => 'Home Assistance Program',
                'secondHead' => NULL,
                'bullet1' => 'For Doctor&#39;s and their families',
                'bullet2' => 'Discounts offered for Doctor&#39;s selling their homes too!',
                'disclaimerAdd' => NULL,
                'slug' => 'doctor-s-reward-home-assistance-program'
            ],
            [
                'titleStrong' => 'Nurses',
                'title' => 'Home Assistance Program',
                'secondHead' => NULL,
                'bullet1' => 'For Nurses and their families',
                'bullet2' => 'Discounts offered for Nurses selling their homes too!',
                'disclaimerAdd' => NULL,
                'slug' => 'nurses-home-assistance-program'
            ],
            [
                'titleStrong' => 'Newlywed',
                'title' => 'Home Assistance Program',
                'secondHead' => NULL,
                'bullet1' => 'For Newlyweds and their families',
                'bullet2' => 'Discounts offered for Newlyweds selling their homes too!',
                'disclaimerAdd' => NULL,
                'slug' => 'newlywed-home-assistance-program'
            ],
        ];

        foreach ($programs as $program) {
            $program = Program::create($program);
        }
    }
}
