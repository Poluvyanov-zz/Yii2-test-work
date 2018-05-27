<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ShiftForm extends Model
{
    public $name;
    public $sum;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'sum'], 'required'],
        ];
    }

    public function shift($params)
    {
        $user = User::find()->where(['username' => $params['ShiftForm']['name']])->one();



        if ($this->checkBalance($params['ShiftForm']['sum'])) {

            if ($this->addBalance($user->id, $params['ShiftForm']['sum']))
                $this->remoceBalanceFromSender($params['ShiftForm']['sum']);
            return true;
        }

        return false;

    }

    public function addBalance($user_id, $sum)
    {
        $balance = Balance::find()->where(['user_id' => $user_id])->one();
        $balance->balance += $sum;
        if ($balance->save()) return true;
    }

    public function checkBalance($sum)
    {
        if($sum < 0) {
            return false;
        }

        $balance = Balance::find()->where(['user_id' => Yii::$app->user->identity->id])->one();

        if (($balance->balance - $sum) < -1000) {
            return false;
        }
        return true;

    }

    public function remoceBalanceFromSender($sum)
    {
        $balance = Balance::find()->where(['user_id' => Yii::$app->user->identity->id])->one();
        $balance->balance -= $sum;
        if (!$balance->save()) {
            return false;
        }
        return true;

    }
}
