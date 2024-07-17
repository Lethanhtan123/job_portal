<?php

namespace App\Services;

class Notify {

    //Create success notify
    static function createdNotifycation(){
       return notyf()->addSuccess('Thêm mới thành công', 'Thành công!');

    }
     //Updated success notify
     static function updatedNotifycation(){
        return notyf()->addSuccess('Cập nhật thành công', 'Thành công!');

     }

     static function deletedNotifycation(){
        return notyf()->addSuccess('Xóa thành công', 'Thành công!');

     }

     static function replyNotifycation(){
        return notyf()->addSuccess('Gửi phản hồi thành công');

     }
}

?>
