<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "binner_reply".
 *
 * @property string $id
 * @property string $tid
 * @property string $date
 * @property string $name
 * @property string $content
 * @property string $hide
 * @property string $ip
 */
class Reply extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'binner_reply';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tid', 'date'], 'integer'],
            [['date', 'content'], 'required'],
            [['content', 'hide'], 'string'],
            [['name'], 'string', 'max' => 20],
            [['ip'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tid' => 'Tid',
            'date' => 'Date',
            'name' => 'Name',
            'content' => 'Content',
            'hide' => 'Hide',
            'ip' => 'Ip',
        ];
    }
}
