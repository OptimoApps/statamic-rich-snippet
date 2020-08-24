# Rich Snippet (Schema.org JSON-LD)

![Statamic 3.0+](https://img.shields.io/badge/Statamic-3.0+-FF269E?link=https://statamic.com)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/optimoapps/statamic-rich-snippet.svg)](https://packagist.org/packages/optimoapps/statamic-rich-snippet)
[![Total Downloads](https://img.shields.io/packagist/dt/optimoapps/statamic-rich-snippet.svg)](https://packagist.org/packages/optimoapps/statamic-rich-snippet)
![run-tests](https://github.com/OptimoApps/statamic-rich-snippet/workflows/run-tests/badge.svg)
![Check & fix styling](https://github.com/OptimoApps/statamic-rich-snippet/workflows/Check%20&%20fix%20styling/badge.svg)

> Schema.Org Addon for generating Schema.org JSON-LD. Currently, supported type BlogPost, News Article, Article, Organization and Webpage.

#Installation
```composer require optimoapps/statamic-rich-snippet```
#How to use

Simply use `{{schema_json}}` ,it will smartly display related type schema if its generated.
 

#### Article Schema

```{{articles_schema}}```

#### Blog Post Schema

```{{blogpost_schema}}```

#### New Article Schema

```{{news_article_schema}}```

#### Organization Schema

```{{organization_schema}}```

#### Webpage Schema

```{{webpage_schema}}```

#Support & Bug

Find a bug? Have a feature request?  Open an issue on [github](https://github.com/OptimoApps/statamic-rich-snippet/issues) or Mail us [info@optimoapps.com](info@optimoapps.com)

## Rich Snippet is a Commercial Addon.

You can use it for free while in development, but requires a license to use on a live site. Learn more or buy a license on [The Statamic Marketplace](https://statamic.com/marketplace/addons/statamic-rich-snippet)!
