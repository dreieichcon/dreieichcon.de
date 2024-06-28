<?php
namespace App\Traits;
use App\Models\Log;
use Illuminate\Support\Str;
trait Logger
{
  public function create_log(String $table, String $uuid, String $operation, array $data = []):void{
      $user = auth()->user()->id;
      if(count($data)>0){
          $data = json_encode($data);
      }else{
          $data = "";
      }
      Log::create([
          "table" => $table,
          "foreign_id" => $uuid,
          "type" => $operation,
          "user_id" => $user,
          "content" => $data,
      ]);
  }
}

