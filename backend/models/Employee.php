<?php

namespace backend\models;

use Yii;
																																				
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "tb_employee".
 *

 * @property integer $id
 * @property integer $ref_satker_id
 * @property integer $ref_unit_id
 * @property integer $ref_religion_id
 * @property integer $ref_rank_class_id
 * @property integer $ref_graduate_id
 * @property integer $ref_sta_unit_id
 * @property string $name
 * @property string $nickName
 * @property string $frontTitle
 * @property string $backTitle
 * @property string $nip
 * @property string $born
 * @property string $birthDay
 * @property integer $gender
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property integer $married
 * @property string $photo
 * @property string $blood
 * @property string $position
 * @property string $education
 * @property string $officePhone
 * @property string $officeFax
 * @property string $officeEmail
 * @property string $officeAddress
 * @property string $document1
 * @property string $document2
 * @property integer $status
 * @property string $created
 * @property integer $createdBy
 * @property string $modified
 * @property integer $modifiedBy
 * @property string $deleted
 * @property integer $deletedBy
 *
 * @property Admin[] $admins
 * @property Graduate $refGraduate
 * @property RankClass $refRankClass
 * @property Religion $refReligion
 * @property Satker $refSatker
 * @property StaUnit $refStaUnit
 * @property Unit $refUnit
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_employee';
    }
	
    /**
     * @inheritdoc
     */	
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                        \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['created','modified'],
                        \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => 'modified',
                ],
                'value' => new Expression('NOW()'),
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'attributes' => [
                        \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['createdBy','modifiedBy'],
                        \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => 'modifiedBy',
                ],
            ],
        ];
    }
	

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ref_satker_id', 'ref_unit_id', 'ref_religion_id', 'ref_rank_class_id', 'ref_graduate_id', 'ref_sta_unit_id', 'gender', 'married', 'status', 'createdBy', 'modifiedBy', 'deletedBy'], 'integer'],
            [['name'], 'required'],
            [['birthDay', 'created', 'modified', 'deleted'], 'safe'],
            [['name', 'nickName', 'born', 'phone', 'officePhone', 'officeFax'], 'string', 'max' => 50],
            [['frontTitle', 'backTitle'], 'string', 'max' => 20],
            [['nip'], 'string', 'max' => 18],
            [['email', 'officeEmail'], 'string', 'max' => 100],
            [['address', 'photo', 'position', 'education', 'officeAddress', 'document1', 'document2'], 'string', 'max' => 255],
            [['blood'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ref_satker_id' => Yii::t('app', 'Ref Satker ID'),
            'ref_unit_id' => Yii::t('app', 'Ref Unit ID'),
            'ref_religion_id' => Yii::t('app', 'Ref Religion ID'),
            'ref_rank_class_id' => Yii::t('app', 'Ref Rank Class ID'),
            'ref_graduate_id' => Yii::t('app', 'Ref Graduate ID'),
            'ref_sta_unit_id' => Yii::t('app', 'Ref Sta Unit ID'),
            'name' => Yii::t('app', 'Name'),
            'nickName' => Yii::t('app', 'Nick Name'),
            'frontTitle' => Yii::t('app', 'Front Title'),
            'backTitle' => Yii::t('app', 'Back Title'),
            'nip' => Yii::t('app', 'Nip'),
            'born' => Yii::t('app', 'Born'),
            'birthDay' => Yii::t('app', 'Birth Day'),
            'gender' => Yii::t('app', 'Gender'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'address' => Yii::t('app', 'Address'),
            'married' => Yii::t('app', 'Married'),
            'photo' => Yii::t('app', 'Photo'),
            'blood' => Yii::t('app', 'Blood'),
            'position' => Yii::t('app', 'Position'),
            'education' => Yii::t('app', 'Education'),
            'officePhone' => Yii::t('app', 'Office Phone'),
            'officeFax' => Yii::t('app', 'Office Fax'),
            'officeEmail' => Yii::t('app', 'Office Email'),
            'officeAddress' => Yii::t('app', 'Office Address'),
            'document1' => Yii::t('app', 'SK CPNS'),
            'document2' => Yii::t('app', 'SK JABATAN TERAKHIR'),
            'status' => Yii::t('app', 'Status'),
            'created' => Yii::t('app', 'Created'),
            'createdBy' => Yii::t('app', 'Created By'),
            'modified' => Yii::t('app', 'Modified'),
            'modifiedBy' => Yii::t('app', 'Modified By'),
            'deleted' => Yii::t('app', 'Deleted'),
            'deletedBy' => Yii::t('app', 'Deleted By'),
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmins()
    {
        return $this->hasMany(Admin::className(), ['tb_employee_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefGraduate()
    {
        return $this->hasOne(Graduate::className(), ['id' => 'ref_graduate_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefRankClass()
    {
        return $this->hasOne(RankClass::className(), ['id' => 'ref_rank_class_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefReligion()
    {
        return $this->hasOne(Religion::className(), ['id' => 'ref_religion_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefSatker()
    {
        return $this->hasOne(Satker::className(), ['id' => 'ref_satker_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefStaUnit()
    {
        return $this->hasOne(StaUnit::className(), ['id' => 'ref_sta_unit_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefUnit()
    {
        return $this->hasOne(Unit::className(), ['id' => 'ref_unit_id']);
    }
}
