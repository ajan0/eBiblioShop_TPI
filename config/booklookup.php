<?php

return [
    'providers' => [
        [
            'url' => 'https://openlibrary.orgs/isbn/{isbn}.json',
            'jsonPaths' => [
                'title' => '$.title',
                'authors' => [
                    'subprovider' => 1,
                    'jsonPath' => '$.authors[*].key',
                ],
                'pages_num' => '$.number_of_pages',
                'published_at' => '$.publish_date',
            ]
        ],
        [
            'url' => 'https://www.googleapis.com/books/v1/volumes/?q=isbn:{isbn}&key=AIzaSyAOchxwmoEaKFQZoAKW2_x66EHRyAfPsEw',
            'jsonPaths' => [
                'title' => '$.items[0].volumeInfo.title',
                'authors' => '$.items[0].volumeInfo.authors',
                'pages_num' => '$.items[0].volumeInfo.pageCount',
                'published_at' => '$.items[0].volumeInfo.publishedDate',
                'description' => '$.items[0].volumeInfo.description',
            ]
        ],
        [
            'id' => 1,
            'url' => 'https://openlibrary.org/{authors}.json',
            'jsonPath' => '$.name'
        ]
    ]
];