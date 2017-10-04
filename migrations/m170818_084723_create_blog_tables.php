<?php

use yii\db\Migration;

class m170818_084723_create_blog_tables extends Migration
{
    const TABLE_PAGES = 'pages';
    const TABLE_LANGS = 'langs';
    const TABLE_TYPES = 'types';
    const TABLE_TYPES_STRUCTURE = 'types_structure';
    const TABLE_CONTENT = 'content';
    const TABLE_STRING = 'string';
    const TABLE_TEXT   = 'text';
    const TABLE_SELECT_LIST = 'select_list';
    const TABLE_SELECT_VALUES = 'select_values';
    const TABLE_PHOTO = 'photo';
    const TABLE_LIST = 'list';
    const TABLE_CATEGORY = 'category';
    const TABLE_ACCORDION = 'accordion';
    const TABLE_PAGES_CATEGORY = 'pages_category';
    const TABLE_MODEL_HISTORY  = 'model_history';
    const TABLE_MENU = 'menu';
    const TABLE_MENU_ITEMS = 'menu_items';
    const TABLE_MODELS = 'models';

    public  function tableName($name){
        return '{{%ws_'.$name.'}}';
    }

    public function safeUp()
    {
        $this->createTable(
            $this->tableName(self::TABLE_PAGES),
            [
                'id'   => $this->primaryKey(),
                'name' => $this->string(),
                'type_id' => $this->integer()->notNull(),
                'author' => $this->integer()->notNull(),
                'comment' => $this->string(),
                'blocked' => $this->boolean(),
                'created_at' => $this->timestamp()->null(),
                'updated_at' => $this->timestamp()->null(),
            ]
        );
        $this->createTable(
            $this->tableName(self::TABLE_ACCORDION),
            [
                'id'   => $this->primaryKey(),
                'model_class' => $this->string(255)->notNull(),
                'model_id' => $this->integer()->notNull(),
                'var_name' => $this->string(64),
                'title' => $this->string(255),
                'text' => $this->text(),
                'index' => $this->integer(),
            ]
        );
        $this->createTable(
            $this->tableName(self::TABLE_LANGS),
            [
                'id'   => $this->primaryKey(),
                'code' => $this->string(4)->notNull(),
                'local' => $this->string(64)->notNull(),
                'name' => $this->string(64)->notNull(),
                'default' => $this->boolean(),
            ]
        );
        $this->createTable(
            $this->tableName(self::TABLE_TYPES),
            [
                'id'   => $this->primaryKey(),
                'name' => $this->string(64)->notNull(),
                'view_file' => $this->string(255),
                'description' => $this->string(255),
            ]
        );
        $this->createTable(
            $this->tableName(self::TABLE_TYPES_STRUCTURE),
            [
                'id'   => $this->primaryKey(),
                'type_id' => $this->integer()->notNull(),
                'var_name' => $this->string(64)->notNull(),
                'class'  => $this->string(255)->notNull(),
                'params' => $this->string(255),
                'labels' => $this->text(),
                'is_list' => $this->boolean(),
                'index' => $this->integer(),
            ]
        );
        $this->createTable(
            $this->tableName(self::TABLE_CONTENT),
            [
                'id'   => $this->primaryKey(),
                'page_id' => $this->integer()->notNull(),
                'lang_id' => $this->integer()->notNull(),
                'title' => $this->string(255)->notNull(),
                'description' => $this->string(255),
                'key_words' => $this->string(255),
                'link' => $this->string(255),
                'og_img' => $this->string(255),
                'published' => $this->boolean(),
            ]
        );
        $this->createTable(
            $this->tableName(self::TABLE_STRING),
            [
                'id'   => $this->primaryKey(),
                'model_class' => $this->string(255)->notNull(),
                'model_id' => $this->integer()->notNull(),
                'var_name' => $this->string(64),
                'value' => $this->string(255),
                'index' => $this->integer(),
            ]
        );
        $this->createTable(
            $this->tableName(self::TABLE_TEXT),
            [
                'id'   => $this->primaryKey(),
                'model_class' => $this->string(255)->notNull(),
                'model_id' => $this->integer()->notNull(),
                'var_name' => $this->string(64),
                'value' => $this->text(),
                'index' => $this->integer(),
            ]
        );
        $this->createTable(
            $this->tableName(self::TABLE_SELECT_LIST),
            [
                'id'   => $this->primaryKey(),
                'model_class' => $this->string(255)->notNull(),
                'model_id' => $this->integer()->notNull(),
                'var_name' => $this->string(64),
                'item_name' => $this->string(),
                'item_value' => $this->string(),
                'index' => $this->integer(),
            ]
        );
        $this->createTable(
            $this->tableName(self::TABLE_SELECT_VALUES),
            [
                'id'   => $this->primaryKey(),
                'model_class' => $this->string(255)->notNull(),
                'model_id' => $this->integer()->notNull(),
                'var_name' => $this->string(64),
                'value' => $this->string(),
                'index' => $this->integer(),
            ]
        );
        $this->createTable(
            $this->tableName(self::TABLE_PHOTO),
            [
                'id'   => $this->primaryKey(),
                'model_class' => $this->string(255)->notNull(),
                'model_id' => $this->integer()->notNull(),
                'var_name' => $this->string(64),
                'src' => $this->string(),
                'alt' => $this->string(),
                'index' => $this->integer(),
            ]
        );
        $this->createTable(
            $this->tableName(self::TABLE_LIST),
            [
                'id'   => $this->primaryKey(),
                'model_class' => $this->string(255)->notNull(),
                'model_id' => $this->integer()->notNull(),
                'var_name' => $this->string(64),
                'title' => $this->string(),
                'index' => $this->integer(),
            ]
        );
        $this->createTable(
            $this->tableName(self::TABLE_CATEGORY),
            [
                'id' => $this->bigPrimaryKey(),
                'key'   => $this->string(60)->notNull(),
                'names' => $this->text(),
                'parent_id' => $this->integer(),
                'index' => $this->integer(),
            ]
        );
        $this->createTable(
            $this->tableName(self::TABLE_MENU),
            [
                'id'   => $this->primaryKey(),
                'key' => $this->string(64)->notNull(),
                'parent_id' => $this->integer(),
                'index' => $this->integer(),
                'page_id' => $this->integer(),
            ]
        );
        $this->createTable(
            $this->tableName(self::TABLE_MENU_ITEMS),
            [
                'id'   => $this->primaryKey(),
                'menu_id' => $this->integer()->notNull(),
                'lang_id' => $this->integer()->notNull(),
                'name' => $this->string(64)->notNull(),
                'show' => $this->boolean(),
                'link' => $this->string(),
            ]
        );
        $this->createTable(
            $this->tableName(self::TABLE_PAGES_CATEGORY),
            [
                'id'   => $this->primaryKey(),
                'category_id' => $this->integer()->notNull(),
                'page_id' => $this->integer()->notNull(),
            ]
        );
        $this->createTable(
            $this->tableName(self::TABLE_MODEL_HISTORY),
            [
                'id'   => $this->primaryKey(),
                'model_class' => $this->string(255)->notNull(),
                'model_id' => $this->integer()->notNull(),
                'description' => $this->text(),
                'date_at' => $this->timestamp()->null(),
            ]
        );
        $this->createTable(
            $this->tableName(self::TABLE_MODELS),
            [
                'id'   => $this->primaryKey(),
                'model_class' => $this->string(255)->notNull(),
                'model_id' => $this->integer()->notNull(),
                'var_name' => $this->string(64),
                'models_class' => $this->string(),
                'models_ids' => $this->string(),
                'index' => $this->integer(),
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable($this->tableName(self::TABLE_PAGES));
        $this->dropTable($this->tableName(self::TABLE_LANGS));
        $this->dropTable($this->tableName(self::TABLE_TYPES));
        $this->dropTable($this->tableName(self::TABLE_TYPES_STRUCTURE));
        $this->dropTable($this->tableName(self::TABLE_CONTENT));
        $this->dropTable($this->tableName(self::TABLE_STRING));
        $this->dropTable($this->tableName(self::TABLE_TEXT));
        $this->dropTable($this->tableName(self::TABLE_SELECT_LIST));
        $this->dropTable($this->tableName(self::TABLE_SELECT_VALUES));
        $this->dropTable($this->tableName(self::TABLE_PHOTO));
        $this->dropTable($this->tableName(self::TABLE_LIST));
        $this->dropTable($this->tableName(self::TABLE_CATEGORY));
        $this->dropTable($this->tableName(self::TABLE_PAGES_CATEGORY));
        $this->dropTable($this->tableName(self::TABLE_MODEL_HISTORY));
        $this->dropTable($this->tableName(self::TABLE_MENU));
        $this->dropTable($this->tableName(self::TABLE_MENU_ITEMS));
        $this->dropTable($this->tableName(self::TABLE_MODELS));
        $this->dropTable($this->tableName(self::TABLE_ACCORDION));
    }

}
