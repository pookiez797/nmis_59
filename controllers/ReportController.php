<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Report;

class ReportController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionCardexReport() {
        $model = new Report();
        if (($date_report = Yii::$app->request->post('Report'))) {

            $ward = Yii::$app->user->identity->ward;
            $month = $date_report['month'];
            $year = $date_report['year'];
            $days = date('t', strtotime($year . '-' . $month . '-01'));
            
            $this->callDatereport($month, $year,$days);
            $month_name = $model->getMonthName($month);
            $ward_name = $model->getWard($ward);
            

            $sql = "select t.date,
	t.period,
	a.ward,
	a.admit1,
	a.admit2,
	a.admit3,
        a.admit4,
	a.disc1,
	a.disc2,
	a.disc3,
	a.disc4,
	a.disc5,
	a.disc6,
	a.prepare,
	a.cpr_time,
	a.cpr_no,
	a.respirator,
	a.rm_normal,
	a.rm_vip,
	a.disability,
	a.4a,
	a.3a,
        a.3b,
	a.2a,
	a.2b,
	a.2c,
	a.1a,
	a.1b,
	a.1c,
	a.1d,
	b.hn,
	b.rn,
	b.tn,
	b.pn,
	b.na,
        b.worker,
	b.total
from  tmp_report t LEFT JOIN
(select 
ne.ref,
ne.date,
ne.period,
ne.ward
-- Admit
,sum(if(p.admit_type=1,1,0)) as 'admit1'
,sum(if(p.admit_type=2,1,0)) as 'admit2'
,sum(if(p.admit_type=3,1,0)) as 'admit3'
,sum(if(p.admit_type=4,1,0)) as 'admit4'
-- Disc
,sum(if(p.disc_type=1,1,0)) as 'disc1'
,sum(if(p.disc_type=2,1,0)) as 'disc2'
,sum(if(p.disc_type=3,1,0)) as 'disc3'
,sum(if(p.disc_type=4,1,0)) as 'disc4'
,sum(if(p.disc_type=5,1,0)) as 'disc5'
,sum(if(p.disc_type=6,1,0)) as 'disc6'
-- หัตถการ
,sum(if(p.prepare=1,1,0)) as 'prepare'
,sum(p.cpr) as 'cpr_time'
,(if(p.cpr>0 and p.disc_type=0,1,0)) as 'cpr_no'
,sum(if((p.uti>0 || p.vap>0 || p.phleb>0 || p.cutdown >0) and p.disc_type=0,1,0)) as 'respirator'
-- คงพยาบาล
,sum(if(p.bed_type in ('ส','น','ย','ท') and p.disc_type=0,1,0)) as 'rm_normal'
,sum(if(p.bed_type='พ' and p.disc_type=0,1,0)) as 'rm_vip'
,sum(if(p.disability=1 and p.disc_type=0,1,0)) as 'disability'
-- จำแนกผู้ป่วย
,sum(if(p.pt_type='4a' and p.disc_type=0,1,0)) as '4a'
,sum(if(p.pt_type='3a' and p.disc_type=0,1,0)) as '3a'
,sum(if(p.pt_type='3b' and p.disc_type=0,1,0)) as '3b'
,sum(if(p.pt_type='2A' and p.disc_type=0,1,0)) as '2a'
,sum(if(p.pt_type='2B' and p.disc_type=0,1,0)) as '2b'
,sum(if(p.pt_type='2C' and p.disc_type=0,1,0)) as '2c'
,sum(if(p.pt_type='1a' and p.disc_type=0,1,0)) as '1a'
,sum(if(p.pt_type='1b' and p.disc_type=0,1,0)) as '1b'
,sum(if(p.pt_type='1c' and p.disc_type=0,1,0)) as '1c'
,sum(if(p.pt_type='1d' and p.disc_type=0,1,0)) as '1d'
from nurse_event ne  left join nurse_patient p on p.event_ref = ne.ref
where (ne.date is not null and date != 0000-00-00) and ne.ward = " . $ward . " and month(date) = '" . $month . "' and year(date) = '" . $year . "'
group by ne.date,ne.period,ne.ward
order by ne.date,ne.period,ne.ward) a
on t.date = a.date and t.period = a.period
left join
(select 	ne.ref,
		ne.date,
		ne.period,
		ne.ward,
		sum(if(s.hn =1,1,0)) as 'hn',
		sum(if(s.position in (1,2,3,4,5,10) and hn!=1,1,0)) as 'rn',
		sum(if(s.position in (6) and hn!=1,1,0)) as 'tn',
		sum(if(s.position in (7) and hn!=1,1,0)) as 'pn',
		sum(if(s.position in (8) and hn!=1,1,0)) as 'na',
                sum(if(s.position in (9) and hn!=1,1,0)) as 'worker',
		count(se.event_ref) as 'total'
from nurse_event ne left join nurse_staffevent se on ne.ref = se.event_ref
					left join nurse_staff s on se.staff_ref = s.staff_ref
where (ne.date is not null and date != 0000-00-00) and ne.ward = " . $ward . " and month(date) = '" . $month . "' and year(date) = '" . $year . "'
group by date,period,ward) b
on a.ref = b.ref";

//        $patient = NursePatient::findBySql($sql)->all();
//        print_r($patient);

            $command = Yii::$app->db->createCommand($sql);
            $cardex = $command->queryAll();
            
            $this->clearDate();
            
            return $this->renderPartial('_cardexreport', [
                        'cardex' => $cardex,
                        'month' => $month,
                        'year' => $year,
                        'month_name' => $month_name,
                        'ward_name' => $ward_name
            ]);
        } else {
            return $this->render('_callcardexreport', [
                        'model' => $model,
            ]);
        }
    }

    public function insertDate($month,$year,$days) {
        $myvalue = '';
        $session_id = Yii::$app->user->id;
        for ($i = 1; $i <= $days; $i++) {
            if ($i != $days) {
                $myvalue .= '("' . $year . '-' . $month . '-' . $i . '",1,'.$session_id.'),';
                $myvalue .= '("' . $year . '-' . $month . '-' . $i . '",2,'.$session_id.'),';
                $myvalue .= '("' . $year . '-' . $month . '-' . $i . '",3,'.$session_id.'),';
            } else {
                $myvalue .= '("' . $year . '-' . $month . '-' . $i . '",1,'.$session_id.'),';
                $myvalue .= '("' . $year . '-' . $month . '-' . $i . '",2,'.$session_id.'),';
                $myvalue .= '("' . $year . '-' . $month . '-' . $i . '",3,'.$session_id.')';
            }
        }
        
        $sql = 'insert into tmp_report'
                . '(date,period,session_id)'
                . ' values '
                . $myvalue;
        $command = Yii::$app->db->createCommand($sql);
        $command->execute();
    }
    
    public function clearDate(){
        $session_id = Yii::$app->user->id;
        Yii::$app->db->createCommand()->delete('tmp_report','session_id ='.$session_id)->execute();
    }
    
    public function callDatereport($month,$year,$days){
        $this->clearDate();
        $this->insertDate($month, $year, $days);
    }

}
