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

namespace OptimoApps\RichSnippet\Tags;


/**
 * Class BlogPostTags
 * @package OptimoApps\RichSnippet\Tags
 */
class BlogPostTags extends AbstractTags
{
    /**
     * @var string
     */
    protected static $handle = 'blogpost_schema';


    /**
     * @return string|null
     */
    public function index(): ?string
    {
        return $this->getBlogPostSchema();
    }

}