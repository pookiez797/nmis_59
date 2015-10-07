<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\NurseStaffevent;

/**
 * NurseStaffeventSearch represents the model behind the search form about `app\models\NurseStaffevent`.
 */
class NurseStaffeventSearch extends NurseStaffevent
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['staffevent_ref', 'event_ref', 'staff_ref', 'wardclerk', 'aid', 'worker', 'teamlead', 'incharge', 'inp_id'], 'integer'],
            [['team', 'lastupdate'], 'safe'],
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
        $query = NurseStaffevent::find();

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
            'staffevent_ref' => $this->staffevent_ref,
            'event_ref' => $this->event_ref,
            'staff_ref' => $this->staff_ref,
            'wardclerk' => $this->wardclerk,
            'aid' => $this->aid,
            'worker' => $this->worker,
            'teamlead' => $this->teamlead,
            'incharge' => $this->incharge,
            'inp_id' => $this->inp_id,
            'lastupdate' => $this->lastupdate,
        ]);

        $query->andFilterWhere(['like', 'team', $this->team]);

        return $dataProvider;
    }
}
