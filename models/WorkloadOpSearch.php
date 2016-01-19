<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WorkloadOp;

/**
 * WorkloadOpSearch represents the model behind the search form about `app\models\WorkloadOp`.
 */
class WorkloadOpSearch extends WorkloadOp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ref'], 'integer'],
            [['an', 'operate', 'op_type', 'op_date', 'wound_type', 'ward', 'period', 'prepare_type'], 'safe'],
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
        $query = WorkloadOp::find();

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
            'op_date' => $this->op_date,
        ]);

        $query->andFilterWhere(['like', 'an', $this->an])
            ->andFilterWhere(['like', 'operate', $this->operate])
            ->andFilterWhere(['like', 'op_type', $this->op_type])
            ->andFilterWhere(['like', 'wound_type', $this->wound_type])
            ->andFilterWhere(['like', 'ward', $this->ward])
            ->andFilterWhere(['like', 'period', $this->period])
            ->andFilterWhere(['like', 'prepare_type', $this->prepare_type]);

        return $dataProvider;
    }
}
