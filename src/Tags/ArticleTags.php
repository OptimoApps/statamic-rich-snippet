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


class ArticleTags extends BlogPostTags
{
    protected static $handle = 'articles_schema';

    /**
     * @return string|null
     */
    public function index(): ?string
    {
        return $this->getArticleSchema();
    }
}