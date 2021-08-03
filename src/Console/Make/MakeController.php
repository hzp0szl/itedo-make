<?php

namespace App\Console\Make;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

/**
 * 创建资源控制器命令类
 *
 * @author : Just-Ly < E-mail:5575165@qq.com >
 * @date: 2019/10/31 10:27
 * @package App\Console\Commands\Make
 */
class MakeController extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:auto-controller {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '创建资源控制器命令';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Controller';

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

        //设置名称
        $this->name = $this->getNameInput();

        //获取名称相对地址
        $name = $this->qualifyClass($this->getNameInput()) . 'Controller';

        //获取绝对路径
        $path = $this->getPath($name);

        //创建目录
        $this->makeDirectory($path);

        //创建类
        $this->files->put($path, $this->sortImports($this->buildClass($name)));

        //打印成功
        $this->info($this->type . ' created successfully.');
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        $stub = '/stubs/controller.stub';
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
        return $rootNamespace . '\Http\Controllers';
    }

    /**
     * Build the class with the given name.
     *
     * Remove the base controller import if we are already in base namespace.
     *
     * @param string $name
     * @return string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function buildClass($name)
    {
        $controllerNamespace = $this->getNamespace($name);

        $replace = [];

        $replace["use {$controllerNamespace}\Controller;\n"] = '';

        return str_replace(
            array_keys($replace), array_values($replace), parent::buildClass($name)
        );
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
                'DummyRootNamespace',
                'NamespacedDummyUserModel',
                'DummyUseResources',
                'DummyUseRequest',
                'DummyRequest',
                'DummyUseUpdateRequest',
                'DummyUpdateRequest',
            ],
            [
                $this->getNamespace($name),
                $this->rootNamespace(),
                $this->userProviderModel(),
                $this->dummyUseResources(),
                $this->dummyUseRequest(),
                $this->dummyRequest(),
                $this->dummyUseUpdateRequest(),
                $this->dummyUpdateRequest()
            ],
            $stub
        );

        return $this;
    }

    /**
     * resources use 名称
     *
     * @return string
     */
    protected function dummyUseResources()
    {
        return str_replace('/', '\\', $this->name) . 'Resource';
    }

    /**
     * request use 名称
     *
     * @return string
     */
    protected function dummyUseRequest()
    {
        return str_replace('/', '\\', $this->name) . 'Request';
    }

    /**
     * request 名称
     */
    private function dummyRequest()
    {
        if (Str::contains($this->name, '/')) {
            return class_basename($this->name) . 'Request';
        }

        return $this->name . 'Request';
    }

    /**
     * request use 名称
     *
     * @return string
     */
    protected function dummyUseUpdateRequest()
    {
        return str_replace('/', '\\', $this->name) . 'UpdateRequest';
    }

    /**
     * request 名称
     */
    private function dummyUpdateRequest()
    {
        if (Str::contains($this->name, '/')) {
            return class_basename($this->name) . 'UpdateRequest';
        }

        return $this->name . 'UpdateRequest';
    }
}
