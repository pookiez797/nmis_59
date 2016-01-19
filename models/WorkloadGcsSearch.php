<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WorkloadGcs;

/**
 * WorkloadGcsSearch represents the model behind the search form about `app\models\WorkloadGcs`.
 */
class WorkloadGcsSearch extends WorkloadGcs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ref', 'gcs_type', 'ward'], 'integer'],
            [['an', 'hn', 'e_type', 'v_type', 'm_type', 'score', 'date'], 'safe'],
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
        $query = WorkloadGcs::find();

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
            'gcs_type' => $this->gcs_type,
            'date' => $this->date,
            'ward' => $this->ward,
        ]);

        $query->andFilterWhere(['like', 'an', $this->an])
            ->andFilterWhere(['like', 'hn', $this->hn])
            ->andFilterWhere(['like', 'e_type', $this->e_type])
            ->andFilterWhere(['like', 'v_type', $this->v_type])
            ->andFilterWhere(['like', 'm_type', $this->m_type])
            ->andFilterWhere(['like', 'score', $this->score]);

        return $dataProvider;
    }
}
