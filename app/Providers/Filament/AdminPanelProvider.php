<?php

namespace App\Providers\Filament;

use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Filament\Enums\ThemeMode;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\MaxWidth;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Joaopaulolndev\FilamentEditProfile\FilamentEditProfilePlugin;
use Joaopaulolndev\FilamentEditProfile\Pages\EditProfilePage;
use Stephenjude\FilamentTwoFactorAuthentication\TwoFactorAuthenticationPlugin;


class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->registration()
            ->brandName('K Inventory Management Web App')
              //authentications
                ->login()
                ->registration()
              // ->passwordReset()
                ->emailVerification()
            //   ->profile(EditProfile::class)//->profile(isSimple: false)
              //breadcrumbs navigation upper part of page that informs the user of their current location within the application
              // ->breadcrumbs(false);
              
            //Themes and fonts and sizes are
            ->defaultThemeMode(ThemeMode::Dark)
            ->font('poppins', '500')
            ->colors([
                'primary' => Color::Green,
            ])
            ->maxContentWidth(MaxWidth::SevenExtraLarge)

            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->plugins([
                //roles and permissions
                \BezhanSalleh\FilamentShield\FilamentShieldPlugin::make(),
                //2FA Feature
                TwoFactorAuthenticationPlugin::make()
                ->addTwoFactorMenuItem() // Add 2FA settings to user menu items
                ->enforceTwoFactorSetup(
                    false,
                ), // Enforce 2FA setup for all users
                FilamentEditProfilePlugin::make()
                ->slug('my-profile')
                ->setTitle('My Profile')
                ->setNavigationLabel('My Profile')
                // ->setNavigationGroup('Group Profile')
                ->setIcon('heroicon-o-user')
                ->setSort(10)
                // ->canAccess(fn () => auth()->user()->id === 1)
                ->shouldRegisterNavigation(true)
                ->shouldShowDeleteAccountForm(true)
                ->shouldShowSanctumTokens(
                    // condition: fn() => auth()->user()->id === 1, //optional
                    permissions: ['custom', 'abilities', 'permissions'] //optional
                )
                ->shouldShowBrowserSessionsForm(
                    // fn() => auth()->user()->id === 1, //optional
                    //OR
                    true //optional
                )
                ->shouldShowAvatarForm(
                    value: true,
                    directory: 'avatars', // image will be stored in 'storage/app/public/avatars
                    rules: 'mimes:jpeg,png|max:1024' //only accept jpeg and png files with a maximum size of 1MB
                ),
                    // ->customProfileComponents([
                //     \App\Livewire\CustomProfileComponent::class,
                // ])
                ])
            ->userMenuItems([
                'profile' => MenuItem::make()
                    ->label(fn() => auth()->user()->name)
                    ->url(fn (): string => EditProfilePage::getUrl())
                    ->icon('heroicon-m-user-circle')
                    //If you are using tenancy need to check with the visible method where ->company() is the relation between the user and tenancy model as you called
                    // ->visible(function (): bool {
                    //     return auth()->user()->company()->exists();
                    // }),
            ])
            ;
   
    }


}
