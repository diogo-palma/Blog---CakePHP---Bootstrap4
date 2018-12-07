<?php
class DateHelper extends AppHelper{
	
    public $days	 = array('Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado','Domingo');
    public $months	 = array('Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outrubro', 'Novembro', 'Dezembro');

    function french($datetime){
    	$tmstamp = strtotime($datetime); 
    	$date = $this->days[date('N',$tmstamp)-1]." ".date('d',$tmstamp).' '.$this->months[date('n',$tmstamp)-1].' '.date('Y',$tmstamp);
    	$date .= " à ".date('H:i',$tmstamp); 
    	return $date; 
    }

}
