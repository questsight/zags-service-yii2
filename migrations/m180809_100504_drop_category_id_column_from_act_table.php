<?php

use yii\db\Migration;

/**
 * Handles dropping category_id from table `act`.
 */
class m180809_100504_drop_category_id_column_from_act_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('act', 'category_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('act', 'category_id');
    }
}
