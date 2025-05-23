<?php

return [

  /*
    |--------------------------------------------------------------------------
    | Feeds
    |--------------------------------------------------------------------------
    |
    | Ability to define Atom and RSS feed routes.
    |
    | You can create as many feeds as you like in the key:value setup, and even
    | override some defaults (or use defaults) to make your config simpler.
    |
    | The key is used as a reference to your feed, and is used as part of the
    | cache key for the feed.
    |
    */

  'feeds' => [
    'blog' => [
      /*
            | The title for the feed
            */
      'title' => '',

      /*
            | The description (RSS) or subtitle (Atom) for the feed
            */
      'description' => '',

      /*
            | Define the Atom and RSS routes for the feed.
            | By default, an atom and RSS 2.0 feed will be generated.
            | Remove from the array to disable a specific feed type.
            */
      'routes' => [
        'atom' => '/feed/atom',
        'rss' => '/feed'
      ],

      /*
            | The alternative link used. If omitted, will be the app.url value - which is fine too
            */
      'alt_url' => '',

      /*
            | An array of collections to include in the feed
            | Each collection must be configured with Publish Dates enabled
            | Remove from the array to disable a specific feed type.
            */
      'collections' => [
        'blog'
      ],

      /*
            | An array of Taxonomies and Terms to include in the feed.
            | The key of should be the Taxonomy handle, with two properties - logic, and handles (of the tags).
            |    'taxonomies' => [
            |        'taxonomy_handle' => [
            |            'logic' => 'and', // also could be "or"
            |            'handles' => [
            |                'my-tag',
            |                'another-tag'
            |            ]
            |        ]
            |    ]
            |
             */
      'taxonomies' => [],

      /*
            | You can also override the following configuration for feed-specific
            | values:
            |   - author
            |   - copyright
            |   - image
            |   - language
            |   - limit
            |   - summary
            */
      /*
            For example, this summary would only apply to this feed:
            'summary' => [
                'short_intro',
                'introduction'
            ],

            Or, only allowing 10 entries to be returned for a specific feed
            'limit' => 10
             */

      /*
            | You can provide a Query Scope to help filter feeds based on additional
            | Query Builder logic specific to your needs and Blueprints. Create your
            | scope, and include it as the 'scope' config for your feed, and it will
            | get applied to Feedamic's query logic when building your feed.
            |
            | See https://statamic.dev/extending/query-scopes-and-filters#scopes
            */
      /*
            'scope' => \App\Scopes\MyFeedamicScope::class
             */

      /*
            | While you can publish the views and override these globally, there may
            | be times you want to override a specific feed's view(s). These should
            | be a valid view within your site (i.e. resources/views/...), and you
            | can override just one view, or both, or neither. Leave the 'view'
            | param out of your config to fall back to Feedamic's views.
            |
            | See https://docs.mity.com.au/feedamic/views
            */
      /*
            'view' => [
                'atom' => 'path-to-atom-template',
                'rss' => 'path-to-rss-template',
            ]
            */

      /*
            | You can also change the view model for a specific feed. If you omit this,
            | default will be used.
            */
      /*
            'model' => \App\Models\MyAlternateFeedEntry::class
             */

    ],
  ],


  /*
    |--------------------------------------------------------------------------
    | Cache Key
    |--------------------------------------------------------------------------
    |
    | The base cache key for output.
    |
    | Will be cached forever until EventSaved is fired, or you manually clear the cache.
    |
    */

  'cache' => 'feedamic',


  /*
    |--------------------------------------------------------------------------
    | DEFAULTS: Summary
    |--------------------------------------------------------------------------
    |
    | This is the default that applies to all configured 'feeds', unless overwritten
    | for a specific feed configuration.
    |
    | A list of blueprint fields to look at to try to build the "summary" for the feed.
    |
    | This is ordered - the first field will be looked first, then the second, etc.
    |
    | When content is found, it will be used, and other fields will be ignored.
    |
    */

  'summary' => [
    'introduction',
    'meta_description'
  ],


  /*
    |--------------------------------------------------------------------------
    | DEFAULTS: Image
    |--------------------------------------------------------------------------
    |
    | This is the default that applies to all configured 'feeds', unless overwritten
    | for a specific feed configuration.
    |
    | Configuration options for the image to be injected in to the "summary" for the entry.
    |
    | This only applies when Summary is being used.
    |
    | The Fields behave like summary - a cascading list of image fields to look at. You can specify the width
    | and height too to use for the image generation. If omitted, will be 1280 x 720.
    |
    | Disable this by setting to false.
    |
    */

  'image' => [
    'fields' => [
      'hero',
      'meta_og_image'
    ],
    'width' => 1280,
    'height' => 720
  ],


  /*
    |--------------------------------------------------------------------------
    | DEFAULTS: Author
    |--------------------------------------------------------------------------
    |
    | This is the default that applies to all configured 'feeds', unless overwritten
    | for a specific feed configuration.
    |
    | Sets the lookup of an author field.
    |
    | Set to "false" to disable looking for author details.
    |
    | If used,
    |   "handle" defines the blueprint reference to the author, a Statamic user
    |   "email", when true, will output the <email> for atom feeds
    |   "name", a pattern to use to build the name output
    |
    | For "name", each handle is in square brackets, and is used to concatenate fields if you are using
    | or want to customise the name output. For example, "[name_first] [name_last]" would pick "name_first"
    | and "name_last" from the User.
    |
    */

  'author' => [
    'handle' => 'author',

    // true to include the email in the feed, false to exclude - atom only
    'email' => false,

    // the name pattern to use for the author name
    'name' => '[name]',
  ],


  /*
    |--------------------------------------------------------------------------
    | DEFAULTS: Copyright
    |--------------------------------------------------------------------------
    |
    | This is the default that applies to all configured 'feeds', unless overwritten
    | for a specific feed configuration.
    |
    | A string to output to the <copyright> (RSS) or <rights> (Atom) feed.
    |
    | False will exclude this element.
    |
    */

  'copyright' => false,


  /*
    |--------------------------------------------------------------------------
    | DEFAULTS: Language
    |--------------------------------------------------------------------------
    |
    | This is the default that applies to all configured 'feeds', unless overwritten
    | for a specific feed configuration.
    |
    | Marks the feed as being in a specific language.
    |
    | As Atom, using xml:lang, can use more language definitions than the RSS specification, refer to the
    | RSS specification for suitable codes:
    |   https://www.rssboard.org/rss-language-codes
    |
    */

  'language' => 'en',


  /*
    |--------------------------------------------------------------------------
    | DEFAULTS: Limit
    |--------------------------------------------------------------------------
    |
    | This is the default that applies to all configured 'feeds', unless overwritten
    | for a specific feed configuration.
    |
    | Limits the number of entries returned in a feed.
    |
    */

  'limit' => null,


  /*
    |--------------------------------------------------------------------------
    | DEFAULTS: Locales
    |--------------------------------------------------------------------------
    |
    | This is the default that applies to all configured 'feeds', unless overwritten
    | for a specific feed configuration.
    |
    | Limits the entries local to a list of locales, e. g.
    | 'locales' => ['com', 'uk']
    |
    | To include only the current locale, provide the special 'current' string:
    | 'locales' => 'current'
    |
    | When not set or null, all locales will be included.
    |
    */

  'locales' => null,

  /*
    |--------------------------------------------------------------------------
    | DEFAULTS: Feed Model
    |--------------------------------------------------------------------------
    |
    | This is the default model used to generate the feed.
    |
    | You can extend the default model to add additional functionality, or to
    | override the default behaviour.
    |
    */
  'model' => \MityDigital\Feedamic\Models\FeedEntry::class,
];
