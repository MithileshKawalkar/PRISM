<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Netpayvouchersalary;

/**
 * NetpayvouchersalarySearch represents the model behind the search form of `app\models\Netpayvouchersalary`.
 */
class NetpayvouchersalarySearch extends Netpayvouchersalary
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'voucherid', 'OldHeadOfAccount', 'RationalizedHeadOfAccount', 'Amount'], 'integer'],
            [['shortcode', 'DrOrCr'], 'safe'],
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
        $query = Netpayvouchersalary::find();

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
            'voucherid' => $this->voucherid,
            'OldHeadOfAccount' => $this->OldHeadOfAccount,
            'RationalizedHeadOfAccount' => $this->RationalizedHeadOfAccount,
            'Amount' => $this->Amount,
        ]);

        $query->andFilterWhere(['like', 'shortcode', $this->shortcode])
            ->andFilterWhere(['like', 'DrOrCr', $this->DrOrCr]);

        return $dataProvider;
    }
}
