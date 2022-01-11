<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\FormAltaProductor;
use App\Http\Controllers\FormAltaProductorController;
use Faker\Factory as Faker;


class JobEnvio extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'enviar:datos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este job envía los datos que posee la provincia hacia la bd de nación para la sincronización';

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
     * @return int
     */
    public function handle()
    {
        return 0;
    }
}
