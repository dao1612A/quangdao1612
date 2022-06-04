<?php

namespace App\Console\Commands\Data;

use Illuminate\Console\Command;
use Modules\Guest\Entities\Buses;

class SeedRouteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:route';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tạo url các tuyến đường';

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
        $this->info('Init ---');
        $buses = Buses::with('vehicle', 'starting', 'destination')
            ->orderByDesc('id')->get();

        foreach ($buses as $item)
        {

        }
    }
}
