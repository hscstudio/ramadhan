<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_satker".
 *
 * @property integer $id
 * @property string $name
 * @property string $shortname
 * @property string $letterNumber
 * @property string $address
 * @property string $city
 * @property string $phone
 * @property string $fax
 * @property string $email
 * @property string $website
 * @property integer $status
 * @property string $created
 * @property integer $createdBy
 * @property string $modified
 * @property integer $modifiedBy
 * @property string $deleted
 * @property integer $deletedBy
 */
class Satker extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ref_satker';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'letterNumber'], 'required'],
            [['id', 'status', 'createdBy', 'modifiedBy', 'deletedBy'], 'integer'],
            [['created', 'modified', 'deleted'], 'safe'],
            [['name', 'website'], 'string', 'max' => 255],
            [['shortname', 'city', 'phone', 'fax'], 'string', 'max' => 50],
            [['letterNumber'], 'string', 'max' => 25],
            [['address'], 'string', 'max' => 500],
            [['email'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'shortname' => 'Shortname',
            'letterNumber' => 'Letter Number',
            'address' => 'Address',
            'city' => 'City',
            'phone' => 'Phone',
            'fax' => 'Fax',
            'email' => 'Email',
            'website' => 'Website',
            'status' => 'Status',
            'created' => 'Created',
            'createdBy' => 'Created By',
            'modified' => 'Modified',
            'modifiedBy' => 'Modified By',
            'deleted' => 'Deleted',
            'deletedBy' => 'Deleted By',
        ];
    }
}
