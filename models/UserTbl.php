<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_tbl".
 *
 * @property int $user_id
 * @property string|null $username
 * @property string|null $password
 * @property string|null $accessToken
 * @property string|null $user_email
 * @property string|null $user_mobile_no
 * @property int|null $user_type 1=admin, 2=user, 3=employee
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int $user_status 0=inactive, 1=active
 */ 
class UserTbl extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */

     //public $accessToken = '100-token';
     public $authKey = 'test100key';

    public static function tableName()
    {
        return 'user_tbl';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_type', 'user_status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'password'], 'string', 'max' => 55],
            [['accessToken', 'user_email', 'user_mobile_no'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'username' => 'Username',
            'password' => 'Password',
            'accessToken' => 'Access Token',
            'user_email' => 'User Email',
            'user_mobile_no' => 'User Mobile No',
            'user_type' => 'User Type',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_status' => 'User Status',
        ];
    }

    public static function findIdentity($user_id)
    {
        return isset(self::$users[$user_id]) ? new static(self::$users[$user_id]) : null;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->user_id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public static function findByUsername($username)
    {
        /*foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }*/

        $cookiesUsers = array();
        $user = UserTbl::find()->where(['username' => $username])->One();

        if(!empty($user)){
            $cookiesUsers = array(
                'username' => $user->getOldAttribute('username'),
                'user_email' => $user->getOldAttribute('user_email'),
                'user_mobile_no' => $user->getOldAttribute('user_mobile_no'),
                'user_type' => $user->getOldAttribute('user_type'),
                'user_status' => $user->getOldAttribute('user_status')
            );

            $_SESSION['cord4'] = $cookiesUsers;
        }
        

        if(!empty($user)){
            return $user;
        }

        return null;
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
