<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Challansalary;

/**
 * ChallansalarySearch represents the model behind the search form of `app\models\Challansalary`.
 */
class ChallansalarySearch extends Challansalary
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ReferenceLetterNo', 'Amount', 'OldHeadOfAccount', 'RationalizedHeadofAccount', 'ShortcodeAmount'], 'integer'],
            [['ReceivedForm', 'ReferenceLetterDate', 'NatureOfValuable', 'Shortcode', 'DrOrCr'], 'safe'],
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
        $query = Challansalary::find();

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
            'ReferenceLetterDate' => $this->ReferenceLetterDate,
            'Amount' => $this->Amount,
            'OldHeadOfAccount' => $this->OldHeadOfAccount,
            'RationalizedHeadofAccount' => $this->RationalizedHeadofAccount,
            'ShortcodeAmount' => $this->ShortcodeAmount,
        ]);

        $query->andFilterWhere(['like', 'ReceivedForm', $this->ReceivedForm])
            ->andFilterWhere(['like', 'NatureOfValuable', $this->NatureOfValuable])
            ->andFilterWhere(['like', 'Shortcode', $this->Shortcode])
            ->andFilterWhere(['like', 'DrOrCr', $this->DrOrCr]);

        return $dataProvider;
    }
}
