<?php

namespace App\Services;

class Notify {

    //Create success notify
    static function createdNotifycation(){
       return notyf()->success('Created Successfully', 'Success!');

    }
     //Updated success notify
     static function updatedNotifycation(){
        return notyf()->success('Updated Successfully', 'Success!');

     }

     static function deletedNotifycation(){
        return notyf()->success('Deleted Successfully', 'Success!');

     }
}

?>
