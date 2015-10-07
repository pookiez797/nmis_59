<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "workload_team".
 *
 * @property integer $ref
 * @property integer $ward
 * @property string $team_name
 * @property string $team_desc
 * @property integer $count_bed
 */
class WorkloadTeam extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'workload_team';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ward', 'count_bed'], 'integer'],
            [['team_name'], 'string', 'max' => 100],
            [['team_desc'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ref' => Yii::t('app', 'Ref'),
            'ward' => Yii::t('app', 'Ward'),
            'team_name' => Yii::t('app', 'Team Name'),
            'team_desc' => Yii::t('app', 'Team Desc'),
            'count_bed' => Yii::t('app', 'Count Bed'),
        ];
    }

    /**
     * @inheritdoc
     * @return WorkloadTeamQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WorkloadTeamQuery(get_called_class());
    }
}
