<?php
declare(strict_types=1);

$examples = file_get_contents(__DIR__ . '/../examples.json');

$json = json_decode($examples, true);

foreach ($json as $key => $example) {
    echo "\n\n<br><br>^^^^^^^^^Example: $key\n\n<br>";

    $graph = [];
    $graph['finish'] = [];

    $costs = [];
    $costs['finish'] = INF;

    $parents = [];
    $parents['finish'] = null;

    $result = 0;

    foreach ($example as $nodeName => $neighbours) {
        $graph[$nodeName] = [];
        foreach ($neighbours as $neighbourName => $weight) {
            $graph[$nodeName][$neighbourName] = $weight;

            if ($nodeName === 'start') {
                echo "Setting cost for {$neighbourName} to {$weight}\n<br>";
                $costs[$neighbourName] = $weight;
                $parents[$neighbourName] = $nodeName;
            } else if(!isset($costs[$neighbourName])) {
                echo "Setting cost for {$neighbourName} to INF\n<br>";
                $costs[$neighbourName] = INF;
                $parents[$neighbourName] = null;
            }
        }
    }

    echo " ------ Graph: \n<br>";
    print_r($graph);
    echo "\n<br>";
    echo " ------ Costs: \n<br>";
    print_r($costs);
    echo "\n<br>";
    echo " ------ Parents: \n<br>";
    print_r($parents);
    echo "\n<br>\n<br>";

    $result = dijkstra($graph, $costs, $parents);

    echo " ------ Shortest path costs: {$result}\n<br>";
    echo " ------ Path: " . drawPath($parents);
}

function dijkstra(array &$graph, array &$costs, array &$parents): int {
    $processed = [];
    $node = findLowestCostNode($costs, $processed);

    echo "First Lowest cost node: {$node}\n<br>";

    while ($node !== null) {
        echo "Processing node: {$node}\n<br>";
        $cost = $costs[$node];
        $neighbours = $graph[$node];

        foreach ($neighbours as $neighbourName => $neighbourWeight) {
            echo "Checking neighbour: {$neighbourName} with weight: {$neighbourWeight}\n<br>";
            $newCost = $cost + $neighbourWeight;
            echo "New cost to reach {$neighbourName}: {$newCost}; previous cost: {$costs[$neighbourName]}\n<br>";
            if ($costs[$neighbourName] > $newCost) {
                echo "Updating cost for {$neighbourName} from {$costs[$neighbourName]} to {$newCost}\n<br>";
                $costs[$neighbourName] = $newCost;
                $parents[$neighbourName] = $node;
                print_r($costs);
                echo "\n<br>";
                print_r($parents);
                echo "\n<br>";
            }
        }

        $processed[] = $node;
        $node = findLowestCostNode($costs, $processed);
    }

    return $costs['finish'];
}

function findLowestCostNode(array $costs, array $processed): ?string {
    $lowestCost = INF;
    $lowestCostNode = null;

    foreach ($costs as $node => $cost) {
        if ($cost < $lowestCost && !in_array($node, $processed)) {
            $lowestCost = $cost;
            $lowestCostNode = $node;
        }
    }

    return $lowestCostNode;
}

function drawPath(array $parents): string {
    print_r($parents);
    echo "\n<br>";
    
    $path = [];

    if (count($parents) <= 1) {
        return 'No path found';
    }

    $path[] = array_key_first($parents);

    while (true) {
        $node = $parents[end($path)];
        if ($node === 'start') {
            $path[] = 'start';
            break;
        }
        $path[] = $node;
    }

    return implode(" -> ", array_reverse($path));
}
