<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WorkloadEvent2;

/**
 * WorkloadEvent2Search represents the model behind the search form about `app\models\WorkloadEvent2`.
 */
class WorkloadEvent2Search extends WorkloadEvent2
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ref', 'bed_no', 'cpr', 'doctor_ref'], 'integer'],
            [['event_date', 'event_period', 'hn', 'an', 'ward', 'bed_type', 'pt_type', 'admit_type', 'disc_type', 'disability', 'operate', 'prepare', 'uti', 'vap', 'phleb', 'user', 'cutdown', 'last_update'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = WorkloadEvent2::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ref' => $this->ref,
            'event_date' => $this->event_date,
            'bed_no' => $this->bed_no,
            'cpr' => $this->cpr,
            'doctor_ref' => $this->doctor_ref,
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['like', 'event_period', $this->event_period])
            ->andFilterWhere(['like', 'hn', $this->hn])
            ->andFilterWhere(['like', 'an', $this->an])
            ->andFilterWhere(['like', 'ward', $this->ward])
            ->andFilterWhere(['like', 'bed_type', $this->bed_type])
            ->andFilterWhere(['like', 'pt_type', $this->pt_type])
            ->andFilterWhere(['like', 'admit_type', $this->admit_type])
            ->andFilterWhere(['like', 'disc_type', $this->disc_type])
            ->andFilterWhere(['like', 'disability', $this->disability])
            ->andFilterWhere(['like', 'operate', $this->operate])
            ->andFilterWhere(['like', 'prepare', $this->prepare])
            ->andFilterWhere(['like', 'uti', $this->uti])
            ->andFilterWhere(['like', 'vap', $this->vap])
            ->andFilterWhere(['like', 'phleb', $this->phleb])
            ->andFilterWhere(['like', 'user', $this->user])
            ->andFilterWhere(['like', 'cutdown', $this->cutdown]);

        return $dataProvider;
    }
}
