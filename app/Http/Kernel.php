<?php namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {

    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
        'Illuminate\Cookie\Middleware\EncryptCookies',
        'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
        'Illuminate\Session\Middleware\StartSession',
        'Illuminate\View\Middleware\ShareErrorsFromSession',
        'App\Http\Middleware\VerifyCsrfToken',
        'Tsawler\Vcms5\Middleware\SetLanguageMiddleware',
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth'           => 'App\Http\Middleware\Authenticate',
        'auth.basic'     => 'Illuminate\Auth\Middleware\AuthenticateWithBasicAuth',
        'guest'          => 'App\Http\Middleware\RedirectIfAuthenticated',
        'auth.admin'     => 'Tsawler\Vcms5\Middleware\RedirectIfNotAdminMiddleware',
        'auth.pages'     => 'Tsawler\Vcms5\Middleware\RedirectIfNotPagesAdminMiddleware',
        'auth.blogs'     => 'Tsawler\Vcms5\Middleware\RedirectIfNotBlogsAdminMiddleware',
        'auth.events'    => 'Tsawler\Vcms5\Middleware\RedirectIfNotEventsAdminMiddleware',
        'auth.news'      => 'Tsawler\Vcms5\Middleware\RedirectIfNotNewsAdminMiddleware',
        'auth.faqs'      => 'Tsawler\Vcms5\Middleware\RedirectIfNotFaqsAdminMiddleware',
        'auth.galleries' => 'Tsawler\Vcms5\Middleware\RedirectIfNotGalleriesAdminMiddleware',
        'auth.menus'     => 'Tsawler\Vcms5\Middleware\RedirectIfNotMenusAdminMiddleware',
        'auth.users'     => 'Tsawler\Vcms5\Middleware\RedirectIfNotUsersAdminMiddleware',
    ];

}
