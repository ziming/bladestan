<x-backed-component :$a :b="$b" c="{{$x}}">{{ $inner }}</x-component>
<x-backed-component :$a :b="$b" c="{{$x}}"/>
-----
<?php

/** @var Illuminate\Support\ViewErrorBag $errors */
/** @var Illuminate\View\Factory $__env */
/** @var Illuminate\Foundation\Application $app */
/** file: foo.blade.php, line: 1 */
$component = new App\View\Components\BackedComponent(b: $b);
echo e($inner);
/** file: foo.blade.php, line: 2 */
$component = new App\View\Components\BackedComponent(b: $b);
