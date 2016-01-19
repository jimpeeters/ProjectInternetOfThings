<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Planning;

class createPlanning extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'planning:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create empty planning for coming month';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $today =  Carbon::today();
        $nextMonth =  Carbon::today()->addMonth();
        $monday = new Carbon('next monday');
        $sunday = new Carbon('next monday');
        $sunday->addDays(6);
        echo $sunday;


        $planningen = Planning::where('first_day', '>', $today)->get();
        var_dump($planningen);
        while($monday<$nextMonth)
        {
            $not_exists = true;
            foreach($planningen as $planning)
            {
                if($monday >= $planning->first_day && $monday <= $planning->last_day)
                {
                    $not_exists = false;
                }
            }

            if($not_exists)
            {
                $newPlanning = new Planning;
                $newPlanning->first_day = $monday;
                $newPlanning->last_day = $sunday;
                $newPlanning->save();


            }
            $monday->addWeek();
            $sunday->addWeek();
        }

    }
}
