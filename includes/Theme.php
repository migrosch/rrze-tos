<?php

namespace RRZE\Tos;

defined('ABSPATH') || exit;

class Theme {
    /**
     * List of known Themes
     */
    protected static function allowedStylesheets() {
        return [
            'fau' => [
                'FAU-Einrichtungen',
                'FAU-Einrichtungen-BETA',
                'FAU-Medfak',
                'FAU-RWFak',
                'FAU-Philfak',
                'FAU-Techfak',
                'FAU-Natfak',
            ],
            'rrze' => [
                'rrze-2015',
                'rrze-2019',
            ],
            'events' => [
                'FAU-Events',
            ],
        ];
    }

    /**
     * Get the current theme stylesheet group
     * @return string return the current theme stylesheet group or 'default'
     */
    public static function getCurrentStylesheetGroup()
    {
        $currentStylesheet = get_stylesheet();
        $allowedStylesheets = self::allowedStylesheets();

        foreach ($allowedStylesheets as $styleGroup => $stylesheets) {
            if (is_array($stylesheets) && in_array(
                strtolower($currentStylesheet),
                array_map('strtolower', $stylesheets),
                true
            )) {
                return $styleGroup;
            }
        }

        return 'default';
    }

}
