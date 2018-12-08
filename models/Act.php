<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "act".
 *
 * @property int $id
 * @property string $type
 * @property string $zags
 * @property string $cert_date
 * @property string $article_date
 * @property string $article_num
 * @property resource $scan
 */
class Act extends \yii\db\ActiveRecord
{
    public $file;
    public $del_img;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'act';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cert_date', 'article_date'], 'safe'],
            [['type', 'zags', 'article_num'], 'string', 'max' => 128],
            [['file'], 'file', 'extensions' => 'png, jpg'],
            [['del_img'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Вид акта гражданского состояния',
            'zags' => 'Орган государственной регистрации',
            'cert_date' => 'Дата выдачи свидетельства',
            'article_date' => 'Дата записи',
            'article_num' => 'Номер записи',
            'scan' => 'Скан свидетельства',
        ];
    }
}
