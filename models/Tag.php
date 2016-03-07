<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "binner_tag".
 *
 * @property string $tid
 * @property string $tagname
 * @property string $gid
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'binner_tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gid'], 'required'],
            [['gid'], 'string'],
            [['tagname'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tid' => 'Tid',
            'tagname' => 'Tagname',
            'gid' => 'Gid',
        ];
    }
}
