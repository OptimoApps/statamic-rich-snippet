<?php
/*
 * *
 *  *  * Copyright (C) OptimoApps - All Rights Reserved
 *  *  * Unauthorized copying of this file, via any medium is strictly prohibited
 *  *  * Proprietary and confidential
 *  *  * Written by Sathish Kumar(satz) <info@optimoapps.com>
 *  *
 *
 */

namespace OptimoApps\RichSnippet\Listeners;

use OptimoApps\RichSnippet\SchemaTypeEnum;
use Statamic\Events\EntryBlueprintFound;


class AddRichSnippetBluePrint
{

    public function handle(EntryBlueprintFound $event): void
    {

        //to enable rich snippet
        $event->blueprint->ensureField('is_rich_snippet', [
            'type' => 'toggle',
            'display' => 'Is Rich Snippet?',
            'default' => 'true',
            'instructions' => 'Enable / Disable Rich Snippet'
        ], 'Rich Snippet');

        //select type
        $event->blueprint->ensureField('schema_type', [
            'type' => 'select',
            'display' => 'Select Type',
            'validate' => 'required',
            'placeholder' => 'Choose Schema Type',
            'options' => [
                SchemaTypeEnum::ARTICLE => 'Article',
                SchemaTypeEnum::BLOG_POSTING => 'Blog Posting',
                SchemaTypeEnum::NEWS_ARTICLE => 'News Article',
            ],
        ], 'Rich Snippet');

        /*
         * Article Schema FieldType
         */
        $event->blueprint->ensureField('article_schema', ['type' => 'article_schema','listable'=>false, 'if' => [
            'schema_type' => 'equals Article',
        ],], __('Rich Snippet'));

        /**
         *  BlogPosting Schema FieldType
         */
        $event->blueprint->ensureField('blog_schema', ['type' => 'blog_schema','listable'=>false, 'if' => [
            'schema_type' => 'equals BlogPosting',
        ],], __('Rich Snippet'));

        /**
         *  NewsArticle Schema FieldType
         */
        $event->blueprint->ensureField('news_schema', ['type' => 'news_schema','listable'=>false, 'if' => [
            'schema_type' => 'equals NewsArticle',
        ],], __('Rich Snippet'));


    }
}