<?php

namespace App\Console\Commands\MapData;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class MapLanguageCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'map:language';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Map language';

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
        $data = [
            'khác',
            'php',
            'c#',
            'java',
            'python',
            'ai',
            'laravel',
            'nodejs',
            'joomla',
            'wordpress'
        ];

        foreach ($data as $item)
        {
            \DB::table('programming_language')->insert([
                'pl_name' => $item,
                'pl_slug' => Str::slug($item),
                'created_at' => Carbon::now()
            ]);
        }

    }
}
