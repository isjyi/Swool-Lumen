<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Http\Request;
use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;
use Symfony\Component\HttpFoundation\Response;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
    ];


    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        $events->listen('laravels.received_request', function (Request $req, $app) {
            $req->query->set('get_key', 'hhxsv5');// 修改querystring
            $req->request->set('post_key', 'hhxsv5'); // 修改post body
        });

        // 修改`app/Providers/EventServiceProvider.php`, 添加下面监听代码到boot方法中
        // 如果变量$events不存在，你也可以通过Facade调用\Event::listen()。
        $events->listen('laravels.generated_response', function (Request $req, Response $rsp, $app) {
            $rsp->headers->set('header-key', 'hhxsv5');// 修改header
        });
    }
}
