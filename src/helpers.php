<?php
// PROTOTYPE SCAFFOLDING — DELETE ON INTEGRATION
// This is the single file AMFC's devs re-point at their own systems.
// t() -> their translation lookup, asset() -> their asset helper, e()/lang() can likely stay as-is.

$GLOBALS['__amfc_lang'] = require __DIR__ . '/lang/zh-Hant-TW.php';

function t(string $key, array $replace = []): string
{
    $value = $GLOBALS['__amfc_lang'][$key] ?? $key;
    foreach ($replace as $token => $val) {
        $value = str_replace('{' . $token . '}', $val, $value);
    }
    return $value;
}

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function asset(string $path): string
{
    $full = __DIR__ . '/../public/assets/' . $path;
    $version = file_exists($full) ? filemtime($full) : time();
    return 'assets/' . $path . '?v=' . $version;
}

function partial(string $path, array $vars = []): void
{
    extract($vars);
    require __DIR__ . '/partials/' . $path . '.php';
}
