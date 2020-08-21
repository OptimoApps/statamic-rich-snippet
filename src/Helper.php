<?php
/*
 * *
 *  *  * Copyright (C) Woosu Automative India Private Limited - All Rights Reserved
 *  *  * Unauthorized copying of this file, via any medium is strictly prohibited
 *  *  * Proprietary and confidential
 *  *  * Written by Sathish Kumar(satz) <sathish.thi@gmail.com>ManiKandan<smanikandanit@gmail.com >
 *  *
 *
 */

use Scrumpy\ProseMirrorToHtml\Renderer;
use Statamic\Facades\Markdown;

/*
 *  Generate HTML from content
 */
if (!function_exists('generateHtml')) {
    function generateHtml($content)
    {
        if (is_array($content)) {

            return (new Renderer())->render([
                'type' => 'doc',
                'content' => $content
            ]);
        }
        if (Markdown::hasParser($content)) {
            return Markdown::parser($content);
        }
        return $content;

    }
}
