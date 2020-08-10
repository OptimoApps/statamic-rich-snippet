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


use Illuminate\Http\Request;
use Statamic\Fields\Fields;
use Statamic\Fields\Fieldtype;

abstract class AbstractSchema extends Fieldtype
{
    public function preProcess($data)
    {
        return $this->fields()->addValues($data ?? [])->preProcess()->values()->all();
    }

    public function preload()
    {
        return [
            'fields' => $this->richSnippetFields(),
            'meta' => $this->fields()->meta()
        ];
    }

    protected function fields(): Fields
    {
        return (new Fields($this->richSnippetFields()));
    }

    protected function richSnippetFields(): array
    {

    }

}