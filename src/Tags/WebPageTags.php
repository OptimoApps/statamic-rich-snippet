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


use Spatie\SchemaOrg\Graph;
use Spatie\SchemaOrg\Schema;


class WebPageTags extends AbstractTags
{
    /**
     * @var string
     */
    protected static $handle = 'webpage';

    /**
     * @return string
     */
    public function index(): string
    {
        if ($this->getOrganization()->get('webpage_display')) {
            $graph = new Graph();
            $graph->profilePage()->publisher($this->getOrganization()->get('webpage_name'));
            return Schema::webPage()->name($this->getOrganization()->get('webpage_name'))
                ->description($this->getOrganization()->get('webpage_description'))
                ->publisher($graph)
                ->toScript();

        }
        return '';
    }


}