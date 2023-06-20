<?php

namespace App\Main;

class SideMenu
{    
    public static function menu()
    {
        return [
            'dashboard' => [
                'icon' => 'home',
                'route_name' => 'dashboard-view',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Dashboard'
            ],
            'file-manager' => [
                'icon' => 'hard-drive',
                'route_name' => 'file-manager',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'File Manager'
            ],
            'profile' => [
                'icon' => 'user',
                'route_name' => 'profile-overview-2',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Profile'
            ],
        ];
    }
}
