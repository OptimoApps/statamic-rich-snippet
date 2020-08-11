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

namespace OptimoApps\RichSnippet\Tests\Tags;

use OptimoApps\RichSnippet\Tags\NewsArticleTags;
use OptimoApps\RichSnippet\Tests\TestCase;
use Statamic\Tags\Context;

class NewsArticleTagTest extends TestCase
{
    protected NewsArticleTags $tag;

    public function setUp(): void
    {
        parent::setUp();
        $this->tag = app()->make(NewsArticleTags::class);
        $this->tag->context = (new Context([
            'is_rich_snippet' => true,
            'news_schema' => [
                'datePublished' => '2015-09-20',
                'dateCreated' => '2015-09-20',
                'dateModified' => '2015-09-20',
                'description' => 'This article is also about robots and stuff',
            ],
        ]));
    }

    /** test */
    public function testNewsArticleDisplay(): void
    {
        $this->assertEquals(true, $this->tag->context->raw('is_rich_snippet'));
    }

    /** test */
    public function testNewsArticleSchema(): void
    {
        $schema = $this->convertJsonLdtoArray($this->tag->index());
        $this->assertEquals($schema->description, $this->tag->context->get('news_schema')['description']);
    }
}
