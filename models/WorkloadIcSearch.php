<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WorkloadIc;

/**
 * WorkloadIcSearch represents the model behind the search form about `app\models\WorkloadIc`.
 */
class WorkloadIcSearch extends WorkloadIc
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ref', 'factor', 'position', 'disease', 'infect_ward'], 'integer'],
            [['hn', 'an', 'type', 'last_update'], 'safe'],
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
        $query = WorkloadIc::find();

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
            'factor' => $this->factor,
            'position' => $this->position,
            'disease' => $this->disease,
            'infect_ward' => $this->infect_ward,
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['like', 'hn', $this->hn])
            ->andFilterWhere(['like', 'an', $this->an])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}
