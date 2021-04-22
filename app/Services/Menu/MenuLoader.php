<?php declare(strict_types=1);

namespace App\Services\Menu;

class MenuLoader
{
    public static function main(): array
    {
        return config('phponline.nav.main');
    }

    public static function user(): array
    {
        return config('phponline.nav.user');
    }

    public static function footer(): array
    {
        return config('phponline.nav.footer');
    }
}
