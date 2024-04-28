<?php

namespace App\Services;

class Notify {

    //Create success notify
    static function createdNotifycation(){
       return notify()->success('Created Successfully', 'Success!');

    }
     //Updated success notify
     static function updatedNotifycation(){
        return notify()->success('Updated Successfully', 'Success!');

     }

     static function deletedNotifycation(){
        return notify()->success('Deleted Successfully', 'Success!');

     }
}

?>
