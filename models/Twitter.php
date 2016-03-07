<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "binner_twitter".
 *
 * @property integer $id
 * @property string $content
 * @property string $img
 * @property integer $author
 * @property string $date
 * @property string $replynum
 */
class Twitter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'binner_twitter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'date'], 'required'],
            [['content'], 'string'],
            [['author', 'date', 'replynum'], 'integer'],
            [['img'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'img' => 'Img',
            'author' => 'Author',
            'date' => 'Date',
            'replynum' => 'Replynum',
        ];
    }
}
