<?php

define('API_KEY','322226049:AAEbP2Mtc-M89RLm9PDuDFI1-6bCs3WoXGY');

function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
function sendmessage($chat_id, $text){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>$text,
 'parse_mode'=>"MarkDown"
 ]);
 } 
//-//////
$update = json_decode(file_get_contents('php://input'));
$id = $update->message->from->id; 
$user = $update->message->from->username;
$bot = bot('getme',['g'=>'g'])->result->username;
$chat_id2   = $update->callback_query->message->chat->id;
$json = json_decode(file_get_contents("data.json"),true);
$message = $update->message; 
$first_name = $message->from->first_name;
$chat_id = $message->chat->id;
$name = $update->message->from->first_name;
$text = $message->text;
$chatid = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$message_id = $update->callback_query->message->message_id;
//---------------//
if($text == '/start'){
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>" 🔘 - مرحبا بك $name
 
 ▪ في بوت *Market SeRm* للتسوق
 
 ▫ في تيليجرام الان يمكنك شراء
 
 ▪ عده اشياء باثمان رخيصه جدا
 
 ▫ ويوجد شراء الاشياء بجمع النقاط
 
 🔆 حسنا عزيزي الان اختر ما يناسبك",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"قوائم المبيعات 🛒",'callback_data'=>"ss"]
              ],
              [['text'=>"💡Team dev",'url'=>"t.me/Xxx_DEVRAMI_xxX"],['text'=>"النجاح ✔",'url'=>"t.me/php18"]]
            ]
        ])
 ]);
}
elseif($data == "ss"){
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"مرحبا بك مجدد في قائمه الشراء ولان 
من فضلك اختر احدى القائمات للشراء 
ما ترغب بشرائه من هذه المبيعات ⬇️",
 'parse_mode'=>"MarkDown",
'reply_markup' => json_encode([
                'inline_keyboard' => [
 [
            ['text' => "قائمه الملفات 🗂", 'callback_data' => "s1"], ['text' => "قائمه البوتات 🤖", 'callback_data' => "s2"]],
            [['text' => "قائمه الحسابات 📮️", 'callback_data'=>"s3"],['text'=>"قائمه السيرفرات 🛅",'callback_data'=>"s4"]
            ],
                 [
            ['text' => "قائمه الارقام 📞", 'callback_data' => "s5"], ['text'=>"قائمه الفيز 💳" ,'callback_data' => "s6"]
],
[
['text'=>"عرض نقاطي في البوت 🌟",'callback_data'=>"semo"]
],
            
[
           ['text'=>"💡Team dev",'url'=>"t.me/Xxx_DEVRAMI_xxX"],['text'=>"النجاح ✔",'url'=>"t.me/php18"]
],
]
])
 ]);     
}
elseif($data == "s1"){
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"حسنا عليك بتحديد نوع الشراء الان ⤵️ 
اذ رغبت الشراء بالنقاط اظغط على زر  نقاط الملف ولعكس صحيح في الرصيد ",
 'parse_mode'=>"MarkDown",
 'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
            ['text' => "رصيد 5$", 'callback_data' => "r"], ['text' =>"نقاط 2500", 'callback_data' => "k"],['text'=>"تحويل صيغ",'callback_data'=>"a"]
],
[
            ['text' => "رصيد 2$", 'callback_data' => "r"], ['text' =>"نقاط 2100", 'callback_data' => "k"],['text'=>"لعبه XO",'callback_data'=>"a"]
],
[
            ['text' => "رصيد 3$", 'callback_data' => "r"], ['text' =>"نقاط 2600", 'callback_data' => "k"],['text'=>"لعبه مريم",'callback_data'=>"a"]
],
[
             ['text' => "رصيد 1$", 'callback_data' => "r"], ['text' =>"نقاط 2050", 'callback_data' => "k"],['text'=>"نسبه الحب",'callback_data'=>"a"]
],
[
            ['text' => "رصيد 5$", 'callback_data' => "r"], ['text' =>"نقاط 2900", 'callback_data' => "k"],['text'=>"تواصل",'callback_data'=>"a"]
],
[
            ['text' => "رصيد 4$", 'callback_data' => "r"], ['text' =>"نقاط 3000", 'callback_data' => "k"],['text'=>"صنع تواصل",'callback_data'=>"a"]
],

[
           ['text' => "رصيد 5$", 'callback_data' => "r"], ['text' =>"نقاط 3000", 'callback_data' => "k"],['text'=>"سايت",'callback_data'=>"a"]
],
[
            ['text' => "رصيد 4$", 'callback_data' => "r"], ['text' =>"نقاط 4000", 'callback_data' => "k"],['text'=>"صنع سايت",'callback_data'=>"a"]],

