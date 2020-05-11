<?php

namespace App\Console\Commands;

use App\Drivers;
use Illuminate\Console\Command;

class UpdateDailyMileage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily_mileage:actualizar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actualizacion del Kilometraje diario de los conductores.';

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
        $drivers = \DB::table('drivers')->get();

        foreach ($drivers as $data) {
            $id = $data->id;
            $driver = Drivers::findOrFail($id);
            $driver->daily_mileage = 0;
            $driver->save();
        }
    }
}
