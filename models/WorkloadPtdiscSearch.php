<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WorkloadPtdisc;

/**
 * WorkloadPtdiscSearch represents the model behind the search form about `app\models\WorkloadPtdisc`.
 */
class WorkloadPtdiscSearch extends WorkloadPtdisc
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ref', 'ward'], 'integer'],
            [['hn', 'an', 'title', 'name', 'surname', 'movestatus', 'lastupdate'], 'safe'],
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
        $query = WorkloadPtdisc::find()->byward();

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
            'ward' => $this->ward,
            'lastupdate' => $this->lastupdate,
        ]);

        $query->andFilterWhere(['like', 'hn', $this->hn])
            ->andFilterWhere(['like', 'an', $this->an])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'movestatus', $this->movestatus]);

        return $dataProvider;
    }
}