[
            ['text' => "رصيد 4$", 'callback_data' => "r"], ['text' =>"نقاط 2500", 'callback_data' => "k"],['text'=>"حمايه",'callback_data'=>"a"]
],
[
            ['text' => "رصيد 15$", 'callback_data' => "r"], ['text' =>"نقاط 8000", 'callback_data' => "k"],['text'=>"Mr Bots",'callback_data'=>"a"]
],
[
            ['text' => "رجوع الى القائمه الرئيسيه 🔙", 'callback_data' => "ss"]
],
[
            ['text' => "💡Team Dev ", 'url' => "t.me/Xxx_DEVRAMI_xxX"], ['text' =>"النجاح ✔", 'url' => "t.me/php18"]],
]
])
 ]);
}
elseif($data == "s2"){
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"قسم قائمه مبيعات البوتات الجاهزه ☑️

حسنا عليك بتحديد نوع الشراء الان ⤵️ 
اذ رغبت الشراء بالنقاط اظغط على زر  نقاط الملف ولعكس صحيح في الرصيد",
 'parse_mode'=>"MarkDown",
 'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
            ['text' => "رصيد 2$", 'callback_data' => "r"], ['text' =>"نقاط 2500", 'callback_data' => "k"],['text'=>"تحويل صيغ",'callback_data'=>"aa"]
],
[
            ['text' => "رصيد 2$", 'callback_data' => "r"], ['text' =>"نقاط 2100", 'callback_data' => "k"],['text'=>"لعبه XO",'callback_data'=>"aa"]
],
[
            ['text' => "رصيد 2$", 'callback_data' => "r"], ['text' =>"نقاط 2600", 'callback_data' => "k"],['text'=>"لعبه مريم",'callback_data'=>"aa"]
],
[
             ['text' => "رصيد 2$", 'callback_data' => "r"], ['text' =>"نقاط 2050", 'callback_data' => "k"],['text'=>"نسبه الحب",'callback_data'=>"aa"]
],
[
            ['text' => "رصيد 2$", 'callback_data' => "r"], ['text' =>"نقاط 2900", 'callback_data' => "k"],['text'=>"تواصل",'callback_data'=>"aa"]
],
[
            ['text' => "رصيد 2$", 'callback_data' => "r"], ['text' =>"نقاط 3000", 'callback_data' => "k"],['text'=>"صنع تواصل",'callback_data'=>"aa"]
],

[
           ['text' => "رصيد 2$", 'callback_data' => "r"], ['text' =>"نقاط 3000", 'callback_data' => "k"],['text'=>"سايت",'callback_data'=>"aa"]
],
[
            ['text' => "رصيد 2$", 'callback_data' => "r"], ['text' =>"نقاط 4000", 'callback_data' => "k"],['text'=>"صنع سايت",'callback_data'=>"aa"]],

