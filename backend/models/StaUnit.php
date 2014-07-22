<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_sta_unit".
 *
 * @property integer $id
 * @property integer $induk
 * @property string $name
 * @property integer $eselon
 */
class StaUnit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ref_sta_unit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['induk', 'name', 'eselon'], 'required'],
            [['induk', 'eselon'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'induk' => 'Induk',
            'name' => 'Name',
            'eselon' => 'Eselon',
        ];
    }
}
