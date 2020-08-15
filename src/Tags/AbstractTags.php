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

use Illuminate\Support\Collection;
use Spatie\SchemaOrg\Graph;
use Spatie\SchemaOrg\Schema;
use Statamic\Facades\YAML;
use Statamic\Support\Str;
use Statamic\Tags\Tags;

/**
 * Class AbstractTags.
 */
abstract class AbstractTags extends Tags
{
    protected $schema;

    /**
     * @return Collection
     */
    protected function getOrganization(): Collection
    {
        return collect(YAML::file(__DIR__.'/../content/rich-snippet.yaml')->parse())
            ->merge(YAML::file(base_path('content/rich-snippet.yaml'))->parse())
            ->transform(static function ($item, $key) {
                if ($key === 'logo') {
                    return asset('assets/'.$item);
                }

                return $item;
            });
    }

    /**
     * @return string
     */
    protected function getSchemaType(): string
    {
        return $this->context->raw('schema_type');
    }

    /**
     * @return bool
     */
    protected function isSchemaEnabled(): bool
    {
        return $this->context->raw('is_rich_snippet') !== null;
    }

    /**
     * @param string $schemaType
     * @return Collection
     */
    protected function getSchemaData(string $schemaType): Collection
    {
        return collect($this->context->raw($schemaType));
    }

    /**
     * @return string
     */
    protected function getBlogPostSchema(): ?string
    {
        if ($this->isSchemaEnabled()) {
            $schema = $this->getSchemaData('blog_schema');

            return Schema::blogPosting()
                ->headline($schema->get('headline'))
                ->alternativeHeadline($schema->get('alternativeHeadline'))
                ->image($this->processImage($schema->get('image')))
                ->award($schema->get('award'))
                ->editor($schema->get('editor'))
                ->genre($schema->get('genre'))
                ->keywords($schema->get('keywords'))
                ->wordCount($schema->get('wordCount'))
                ->dateCreated($schema->get('datePublished'))
                ->datePublished($schema->get('datePublished'))
                ->dateModified($schema->get('dateModified'))
                ->articleBody($schema->get('articleBody'))
                ->description($schema->get('description'))
                ->author($schema->get('author'))
                ->url($schema->get('url'))
                ->publisher(Schema::organization()->name($this->getOrganization()->get('name'))
                    ->url($this->getOrganization()->get('url'))
                    ->logo(Schema::imageObject()->url($this->getOrganization()->get('logo'))))
                ->mainEntityOfPage(Schema::webPage()->identifier($this->getOrganization()->get('url')))
                ->toScript();
        }

        return null;
    }

    /**
     * @return string
     */
    protected function getArticleSchema(): ?string
    {
        if ($this->isSchemaEnabled()) {
            $schema = $this->getSchemaData('article_schema');

            return Schema::article()
                ->headline($schema->get('headline'))
                ->alternativeHeadline($schema->get('alternativeHeadline'))
                ->image($this->processImage($schema->get('image')))
                ->award($schema->get('award'))
                ->editor($schema->get('editor'))
                ->genre($schema->get('genre'))
                ->keywords($schema->get('keywords'))
                ->wordCount($schema->get('wordCount'))
                ->dateCreated($schema->get('datePublished'))
                ->datePublished($schema->get('datePublished'))
                ->dateModified($schema->get('dateModified'))
                ->articleBody($schema->get('articleBody'))
                ->description($schema->get('description'))
                ->author($schema->get('author'))
                ->url($schema->get('url'))
                ->publisher(Schema::organization()->name($this->getOrganization()->get('name'))
                    ->url($this->getOrganization()->get('url'))
                    ->logo(Schema::imageObject()->url($this->getOrganization()->get('logo'))))
                ->mainEntityOfPage(Schema::webPage()->identifier($this->getOrganization()->get('url')))
                ->toScript();
        }

        return null;
    }

    /**
     * @return string
     */
    protected function getNewsArticleSchema(): ?string
    {
        if ($this->isSchemaEnabled()) {
            $schema = $this->getSchemaData('news_schema');

            return Schema::newsArticle()
                ->headline($schema->get('headline'))
                ->image($this->processImage($schema->get('image')))
                ->description($schema->get('description'))
                ->author(Schema::person()->name($schema->get('author')))
                ->dateCreated($schema->get('datePublished'))
                ->datePublished($schema->get('datePublished'))
                ->dateModified($schema->get('dateModified'))
                ->publisher(Schema::organization()->name($this->getOrganization()->get('name'))
                    ->url($this->getOrganization()->get('url'))
                    ->logo(Schema::imageObject()->url($this->getOrganization()->get('logo'))))
                ->mainEntityOfPage(Schema::webPage()->identifier($this->getOrganization()->get('url')))
                ->toScript();
        }

        return null;
    }

    /**
     * @return string
     */
    protected function getWebPageSchema(): ?string
    {
        if ($this->getOrganization()->get('display')) {
            $graph = new Graph();
            $graph->profilePage()->publisher($this->getOrganization()->get('webpage_name'));

            return Schema::webPage()->name($this->getOrganization()->get('webpage_name'))
                ->description($this->getOrganization()->get('webpage_description'))
                ->publisher($graph)
                ->toScript();
        }

        return null;
    }

    /**
     * @return string
     */
    protected function getOrganizationSchema(): ?string
    {
        if ($this->getOrganization()->get('display')) {
            return Schema::organization()->name($this->getOrganization()->get('name'))
                ->url($this->getOrganization()->get('url'))
                ->logo($this->getOrganization()->get('logo'))
                ->address($this->getOrganization()->get('address'))
                ->contactPoint($this->getOrganization()->get('contactPoint'))
                ->toScript();
        }

        return null;
    }

    private function processImage($images)
    {
        if (is_array($images)) {
            $data = collect();
            foreach ($images as $image) {
                if (Str::contains($image, 'assets::')) {
                    $data->push(asset(Str::replaceFirst('::', '/', $image)));
                }
            }

            return $data->toArray();
        }
    }
}
