<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `act`.
 */
class m180809_102005_drop_act_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropTable('act');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->createTable('act', [
            'id' => $this->primaryKey(),
        ]);
    }
}
