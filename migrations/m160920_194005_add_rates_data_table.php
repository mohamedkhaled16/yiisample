<?php

use yii\db\Migration;

class m160920_194005_add_rates_data_table extends Migration
{
    public function up()
    {

        $this->createTable('rate', array(
                'id' => 'pk',
                'user_name' => 'string NOT NULL',
                'buy_back_limit'=>'float NOT NULL',
                'deductible'=>'float NOT NULL',
                'base_rate' => 'float NOT NULL',
                'credit_modification'=>'float NOT NULL',
                'debit_modification'=>'float NOT NULL',
                'premium'=>'float NOT NULL',
                'addtion_var'=>'float NOT NULL',
                ), 'ENGINE=InnoDB');
        
    }

    public function down()
    {
        echo "m160920_194005_add_rates_data_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
