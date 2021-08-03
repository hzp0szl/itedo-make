# itedo-make
<h4>自定义命令</h4>
根据业务需求，重写常用命令。以方便快捷生成开发文件

|命令|介绍|用法|
| ----- | ----- | ----- |
|make:auto-controller|创建资源控制器命令|<code>php artisan make:auto-controller Admin</code>|
|make:auto-request|创建请求校验命令|<code>php artisan make:auto-request Admin</code>|
|make:auto-resource|创建资源返回命令|<code>php artisan make:auto-resource Admin</code>|
|clearAll|清楚所有缓存命令|<code>php artisan clearAll</code>|
|make:auto-make|创建资源集合命令|<code>php artisan make:auto-make Admin</code>|

*注意：
make:auto-make命令会生成三个文件
<pre>
├── app                 
|   ├── Http				
|   	├── Controllers	
|   		├── AdminControllers.php		#命令生成控制器
|   	├── Requests	
|   		├── AdminRequest.php			#命令生成请求校验类
|   	├── Resources	
|   		├── AdminResource.php			#命令生成资源返回类
</pre>

<h4>常用命令</h4>
整理部分常用命令

|命令|介绍|用法|
| ----- | ----- | ----- |
|make:migration|创建数据迁移表|<code>php artisan make:migration CreateAdminTable</code>|
|migrate|执行数据表迁移|<code>php artisan migrate Admin</code>|
|make:model|创建数据模型|<code>php artisan make:model Admin</code>|
|make:command|创建命令定时事务|<code>php artisan make:command Admin</code>|
|make:event|创建事件|<code>php artisan make:event Admin</code>|
|make:job|创建队列任务|<code>php artisan make:job Admin</code>|
|make:listener|创建监听器|<code>php artisan make:listener Admin</code>|
|make:observer|创建观察者|<code>php artisan make:observer Admin</code>|
|make:notification|创建通知驱动类|<code>php artisan make:notification Admin</code>|
|make:provider|创建服务提供者|<code>php artisan make:provider Admin</code>|
|make:rule|创建规则类|<code>php artisan make:rule Admin</code>|
|make:test|创建单元测试|<code>php artisan make:test Admin</code>|
