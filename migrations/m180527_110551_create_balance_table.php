<?php

use yii\db\Migration;

/**
 * Handles the creation of table `balance`.
 */
class m180527_110551_create_balance_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {

        $this->createTable('balance', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'balance' => $this->float(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $this->dropTable('balance');
    }
}
