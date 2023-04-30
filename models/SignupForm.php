<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * SignupForm is the model behind the personal data form.
 */
class SignupForm extends ActiveRecord
{

    public $firstname;
    public $lastname;
    public $email;

    public static function tableName()
    {
        return 'data';
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // firstname, lastname, email are required
            [['firstname', 'lastname', 'email'], 'required', 'message' => 'Пожалуйста, заполните это поле'],
            // email has to be a valid email address
            ['email', 'email', 'message' => 'Пожалуйста, введите корректный адрес электронной почты'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'firstname' => 'Имя',
            'lastname' => 'Фамилия',
            'email' => 'Email',
        ];
    }

    /**
     * Writes the form data to the database
     * @return array with result
     */
    public function signup()
    {
        $result = ['message' => 'Спасибо! Данные успешно сохранены', 'error' => 0];
        
        $db = Yii::$app->db;

        try {
            $db->createCommand()->insert($this->tableName(), [
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'email' => $this->email
            ])->execute();
        } catch(\Exception $e) {
            $result['error'] = 1;
            $result['message'] = 'Ошибка записи в базу данных.';
            return $result;
        }  
        
        return $result;        
    }
}
