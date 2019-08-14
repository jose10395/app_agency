<?php

use yii\db\Migration;

/**
 * Class m190813_035117_urbanizaciones
 */
class m190813_035117_urbanizaciones extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('urbanizacion',[
            'id'=>$this->primaryKey(),
            'nombre'=>$this->text(),
            'created_at'=>$this->timestamp()->notNull()
        ]);
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190813_035117_urbanizaciones cannot be reverted.\n";

        return false;
    }
    */
}
