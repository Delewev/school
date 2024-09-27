<?php

$tasks = [
    ['id' => 1,  'name' => 'Задача 1', 'parent_id' => null],
    ['id' => 2,  'name' => 'Задача 2', 'parent_id' => null],
    ['id' => 3,  'name' => 'Задача 3', 'parent_id' => null],
    ['id' => 4,  'name' => 'Подзадача 1.1',  'parent_id' => 1],
    ['id' => 5,  'name' => 'Подзадача 1.2', 'parent_id' => 1],
    ['id' => 6,  'name' => 'Подзадача 1.3',  'parent_id' => 1],
    ['id' => 7,   'name' => 'Подзадача 2.2', 'parent_id' => 2],
    ['id' => 8,  'name' => 'Подзадача 2.3',  'parent_id' => 2],
    ['id' => 9, 'name' => 'Подзадача 3.1', 'parent_id' => 3],
    ['id' => 10, 'name' => 'Подзадача 1.1.1',  'parent_id' => 4],
];

function buildTree(array $elements, $parentId = null) {
    $branch = [];

    foreach ($elements as $element) {
        if ($element['parent_id'] === $parentId) {
            $children = buildTree($elements, $element['id']);
            if ($children) {
                $element['children'] = $children;
            }
            $branch[] = $element;
        }
    }

    return $branch;
}

function displayTree(array $tree) {
    foreach ($tree as $node) {
        echo $node['name'] . "<br>";
        if (isset($node['children'])) {
            displayTree($node['children']);
        }
    }
}

$tree = buildTree($tasks);
displayTree($tree);
