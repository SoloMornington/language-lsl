#!/usr/bin/env php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;
use Mile23\Command\LslExtractCommand;

$app = new Application('LSL Keyword Parser', '0.0.0');

$app->add(new LslExtractCommand());

$app->run();