[
            ['text' => "رصيد 2$", 'callback_data' => "r"], ['text' =>"نقاط 2500", 'callback_data' => "k"],['text'=>"حمايه",'callback_data'=>"aa"]
],
[
            ['text' => "رصيد 5$", 'callback_data' => "r"], ['text' =>"نقاط 8000", 'callback_data' => "k"],['text'=>"Mr Bots",'callback_data'=>"aa"]
],
[
            ['text' => "رجوع الى القائمه الرئيسيه 🔙", 'callback_data' => "ss"]
],
[
            ['text' => "💡Team Dev ", 'url' => "t.me/Xxx_DEVRAMI_xxX"], ['text' =>"النجاح ✔", 'url' => "t.me/php18"]],
]
])
 ]);
}
elseif($data == "s3"){
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"اهلا بك في قائمه الحسابات هنا جميع 
حسابات الفيس بوك يمكنك شراء ما يناسبك الان كل ما عليك هو الاختيار ♻️",
 'parse_mode'=>"MarkDown",
'reply_markup' => json_encode([
                'inline_keyboard' => [
 [
            ['text' => "رصيد 5$", 'callback_data' => "r"], ['text' => "نقاط 3000", 'callback_data' => "k"], ['text' => "امريكي مأكد️", 'callback_data' => "aaa"]
],
[
            ['text' => "رصيد 2$", 'callback_data' => "r"], ['text' => "نقاط 1500", 'callback_data' => "k"], ['text' =>"فيس هندي", 'callback_data' => "aaa"]
],
[
            ['text' => "رصيد 3$", 'callback_data' => "r"], ['text' => "نقاط 2000", 'callback_data' => "k"], ['text' => "فيس روسي", 'callback_data' => "aaa"]
],
[
            ['text' => "رصيد 0$", 'callback_data' => "0"], ['text' => "نقاط 1500", 'callback_data' => "k"], ['text' => "فيس عادي", 'callback_data' => "aaa"]
],
[
            ['text' => "رجوع الى القائمه الرئيسيه 🔙", 'callback_data' => "ss"]
],
[
            ['text' => "💡Team Dev ", 'url' => "t.me/Xxx_DEVRAMI_xxX"], ['text' =>"النجاح ✔", 'url' => "t.me/php18"]],
]
])
 ]);     
}
elseif($data == "s4"){
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"اهلا بك من جديد في قسم السيرفرات 
 عزيزي اختر ما يناسبك وقم بشرائه 💰",
 'parse_mode'=>"MarkDown",
 'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
              ['text' =>"نقاط 2500", 'callback_data' => "k"],['text'=>"سيرفر C9",'callback_data'=>"aaaa"]
],
[
              ['text' =>"نقاط 3600", 'callback_data' => "k"],['text'=>"ورك C9 شهري",'callback_data'=>"aaaa"]
],
[
              ['text' =>"نقاط 4100", 'callback_data' => "k"],['text'=>"ورك C9 سنوي",'callback_data'=>"aaaa"]

],
[
              ['text' =>"نقاط 1500", 'callback_data' => "k"],['text'=>"Webhost",'callback_data'=>"aaaa"]

],
[
            ['text' => "رجوع الى القائمه الرئيسيه 🔙", 'callback_data' => "ss"]
],
[
            ['text' => "💡Team Dev ", 'url' => "t.me/Xxx_DEVRAMI_xxX"], ['text' =>"النجاح ✔", 'url' => "t.me/php18"]],
]
])
 ]);
}
elseif($data == "s5"){
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"اهلا بك من جديد في قسم الارقام 📞
 عزيزي اختر ما يناسبك وقم بشرائه 💸",
 'parse_mode'=>"MarkDown",
 'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                  ['text' =>"نقاط 2000", 'callback_data' => "k"],['text'=>"رقم امريكي",'callback_data'=>"aaaaa"]
],
[
                  ['text' =>"رصيد 10$", 'callback_data' => "r"],['text'=>"رقم اندونيسي",'callback_data'=>"aaaaa"]

],
[
                  ['text' =>"رصيد 5$", 'callback_data' => "r"],['text'=>"رقم ايراني",'callback_data'=>"aaaaa"]

],
[
                  ['text' =>"رصيد 3$", 'callback_data' => "r"],['text'=>"رقم باكستاني",'callback_data'=>"aaaaa"]
],
[
          ['text'=>"رجوع الى الصفحه الرئيسيه 🔙", 'callback_data' => "ss"]
],
[
            ['text' => "💡Team Dev ", 'url' => "t.me/Xxx_DEVRAMI_xxX"], ['text' =>"النجاح ✔", 'url' => "t.me/php18"]],
]
])
 ]);
}
elseif($data == "s6"){
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>" اهلا بك من جديد في قسم  الفيز 💳
 عزيزي اختر ما يناسبك وقم بشرائه 💰",
 'parse_mode'=>"MarkDown",
 'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                  ['text' =>"نقاط 2000", 'callback_data' => "k"],['text'=>"فيزا مجانيه",'callback_data'=>"aaaaaa"]
],
[
                  ['text' =>"نقاط 1500", 'callback_data' => "k"],['text'=>"ماستر مجانيه",'callback_data'=>"aaaaaa"]

],
[
                  ['text' =>"نقاط 3000", 'callback_data' => "k"],['text'=>"فيزا باسمك",'callback_data'=>"aaaaaa"]

],
[
            ['text' => "رجوع الى القائمه الرئيسيه 🔙", 'callback_data' => "ss"]
],
[
            ['text' => "💡Team Dev ", 'url' => "t.me/Xxx_DEVRAMI_xxX"], ['text' =>"النجاح ✔", 'url' => "t.me/php18"]],
]
])
 ]);
}
elseif($data == "semo"){
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
  'text'=>"🌟 عدد نقاطك : ". $json[$ex_text[1]]['collect'].".",

 'parse_mode'=>"MarkDown",
 'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"حسنا رجوع 🔙️",'callback_data'=>"ss"]
]
]
])
 ]);
}
if($data == "a"){
bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>" عذرا هذا الزر  فقط لاسم الملف 📂
عليك اختيار نوع شراء الملفات 💸",
'show_alert'=>true
]);
}
if($data == "aa"){
bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>"عذرا هذا زر اسم البوت فقط ⚠️",
'show_alert'=>semo
]);
}
if($data == "aaa"){
bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>"عذرا هذا الزر فقط نوع الحساب 📧
للشراء اظغط اما نقاط او رصيد 💵",
'show_alert'=>true
]);
}
if($data == "aaaa"){
bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>"عذرا هذا فقط زر نوع السيرفر 🔌
للشراء اظغط على نقاط كل منهم 💡",
'show_alert'=>true
]);
}

