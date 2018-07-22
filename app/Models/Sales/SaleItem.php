<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    protected $table 		= 'sale_items';
    protected $primaryKey 	= 'id';

    protected $fillable 	= array('sale_id', 'brick_type_id', 'unit_cost', 'quantity', 'total_cost'); 
    protected $guarded   	= ['_token'];
    public static $rules 	= [
        'sale_id'           => 'required|exists:sales,id',
    	'brick_type_id' 	=> 'required|exists:brick_types,id',
    	'unit_cost' 		=> 'required',
    	'quantity' 			=> 'required',
    	'total_cost' 		=> 'required',
    ];

    public function brick_type()
    {
        return $this->belongsTo('App\Models\Masters\BrickType');
    }

    public function sales()
    {
        return $this->belongsTo('App\Models\Sales\Sale'); 
    }
}
