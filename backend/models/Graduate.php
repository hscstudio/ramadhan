<?php

namespace backend\models;

use Yii;
									
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "ref_graduate".
 *

 * @property integer $id
 * @property string $name
 * @property integer $status
 * @property string $created
 * @property integer $createdBy
 * @property string $modified
 * @property integer $modifiedBy
 * @property string $deleted
 * @property integer $deletedBy
 *
 * @property Employee[] $employees
 * @property Student[] $students
 * @property Trainer[] $trainers
 * @property TrainingCertificate[] $trainingCertificates
 * @property TrainingStudent[] $trainingStudents
 */
class Graduate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ref_graduate';
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
            [['id', 'name'], 'required'],
            [['id', 'status', 'createdBy', 'modifiedBy', 'deletedBy'], 'integer'],
            [['created', 'modified', 'deleted'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'SD - S3'),
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
    public function getEmployees()
    {
        return $this->hasMany(Employee::className(), ['ref_graduate_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['ref_graduate_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrainers()
    {
        return $this->hasMany(Trainer::className(), ['ref_graduate_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrainingCertificates()
    {
        return $this->hasMany(TrainingCertificate::className(), ['ref_graduate_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrainingStudents()
    {
        return $this->hasMany(TrainingStudent::className(), ['ref_graduate_id' => 'id']);
    }
}
