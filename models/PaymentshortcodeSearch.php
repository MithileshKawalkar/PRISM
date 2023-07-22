<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Paymentshortcode;

/**
 * PaymentshortcodeSearch represents the model behind the search form of `app\models\Paymentshortcode`.
 */
class PaymentshortcodeSearch extends Paymentshortcode
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['shortcode', 'OldHeadOfAccount', 'RationalizedHeadOfAccount', 'Amount', 'id'], 'integer'],
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
        $query = Paymentshortcode::find();

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
            'shortcode' => $this->shortcode,
            'OldHeadOfAccount' => $this->OldHeadOfAccount,
            'RationalizedHeadOfAccount' => $this->RationalizedHeadOfAccount,
            'Amount' => $this->Amount,
            'id' => $this->id,
        ]);

        return $dataProvider;
    }
}
