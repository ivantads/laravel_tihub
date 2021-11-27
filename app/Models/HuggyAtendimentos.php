<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class HuggyAtendimentos extends Model
{
    protected $table = 'huggy_atendimentos';
	protected $fillable = ['id','agent_id','agent_login','customer_id','customer_name','customer_whatsapp','customer_site_id','customer_site_name','customer_site_last_url','customer_site_number','
						customer_messenger_name','customer_messenger_id','company_id','company_name','department_id','department_name','current_department_id','current_department_name','created_at','
						closed','closed_at','updated_at','last_receive','last_send','attended_at','last_agent_id','channel_typeid','channel_typename','feedback_score','feedback_text','feedback_date','
						tabulation_id','tabulation','status','status_code','auto_closed_chat','tags','customer_mobile','situation'];

}
