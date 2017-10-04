<?php

use yii\db\Migration;

class m170731_183442_init extends Migration
{
    public function tableVar()
    {
        return '{{%setting}}';
    }
    public function tableLatLan()
    {
        return '{{%LatLng}}';
    }
    public function tableEmails()
    {
        return '{{%adminEmails}}';
    }
    public function tableContacts()
    {
        return '{{%contacts}}';
    }

    public function safeUp()
    {
        $this->createTable(
            $this->tableVar(),
            [
                'key' => $this->string(50)->unique()->notNull(),
                'value' => $this->string()
            ]
        );

        $this->createTable($this->tableLatLan(), [
            'id' => $this->primaryKey(),
            'lat' => $this->double()->notNull()->unsigned(),
            'lng' => $this->double()->notNull()->unsigned(),
            'position' => $this->integer()->unsigned(),
        ]);

        $this->createTable($this->tableEmails(),[
            'id' => $this->primaryKey(),
            'email' => $this->string()->notNull(),
            'text' => $this->string(),
        ]);

        $this->createTable($this->tableContacts(), [
            'id' => $this->primaryKey(),
            'value' => $this->string(255),
            'type' => $this->smallInteger(1),
            'position' => $this->integer()->unsigned(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable($this->tableVar());
        $this->dropTable($this->tableLatLan());
        $this->dropTable($this->tableEmails());
        $this->dropTable($this->tableContacts());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170731_183442_init cannot be reverted.\n";

        return false;
    }
    */
}
