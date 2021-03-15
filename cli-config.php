<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;

// Replace it to your own project bootstrap.php file
require_once 'bootstrap.php';

return ConsoleRunner::createHelperSet($entityManager);
