<?php

namespace ItedoMake\Console\Commands\Make;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

/**
 * 创建请求校验命令类
 *
 * @author : Just-Ly < E-mail:5575165@qq.com >
 * @date: 2021/8/1 11:27
 * @package App\Console\Commands\Make
 */
class MakeRequest extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:auto-request {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '创建请求校验命令';

    /**
     * 请求
     *
     * @var string
     */
    protected $type = 'Request';

    /**
     * @return bool|void|null
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle()
    {
        //判断类是否存在
        if ($this->alreadyExists($this->getNameInput())) {
            $this->error($this->type . ' already exists!');
            return false;
        }
        parent::handle();
    }

    /**
     * 设置模板
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/request.stub';
    }

    /**
     * 设置命名空间
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Http\Requests';
    }

    /**
     * 重写名称
     *
     * @return string
     */
    protected function getNameInput()
    {
        return trim($this->argument('name')).'Request';
    }
}
