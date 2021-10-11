<?php

namespace DetosphereLtd\LaravelFaqs;

use Illuminate\Support\ServiceProvider;

class FAQServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if (!class_exists('CreateFaqsTable')) {
            $this->publishes([
                __DIR__ . '/../database/migrations/create_faqs_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_faqs_table.php'),
            ], 'migrations');
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
