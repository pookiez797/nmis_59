<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Report;
use DateTime;
use app\models\NurseStaff;

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

            $days2 = date('Y-m-d', strtotime($year . '-' . $month . '-01'));
            $prev_month = date ('m',strtotime("-1 month",  strtotime($days2)));

            $prev_year = $year;
            if($month=='01'){
                $prev_month='12';
                $prev_year = date ('Y',strtotime("-1 year",  strtotime($days2)));
            }else{
                $prev_month = date ('m',strtotime("-1 month",  strtotime($days2)));
            }


            $this->callDatereport($month, $year, $days);
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
	c.date_next,
	c.period_next,
	c.total_prev,
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
,sum(if((p.vap>0) and p.disc_type=0,1,0)) as 'respirator'
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
		sum(if(s.position in (1,2,3,4,5,10) and s.hn!=1,1,0)) as 'rn',
		sum(if(s.position in (6) and s.hn!=1,1,0)) as 'tn',
		sum(if(s.position in (7) and s.hn!=1,1,0)) as 'pn',
		sum(if(s.position in (8) and s.hn!=1,1,0)) as 'na',
                sum(if(s.position in (9) and hn!=1,1,0)) as 'worker',
		count(se.event_ref) as 'total'
from nurse_event ne left join nurse_staffevent se on ne.ref = se.event_ref
					left join nurse_staff s on se.staff_ref = s.staff_ref
where (ne.date is not null and date != 0000-00-00) and ne.ward = " . $ward . " and month(date) = '" . $month . "' and year(date) = '" . $year . "'
group by date,period,ward) b
on a.ref = b.ref

left join
(
select
    if(a.period = 3,1,a.period+1) as period_next,
    if(a.period = 3,DATE_ADD(a.date,INTERVAL 1 day),a.date) as date_next,
	a.rm_total as total_prev
from
(select
ne.ref,
ne.date,
ne.period,
ne.ward
,sum(if(p.bed_type in ('ส','น','ย','ท','พ') and p.disc_type=0,1,0)) as 'rm_total'
from nurse_event ne  left join nurse_patient p on p.event_ref = ne.ref
where (ne.date is not null and date != 0000-00-00) and ne.ward = " . $ward . " and month(date) in ('" . $month . "','" . $prev_month . "') and year(date) in ('" . $year . "','" . $prev_year . "')
group by ne.date,ne.period,ne.ward
order by ne.date,ne.period,ne.ward) a
) c
on a.date = c.date_next and a.period = c.period_next
";

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

    public function insertDate($month, $year, $days) {
        $myvalue = '';
        $session_id = Yii::$app->user->id;
        for ($i = 1; $i <= $days; $i++) {
            if ($i != $days) {
                $myvalue .= '("' . $year . '-' . $month . '-' . $i . '",1,' . $session_id . '),';
                $myvalue .= '("' . $year . '-' . $month . '-' . $i . '",2,' . $session_id . '),';
                $myvalue .= '("' . $year . '-' . $month . '-' . $i . '",3,' . $session_id . '),';
            } else {
                $myvalue .= '("' . $year . '-' . $month . '-' . $i . '",1,' . $session_id . '),';
                $myvalue .= '("' . $year . '-' . $month . '-' . $i . '",2,' . $session_id . '),';
                $myvalue .= '("' . $year . '-' . $month . '-' . $i . '",3,' . $session_id . ')';
            }
        }

        $sql = 'insert into tmp_report'
                . '(date,period,session_id)'
                . ' values '
                . $myvalue;
        $command = Yii::$app->db->createCommand($sql);
        $command->execute();
    }

    public function clearDate() {
        $session_id = Yii::$app->user->id;
        Yii::$app->db->createCommand()->delete('tmp_report', 'session_id =' . $session_id)->execute();
    }

    public function callDatereport($month, $year, $days) {
        $this->clearDate();
        $this->insertDate($month, $year, $days);
    }

    public function actionCardexSup() {
        $model = new Report();
        if ($date_report = Yii::$app->request->post('Report')) {
            $date = $date_report['date'];
            $period = $date_report['period'];
            $ward = $date_report['ward'];
            $month = substr($date, 5, 2);
            $year = substr($date, 0, 4);
            $day = substr($date, 8, 2);
            $myward = implode(',', $ward);
            $month_name = $model->getMonthName($month);
            $this->callSupcardexreport($date, $period, $ward);

            $prev_period = '';
            $prev_date = $date;
            $eventdate = new DateTime($date);

            if ($period > 1) {
                $prev_period = $period - 1;
                $prev_date = $date;
            } else {
                $prev_period = 3;
                $eventdate->modify('-1 day');
                $prev_date = $eventdate->format('Y-m-d');
            }

            $sql = "select w.*,x.*,v.remain
from tmp_ward y
left join
(select
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
 from (select
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
,sum(if((p.vap>0) and p.disc_type=0,1,0)) as 'respirator'
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
where (ne.date is not null and date != 0000-00-00) and date = '" . $date . "' and ne.period = '" . $period . "' and ne.ward in(" . $myward . ")
group by ne.date,ne.period,ne.ward
order by ne.date,ne.period,ne.ward) a
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
where (ne.date is not null and date != 0000-00-00) and date = '" . $date . "' and ne.period = '" . $period . "' and ne.ward in(" . $myward . ")
group by date,period,ward) b
on a.ref = b.ref) x
on y.ward = x.ward
left join lib_ward w
on y.ward = w.code
left join
(select ward,count(ref) as remain from nurse_event left join nurse_patient
on nurse_event.ref = nurse_patient.event_ref
where  ward in(" . $myward . ")  and date = '".$prev_date."' and period = '".$prev_period."' and disc_type = 0 group by ward) v
on y.ward = v.ward

UNION

select c.*,d.remain from (
select
'' as code,
'รวม' as name,
999 as ward,
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
 from (select
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
,sum(if((p.vap>0) and p.disc_type=0,1,0)) as 'respirator'
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
where (ne.date is not null and date != 0000-00-00) and date = '" . $date . "' and ne.period = '" . $period . "' and ne.ward in(" . $myward . ")
order by ne.date,ne.period,ne.ward) a
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
where (ne.date is not null and date != 0000-00-00) and date = '" . $date . "' and ne.period = '" . $period . "' and ne.ward in(" . $myward . ")
) b
on a.ref = b.ref
) c
left join
(select ward,count(ref) as remain from nurse_event left join nurse_patient
on nurse_event.ref = nurse_patient.event_ref
where ward in(".$myward.") and date = '".$prev_date."' and period = '".$prev_period."' and disc_type = 0
) d
on c.ward = 999


