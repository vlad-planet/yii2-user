<?php
 
namespace vladplanet\user\models;
 
use yii\base\Model;
use yii\web\UploadedFile;
use Yii;
use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface; 

 
class UploadImage extends Model{
 
    public $image;
 
    public function rules(){
        return[
            [['image'], 'file', 'extensions' => 'png, jpg, gif'],
        ];
    }
 
	public function upload(){
		if($this->validate() && $this->image){
			
											 //.$this->image->extension;
	$img = Yii::$app->user->identity->getId().".png"; 
	$fileName = "img/user/uploads/".$img;
	$newWidth = 200;
	$newHeight = 200;
	$savePath = "img/user/uploads/thumb_".$img;

	$this->image->saveAs($fileName);
	Image::thumbnail($fileName,$newWidth, $newHeight)->save($savePath , ['quality' => 90]);
	
	$this->image = $img;
	
		}else{
			return false;
		}
	}
	
}