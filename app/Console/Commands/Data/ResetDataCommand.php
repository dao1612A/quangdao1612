<?php

namespace App\Console\Commands\Data;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;

class ResetDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $permission = file_get_contents(public_path().'/project.json');
        $permission =  json_decode($permission, true);
        foreach ($permission['permission'] as $item)
        {
            try{
                $item['guard_name'] = 'admins';
                $item['created_at'] = Carbon::now();
                Permission::create($item);
                dump($item);
            }catch (\Exception $exception)
            {

            }
        }


        die;
        \DB::table('transactions')->truncate();
        \DB::table('orders')->truncate();
        \DB::table('votes_detail')->truncate();
        \DB::table('votes')->truncate();
        \DB::table('pay_histories')->truncate();

        \DB::table('users')->update([
            'vote_number' => 0,
            'vote_total'  => 0
        ]);
    }
}
