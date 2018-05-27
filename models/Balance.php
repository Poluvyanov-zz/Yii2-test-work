<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class Balance extends ActiveRecord
{
    public static function tableName()
    {
        return 'balance';
    }

    /**
     * Balance model
     *
     * @property integer $id
     * @property integer $user_ud
     * @property string $balance

     */


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['balance', 'user_id'], 'required'],

        ];
    }
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }


    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }


}
