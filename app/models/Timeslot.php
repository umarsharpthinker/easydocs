<?php
use \Illuminate\Support\Facades\DB;
class TimeSlot extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['slot', 'reserved', 'duty_day_id', 'employee_id', 'company_id'];

    // Relationships
    public function dutyDay()
    {
        return $this->belongsTo('DutyDay');
    }

    public function appointments()
    {
        return $this->hasMany('Appointment', 'time_slot_id', 'id');
    }

    /**
     * @param $doctorId
     * @param $day
     * @param bool $isLists
     * @return mixed
     */
    public static function fetchAvailableTimeSlots($doctorId,$day,$isLists=false){
        $qry = DB::table('time_slots')
            ->select(['time_slots.id','time_slots.slot'])
            ->join('duty_days', 'duty_days.id', '=', 'time_slots.duty_day_id','inner')
            ->where('duty_days.employee_id', '=', $doctorId)
            ->where('duty_days.day', '=', $day)
            ->whereNotIn('time_slots.id', function($query)
            {
//                $query->select(DB::raw(1))
                $query->select('appointments.time_slot_id')
                    ->from('appointments')
                    ->join('time_slots AS ts2', 'ts2.id', '=', 'appointments.time_slot_id','inner');
//                    ->whereRaw('orders.user_id = users.id');
            });
//        $qry->toSql();
        if($isLists)
            return $qry->lists('slot','id');
        else
            return $qry->get();
    }
}