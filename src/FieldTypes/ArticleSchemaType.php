<?php
/*
 * *
 *  *  * Copyright (C) OptimoApps - All Rights Reserved
 *  *  * Unauthorized copying of this file, via any medium is strictly prohibited
 *  *  * Proprietary and confidential
 *  *  * Written by Sathish Kumar(satz) <sathish.thi@gmail.com>
 *  *
 *
 */

namespace OptimoApps\RichSnippet\FieldTypes;

use Illuminate\Support\Facades\Request;
use OptimoApps\RichSnippet\Fields as RichSnippetFields;
use OptimoApps\RichSnippet\SchemaTypeEnum;


class ArticleSchemaType extends AbstractSchema
{
    public static $title = 'Article Schema';

    public static $handle = 'article_schema';

    public $selectable = false;

    protected function richSnippetFields(): array
    {
        return RichSnippetFields::getArticleSchemaFields($this->field->parent());
    }

    public function process($data)
    {
        if (Request::input('schema_type') === SchemaTypeEnum::ARTICLE) {
            return $data;
        }
    }
}