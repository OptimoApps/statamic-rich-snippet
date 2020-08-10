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

namespace OptimoApps\RichSnippet\Tags;


use Illuminate\Support\Collection;
use Statamic\Facades\YAML;
use Statamic\Tags\Tags;

abstract class AbstractTags extends Tags
{
    /**
     * @return Collection
     */
    protected function getOrganization(): Collection
    {
        return collect(YAML::file(__DIR__ . '/../content/rich-snippet.yaml')->parse())
            ->merge(YAML::file(base_path('content/rich-snippet.yaml'))->parse());
    }
}