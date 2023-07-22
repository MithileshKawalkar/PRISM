<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\ContractorDetails;

class ContractorController extends Controller
{

    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            // Check if the user is a guest
            if (Yii::$app->user->isGuest) {
                // Redirect guests to the index page
                $this->redirect(['/site/index'])->send();
                return false;
            }
            return true;
        }
        return false;
    }

    
    public function actionGetBankName()
    {
        print_r("fgvhg");
        die();
        $selectedContractor = Yii::$app->request->post('contractor');
        $contractorDetails = ContractorDetails::find()
            ->where(['name' => $selectedContractor])
            ->one();
            
        if ($contractorDetails) {
            $bankName = $contractorDetails->bankName;
            return $bankName;
        } else {
            return '';
        }
    }
}
?>