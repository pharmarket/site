<?php
require_once 'vendor/autoload.php';

use Symfony\Component\Finder\Finder;

$graph = new Fhaculty\Graph\Graph();
$builder = new Fhaculty\Graph\Uml\ClassDiagramBuilder($graph);

$exclude = [
    // 'Auth',
    // 'Auth/Console',
    'Auth/Console/stubs',
    // 'Auth/Reminders',
    'Cache',
    // 'Cache/Console',
    // 'Config',
    'Console',
    // 'Container',
    // 'Cookie',
    // 'Database',
    // 'Database/Capsule',
    // 'Database/Connectors',
    // 'Database/Console',
    // 'Database/Console/Migrations',
    // 'Database/Eloquent',
    'Database/Eloquent/Relations',
    // 'Database/Migrations',
    'Database/Migrations/stubs',
    // 'Database/Query',
    // 'Database/Query/Grammars',
    'Database/Query/Processors',
    // 'Database/Schema',
    // 'Database/Schema/Grammars',
    // 'Encryption',
    // 'Events',
    // 'Exception',
    'Exception/resources',
    // 'Filesystem',
    'Foundation',
    // 'Foundation/Console',
    // 'Foundation/Console/Optimize',
    'Foundation/Console/stubs',
    // 'Foundation/Providers',
    // 'Foundation/Testing',
    // 'Hashing',
    // 'Html',
    // 'Http',
    // 'Log',
    // 'Mail',
    'Pagination',
    // 'Pagination/views',
    'Queue',
    // 'Queue/Connectors',
    // 'Queue/Console',
    'Queue/Console/stubs',
    // 'Queue/Failed',
    // 'Queue/Jobs',
    // 'Redis',
    // 'Remote',
    // 'Routing',
    // 'Routing/Console',
    // 'Routing/Generators',
    // 'Routing/Generators/stubs',
    // 'Routing/Matching',
    // 'Session',
    // 'Session/Console',
    // 'Session/Console/stubs',
    'Support',
    // 'Support/Contracts',
    // 'Support/Facades',
    // 'Translation',
    // 'Validation',
    // 'View',
    'View/Compilers',
    'View/Engines',
    // 'Workbench',
    // 'Workbench/Console',
    'Workbench/stubs'
];

$finder = new Finder();
$finder
    ->files()
    ->in(__DIR__ . '/vendor/laravel/framework/src/Illuminate/Routing')
    ->exclude($exclude)
    ->name('*.php')
    ->notName('*Interface.php')
    ->sortByName();

foreach ($finder as $key => $file)
{
    $pathname = preg_replace("/\.php/", "", $file->getRelativePathname());
    $pathname = preg_replace("/\//", "\\", $pathname);
    
    $builder->createVertexClass('Illuminate\\Routing\\' . $pathname);
}

echo $builder->getNumberOfComponents();

$graphviz = new Fhaculty\Graph\GraphViz($graph);
$graphviz->setFormat('svg');
$graphviz->createImageFile();
$graphviz->display();

