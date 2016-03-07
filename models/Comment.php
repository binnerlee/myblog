<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "binner_comment".
 *
 * @property string $cid
 * @property string $gid
 * @property string $pid
 * @property string $date
 * @property string $poster
 * @property string $comment
 * @property string $mail
 * @property string $url
 * @property string $ip
 * @property string $hide
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'binner_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gid', 'pid', 'date'], 'integer'],
            [['date', 'comment'], 'required'],
            [['comment', 'hide'], 'string'],
            [['poster'], 'string', 'max' => 20],
            [['mail'], 'string', 'max' => 60],
            [['url'], 'string', 'max' => 75],
            [['ip'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cid' => 'Cid',
            'gid' => 'Gid',
            'pid' => 'Pid',
            'date' => 'Date',
            'poster' => 'Poster',
            'comment' => 'Comment',
            'mail' => 'Mail',
            'url' => 'Url',
            'ip' => 'Ip',
            'hide' => 'Hide',
        ];
    }
}
