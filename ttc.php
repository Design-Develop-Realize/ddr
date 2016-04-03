<?php
ini_set('display_errors', 'On');
require(__DIR__ . "/vendor/autoload.php");

use GitHubWebhook\Handler;

$handler = new Handler("690Aburn36", __DIR__);
if($handler->handle()) {
    echo "OK";
} else {
    echo "Wrong secret";
}
file_put_contents("tmp/git.log", $handler->getGitOutput(), FILE_APPEND);