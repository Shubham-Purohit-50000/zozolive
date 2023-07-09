<?php

use App\Models\Host;
use App\Models\TokenSpent;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

function currentUserId()
{
    return auth()->user()->uuid;
}

function isRole($role)
{
    if (auth()->user()->hasRole($role)) {
        return true;
    }
    return;
}

function redirectUser($route, $type = null)
{
    if (!$type) {
        $type = request()->method() === 'POST' ? 'Created' : 'Updated';
    }
    return redirect($route)->with('success', "Record {$type} Successfully");
}

function redirectBack($type = 'Deleted')
{
    return back()->with('success', "Record {$type} Successfully");
}

function generateLabel($name)
{
    return ucwords(str_replace('_', ' ', $name));
}

function notificationSchedule()
{
    return ['Every 1 minute', 'Every 60 minute', 'Every 3 Hour', 'One time'];
}

function packageType()
{
    return ['New Offer', 'Host Offer', 'Diwali Offer'];
}

function userType()
{
    return ['User', 'Host'];
}

function generateUserId()
{
    return rand(11111111, 99999999);
}

function callResponseType()
{
    return ['No Response', 'Accept', 'Call End', 'Waiting', 'Reject', 'Ongoing'];
}

function currentUser()
{
    return auth()->user();
}

function paymentGateways()
{
    return ['Razorpay', 'Cashfree'];
}

/**
 * @return string
 */
function generatePassword(): string
{
    return 'password' ?? Str::random(8);
}

function interestedIn()
{
    return [
        'Male',
        'Female',
        'Everybudy'
    ];
}

function generateOtp()
{
    return random_int(100000, 999999);
}

function generateMachineId()
{
    $salt = "";
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {

        $temp = sys_get_temp_dir() . DIRECTORY_SEPARATOR . "diskpartscript.txt";
        if (!file_exists($temp) && !is_file($temp)) file_put_contents($temp, "select disk 0\ndetail disk");
        $output = shell_exec("diskpart /s " . $temp);
        $lines = explode("\n", $output);
        $result = array_filter($lines, function ($line) {
            return stripos($line, "ID:") !== false;
        });


        if (count($result) > 0) {
            $array = array_values($result);
            $result = array_shift($array);
            $result = explode(":", $result);
            $result = trim(end($result));
        } else $result = $output;
    } else {
        $result = shell_exec("blkid -o value -s UUID");
        if (stripos($result, "blkid") !== false) {
            $result = $_SERVER['HTTP_HOST'];
        }
    }
    return md5($salt . md5($result));
}

function basicStatus()
{
    return [
        'In-Active',
        'Active'
    ];
}

function storageUrl($path)
{
    return Storage::url($path);
}

function levels()
{
    $level = array();
    $add_amount = 0;
    for($i=1; $i<=50; $i++) {
        $item = array();
        if($i<=5){
            $add_amount += 100;
            $item['color'] = '#b35d1c';
            $item['name'] = 'Bronze';
            $item['token'] = $add_amount;
            $item['icon'] = '\f005';
            $item['next_level'] = $i+1;
            $item['remaining_token'] = 100;
            $item['previous_level'] = $add_amount-100;
        }elseif($i<=10){
            $add_amount += 500;
            $item['color'] = '#6085aa';
            $item['name'] = 'Silver';
            $item['token'] = $add_amount;
            $item['icon'] = '\f005';
            $item['next_level'] = $i+1;
            $item['remaining_token'] = 500;
            $item['previous_level'] = $add_amount-500;
        }elseif($i<=20){
            $add_amount += 1000;
            $item['color'] = '#dea20c';
            $item['name'] = 'Gold';
            $item['token'] = $add_amount;
            $item['icon'] = '\f005';
            $item['next_level'] = $i+1;
            $item['remaining_token'] = 1000;
            $item['previous_level'] = $add_amount-1000;
        }elseif($i<=35){
            $add_amount += 5000;
            $item['color'] = '#ce2fe4';
            $item['name'] = 'Diamond';
            $item['token'] = $add_amount;
            $item['icon'] = '\f005';
            $item['next_level'] = $i+1;
            $item['remaining_token'] = 5000;
            $item['previous_level'] = $add_amount-5000;
        }elseif($i<=49){
            $add_amount += 10000;
            $item['color'] = '#e33534';
            $item['name'] = 'Royal';
            $item['token'] = $add_amount;
            $item['icon'] = '\f005';
            $item['next_level'] = $i+1;
            $item['remaining_token'] = 10000;
            $item['previous_level'] = $add_amount-10000;
        }else{
            $add_amount += 272000;
            $item['color'] = '#278000';
            $item['name'] = 'Legend';
            $item['token'] = $add_amount;
            $item['icon'] = '\f005';
            $item['next_level'] = $i+1;
            $item['remaining_token'] = 272000;
            $item['previous_level'] = $add_amount-272000;
        }
        array_push($level, $item);
    }

    return $level;
}

function get_user_level($token)
{
    $level_data = array();
    $level_arr = levels();
    foreach(levels() as $key=>$value){
        if($token <= $value['token']){
            $level_data = $value;
            $level_data['level'] = $key+1;
            break;
        }
    }
    return $level_data;
}

function date_formater($date){
    $date = date_create($date);
    return date_format($date,"d M, Y h:i:s a");
}


function totalLiveUsers() {
    return Host::where('is_online', 1)->count();
}

function hostTodayRecievedToken($uid) {
    return TokenSpent::where('host_id', $uid)->sum('token');
}


