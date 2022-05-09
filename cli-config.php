<?php

use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\DBAL\Tools\Console\ConsoleRunner;

require_once __DIR__ . '/vendor/autoload.php';

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet(
    (new \Alura\Cursos\Infra\EntityManagerCreator())->getEntityManager()
);
