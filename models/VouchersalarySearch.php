<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vouchersalary;

/**
 * VouchersalarySearch represents the model behind the search form of `app\models\Vouchersalary`.
 */
class VouchersalarySearch extends Vouchersalary
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'voucherid', 'SanctionRefNo'], 'integer'],
            [['NatureOfPayment', 'ModeOfPayment', 'SanctionDate', 'NameOfEmployee','status'], 'safe'],
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
        $query = Vouchersalary::find();

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
            'SanctionRefNo' => $this->SanctionRefNo,
            'SanctionDate' => $this->SanctionDate,
        ]);

        $query->andFilterWhere(['like', 'NatureOfPayment', $this->NatureOfPayment])
            ->andFilterWhere(['like', 'ModeOfPayment', $this->ModeOfPayment])
            ->andFilterWhere(['like', 'NameOfEmployee', $this->NameOfEmployee])
            // ->andFilterWhere(['like', 'status', $this->status]);
            ->andFilterWhere(['like', 'status',(Yii::$app->user->can("is-cashier"))?"\u{2714}":$this->status ])
            ->andFilterWhere(['like', 'sent2AOA',(Yii::$app->user->can("is-AOA"))?"1":$this->sent2AOA ])
            ->andFilterWhere(['like', 'Created_by',((Yii::$app->user->can("is-cashier")|| Yii::$app->user->can("is-AOA"))?$this->Created_by:Yii::$app->user->id)]);
        return $dataProvider;
    }
}
