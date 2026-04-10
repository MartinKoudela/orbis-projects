<?php

namespace App\Enums;

enum LinkType: string
{
    case GITHUB = 'github';
    case WEBSITE = 'website';
    case APP_STORE = 'appstore';
    case GOOGLE_PLAY = 'googleplay';
    case VIDEO = 'video';
    case OTHER = 'other';

    public function label(): string
    {
        return match ($this) {
            self::GITHUB => 'GitHub',
            self::WEBSITE => 'Web',
            self::APP_STORE => 'App Store',
            self::GOOGLE_PLAY => 'Google Play',
            self::VIDEO => 'Video',
            self::OTHER => 'Ostatní',
        };
    }
}
