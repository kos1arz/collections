<?php

declare(strict_types=1);

namespace App\Service\Admin;

class EasyAdminLanguage
{
    public static function getIdLang(): int
    {
        if (isset($_GET['lang']) && is_numeric($_GET['lang'])) {
            return (int)$_GET['lang'];
        }

        return 1;
    }
}
