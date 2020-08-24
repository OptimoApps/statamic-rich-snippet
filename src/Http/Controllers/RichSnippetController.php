<?php
/*
 * *
 *  *  * Copyright (C) optimoapps.com - All Rights Reserved
 *  *  * Unauthorized copying of this file, via any medium is strictly prohibited
 *  *  * Proprietary and confidential
 *  *  * Written by Sathish Kumar(satz) <sathish.thi@gmail.com>, ManiKandan<smanikandanit@gmail.com >
 *  *
 *
 */

namespace OptimoApps\RichSnippet\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use OptimoApps\RichSnippet\Fields as RichSnippetFields;
use Statamic\Facades\Blueprint;
use Statamic\Facades\File;
use Statamic\Facades\YAML;
use Statamic\Support\Arr;

/**
 * Class RichSnippetController.
 */
class RichSnippetController extends Controller
{
    /**
     * @param Request $request
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $blueprint = Blueprint::makeFromSections(RichSnippetFields::getOrganizationFields());
        $fields = $blueprint->fields();
        $values = collect(YAML::file(__DIR__.'/../content/rich-snippet.yaml')->parse())
            ->merge(YAML::file(base_path('content/rich-snippet.yaml'))->parse())
            ->all();
        $fields = $fields->addValues($values);

        $fields = $fields->preProcess();

        return view('statamic-rich-snippet::settings', [
            'blueprint' => $blueprint->toPublishArray(),
            'values' => $fields->values(),
            'meta' => $fields->meta(),
        ]);
    }

    /**
     * @param Request $request
     */
    public function update(Request $request): void
    {
        $blueprint = Blueprint::makeFromSections(RichSnippetFields::getOrganizationFields());
        $fields = $blueprint->fields();

        $fields = $fields->addValues($request->all());

        $fields->validate();

        $values = Arr::removeNullValues($fields->process()->values()->all());

        File::put(base_path('content/rich-snippet.yaml'), YAML::dump($values));
    }
}
