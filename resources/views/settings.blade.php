@extends('statamic::layout')
@section('title', 'Rich Snippet Pro')
@section('content')
    <div class="flex items-center mb-3">
        <h1 class="flex-1">Rich Snippet Settings</h1>
    </div>
    <div>
        <publish-form
                title="Settings"
                action="{{ cp_route('optimoapps.rich-snippet.update') }}"
                :blueprint='@json($blueprint)'
                :meta='@json($meta)'
                :values='@json($values)'
        />

    </div>
@stop