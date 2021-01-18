<?php
  
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Events\DemoNotificationEvent;
  
class NotificationController extends Controller
{
    public function sendNofication(){
     // Truyền message lên server Pusher
     event(new DemoNotificationEvent("Hi,Xin chào hải đẹp trai!"));
     return "Message has been sent.";
    }
}