<?php

namespace App\Console\Make;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

/**
 * 创建资源控制器命令类
 *
 * @author : Just-Ly < E-mail:5575165@qq.com >
 * @date: 2019/10/31 10:27
 * @package App\Console\Commands\Make
 */
class AutoMake extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:auto-make {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '创建资源集合命令';

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
        $name = $this->argument('name');

        //创建request
        Artisan::call("make:auto-request {$name}");
        $this->info('request created successfully');
        Artisan::call("make:auto-update-request {$name}");
        $this->info('update-request created successfully');

        //创建resource
        Artisan::call("make:auto-resource {$name}");
        $this->info('resource created successfully');

        //创建controller
        Artisan::call("make:auto-controller {$name}");
        $this->info('controller created successfully');
    }
}
