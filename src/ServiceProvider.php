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

namespace OptimoApps\RichSnippet;


use OptimoApps\RichSnippet\FieldTypes\ArticleSchemaType;
use OptimoApps\RichSnippet\FieldTypes\BlogSchemaType;
use OptimoApps\RichSnippet\FieldTypes\NewsSchemaType;
use OptimoApps\RichSnippet\Listeners\AddRichSnippetBluePrint;
use OptimoApps\RichSnippet\Tags\OrganizationTags;
use OptimoApps\RichSnippet\Tags\WebPageTags;
use Statamic\Events\EntryBlueprintFound;
use Statamic\Facades\CP\Nav;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{

    protected $tags = [
        OrganizationTags::class,
        WebPageTags::class
    ];

    protected $routes = [
        'cp' => __DIR__ . '/../routes/cp.php',
    ];

    protected $fieldtypes = [
        ArticleSchemaType::class,
        BlogSchemaType::class,
        NewsSchemaType::class
    ];

    protected $scripts = [
        __DIR__ . '/../dist/js/rich_snippet-fieldtype.js'
    ];

    protected $listen = [
        EntryBlueprintFound::class => [
            AddRichSnippetBluePrint::class
        ]
    ];

    public function boot():void
    {
        parent::boot();
        Nav::extend(static function ($nav) {
            $nav->tools('Rich Snippet Pro')
                ->route('optimoapps.rich-snippet.index')
                ->icon('search-utility')
                ->active('optimoapps');
        });
    }
}