<?php

use craft\elements\Entry;
use craft\helpers\UrlHelper;

return [
    'endpoints' => [
        '/api/detailsproduct' => function() {
            return [
                'elementType' => Entry::class,
                'criteria' => ['section' => 'detailsproduct'],
                'cache' => false, 
                'serializer' => 'jsonFeed',
                'transformer' => function(Entry $entry) {
                    return [
                        'id' => $entry->id,
                        'title' => $entry->title,
                       'productimage' => str_replace("https", "http", $entry->imageproduct->one()->getUrl('')),
                       'price' => $entry->price,
                    ];
                },
            ];
        },
        '/api/detailsproduct/<entryId:\d+>' => function($entryId) {
            return [
                'elementType' => Entry::class,
                'criteria' => ['id' => $entryId],
                'cache' => false, 
                'serializer' => 'jsonFeed',
                'one' => true,
                'transformer' => function(Entry $entry) {
                    return [
                        'id' => $entry->id,
                        'title' => $entry->title,
                       'productimage' => str_replace("https", "http", $entry->imageproduct->one()->getUrl('')),
                       'price' => $entry->price,
                       'details' => $entry->details,
                       'colorway' => $entry->colorway,
                       
                    ];
                },
            ];
        },
    ]
];