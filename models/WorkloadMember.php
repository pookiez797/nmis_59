<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "workload_member".
 *
 * @property integer $ref
 * @property string $name
 * @property string $username
 * @property string $password
 * @property integer $ward
 * @property integer $ward2
 * @property string $permission
 * @property integer $sup_type
 */
class WorkloadMember extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public static function findByUsername($username) {
        return static::findOne(['username' => $username]);
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id) {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId() {
        return $this->ref;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey() {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($password) {
        return $this->password == $password;
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'workload_member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ward', 'ward2', 'sup_type'], 'integer'],
            [['sup_type'], 'required'],
            [['name'], 'string', 'max' => 200],
            [['username', 'password'], 'string', 'max' => 20],
            [['permission'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ref' => Yii::t('app', 'Ref'),
            'name' => Yii::t('app', 'Name'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'ward' => Yii::t('app', 'Ward'),
            'ward2' => Yii::t('app', 'Ward2'),
            'permission' => Yii::t('app', 'Permission'),
            'sup_type' => Yii::t('app', 'Sup Type'),
        ];
    }
}
