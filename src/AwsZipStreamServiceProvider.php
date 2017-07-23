<?php

namespace limenet\S3BucketStreamZip;

use Illuminate\Support\ServiceProvider;

class AWSZipStreamServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(S3BucketStreamZip::class, function($_) {
            return new S3BucketStreamZip([
                'key'     => config('services.s3.key'),
                'secret'  => config('services.s3.secret'),
                'region'  => config('services.s3.region'),
                'version' => config('services.s3.version'),
            ]);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [S3BucketStreamZip::class];
    }
}