if($data == "aaaaa"){
bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>"عذرا هذا الزر فقط نوع الرقم 📞
للشراء اظغط اما نقاط او رصيد 💎",
'show_alert'=>true
]);
}
if($data == "aaaaaa"){
bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>"عذرا هذا الزر فقط نوع الفيزا 💳
للشراء اظغط على نقاط احدهم 💰",
'show_alert'=>true
]);
}
if($data == "0"){
bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>"مجاني القسم فارغ ☑️",
'show_alert'=>true
]);
}

elseif($data == "r"){
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"للدفع ولتسليم عليك ان تتواصل
مع مطورين البوت من هنا ⏬⏬",
 'parse_mode'=>"MarkDown",
 'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>" 🚹- Semo",'url'=>"t.me/lqoopl"],['text'=>" 🚹- Rami",'url'=>"t.me/RAMBO_SYR"]
],
[['text'=>"رجوع الى الصفحه الرئيسيه 🔙",'callback_data'=>"ss"]],
[['text'=>"💡Team Dev ",'url'=>"t.me/Xxx_DEVRAMI_xxX"],['text'=>"النجاح ✔",'url'=>"t.me/php18"]]
]
])
 ]);
}
elseif ($data== "k"  and file_exists("$id.txt")) {
  bot('editMessagetext',[
    'chat_id'=>$chatid,
    'text'=>"اليك رابط https://t.me/$bot?start=$id",
 'parse_mode'=>"MarkDown",
 'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"↪️ العوده ↩️",'callback_data'=>"s1"]
]
]
])
 ]);
}
if ($data == 'k'){
      bot('editMessageText',[
        'chat_id'=>$chatid,
        'message_id'=>$message_id,
        'text'=>"
▪️- هذا الرابط الخاص بك 

https://t.me/$bot?start=$chat_id2

▫️- قم بارساله الى مستخدمين 
▪️- تيليجرام وسارع في جمع النقاط 🌟",
 'parse_mode'=>"MarkDown",
 'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"رجوع الى الصفحه الرئيسيه 🔙",'callback_data'=>"ss"]],
[['text'=>"💡Team Dev ",'url'=>"t.me/Xxx_DEVRAMI_xxX"],['text'=>"النجاح ✔",'url'=>"t.me/php18"]],
]
])
 ]);
}
file_put_contents("data.json", json_encode($json));
$ex_text = explode(' ', $text);
if($ex_text[0] == '/start' and isset($ex_text[1]) and $ex_text[1] != $id){
  bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"🔘 - مرحبا بك $name
 
 ▪ في بوت *Market SeRm* للتسوق
 
 ▫ في تيليجرام الان يمكنك شراء
 
 ▪ عده اشياء باثمان رخيصه جدا
 
 ▫ ويوجد شراء الاشياء بجمع النقاط
 
 🔆 حسنا عزيزي الان اختر ما يناسبك",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"قوائم المبيعات 🛒",'callback_data'=>"ss"]
              ],
                            [['text'=>"💡Team dev",'url'=>"t.me/Xxx_DEVRAMI_xxX"],['text'=>"النجاح ✔",'url'=>"t.me/php18"]]

            ]
        ])
 ]);
}

if(!in_array($chat_id, explode(',', $json[$ex_text[1]]['ids']))) {
      if(!isset($json[$chat_id])){
          $json[$chat_id]['num'] = 0;
          $json[$chat_id]['collect'] = 0;
          file_put_contents("data.json", json_encode($json));
        }
        $json[$ex_text[1]]['collect'] = $json[$ex_text[1]]['collect'] + 1;
        if(isset( $json[$ex_text[1]]['ids'])){
        $json[$ex_text[1]]['ids'] = $json[$ex_text[1]]['ids'] ."$id,";
        } else {
            $json[$ex_text[1]]['ids'] = $json[$ex_text[1]]['ids'] ."$id";
        }
        file_put_contents('data.json', json_encode($json));
        bot('sendMessage',[
          'chat_id'=>$ex_text[1],
          'text'=>"قام $user بالدخول عبره الرابط نقاطك الان :". $json[$ex_text[1]]['collect']
          ]);
    }
    
