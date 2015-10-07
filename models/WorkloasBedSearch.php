<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WorkloadBed;

/**
 * WorkloasBedSearch represents the model behind the search form about `app\models\WorkloadBed`.
 */
class WorkloasBedSearch extends WorkloadBed
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ref', 'team_ref', 'bed_no'], 'integer'],
            [['bed_type'], 'safe'],
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
        $query = WorkloadBed::find();

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
            'team_ref' => $this->team_ref,
            'bed_no' => $this->bed_no,
        ]);

        $query->andFilterWhere(['like', 'bed_type', $this->bed_type]);

        return $dataProvider;
    }
}
