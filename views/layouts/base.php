<?php

use app\assets\TestAsset;

TestAsset::register($this);
?>
<?php $this->beginPage() ?>
<html>
<head>
<meta charset="utf8">
<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<h1>TEST TEMPLATES</h1>
<?= $content ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>