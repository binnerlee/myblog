<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "binner_attachment".
 *
 * @property string $aid
 * @property string $blogid
 * @property string $filename
 * @property integer $filesize
 * @property string $filepath
 * @property string $addtime
 * @property integer $width
 * @property integer $height
 * @property string $mimetype
 * @property integer $thumfor
 */
class Attachment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'binner_attachment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['blogid', 'filesize', 'addtime', 'width', 'height', 'thumfor'], 'integer'],
            [['filename', 'filepath'], 'string', 'max' => 255],
            [['mimetype'], 'string', 'max' => 40]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'aid' => 'Aid',
            'blogid' => 'Blogid',
            'filename' => 'Filename',
            'filesize' => 'Filesize',
            'filepath' => 'Filepath',
            'addtime' => 'Addtime',
            'width' => 'Width',
            'height' => 'Height',
            'mimetype' => 'Mimetype',
            'thumfor' => 'Thumfor',
        ];
    }
}
