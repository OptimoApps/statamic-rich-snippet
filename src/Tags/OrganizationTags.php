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

namespace OptimoApps\RichSnippet\Tags;

/**
 * Class RichSnippetOrganizationTags.
 */
class OrganizationTags extends AbstractTags
{
    /**
     * @var string
     */
    protected static $handle = 'organization_schema';

    /**
     * @return string
     */
    public function index(): ?string
    {
        return $this->getOrganizationSchema();
    }
}
