<?php

namespace ItedoMake\Console\Make;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

/**
 * 创建资源控制器命令类
 *
 * @author : Just-Ly < E-mail:5575165@qq.com >
 * @date: 2021/8/1 10:27
 * @package App\Console\Commands\Make
 */
class MakeClear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clearAll';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '清除所有命令';

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
        Artisan::call("view:cache");
        Artisan::call("view:clear");
        Artisan::call("event:cache");
        Artisan::call("event:clear");
        Artisan::call("config:cache");
        Artisan::call("config:clear");
        Artisan::call("cache:clear");
        Artisan::call("clear-compiled");

        $this->info('cache clearAll successfully');
    }
}
