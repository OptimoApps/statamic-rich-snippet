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

namespace OptimoApps\RichSnippet\FieldTypes;


use Illuminate\Support\Facades\Request;
use OptimoApps\RichSnippet\Fields as RichSnippetFields;
use OptimoApps\RichSnippet\SchemaTypeEnum;

class NewsSchemaType extends AbstractSchema
{
    public static $title = 'News Schema';

    public static $handle = 'news_schema';

    public $selectable = false;

    protected function richSnippetFields(): array
    {
        return RichSnippetFields::getNewsArticleFields($this->field->parent());
    }

    public function process($data)
    {
        if (Request::input('schema_type') === SchemaTypeEnum::NEWS_ARTICLE) {
            return $data;
        }
    }
}