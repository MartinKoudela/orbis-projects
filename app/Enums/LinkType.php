<?php

namespace App\Enums;

enum LinkType: string
{
    case GitHub = 'github';
    case Website = 'website';
    case AppStore = 'appstore';
    case GooglePlay = 'googleplay';
    case Video = 'video';
    case Other = 'other';

    public function label(): string
    {
        return match ($this) {
            self::GitHub => 'GitHub',
            self::Website => 'Web',
            self::AppStore => 'App Store',
            self::GooglePlay => 'Google Play',
            self::Video => 'Video',
            self::Other => 'Ostatní',
        };
    }
}
