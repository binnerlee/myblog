<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "binner_link".
 *
 * @property string $id
 * @property string $sitename
 * @property string $siteurl
 * @property string $description
 * @property string $hide
 * @property string $taxis
 */
class BinnerLink extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'binner_link';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hide'], 'string'],
            [['taxis'], 'integer'],
            [['sitename'], 'string', 'max' => 30],
            [['siteurl'], 'string', 'max' => 75],
            [['description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sitename' => 'Sitename',
            'siteurl' => 'Siteurl',
            'description' => 'Description',
            'hide' => 'Hide',
            'taxis' => 'Taxis',
        ];
    }
}
