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

    public static function addTag($tagStr, $bid)
	{
		$tags = !empty($tagStr) ? preg_split('/[,\s]|(，)/',$tagStr):array();
		$tag  = array_filter(array_unique($tags));
		foreach($tag as $tagName)
		{
			$t = Self::findOne(['tagname' => $tagName]);
			if($t)
			{
				$t->gid .= "$bid,";
				$t->update();
				continue;
			}
			
			$t = new Tag();
			$t->tagname = $tagName;
			$t->gid = ",$bid,";
			$t->save();
		}
	}
	
	public static function getTagByGid($gid)
	{
		$query = new \yii\db\Query;
		$tagList = $query->select(['tagname'])->from('binner_tag')->where(['like','gid',",$gid,"])->all();
		$currentTags = array();
			foreach($tagList as $t)
				$currentTags[] = $t['tagname'];
		return $currentTags;
	}
	
	public static function updateTag($tagStr, $bid)
	{
		$tags = !empty($tagStr) ? preg_split('/[,\s]|(，)/',$tagStr):array();
		$oldTags = Self::getTagByGid($bid);
		
		if(!empty($oldTags))
		{
			$t = '\''.implode('\',\'',$oldTags).'\'';
			$connection = Yii::$app->db;
			$sql = "update binner_tag set gid=REPLACE(gid,',$bid','') where tagname in ($t)";
			$command=$connection->createCommand($sql);
			$command->execute();
		}
		
		Self::addTag($tagStr,$bid);
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
