<?php 

namespace Codeuz\Csv;
 
use Illuminate\Support\ServiceProvider;
 
class CsvServiceProvider extends ServiceProvider{
 
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
 
 	/**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
    }
 
 	/**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }
}