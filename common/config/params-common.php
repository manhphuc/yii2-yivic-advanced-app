<?php
/**
 * Created by PhpStorm.
 * Author: manhphucofficial@yahoo.com
 * Date time: 4/17/17 2:44 PM
 */

// Contains params to pass to Yii::$app->params
// Params here are common, for all endpoints and all environments
return yii\helpers\ArrayHelper::merge([
	// Put params below this line

], require('params-common-env.php'));