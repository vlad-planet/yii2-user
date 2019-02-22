<?php

namespace vladplanet\user\models;

use yii\base\Model;
use yii\db\ActiveQuery;
use Yii;
 
class ProfileUpdateForm extends Model
{
    public $email;
	public $username;
	public $firstname;
	public $lastname;
	public $phone;
	public $birthdate;
	public $avatar;
	
    /**
     * @var User
     */
    private $_user;
 
    public function __construct(User $user, $config = [])
    {
        $this->_user = $user;
		$this->username =  $user->username;
        $this->email = $user->email;
		$this->firstname = $user->firstname;
		$this->lastname = $user->lastname;
		$this->phone = $user->phone;
		$this->birthdate = $user->birthdate;
		$this->avatar =  $user->avatar;
        parent::__construct($config);
    }
 
    public function rules()
    {
        return [
			['username', 'required'],
            ['email', 'required'],
			['firstname', 'required'],
			['lastname', 'required'],
			['phone', 'required'],
			['birthdate', 'required'],
			['avatar', 'required'],
			
            ['email', 'email'],
			
            [
                'email',
                'unique',
                'targetClass' => User::className(),
                'message' => Yii::t('app', 'ERROR_EMAIL_EXISTS'),
                'filter' => ['<>', 'id', $this->_user->id],
            ],
            ['email', 'string', 'max' => 255],
        ];
    }
 
    public function update()
    {
        if ($this->validate()) {
            $user = $this->_user;
			$user->username = $this->username;
			$user->email = $this->email;
			$user->firstname = $this->firstname;
			$user->lastname = $this->lastname;
			$user->phone = $this->phone;
			$user->birthdate = $this->birthdate;
			$user->avatar = $this->avatar;
            return $user->save();
        } else {
            return false;
        }
    }
}
