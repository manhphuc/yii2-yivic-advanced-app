<?php
/**
 * Created by PhpStorm.
 * Author: manhphucofficial@yahoo.com
 * Date time: 9/21/17 2:59 PM
 */

use yivic\yivicCms\libs\override\helpers\NpHtml as Html;
use yivic\yivicCms\libs\override\web\NpView as View;

/* @var View $this */
/* @var string $message */
?>
<div class="site-error">

    <h2><?= Html::encode($this->title) ?></h2>

<div class="alert alert-danger">
	<?= nl2br(Html::encode($message)) ?>
</div>

<p>
	<?= Yii::t(NP_TEXT_CATE, 'The above error occurred while the Web server was processing your request.') ?>
</p>
<p>
	<?= Yii::t(NP_TEXT_CATE, 'Please contact us if you think this is a server error. Thank you.') ?>
</p>

</div>