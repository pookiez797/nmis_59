<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\NursePatient;

/**
 * NursePatientSearch represents the model behind the search form about `app\models\NursePatient`.
 */
class NursePatientSearch extends NursePatient
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pt_ref', 'event_ref', 'bed_type', 'bed_no', 'admit_type', 'disc_type', 'disability', 'operate', 'prepare', 'cpr', 'uti', 'vap', 'phleb', 'cutdown', 'doctor', 'inp_id'], 'integer'],
            [['hn', 'an', 'title', 'name', 'surname', 'pt_type', 'dx1', 'lastupdate'], 'safe'],
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
        $query = NursePatient::find();

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
            'pt_ref' => $this->pt_ref,
            'event_ref' => $this->event_ref,
            'bed_type' => $this->bed_type,
            'bed_no' => $this->bed_no,
            'admit_type' => $this->admit_type,
            'disc_type' => $this->disc_type,
            'disability' => $this->disability,
            'operate' => $this->operate,
            'prepare' => $this->prepare,
            'cpr' => $this->cpr,
            'uti' => $this->uti,
            'vap' => $this->vap,
            'phleb' => $this->phleb,
            'cutdown' => $this->cutdown,
            'doctor' => $this->doctor,
            'inp_id' => $this->inp_id,
            'lastupdate' => $this->lastupdate,
        ]);

        $query->andFilterWhere(['like', 'hn', $this->hn])
            ->andFilterWhere(['like', 'an', $this->an])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'pt_type', $this->pt_type])
            ->andFilterWhere(['like', 'dx1', $this->dx1]);

        return $dataProvider;
    }
}
