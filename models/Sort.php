<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "binner_sort".
 *
 * @property string $sid
 * @property string $sortname
 * @property string $alias
 * @property string $taxis
 * @property string $pid
 * @property string $description
 * @property string $template
 */
class Sort extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'binner_sort';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['taxis', 'pid'], 'integer'],
            [['sortname'], 'required'],
            [['description'], 'string'],
            [['sortname', 'template'], 'string', 'max' => 255],
            [['alias'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sid' => 'Sid',
            'sortname' => 'Sortname',
            'alias' => 'Alias',
            'taxis' => 'Taxis',
            'pid' => 'Pid',
            'description' => 'Description',
            'template' => 'Template',
        ];
    }
}
