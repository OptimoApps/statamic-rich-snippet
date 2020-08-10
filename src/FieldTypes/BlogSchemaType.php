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

class BlogSchemaType extends AbstractSchema
{
    public static $title = 'Blog Schema';

    public static $handle = 'blog_schema';

    public $selectable = false;

    protected function richSnippetFields(): array
    {
        return RichSnippetFields::getArticleSchemaFields($this->field->parent());
    }

    public function process($data)
    {
        if (Request::input('schema_type') === SchemaTypeEnum::BLOG_POSTING) {
            return $data;
        }
    }
}