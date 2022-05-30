<?php

/** @var \Kirby\Cms\Page $page */

$data = [
  'title' => $page->title()->value(),
  'children' => $page
    ->children()
    ->listed()
    ->sortBy('date', 'desc')
    ->map(fn ($note) => [
      'id' => $note->id(),
      'title' => $note->title()->value(),
      'date' => $note->date()->toDate('d M, Y')
    ])
    ->values()
];

echo \Kirby\Data\Json::encode($data);
