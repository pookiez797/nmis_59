<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WorkloadDoctor;

/**
 * WorkloadDoctorSearch represents the model behind the search form about `app\models\WorkloadDoctor`.
 */
class WorkloadDoctorSearch extends WorkloadDoctor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ref'], 'integer'],
            [['ward', 'title', 'name', 'lname', 'doc_no'], 'safe'],
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
        $query = WorkloadDoctor::find()->byWard();

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
        ]);

        $query->andFilterWhere(['like', 'ward', $this->ward])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'lname', $this->lname])
            ->andFilterWhere(['like', 'doc_no', $this->doc_no]);

        return $dataProvider;
    }
}
