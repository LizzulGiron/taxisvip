<?php

namespace App\Http\Controllers;

use DB;
use DateTime;
use App\Payments;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $datos['drivers'] = DB::table('drivers')
            ->join('persons', 'persons.id', '=', 'drivers.person_id')
            ->join('vehicles', 'vehicles.id', '=', 'drivers.vehicle_id')
            ->join('zones', 'zones.id', '=', 'drivers.zone_id')
            ->select('drivers.id','drivers.person_id','persons.first_name', 'persons.last_name', 'persons.phone', 'persons.identity','vehicles.register','zones.name')
            ->get();
        return view('payments.index',$datos);
    }

    public function show($id)
    {
        $currentDate = date("Y-m-d");
        $datos['pagosRetrasados'] = " ";
        $days = date('d');
        $month = date('m');
        $year = date('Y');
        $dates =  [];
        $pendingPayments[] = ' ';

        $datos['driver']= DB::table('drivers')
            ->join('persons', 'persons.id', '=', 'drivers.person_id')
            ->select('persons.first_name','persons.last_name','persons.phone','persons.identity','drivers.payment',"drivers.created_at")
            ->where('drivers.id','=',$id)
            ->groupBy('persons.first_name','persons.last_name','persons.phone','persons.identity','drivers.payment',"drivers.created_at")
            ->get();

        //Cambios aquí
        $driver = DB::table('drivers')->where('id', '=', $id)->get();

        foreach ($driver as $data) {
            $payment = $data->payment;
            $created_at = date("Y-m-d", strtotime($data->created_at));
            $driver_id = $data->id;
        }

        $datos['payment'] = $payment;
        $datos['driver_id'] = $id;

        /*Fechas correspondientes para los rangos de busquedas de acuerdo al tipo de pago*/
        /*-------------Pago Diario-------------*/
        if ($payment == 1) {
            /*-------------Fechas de pago a partir del registro del conductor-------------*/
            $payment = strtotime ( $created_at ) ;
            $nextPayment = date ( 'Y-m-d' , $payment);

            while ($currentDate > $nextPayment) {
                $payment = strtotime ( '+ 1 day' , strtotime ( $nextPayment ) ) ;
                $nextPayment = date ( 'Y-m-d' , $payment);
                //echo $nextPayment."<br>";
                $dates[] = $nextPayment;
            }
            /*-------------Fechas de pago a partir del registro del conductor-------------*/
            $finishDate = date("Y-m-d H:i:s", strtotime(end($dates)." 23:59:59"));
            $startDate = date("Y-m-d H:i:s", strtotime ( '- 1 day' , strtotime ( $finishDate ) ));
            $datos['startDate'] = date("Y-m-d", strtotime ( '+ 1 day' , strtotime ( $startDate )));
            $datos['finishDate'] = date("Y-m-d", strtotime ($finishDate));

            /*----------Verificar si se ha hecho un pago en la fecha determinada----------*/

            foreach ($dates as $date) {
                $service_date = date("Y-m-d",strtotime('- 1 day',strtotime($date)));
                $count_services =  DB::table('services')
                    ->where('services.driver_id','=',$id)
                    ->where('services.created_at','LIKE',$service_date."%")
                    ->count();

                $count_payments =  DB::table('payments')
                    ->where('payments.driver_id','=',$id)
                    ->where('payments.payment_date','=',$date)
                    ->count();

                if ($count_payments == 0 && $count_services != 0) {
                    $pendingPayments[] = $date;
                }else{
                    $pendingPayments[] = ' ';
                }
            }
            /*----------Verificar si se ha hecho un pago en la fecha determinada----------*/
            $datos['pendingPayments'] = json_encode($pendingPayments);
        }
        /*-------------Pago Diario-------------*/
        
        /*-------------Pago Semanal-------------*/
        if ($payment == 2) {
            
            $payment = strtotime ( $created_at ) ;
            $nextPayment = date ( 'Y-m-d' , $payment);

            /*-------------Fechas de pago a partir del registro del conductor-------------*/
            while ($currentDate > $nextPayment) {
                $payment = strtotime ( '+ 1 week' , strtotime ( $nextPayment ) ) ;
                $nextPayment = date ( 'Y-m-d' , $payment);
                $dates[] = $nextPayment;
            }

            if (sizeof($dates) == 0) {
                $finish = date("Y-m-d H:i:s", strtotime('+ 1 week',strtotime($created_at." 23:59:59")));
                $finishDate = date("Y-m-d H:i:s", strtotime('- 1 day',strtotime($finish)));
                $startDate =date("Y-m-d H:i:s", strtotime($created_at." 00:00:01"));
                $datos['startDate'] = date("Y-m-d", strtotime ($startDate));
                $datos['finishDate'] = date("Y-m-d", strtotime ($finishDate));
            }else{
                $finishDate = date("Y-m-d H:i:s", strtotime('- 1 day',strtotime(end($dates)." 23:59:59")));
                $startDate =date("Y-m-d H:i:s", strtotime('- 1 week',strtotime(end($dates)." 00:00:01")));
                $datos['startDate'] = date("Y-m-d", strtotime ($startDate));
                $datos['finishDate'] = date("Y-m-d", strtotime ($finishDate));
            }
            /*-------------Fechas de pago a partir del registro del conductor-------------*/

            if (count($dates) == 1) {
                $pendingPayments[] = ' ';
            }else{
                foreach ($dates as $date) {
                    /*----------Verificar si se ha hecho un pago en la fecha determinada----------*/
                    if (end($dates) != $date) {
                        $start = date("Y-m-d H:i:s", strtotime('- 1 week',strtotime($date." 00:00:01")));
                        $finish = date("Y-m-d H:i:s", strtotime('- 1 day',strtotime($date." 23:59:59")));

                        $count_services =  DB::table('services')
                            ->where('services.driver_id','=',$id)
                            ->where('services.created_at','>=',$start)
                            ->where('services.created_at','<=',$finish)
                            ->count();

                        $count_payments =  DB::table('payments')
                            ->where('payments.driver_id','=',$id)
                            ->where('payments.payment_date','=',$date)
                            ->count();

                        if ($count_payments == 0 && $count_services != 0) {
                            $pendingPayments[] = $date;
                        }else{
                            $pendingPayments[] = ' ';
                        }
                    }
                    /*----------Verificar si se ha hecho un pago en la fecha determinada----------*/
                }
            }
            $datos['pendingPayments'] = json_encode($pendingPayments);
        }
        /*-------------Pago Semanal-------------*/
        

        /*-------------Pago Mensual-------------*/
        if ($payment == 3) {
            $payment = strtotime ( $created_at ) ;
            $nextPayment = date ( 'Y-m-d' , $payment);

            /*----Periodos de pago de acuerdo a la fecha de registro del conductor----*/
            while ($currentDate > $nextPayment) {
                $payment = strtotime ( '+ 1 month' , strtotime ( $nextPayment ) ) ;
                $nextPayment = date ( 'Y-m-d' , $payment);
                $dates[] = $nextPayment;
            }
            /*----Periodos de pago de acuerdo a la fecha de registro del conductor----*/

            if (sizeof($dates) == 0) {
                $finish = date("Y-m-d H:i:s", strtotime('+ 1 month',strtotime($created_at." 23:59:59")));
                $finishDate = date("Y-m-d H:i:s", strtotime('- 1 day',strtotime($finish)));
                $startDate =date("Y-m-d H:i:s", strtotime($created_at." 00:00:01"));
                $datos['startDate'] = date("Y-m-d", strtotime ($startDate));
                $datos['finishDate'] = date("Y-m-d", strtotime ($finishDate));
            }else{
                $finishDate = date("Y-m-d H:i:s", strtotime('- 1 day',strtotime(end($dates)." 23:59:59")));
                $startDate =date("Y-m-d H:i:s", strtotime('- 1 week',strtotime(end($dates)." 00:00:01")));
                $datos['startDate'] = date("Y-m-d", strtotime ($startDate));
                $datos['finishDate'] = date("Y-m-d", strtotime ($finishDate));
            }

            if (count($dates) == 1) {
                $pendingPayments[] = ' ';
            }else{
                foreach ($dates as $date) {
                    if(end($dates) != $date){
                        $start = date("Y-m-d H:i:s", strtotime('- 1 month',strtotime($date." 00:00:01")));
                        $finish = date("Y-m-d H:i:s", strtotime('- 1 day',strtotime($date." 23:59:59")));

                        $count_services =  DB::table('services')
                            ->where('services.driver_id','=',$id)
                            ->where('services.created_at','>=',$start)
                            ->where('services.created_at','<=',$finish)
                            ->count();

                        $count_payments =  DB::table('payments')
                            ->where('payments.driver_id','=',$id)
                            ->where('payments.payment_date','=',$date)
                            ->count();

                        if ($count_payments == 0 && $count_services != 0) {
                            $pendingPayments[] = $date;
                        }else{
                            $pendingPayments[] = ' ';
                        }
                    }
                }
            }
            $datos['pendingPayments'] = json_encode($pendingPayments);
        }
        /*-------------Pago Mensual-------------*/

        $datos['services']= DB::table('services')
            ->join('drivers', 'drivers.id', '=', 'services.driver_id')
            ->join('persons as client', 'client.id', '=', 'services.person_id')
            ->select('client.first_name','client.last_name','services.price','services.created_at','services.driver_id')
            ->where('services.driver_id','=',$id)
            ->where('services.created_at','<=',$finishDate)
            ->where('services.created_at','>=',$startDate)
            ->get(); 

        return view('payments.invoice',$datos);
    }

    public function pendingPayment($id,$date){
        $service_date = date("Y-m-d",strtotime('- 1 day',strtotime($date)));

        $datos['driver']= DB::table('drivers')
            ->join('persons', 'persons.id', '=', 'drivers.person_id')
            ->select('persons.first_name','persons.last_name','persons.phone','persons.identity','drivers.payment',"drivers.created_at")
            ->where('drivers.id','=',$id)
            ->groupBy('persons.first_name','persons.last_name','persons.phone','persons.identity','drivers.payment',"drivers.created_at")
            ->get();

        $driver = $datos['driver'];

        foreach ($driver as $data) {
            $payment = $data->payment;
        }

        if ($payment == 1) {
            $start = date("Y-m-d H:i:s", strtotime ( '- 1 day' , strtotime ( $date." 00:00:01")));
            $finish = date("Y-m-d H:i:s", strtotime ( '- 1 day' , strtotime ( $date." 23:59:59")));
        }

        if ($payment == 2) {
            $start = date("Y-m-d H:i:s", strtotime ( '- 1 week' , strtotime ( $date." 00:00:01")));
            $finish = date("Y-m-d H:i:s", strtotime ( '- 1 day' , strtotime ( $date." 23:59:59")));
        }

        if($payment == 3){
            $start = date("Y-m-d H:i:s", strtotime ( '- 1 month' , strtotime ( $date." 00:00:01")));
            $finish = date("Y-m-d H:i:s", strtotime ( '- 1 day' , strtotime ( $date." 23:59:59")));
        }

        $datos['services'] =  DB::table('services')
                ->join('drivers', 'drivers.id', '=', 'services.driver_id')
                ->join('persons as client', 'client.id', '=', 'services.person_id')
                ->select('client.first_name','client.last_name','services.price','services.created_at','services.driver_id')
                ->where('services.driver_id','=',$id)
                ->where('services.created_at','>=',$start)
                ->where('services.created_at','<=',$finish)
                ->get();

        $datos['startDate'] = date("Y-m-d", strtotime ($start));
        $datos['finishDate'] = date("Y-m-d", strtotime ($finish));

        $datePayment= new DateTime($date);
        $currentDay= new DateTime("NOW");
        $diff = $datePayment->diff($currentDay);

        $datos['payment_date'] = $date;
        $datos['days'] = $diff->days;
        return view('payments.pendingPayment',$datos);
    }

    public function store(Request $request)
    {
        $amount = 0;

        $driver = DB::table('persons')
        ->join('drivers', 'drivers.person_id', '=', 'persons.id')
        ->select('drivers.id')
        ->where('persons.identity','=',$request->identity)
        ->get();

        foreach ($driver as $data) {
            $driver_id = $data->id;
        }

        $start = date("Y-m-d H:i:s",strtotime($request->start_date." 00:00:01"));
        $finish = date("Y-m-d H:i:s", strtotime($request->finish_date." 23:59:59"));

        $date = date("Y-m-d",strtotime ('+ 1 day',strtotime($request->finish_date)));

        $datePayment= new DateTime($date);
        $currentDay= new DateTime("NOW");
        $diff = $datePayment->diff($currentDay);

        $services = DB::table('services')
            ->select('services.price')
            ->where('services.driver_id','=',$driver_id)
            ->where('services.created_at','>=',$start)
            ->where('services.created_at','<=',$finish)
            ->get();

        foreach ($services as $data) {
            $amount = $amount + ($data->price * 0.2);
        }

        $total = $amount + ($diff->days * 100);

        Payments::create([
            'driver_id'=> $driver_id,
            'payment_date'=> date("Y-m-d", strtotime($date)),
            'amount'=> $total
        ]);

        return redirect('pagos/'.$driver_id);

    }
}