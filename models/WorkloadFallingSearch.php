<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WorkloadFalling;

/**
 * WorkloadFallingSearch represents the model behind the search form about `app\models\WorkloadFalling`.
 */
class WorkloadFallingSearch extends WorkloadFalling
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ref'], 'integer'],
            [['an', 'falling_level', 'ward', 'reporter', 'period', 'start_date', 'end_date'], 'safe'],
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
        $query = WorkloadFalling::find();

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
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);

        $query->andFilterWhere(['like', 'an', $this->an])
            ->andFilterWhere(['like', 'falling_level', $this->falling_level])
            ->andFilterWhere(['like', 'ward', $this->ward])
            ->andFilterWhere(['like', 'reporter', $this->reporter])
            ->andFilterWhere(['like', 'period', $this->period]);

        return $dataProvider;
    }
}