";

            $command = Yii::$app->db->createCommand($sql);
            $cardex = $command->queryAll();

            $this->clearWard();

            return $this->renderPartial('_cardexsupreport', [
                        'cardex' => $cardex,
                        'month' => $month,
                        'year' => $year,
                        'month_name' => $month_name,
                        'day' => $day,
                        'period' => $period,
            ]);
        } else {
            return $this->render('_callcardexsup', [
                        'model' => $model,
            ]);
        }
    }

    public function clearWard() {
        $session_id = Yii::$app->user->id;
        Yii::$app->db->createCommand()->delete('tmp_ward', 'session_id =' . $session_id)->execute();
    }

    public function callSupcardexreport($date, $period, $ward) {
        $this->clearWard();
        $this->insertWard($date, $period, $ward);
    }

    public function insertWard($date, $period, $ward) {
        $myvalue = '';
        $session_id = Yii::$app->user->id;
        $i = 1;
        foreach ($ward as $v) {

            if ($i == count($ward)) {
                $myvalue .= '("' . $v . '","' . $date . '","' . $period . '",' . $session_id . ')';
            } else {
                $myvalue .= '("' . $v . '","' . $date . '","' . $period . '",' . $session_id . '),';
            }
            $i++;
        }

        $sql = 'insert into tmp_ward'
                . '(ward,date,period,session_id)'
                . ' values '
                . $myvalue;
        $command = Yii::$app->db->createCommand($sql);
        $command->execute();
    }

