<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Valuable;

/**
 * ValuableSearch represents the model behind the search form of `app\models\Valuable`.
 */
class ValuableSearch extends Valuable
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ReferenceLetterNo', 'Amount'], 'integer'],
            [['ReceievedForm', 'NatureOfValuable', 'SectionToWhichTheValuableBelong', 'ReferenceLetterDate'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Valuable::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'ReferenceLetterNo' => $this->ReferenceLetterNo,
            'Amount' => $this->Amount,
            'ReferenceLetterDate' => $this->ReferenceLetterDate,
        ]);

        $query->andFilterWhere(['like', 'ReceievedForm', $this->ReceievedForm])
            ->andFilterWhere(['like', 'NatureOfValuable', $this->NatureOfValuable])
            ->andFilterWhere(['like', 'SectionToWhichTheValuableBelong', $this->SectionToWhichTheValuableBelong]);

        return $dataProvider;
    }
}
