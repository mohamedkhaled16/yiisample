<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Rate */
/* @var $form yii\widgets\ActiveForm */
?>
<div ng-app="RateApp">


    <div ng-controller="rateCtrl as rateCtrl" class="rate-form" ng-init="rateCtrl.rate.addtion_var=<?=  \app\models\Rate::ADDTION_VAR ?>">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'buy_back_limit')->textInput(['ng-model'=>'rateCtrl.rate.buy_back_limit', 'ng-change'=>'rateCtrl.changgeneral()']) ?>

    <?= $form->field($model, 'deductible')->textInput(['disabled' => 'true','ng-model'=>'rateCtrl.rate.deductible','value'=>'{{rateCtrl.rate.deductible}}', 'ng-change'=>'rateCtrl.changgeneral()']) ?>

    <?= $form->field($model, 'base_rate')->textInput(['ng-model'=>'rateCtrl.rate.base_rate', 'ng-change'=>'rateCtrl.changgeneral()']) ?>

    <?= $form->field($model, 'credit_modification')->textInput(['ng-model'=>'rateCtrl.rate.credit_modification', 'ng-change'=>'rateCtrl.changgeneral()']) ?>

    <?= $form->field($model, 'debit_modification')->textInput(['ng-model'=>'rateCtrl.rate.debit_modification', 'ng-change'=>'rateCtrl.changgeneral()']) ?>

    <?= $form->field($model, 'premium')->textInput(['disabled' => 'true','ng-model'=>'rateCtrl.rate.premium' , 'ng-change'=>'rateCtrl.changgeneral()','value'=>'{{rateCtrl.rate.premium}}']) ?>
    <input type="hidden"   ng-model="rateCtrl.rate.addtion_var" value="<?=  \app\models\Rate::ADDTION_VAR ?>"/>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
   

    <?php ActiveForm::end(); ?>
</div>
<script>
    // {{(rateCtrl.rate.buy_back_limit>8000)?(0.07*rateCtrl.rate.buy_back_limit):(0.05*rateCtrl.rate.buy_back_limit)}}
    //{{(rateCtrl.rate.buy_back_limit - rateCtrl.rate.deductible) * (rateCtrl.rate.base_rate * (rateCtrl.rate.addtion_var + (rateCtrl.rate.debit_modification - rateCtrl.rate.credit_modification)))}}
    //IF(D7>80000,0.07*D7,0.05*D7)
    
</script>
</div>