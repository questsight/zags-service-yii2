<?php

use yii\db\Migration;

/**
 * Handles the creation of table `act`.
 */
class m180809_083132_create_act_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('act', [
            'id' => $this->primaryKey(),
            'type' => $this->string(128),
            'zags' => $this->string(128),
            'cert_date' => $this->date("d.m.y"),
            'article_date' => $this->date("d.m.y"),
            'article_num' => $this->string(128),
            'scan' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('act');
    }
}