//     public function actionPatientReport() {
//         $model = new Report();
//         if (($date_report = Yii::$app->request->post('Report'))) {
//
//             $ward = Yii::$app->user->identity->ward;
//             $month = $date_report['month'];
//             $year = $date_report['year'];
//             $days = date('t', strtotime($year . '-' . $month . '-01'));
//
//             $this->callDatereport($month, $year, $days);
//             $month_name = $model->getMonthName($month);
//             $ward_name = $model->getWard($ward);
//
//
//
//             $sql = "
//             select a.hn
//             ,a.an
//             ,a.title
//             ,a.name
//             ,a.surname
//             ,b.age
//             ,b.pttype_name
//             ,CONCAT(b.address,' หมู่',if(b.moo='','-',b.moo),' ต.',b.tambol,' อ.',b.amp,' ',b.province) as address
//             from
//             (select hn,an,title,name,surname,count(hn) as los,sum(period_count) as period_count,sum(period_count)/3 as los_period from
//             (select hn,an,title,name,surname,count(hn) as period_count from nurse_event e left join nurse_patient p on e.ref=p.event_ref
//             where ward ='".$ward."' and MONTH(date)='".$month."' and YEAR(date) = '".$year."' and hn != ''
//             GROUP BY name,surname,date
//             ORDER BY date,AN) a
//             GROUP BY hn) a
//             left join
//             (
//             SELECT  a.hn
//             ,DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(),a.birth)), '%Y')+0 AS age
//             ,c.text as pttype_name
//             ,a.address
//             ,a.moo
//             ,a.tambol
//             ,a.amp
//             ,b.name_full as province
//             FROM   hospdata.patient  a
//             LEFT JOIN  hospdata.view_province  b  ON  a.prov =  SUBSTR(b.`code`,1,2)
//             LEFT JOIN hospdata.lib_pttype c ON a.pttype = c.`code`
//             where hn in (
//             select DISTINCT hn from nurse_event e left join nurse_patient p on e.ref=p.event_ref
//             where ward ='".$ward."' and MONTH(date)='".$month."' and YEAR(date) = '".$year."' and hn != ''
//             )
//             ) b
//             on a.hn = b.hn
//
//             ";
//
// //        $patient = NursePatient::findBySql($sql)->all();
// //        print_r($patient);
//
//             $command = Yii::$app->db->createCommand($sql);
//             $patient = $command->queryAll();
//
//             $this->clearDate();
//
//             return $this->renderPartial('_patientreport', [
//                         'patient' => $patient,
//                         'month' => $month,
//                         'year' => $year,
//                         'month_name' => $month_name,
//                         'ward_name' => $ward_name
//             ]);
//         } else {
//             return $this->render('_callpatient', [
//                         'model' => $model,
//             ]);
//         }
//
//     }


public function actionPatientReport() {
    $model = new Report();
    if (($date_report = Yii::$app->request->post('Report'))) {

        $ward = Yii::$app->user->identity->ward;
        $month = $date_report['month'];
        $year = $date_report['year'];
        $days = date('t', strtotime($year . '-' . $month . '-01'));
        $lastday = date('Y-m-d', strtotime($year . '-' . $month . '-'.$days));

        $this->callDatereport($month, $year, $days);
        $month_name = $model->getMonthName($month);
        $ward_name = $model->getWard($ward);



        $sql = "
        select a.*
        ,b.age
        ,b.pttype_name
        ,CONCAT(b.address,' หมู่',if(b.moo='','-',b.moo),' ต.',b.tambol,' อ.',b.amp,' ',b.province) as address
        from
        (select a.hn,a.an,a.vn,a.title,a.name,a.surname,a.admite,a.disc,a.ward,a.dx1,a.fu,b.oldward,b.newward,b.date,b.date_admit
        ,if(b.newward = ".$ward.",SUBSTR(b.date,1,10),'') as admit_date_new
        ,if(b.newward = ".$ward.",SUBSTR(b.date,1,10),a.admite) as admit_date_sort
        ,if(b.oldward = ".$ward.",SUBSTR(b.date,1,10),'') as move_date_new
        from (select * from hospdata.ipd_ipd
        where an in(
        select DISTINCT an from nurse_event e left join nurse_patient p on e.ref=p.event_ref
        where ward ='".$ward."' and MONTH(date)='".$month."' and YEAR(date) = '".$year."' and hn != ''
        )) a
        left join hospdata.ipd_moveward b
        on a.an = b.an and (b.oldward ='".$ward."' or b.newward = '".$ward."')
        and MONTH(b.date)='".$month."' and YEAR(b.date) = '".$year."'
        order by a.an,b.date asc) a
        left JOIN
        (
        SELECT  a.hn
                    ,DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(),a.birth)), '%Y')+0 AS age
                    ,c.text as pttype_name
                    ,a.address
                    ,a.moo
                    ,a.tambol
                    ,a.amp
                    ,b.name_full as province
                    FROM   hospdata.patient  a
                    LEFT JOIN  hospdata.view_province  b  ON  a.prov =  SUBSTR(b.`code`,1,2)
                    LEFT JOIN hospdata.lib_pttype c ON a.pttype = c.`code`
                    where hn in (
                    select DISTINCT hn from nurse_event e left join nurse_patient p on e.ref=p.event_ref
                    where ward = '".$ward."' and MONTH(date)='".$month."' and YEAR(date) = '".$year."' and hn != ''
         )
        ) b
        on a.hn = b.hn
        order by admit_date_sort
        ";

