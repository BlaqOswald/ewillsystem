<?php

namespace App\Providers;

use App\Models\ImageDocument; // Correctly import the ImageDocument model
use App\Policies\FilePolicy; // Correctly import the FilePolicy

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        ImageDocument::class => FilePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // You can define gates here if necessary
        // For example: Gate::define('some-action', [FilePolicy::class, 'someMethod']);
    }
}
