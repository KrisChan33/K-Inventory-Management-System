<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Stephenjude\FilamentTwoFactorAuthentication\Events\{RecoveryCodeReplaced,RecoveryCodesGenerated,TwoFactorAuthenticationChallenged,TwoFactorAuthenticationConfirmed,TwoFactorAuthenticationDisabled,TwoFactorAuthenticationEnabled,TwoFactorAuthenticationFailed,ValidTwoFactorAuthenticationCodeProvided};

class EventServiceProvider extends ServiceProvider

{
    
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        TwoFactorAuthenticationChallenged::class => [
            // Dispatched when a user is required to enter 2FA code during login.
        ],
        TwoFactorAuthenticationFailed::class => [
            // Dispatched when a user provides incorrect 2FA code or recovery code during login.
        ],
        ValidTwoFactorAuthenticationCodeProvided::class => [
            // Dispatched when a user provides a valid 2FA code during login.
        ],
        TwoFactorAuthenticationConfirmed::class => [
            // Dispatched when a user confirms code during 2FA setup.
        ],
        TwoFactorAuthenticationEnabled::class => [
            // Dispatched when a user enables 2FA.
        ],
        TwoFactorAuthenticationDisabled::class => [
            // Dispatched when a user disables 2FA.
        ],
        RecoveryCodeReplaced::class => [
            // Dispatched after a user's recovery code is replaced.
        ],
        RecoveryCodesGenerated::class => [
            // Dispatched after a user's recovery codes are generated.
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
