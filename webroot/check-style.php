<?php
/**
 * Created by PhpStorm.
 * Module: andkon
 * Date: 21.03.17
 * Time: 19:19
 */

$master = [];
exec('git log --pretty=format:"%H" master', $master);
$master = array_shift($master);

$testBranch = [];
exec('git log --pretty=format:"%H"', $testBranch);
$testBranch = array_shift($testBranch);

$command = "git diff-tree --no-commit-id --name-only -r '$testBranch' '$master'";
$files   = [];
exec($command, $files);

$files = array_filter($files, function ($file) {
    return preg_match('/\.php$/', $file) && file_exists($file)
        && (!preg_match('/views\//', $file) && !preg_match('/migrations\//', $file));
});

if (empty($files)) {
    exit(0);
}

$result = [];
foreach ($files as $file) {
    $out = [];
    exec('php ./vendor/bin/phpcs --standard=PSR2 --encoding=utf-8 ' . $file, $out);
    $result = array_merge($result, $out);
}

$exitCode = (count($result)) ? 1 : 0;
echo implode(PHP_EOL, $result);
if (!is_dir('logs')) {
    mkdir('logs');
}
file_put_contents('./logs/post-push.log', implode(PHP_EOL, $result));

exit($exitCode);
