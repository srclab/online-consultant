<?php

namespace SrcLab\OnlineConsultant;

use Illuminate\Support\ServiceProvider;
use SrcLab\OnlineConsultant\Services\Messengers\TalkMe\TalkMe;
use SrcLab\OnlineConsultant\Services\Messengers\Webim\Webim;

class OnlineConsultantServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Публикация необходимых файлов.
         */
        $this->publishes([
            __DIR__.'/../config/online_consultant.php' => config_path('online_consultant.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $config = array_merge(config('online_consultant'), app_config('online_consultant'));

        $this->app->singleton(\SrcLab\OnlineConsultant\Contracts\OnlineConsultant::class, function($app) use($config)
        {
            if($config['online_consultant'] == 'webim') {
                return app(Webim::class, ['config' => $config['accounts']]);
            } else {
                return app(TalkMe::class, ['config' => $config['accounts']]);
            }
        });
    }
}