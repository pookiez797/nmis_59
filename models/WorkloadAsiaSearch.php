<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WorkloadAsia;

/**
 * WorkloadAsiaSearch represents the model behind the search form about `app\models\WorkloadAsia`.
 */
class WorkloadAsiaSearch extends WorkloadAsia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ref', 'c5_r', 'c5_l', 'c6_r', 'c6_l', 'c7_r', 'c7_l', 'c8_r', 'c8_l', 't1_r', 't1_l', 'upper_total_r', 'upper_total_l', 'upper_total', 'l2_r', 'l2_l', 'l3_r', 'l3_l', 'l4_r', 'l4_l', 'l5_r', 'l5_l', 's1_r', 's1_l', 'lower_total_r', 'lower_total_l', 'lower_total', 'ward'], 'integer'],
            [['an', 'hn', 'date'], 'safe'],
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
        $query = WorkloadAsia::find();

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
            'c5_r' => $this->c5_r,
            'c5_l' => $this->c5_l,
            'c6_r' => $this->c6_r,
            'c6_l' => $this->c6_l,
            'c7_r' => $this->c7_r,
            'c7_l' => $this->c7_l,
            'c8_r' => $this->c8_r,
            'c8_l' => $this->c8_l,
            't1_r' => $this->t1_r,
            't1_l' => $this->t1_l,
            'upper_total_r' => $this->upper_total_r,
            'upper_total_l' => $this->upper_total_l,
            'upper_total' => $this->upper_total,
            'l2_r' => $this->l2_r,
            'l2_l' => $this->l2_l,
            'l3_r' => $this->l3_r,
            'l3_l' => $this->l3_l,
            'l4_r' => $this->l4_r,
            'l4_l' => $this->l4_l,
            'l5_r' => $this->l5_r,
            'l5_l' => $this->l5_l,
            's1_r' => $this->s1_r,
            's1_l' => $this->s1_l,
            'lower_total_r' => $this->lower_total_r,
            'lower_total_l' => $this->lower_total_l,
            'lower_total' => $this->lower_total,
            'date' => $this->date,
            'ward' => $this->ward,
        ]);

        $query->andFilterWhere(['like', 'an', $this->an])
            ->andFilterWhere(['like', 'hn', $this->hn]);

        return $dataProvider;
    }
}
