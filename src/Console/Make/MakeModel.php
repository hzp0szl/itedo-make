<?php

namespace ItedoMake\Console\Make;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

/**
 * 创建资模型命令类
 *
 * @author : Just-Ly < E-mail:5575165@qq.com >
 * @date: 2021/8/1 10:27
 * @package App\Console\Commands\Make
 */
class MakeModel extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:auto-model {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '创建资源控模型命令';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'model';

    /**
     * 数据的数据
     *
     * @var $name
     */
    protected $name;

    /**
     * 处理主入口
     *
     * @return bool|null
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
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        $stub = '/stubs/model.stub';
        return __DIR__ . $stub;
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Models';
    }

    /**
     * 命名
     *
     * @param string $stub
     * @param string $name
     * @return $this|GeneratorCommand
     */
    protected function replaceNamespace(&$stub, $name)
    {
        $stub = str_replace(
            [
                'DummyNamespace',
                'DummyTable',
            ],
            [
                $this->getNamespace($name),
                $this->dummyTable(),
            ],
            $stub
        );

        return $this;
    }

    /**
     * 表名
     *
     * @return string
     */
    private function dummyTable()
    {
        return Str::snake($this->argument('name'));
    }

}
