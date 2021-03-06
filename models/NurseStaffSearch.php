<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\NurseStaff;

/**
 * NurseStaffSearch represents the model behind the search form about `app\models\NurseStaff`.
 */
class NurseStaffSearch extends NurseStaff
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['staff_ref', 'code', 'ward', 'position', 'priority', 'hn', 'part_time', 'assist', 'sup', 'wardclerk'], 'integer'],
            [['no', 'title', 'name', 'surname', 'lastupdate'], 'safe'],
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
        $query = NurseStaff::find()->byWard();

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
            'staff_ref' => $this->staff_ref,
            'code' => $this->code,
            'ward' => $this->ward,
            'position' => $this->position,
            'priority' => $this->priority,
            'hn' => $this->hn,
            'part_time' => $this->part_time,
            'assist' => $this->assist,
            'sup' => $this->sup,
            'wardclerk' => $this->wardclerk,
            'lastupdate' => $this->lastupdate,
        ]);

        $query->andFilterWhere(['like', 'no', $this->no])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname]);

        return $dataProvider;
    }
}
