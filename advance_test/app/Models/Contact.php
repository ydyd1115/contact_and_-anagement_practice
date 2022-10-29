<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    

        protected $fillable = ['fullname','gender','email','postcode','address','building_name','opinion'];



        public static function ContactSearch($datas)
        {
            $query = self::query();
            // dd($datas);
        if (!empty($datas['fullname'])) {
            $query->where('fullname', 'like binary', "%{$datas['fullname']}%");
        }
        if (!empty($datas['gender'])) {
            $query->where('gender', '=' ,$datas['gender']);
        }
        if (!empty($datas['keyword'])) {
            $query->where('email', 'like binary', "%{$datas['keyword']}%");
        }
        if (!empty($datas['from'])) {
            $query->whereDate('created_at', '>=', $datas['from']);
        }
        if (!empty($datas['until'])) {
            $query->whereDate('created_at', '<=', $datas['until']);
        }
        
        $results = $query->Paginate(10);
        return $results;
        }
}
