<?php

namespace backend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }

    public function upload()
    {

        if ($this->validate()) {
            foreach ($this->imageFiles as $file) {

                $file->saveAs(\Yii::getAlias('@frontend') . '/web/uploads/' . $file->baseName . '.' . $file->extension,false);
                $file->saveAs(\Yii::getAlias('@backend') . '/web/uploads/' . $file->baseName . '.' . $file->extension,false);
            }
            return true;
        } else {
            return false;
        }
    }
}