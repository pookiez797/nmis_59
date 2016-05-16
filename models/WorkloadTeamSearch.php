<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WorkloadTeam;

/**
 * WorkloadTeamSearch represents the model behind the search form about `app\models\WorkloadTeam`.
 */
class WorkloadTeamSearch extends WorkloadTeam
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ref', 'ward', 'count_bed'], 'integer'],
            [['team_name', 'team_desc'], 'safe'],
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
        $query = WorkloadTeam::find()->byWard();

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
            'count_bed' => $this->count_bed,
        ]);

        $query->andFilterWhere(['like', 'team_name', $this->team_name])
            ->andFilterWhere(['like', 'team_desc', $this->team_desc]);

        return $dataProvider;
    }
}
