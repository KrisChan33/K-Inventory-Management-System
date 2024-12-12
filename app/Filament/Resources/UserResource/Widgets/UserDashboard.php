<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Spatie\Permission\Contracts\Role;

class UserDashboard extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            // ->description('3% increase')
            // ->descriptionIcon('heroicon-m-arrow-trending-up')
            // ->color('success'),

            Stat::make('Total Users', User::count()) 
                ->icon('heroicon-o-users')
                ->color('primary')
                ->description('Total number of users in the system'),

            Stat::make('Total Admins', User::role('super_admin')->count())
                ->icon('heroicon-o-user-group')
                ->color('primary')
                ->description('Total number of Admins in the system'),

            Stat::make('Total Staff', User::role('Staff')->count())
                ->icon('heroicon-o-user-group')
                ->color('primary')
                ->description('Total number of Staff in the system'),
        ];
    }
    public static function canView(): bool
    {

        return User::where('id', auth()->id())->first()->hasRole('super_admin');

    }
}