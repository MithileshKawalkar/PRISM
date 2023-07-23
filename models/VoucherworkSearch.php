<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Voucherwork;

/**
 * VoucherworkSearch represents the model behind the search form of `app\models\Voucherwork`.
 */
class VoucherworkSearch extends Voucherwork
{
    public $sent2AOA;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'voucherid', 'WorkOrderRefNo'], 'integer'],
            [['NatureOfPayment', 'ModeOfPayment', 'WorkOrderDate', 'Description', 'NameOfContractor','status','sent2AOA'], 'safe'],
        ];
    }

    public function attributes()
    {
        return array_merge(parent::attributes(), [
            'sent2AOA',
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        return [
            'default' => parent::scenarios()['default'],
            'showAll' => $this->attributes(), // Add a new scenario named 'showAll'
        ];
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
        $query = Voucherwork::find();

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

        if ($this->scenario === 'showAll') {
            // Remove the filter for Created_by if 'showAll' scenario is used
            $query->andFilterWhere(['like', 'Created_by', $this->Created_by]);
        } else {
            // Apply the default filter for Created_by based on user's role
            $query->andFilterWhere(['like', 'Created_by', ((Yii::$app->user->can("is-cashier") || Yii::$app->user->can("is-AOA")) ? $this->Created_by : Yii::$app->user->id)]);
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'voucherid' => $this->voucherid,
            'WorkOrderRefNo' => $this->WorkOrderRefNo,
            'WorkOrderDate' => $this->WorkOrderDate,
        ]);

        $query->andFilterWhere(['like', 'NatureOfPayment', $this->NatureOfPayment])
            ->andFilterWhere(['like', 'ModeOfPayment', $this->ModeOfPayment])
            ->andFilterWhere(['like', 'Description', $this->Description])
            ->andFilterWhere(['like', 'NameOfContractor', $this->NameOfContractor])
            ->andFilterWhere(['like', 'status',(Yii::$app->user->can("is-cashier"))?"\u{2714}":$this->status ])
            ->andFilterWhere(['like', 'sent2AOA',(Yii::$app->user->can("is-AOA"))?"1":$this->sent2AOA ]);
            // ->andFilterWhere(['like', 'Created_by',((Yii::$app->user->can("is-cashier")|| Yii::$app->user->can("is-AOA"))?$this->Created_by:Yii::$app->user->id)]);
            // print_r(var_dump($query->createCommand()->getRawSql()));
            // die();

        return $dataProvider;
    }
}
