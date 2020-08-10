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


use Spatie\SchemaOrg\Schema;


/**
 * Class RichSnippetOrganizationTags
 * @package OptimoApps\RichSnippet\Tags
 */
class OrganizationTags extends AbstractTags
{

    /**
     * @var string
     */
    protected static $handle = 'organization';

    /**
     * @return string
     */
    public function index(): string
    {
        if ($this->getOrganization()->get('display')) {
            $organization = $this->getOrganization()->transform(static function ($item, $key) {
                if ($key === 'logo') {
                    return asset('assets/' . $item);
                }
                return $item;
            });
            return Schema::organization()->name($organization->get('name'))
                ->url($organization->get('url'))
                ->logo($organization->get('logo'))
                ->address($organization->get('address'))
                ->contactPoint($organization->get('contactPoint'))
                ->toScript();
        }
        return '';
    }

}