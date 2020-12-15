<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
 
    protected $table = "type";
  protected $primaryKey = "id";

  public static function search($search) {
    $columns = ["id", "name", "lname", "comment"]; 

  

    // If the search is empty, return everything 
    // if (empty(trim($search))) {
    //   return static::select($columns)->get();
    // }
    // If the search contains something, we perform the fuzzy search 
    // else {
      // $fuzzySearch = implode("%", str_split($search)); // e.g. test -> t%e%s%t
      // $fuzzySearch = "%$fuzzySearch%"; // test -> %t%e%s%t%s%

      $fname = implode("%", str_split($search['fname']));
      $fname = "%$fname%";

      $lname = implode("%", str_split($search['lname']));
      $lname = "%$lname%";




      return static::select($columns)->where("name", "like", $fname)->Where("lname", "like", $lname)->get();
    // }
  }
} 
