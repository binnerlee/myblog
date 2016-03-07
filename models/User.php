<?php

namespace app\models;

/**
 * This is the model class for table "binner_user".
 *
 * @property string $uid
 * @property string $username
 * @property string $password
 * @property string $nickname
 * @property string $role
 * @property string $ischeck
 * @property string $photo
 * @property string $email
 * @property string $description
 * @property string $accessToken
 * @property string $authKey
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface//\yii\base\Object implements \yii\web\IdentityInterface
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'binner_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ischeck'], 'string'],
            [['username'], 'string', 'max' => 32],
            [['password'], 'string', 'max' => 64],
            [['nickname'], 'string', 'max' => 20],
            [['role', 'email'], 'string', 'max' => 60],
            [['photo', 'description'], 'string', 'max' => 255],
            [['accessToken', 'authKey'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uid' => 'Uid',
            'username' => 'Username',
            'password' => 'Password',
            'nickname' => 'Nickname',
            'role' => 'Role',
            'ischeck' => 'Ischeck',
            'photo' => 'Photo',
            'email' => 'Email',
            'description' => 'Description',
            'accessToken' => 'Access Token',
            'authKey' => 'Auth Key',
        ];
    }

    // public $id;
    // public $username;
    // public $password;
    // public $authKey;
    // public $accessToken;

    // private static $users = [
    //     '100' => [
    //         'id' => '100',
    //         'username' => 'admin',
    //         'password' => 'admin',
    //         'authKey' => 'test100key',
    //         'accessToken' => '100-token',
    //     ],
    //     '101' => [
    //         'id' => '101',
    //         'username' => 'demo',
    //         'password' => 'demo',
    //         'authKey' => 'test101key',
    //         'accessToken' => '101-token',
    //     ],
    // ];

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return self::find()->where(['uid' => $id])->one();
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::find()->where(['accessToken' => $token])->one();
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::find()->where(['username' => $username])->one();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->uid;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }
}
