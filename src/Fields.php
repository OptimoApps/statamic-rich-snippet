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

namespace OptimoApps\RichSnippet;


use Statamic\Entries\Entry;
use Statamic\Facades\Markdown;
use Statamic\Support\Str;

/**
 * Class Fields
 * @package OptimoApps\RichSnippet
 */
class Fields
{
    /**
     * @param Entry $entry
     * @return array[]
     */
    public static function getBlogPostFields(Entry $entry): array
    {
        return self::getArticleSchemaFields($entry);
    }

    /**
     * @param Entry $entry
     * @return array[]
     */
    public static function getNewsArticleFields(Entry $entry): array
    {
        return [
            [
                'handle' => 'headline',
                'field' => [
                    'type' => 'text',
                    'display' => 'Headline',
                    'default' => $entry->data()->get('title'),
                ]
            ],
            [
                'handle' => 'description',
                'field' => [
                    'type' => 'textarea',
                    'display' => 'Description',
                    'default' => strip_tags(Str::limit(Markdown::parse($entry->data()->get('content')), 200))
                ]
            ],
            [
                'handle' => 'url',
                'field' => [
                    'type' => 'text',
                    'display' => 'URL',
                    'default' => $entry->absoluteUrl()
                ]
            ],
            [
                'handle' => 'image',
                'field' => [
                    'type' => 'assets',
                    'max_files' => 3,
                    'display' => 'Image',
                    'instructions' => 'Recommended dimensions of 800x800 for optimal clarity, Upload Max 3 images',

                ]
            ],

            [
                'handle' => 'datePublished',
                'field' => [
                    'type' => 'text',
                    'display' => 'Date Published',
                    'default' => $entry->date()->format('Y-m-d'),
                    'read_only' => true
                ]
            ],
            [
                'handle' => 'dateModified',
                'field' => [
                    'type' => 'text',
                    'display' => 'Date Modified',
                    'default' => $entry->lastModified()->format('Y-m-d'),
                    'read_only' => true
                ]
            ],
            [
                'handle' => 'author',
                'field' => [
                    'type' => 'text',
                    'display' => 'Author',
                    'default' => $entry->lastModifiedBy()->name,
                    'read_only' => true
                ]
            ]
        ];
    }


    /**
     * @param Entry $entry
     * @return array[]
     */
    public static function getArticleSchemaFields(Entry $entry): array
    {
        return [
            [
                'handle' => 'headline',
                'field' => [
                    'type' => 'text',
                    'display' => 'Headline',
                    'default' => $entry->data()->get('title'),
                ]
            ],
            [
                'handle' => 'alternativeHeadline',
                'field' => [
                    'type' => 'text',
                    'display' => 'Alternative Headline',
                ]
            ],
            [
                'handle' => 'award',
                'field' => [
                    'type' => 'text',
                    'display' => 'Award',
                ]
            ],
            [
                'handle' => 'genre',
                'field' => [
                    'type' => 'text',
                    'display' => 'Genre',
                ]
            ],
            [
                'handle' => 'description',
                'field' => [
                    'type' => 'textarea',
                    'display' => 'Description',
                    'default' => strip_tags(Str::limit(Markdown::parse($entry->data()->get('content')), 200))
                ]
            ],
            [
                'handle' => 'articleBody',
                'field' => [
                    'type' => 'textarea',
                    'display' => 'Article Body',
                    'default' => strip_tags(Markdown::parse($entry->data()->get('content')))
                ]
            ],
            [
                'handle' => 'url',
                'field' => [
                    'type' => 'text',
                    'display' => 'URL',
                    'default' => $entry->absoluteUrl()
                ]
            ],
            [
                'handle' => 'image',
                'field' => [
                    'type' => 'assets',
                    'max_files' => 1,
                    'display' => 'Image',
                    'instructions' => 'Recommended dimensions of 800x800 for optimal clarity',

                ]
            ],
            [
                'handle' => 'keywords',
                'field' => [
                    'type' => 'text',
                    'display' => 'Keywords',
                    'default' => $entry->slug()
                ]
            ],
            [
                'handle' => 'wordCount',
                'field' => [
                    'type' => 'text',
                    'display' => 'WordCount',
                    'default' => str_word_count($entry->data()->get('content')),
                    'validate' => 'numeric',
                ]
            ],
            [
                'handle' => 'datePublished',
                'field' => [
                    'type' => 'text',
                    'display' => 'Date Published',
                    'default' => $entry->date()->format('Y-m-d'),
                    'read_only' => true
                ]
            ],
            [
                'handle' => 'dateModified',
                'field' => [
                    'type' => 'text',
                    'display' => 'Date Modified',
                    'default' => $entry->lastModified()->format('Y-m-d'),
                    'read_only' => true
                ]
            ],
            [
                'handle' => 'author',
                'field' => [
                    'type' => 'text',
                    'display' => 'Author',
                    'default' => $entry->lastModifiedBy()->name,
                    'read_only' => true
                ]
            ]
        ];
    }


    /**
     * @return array|array[]
     */
    public static function getOrganizationFields(): array
    {
        return [
            'organization' => [
                'display' => 'Organizations',
                'fields' => [
                    'section' => [
                        'type' => 'section',
                        'display' => 'Organization',
                        'instructions' => 'Schema.org “Organization” type'
                    ],
                    'display' => [
                        'type' => 'toggle',
                        'display' => 'Disable/Enable schema.org Organization type',
                        'default' => true,
                    ],
                    'name' => [
                        'type' => 'text',
                        'display' => 'Organization Name',
                        'instructions' => 'Provide your organizations name'
                    ],
                    'url' => [
                        'type' => 'text',
                        'display' => 'URL',
                        'validate' => 'active_url'
                    ],
                    'logo' => [
                        'type' => 'assets',
                        'max_files' => 1,
                        'display' => 'Logo',
                        'instructions' => 'Use your logo or any other branded image for the rest of your pages. Use images with a 1.91:1 ratio and minimum recommended dimensions of 1200x630 for optimal clarity across all devices. The image will be resized to 1200 width.',
                    ],
                    'address' => [
                        'type' => 'array',
                        'display' => 'Address',
                        'keys' =>
                            [
                                'streetAddress' => 'Street Address',
                                'addressLocality' => 'Address Locality',
                                'addressRegion' => 'Address Region',
                                'postalCode' => 'Postal Code'
                            ],
                        'mode' => 'keyed',
                        'instructions' => 'Specify Organization Address'
                    ],
                    'contactPoint' => [
                        'type' => 'array',
                        'display' => 'Contact Point',
                        'keys' =>
                            [
                                'email' => 'Email',
                                'telephone' => 'Telephone',
                                'contactType' => 'Contact Type',
                            ],
                        'mode' => 'keyed',
                        'instructions' => 'Specify Organization Contact Point'
                    ],
                ]
            ],
            'webpage' => [
                'display' => 'WebPage',
                'fields' => [
                    'section' => [
                        'type' => 'section',
                        'display' => 'WebPage',
                        'instructions' => 'Schema.org “WebPage” type'
                    ],
                    'webpage_display' => [
                        'type' => 'toggle',
                        'display' => 'Disable/Enable Schema.org WebPage type',
                        'default' => true,
                    ],
                    'webpage_name' => [
                        'type' => 'text',
                        'display' => 'Name',
                        'instructions' => 'Name of your site'
                    ],
                    'webpage_description' => [
                        'type' => 'text',
                        'display' => 'Description',
                        'instructions' => 'Maybe you can describe your website here or provide meta description here'
                    ],
                ]
            ]
        ];
    }

}