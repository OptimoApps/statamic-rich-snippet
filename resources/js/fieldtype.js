/*
 * *
 *  *  * Copyright (C) OptimoApps - All Rights Reserved
 *  *  * Unauthorized copying of this file, via any medium is strictly prohibited
 *  *  * Proprietary and confidential
 *  *  * Written by Sathish Kumar(satz) <sathish.thi@gmail.com>
 *  *
 *
 */

import ArticleSchema from './components/article_schema-fieldtype';
import BlogSchema from './components/blog_schema-fieldtype';
import NewsSchema from './components/news_schema-fieldtype';

Statamic.booting(() => {
    Statamic.$components.register('article_schema-fieldtype', ArticleSchema);
    Statamic.$components.register('blog_schema-fieldtype', BlogSchema);
    Statamic.$components.register('news_schema-fieldtype', NewsSchema);
});