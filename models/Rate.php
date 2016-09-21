<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rate".
 *
 * @property integer $id
 * @property string $user_name
 * @property double $buy_back_limit
 * @property double $deductible
 * @property double $base_rate
 * @property double $credit_modification
 * @property double $debit_modification
 * @property double $premium
 * @property double $addtion_var
 */
class Rate extends \yii\db\ActiveRecord
{
    const ADDTION_VAR= 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_name', 'buy_back_limit', 'deductible', 'base_rate', 'credit_modification', 'debit_modification', 'premium', 'addtion_var'], 'required'],
            [['buy_back_limit', 'deductible', 'base_rate', 'credit_modification', 'debit_modification', 'premium', 'addtion_var'], 'number'],
            [['user_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'User Name' => 'User Name',
            'Buy Back Limit' => 'buy_back_limit',
            'Deductible' => 'Deductible',
            'Base Rate' => 'Base Rate',
            'Credit Modification' => 'Credit Modification',
            'Debit Modification' => 'Debit Modification',
            'Premium' => 'Premium',
            'Addtion Var' => 'Addtion Var',
        ];
    }
}