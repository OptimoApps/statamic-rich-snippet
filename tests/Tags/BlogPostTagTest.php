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

use OptimoApps\RichSnippet\Tags\BlogPostTags;
use OptimoApps\RichSnippet\Tests\TestCase;
use Statamic\Tags\Context;

class BlogPostTagTest extends TestCase
{
    protected BlogPostTags $tag;

    public function setUp(): void
    {
        parent::setUp();
        $this->tag = app()->make(BlogPostTags::class);
        $this->tag->context = (new Context([
            'is_rich_snippet' => true,
            'blog_schema' => [
                'headline' => 'headline test',
                'author' => 'Patrick Coombe',
                'award' => 'Best article ever written',
                'editor' => 'Craig Mount',
                'url' => 'http://www.example.com',
                'datePublished' => '2015-09-20',
                'dateCreated' => '2015-09-20',
                'dateModified' => '2015-09-20',
                'alternativeHeadline' => 'This article is also about robots and stuff',
                'image' => [
                    'http://example.com/image.jpg',
                ],
            ],
        ]));
    }

    /** test */
    public function testIsBlogPostDisplay(): void
    {
        $this->assertEquals(true, $this->tag->context->raw('is_rich_snippet'));
    }

    /** test */
    public function testArticleSchema(): void
    {
        $schema = $this->convertJsonLdtoArray($this->tag->index());
        $this->assertEquals($schema->headline, $this->tag->context->get('blog_schema')['headline']);
        $this->assertIsArray($schema->image);
    }
}