//        $patient = NursePatient::findBySql($sql)->all();
//        print_r($patient);

        $command = Yii::$app->db->createCommand($sql);
        $patient = $command->queryAll();

        $this->clearDate();

        return $this->renderPartial('_patientreport', [
                    'patient' => $patient,
                    'month' => $month,
                    'year' => $year,
                    'month_name' => $month_name,
                    'ward_name' => $ward_name,
                    'lastday' => $lastday,
                    'ward'=>$ward,
        ]);
    } else {
        return $this->render('_callpatient', [
                    'model' => $model,
        ]);
    }

}

//     public function actionStafftableReport(){
//       $model = new Report();
//
//       if (($date_report = Yii::$app->request->post('Report'))) {
//
//       $ward = Yii::$app->user->identity->ward;
//       $month = $date_report['month'];
//       $year = $date_report['year'];
//       $days = date('t', strtotime($year . '-' . $month . '-01'));
//       $month_name = $model->getMonthName($month);
//       $ward_name = $model->getWard($ward);
//       $staff_name = NurseStaff::find()->byWard()->all();
//
//       $sql = 'select * from nurse_event e
// left join nurse_staffevent s
// on e.ref = s.event_ref
// where e.ward = '.$ward.' and month(date)="'.$month.'" and year(date)="'.$year.'"
// group by e.date,e.period,s.staff_ref
// order by e.date,e.period';
//
// $command = Yii::$app->db->createCommand($sql);
// $stafftable = $command->queryAll();
//
//       return $this->renderPartial('_stafftablereport', [
//                   'staff_name' => $staff_name,
//                   'month' => $month,
//                   'year' => $year,
//                   'month_name' => $month_name,
//                   'ward_name' => $ward_name,
//                   'days' => $days,
//                   'stafftable' => $stafftable,
//       ]);
//
//     } else {
//         return $this->render('_callstafftable', [
//                     'model' => $model,
//         ]);
//     }
//   }

    public function actionStafftableReport(){
      $model = new Report();

      if (($date_report = Yii::$app->request->post('Report'))) {

      $ward = Yii::$app->user->identity->ward;
      $month = $date_report['month'];
      $year = $date_report['year'];
      $days = date('t', strtotime($year . '-' . $month . '-01'));

      $thismonth = date('Y-m-d', strtotime($year . '-' . $month . '-01'));
      $nextmonth = date('Y-m-d', strtotime('+1 month',strtotime($thismonth)));

      $month_name = $model->getMonthName($month);
      $ward_name = $model->getWard($ward);
      $staff_name = NurseStaff::find()->byWard()->all();

      $sql = 'select *,if(period = 1,DATE( DATE_SUB(date,INTERVAL 1 DAY)),date) as new_date
              ,if(period=1,4,period) as prior
              from nurse_event e
              left join nurse_staffevent s
              on e.ref = s.event_ref
              where e.ward = '.$ward.' and month(date)="'.$month.'" and year(date)="'.$year.'"
              group by new_date,e.period,s.staff_ref

              UNION
              select *,if(period = 1,DATE( DATE_SUB(date,INTERVAL 1 DAY)),date) as new_date
              ,if(period=1,4,period) as prior from nurse_event e
              left join nurse_staffevent s
              on e.ref = s.event_ref
              where e.ward = '.$ward.' and date = "'.$nextmonth.'" and period = 1
              group by new_date,e.period,s.staff_ref

              order by new_date,prior';

$command = Yii::$app->db->createCommand($sql);
$stafftable = $command->queryAll();

      return $this->renderPartial('_stafftablereport', [
                  'staff_name' => $staff_name,
                  'month' => $month,
                  'year' => $year,
                  'month_name' => $month_name,
                  'ward_name' => $ward_name,
                  'days' => $days,
                  'stafftable' => $stafftable,
                  'fromdate'=>$thismonth,
                  'todate'=>$nextmonth,
                  'ward'=>$ward,
      ]);

    } else {
        return $this->render('_callstafftable', [
                    'model' => $model,
        ]);
    }
  }

}
