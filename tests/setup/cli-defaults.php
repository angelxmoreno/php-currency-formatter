<?php
/** @var \Kahlan\Cli\CommandLine $commandLine */
$commandLine = $this->commandLine();

$commandLine->set('spec', SPEC_DIR);
$commandLine->set('src', SRC_DIR);
$commandLine->set('reporter', 'verbose');
$commandLine->set('cc', 'true');
