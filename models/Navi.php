<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "binner_navi".
 *
 * @property string $id
 * @property string $naviname
 * @property string $url
 * @property string $newtab
 * @property string $hide
 * @property string $taxis
 * @property string $pid
 * @property string $isdefault
 * @property integer $type
 * @property string $type_id
 */
class Navi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'binner_navi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['newtab', 'hide', 'isdefault'], 'string'],
            [['taxis', 'pid', 'type', 'type_id'], 'integer'],
            [['naviname'], 'string', 'max' => 30],
            [['url'], 'string', 'max' => 75]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'naviname' => 'Naviname',
            'url' => 'Url',
            'newtab' => 'Newtab',
            'hide' => 'Hide',
            'taxis' => 'Taxis',
            'pid' => 'Pid',
            'isdefault' => 'Isdefault',
            'type' => 'Type',
            'type_id' => 'Type ID',
        ];
    }
}
