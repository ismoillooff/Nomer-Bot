<?php
ob_start();
date_Default_timezone_set('Asia/Tashkent');
define("GUYCODER",'token');//bot tokeni
$guycoder = "id";//adminid
$user = file_get_contents("admin/user.txt");
$bot = bot('getme',['bot'])->result->username;
$soat = date('H:i');
$sana = date("d.m.Y");
$apikey = "api key"; //5sim.netdan olingan kalit

// NomerBot — Virtual raqamlar va SMS faollashtirish boti | Dasturchi: @ismoillooff

function getAdmin($chat){
$url = "https://api.telegram.org/bot".GUYCODER."/getChatAdministrators?chat_id=@".$chat;
$result = file_get_contents($url);
$result = json_decode ($result);
return $result->ok;
}

function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".GUYCODER."/".$method;
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

function joinchat($id){
global $mid;
$array = array("inline_keyboard");
$kanallar=file_get_contents("admin/kanal.txt");
if($kanallar == null){
return true;
}else{
$ex = explode("\n",$kanallar);
for($i=0;$i<=count($ex) -1;$i++){
$first_line = $ex[$i];
$first_ex = explode("@",$first_line);
$url = $first_ex[1];
$ism=bot('getChat',['chat_id'=>"@".$url,])->result->title;
$ret = bot("getChatMember",[
"chat_id"=>"@$url",
"user_id"=>$id,
]);
$stat = $ret->result->status;
if((($stat=="creator" or $stat=="administrator" or $stat=="member"))){
$array['inline_keyboard']["$i"][0]['text'] = "✅ ". $ism;
$array['inline_keyboard']["$i"][0]['url'] = "https://t.me/$url";
}else{
$array['inline_keyboard']["$i"][0]['text'] = "❌ ". $ism;
$array['inline_keyboard']["$i"][0]['url'] = "https://t.me/$url";
$uns = true;
}
}
$array['inline_keyboard']["$i"][0]['text'] = "🔄 Tekshirish";
$array['inline_keyboard']["$i"][0]['callback_data'] = "check";
if($uns == true){
bot('sendMessage',[
'chat_id'=>$id,
'text'=>"<b>⚠️ Botdan to'liq foydalanish uchun quyidagi kanallarimizga obuna bo'ling!</b>",
'parse_mode'=>'html',
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode($array),
]);
return false;
}else{
return true;
}}}


$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$tx = $message->text;
$cid = $message->chat->id;
$mid = $message->message_id;
$text = $message->text;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$from_id = $message->from->id;
$name = $message->from->first_name;
$last = $message->from->last_name;
$username = $message->from->username;
$bio = $message->from->about;

$contact = $message->contact;
$contact_id = $contact->user_id;
$contact_user = $contact->username;
$contact_name = $contact->first_name;
$phone = $contact->phone_number;

$data = $update->callback_query->data;
$qid = $update->callback_query->id;
$cid2 = $update->callback_query->message->chat->id;
$mid2 = $update->callback_query->message->message_id;
$callback = $update->callback_query;
$callfrid = $update->callback_query->from->id;
$callname = $update->callback_query->from->first_name;
$calluser = $update->callback_query->from->username;
$surname = $update->callback_query->from->last_name;
$about = $update->callback_query->from->about;


//baraban
	$baraban = file_get_contents("admin/btext.txt");
	$bnarx = file_get_contents("admin/bnarx.txt");
	//priz
	$b1 = file_get_contents("admin/b1.txt");
	$b2 = file_get_contents("admin/b2.txt");
	$b3 = file_get_contents("admin/b3.txt");
	$b4 = file_get_contents("admin/b4.txt");
	$b5 = file_get_contents("admin/b5.txt");
	//sandiq
	$stext = file_get_contents("admin/stext.txt");
	$sandiq1 = file_get_contents("admin/sandiq1.txt");
	$sandiq2 = file_get_contents("admin/sandiq2.txt");
	$sandiq3 = file_get_contents("admin/sandiq3.txt");
	$sandiq4 = file_get_contents("admin/sandiq4.txt");
//1chi sandiq priz
	$s11 = file_get_contents("admin/s11.txt");
	$s12 = file_get_contents("admin/s12.txt");
	$s13 = file_get_contents("admin/s13.txt");
	$s14 = file_get_contents("admin/s14.txt");
	$s15 = file_get_contents("admin/s15.txt");
	//2chi sandiq priz
	$s21 = file_get_contents("admin/s21.txt");
	$s22 = file_get_contents("admin/s22.txt");
	$s23 = file_get_contents("admin/s23.txt");
	$s24 = file_get_contents("admin/s24.txt");
	$s25 = file_get_contents("admin/s25.txt");
	//3chi sandiq priz
	$s31 = file_get_contents("admin/s31.txt");
	$s32 = file_get_contents("admin/s32.txt");
	$s33 = file_get_contents("admin/s33.txt");
	$s34 = file_get_contents("admin/s34.txt");
	$s35 = file_get_contents("admin/s35.txt");
	//4chi sandiq priz
	$s41 = file_get_contents("admin/s41.txt");
	$s42 = file_get_contents("admin/s42.txt");
	$s43 = file_get_contents("admin/s43.txt");
	$s44 = file_get_contents("admin/s44.txt");
	$s45 = file_get_contents("admin/s45.txt");
	//
//




$kam = file_get_contents("raqam/$cid.txt");
$step = file_get_contents("step/$cid.step");
$pul = file_get_contents("pul/$cid.txt");
$solv = file_get_contents("pul/$cid.dat");
$odam = file_get_contents("odam/$cid.txt");
$ban = file_get_contents("ban/$cid.txt");
$baza = file_get_contents("azo.dat");
$saved = file_get_contents("step/pulbot.txt");
$tugma = file_get_contents("step/tugma.txt");
$matn = file_get_contents("step/matn.txt");

$turi = file_get_contents("number/turi.txt");
$raqam = file_get_contents("number/$cid.txt");

$valyuta = file_get_contents("admin/valyuta.txt");
$taklif = file_get_contents("admin/taklif.txt");
$narx = file_get_contents("admin/narx.txt");
$kanal = file_get_contents("admin/kanal.txt");
$vazifa = file_get_contents("admin/vazifa.txt");

//tugma
$earn = str_replace("earn","💵 Pul ishlash",file_get_contents("tugma/earn.txt"));
$solve = str_replace("solve","🏦 Pulni yechish",file_get_contents("tugma/solve.txt"));
$cabinet = str_replace("cabinet","💰 Hisobim",file_get_contents("tugma/cabinet.txt"));
$tolov = str_replace("tolov","📢 To'lovlar kanali",file_get_contents("tugma/tolov.txt"));
$support = str_replace("support","📨 Murojaat",file_get_contents("tugma/support.txt"));
$manual = str_replace("manual","📚 Qo'llanma",file_get_contents("tugma/manual.txt"));
$orqa = str_replace("back","◀️ Orqaga",file_get_contents("tugma/back.txt"));
$getPhone = str_replace("getPhone","📱 Telefon raqamni yuborish",file_get_contents("tugma/getPhone.txt"));
$check = str_replace("check","🔄 Tekshirish",file_get_contents("tugma/check.txt"));
$contiune = str_replace("contiune","✅ Davom etish",file_get_contents("tugma/contiune.txt"));
$share = str_replace("share","↗️ Ulashish",file_get_contents("tugma/share.txt"));
$cancellation = str_replace("cancellation","🚫 Bekor qilish",file_get_contents("tugma/cancellation.txt"));
$confirm = str_replace("confirm","✅ Tasdiqlash",file_get_contents("tugma/confirm.txt"));
$transition = str_replace("transition","🤖 Botga o'tish",file_get_contents("tugma/transition.txt"));

//matn
$manuals = str_replace(["manuals","%first%","%last%","%id%","%username%","%botname%","%user%","%balance%","%refcount%","%currency%","%solve%","%hour%","%date%"], ["<b>Qo'shilmadi!</b>",$name,$last,$cid,$username,$bot,$user,$pul,$odam,$valyuta,$solv,$soat,$sana],file_get_contents("matn/manuals.txt"));
$reklama = str_replace(["advertising","%first%","%last%","%id%","%username%","%botname%","%user%","%balance%","%refcount%","%currency%","%solve%","%hour%","%date%"], ["🤖 <b>Rasmiy botimiz:</b> @$bot",$name,$last,$cid,$username,$bot,$user,$pul,$odam,$valyuta,$solv,$soat,$sana],file_get_contents("matn/advertising.txt"));
$welcome = str_replace(["welcome","%first%","%last%","%id%","%hour%","%date%"],["🖥 <b>Asosiy menyudasiz.</b>",$name,$last,$cid,$soat,$sana],file_get_contents("matn/welcome.txt"));
$subChannels = str_replace(["subChannels","%first%","%last%","%id%","%hour%","%date%"],["⚠️ <b>Botdan foydalanish uchun, quyidagi kanallarga obuna bo'ling:</b>",$name,$last,$cid,$soat,$sana],file_get_contents("matn/subChannels.txt"));
$tolovtext = str_replace(["tolovtext","%first%","%last%","%id%","%hour%","%date%"],["<b>⤵️ Quyidagi kanal orqali to'livlarni kuzatib boring:</b>",$name,$last,$cid,$soat,$sana],file_get_contents("matn/tolovtext.txt"));
$newRef = str_replace(["newRef","%reffirst%","%reflast%","%refpay%","%refid%","%currency%"],["📳 <b>Sizda yangi</b> <a href='tg://user?id=%refid%'>taklif</a> <b>mavjud!</b>",$name,$last,$taklif,$cid,$valyuta],file_get_contents("matn/newRef.txt"));
$checkRef = str_replace(["checkRef","%reffirst%","%reflast%","%refpay%","%refid%","%currency%"],["✅ <b>Hisobingizga %refpay% %currency% qo'shildi!</b>",$name,$last,$taklif,$cid,$valyuta],file_get_contents("matn/checkRef.txt"));
$backHome = str_replace(["backHome","%first%","%last%","%id%","%hour%","%date%"],["🖥 <b>Asosiy menyuga qaytdingiz.</b>",$name,$last,$cid,$soat,$sana],file_get_contents("matn/backHome.txt"));
$textPhone = str_replace(["textPhone","%first%","%last%","%id%","%hour%","%date%"],["📲 <b>Botdan ro'yxatdan o'tish uchun quyidagi tugma orqali telefon raqamingizni yuboring:</b>",$name,$last,$cid,$soat,$sana],file_get_contents("matn/textPhone.txt"));
$conPhone = str_replace(["conPhone","%first%","%last%","%id%","%hour%","%date%","%phone%"],["<b>✅ Telefon raqamingiz qabul qilindi:</b> %phone%\n\n<i>Botdan foydalanish boshlash uchun quyidagi tugmani bosing:</i>",$name,$last,$cid,$soat,$sana,$phone],file_get_contents("matn/conPhone.txt"));
$noPhone = str_replace(["noPhone","%first%","%last%","%id%","%hour%","%date%"],["<b>Kechirasiz, Botdan faqat O'zbekiston fuqarolari foydalanishi mumkin.</b>",$name,$last,$cid,$soat,$sana],file_get_contents("matn/noPhone.txt"));
$earnRef = str_replace(["earnRef","%first%","%last%","%id%","%hour%","%date%","%reflink%","%refpay%","%refcount%","%balance%","%currency%"],["🔗 <b>Sizning taklif havolangiz:</b>\n\n%reflink%\n\n<i>Yuqoridagi taklif havolangizni do'stlaringizga tarqating va har bir to'liq ro'yxatdan o'tgan taklifingiz uchun %refpay% %currency% hisobingizga qo'shiladi.</i>",$name,$last,$cid,$soat,$sana,"https://t.me/$bot?start=$cid",$taklif,$odam,$pul,$valyuta],file_get_contents("matn/earnRef.txt"));
$kabinet = str_replace(["cabinet","%first%","%last%","%id%","%hour%","%date%","%balance%","%solve%","%refcount%","%currency%"],["🔑 <b>Sizning ID raqamingiz:</b> <code>%id%</code>\n\n💵 <b>Asosiy balansingiz:</b> %balance% %currency%\n👤 <b>Takliflaringiz soni:</b> %refcount% ta",$name,$last,$cid,$soat,$sana,$pul,$solv,$odam,$valyuta],file_get_contents("matn/cabinet.txt"));
$selectPayType = str_replace(["selectPayType","%first%","%last%","%id%","%hour%","%date%"],["👇 <b>Quyidagi to'lov tizimlaridan birini tanlang:</b>",$name,$last,$cid,$soat,$sana],file_get_contents("matn/selectPayType.txt"));
$minimum = str_replace(["minimum","%first%","%last%","%id%","%hour%","%date%","%balance%","%minimum%","%currency%"],["⛔ Jarayonni davom ettira olmaysiz!\n\nMinimal yechib olish miqdori: %minimum% %currency%",$name,$last,$cid,$soat,$sana,$pul,$narx,$valyuta],file_get_contents("matn/minimum.txt"));
$noChannel = str_replace(["noChannel","%first%","%last%","%id%","%hour%","%date%"],["To'lovlar kanali ulanmagan!",$name,$last,$cid,$soat,$sana],file_get_contents("matn/noChannel.txt"));
$sendCard = str_replace(["sendCard","%first%","%last%","%id%","%hour%","%date%"],["<b>Hamyoningiz raqamini yuboring:</b>",$name,$last,$cid,$soat,$sana],file_get_contents("matn/sendCard.txt"));
$accpeted = str_replace(["accpeted","%first%","%last%","%id%","%hour%","%date%","%phone%","%wallet%","%amount%"],["✅ <b>Qabul qilindi!</b>\n\n• <b>To'lov turi:</b> %wallet%\n• <b>Pul miqdori:</b> %amount%\n• <b>Hamyon raqamingiz:</b> %phone%\n\n<b>Ma'lumotlar to'g'ri ekanligiga ishonch hosil qilgan bo'lsangiz, ✅ Tasdiqlash tugmasini bosing!</b>",$name,$last,$cid,$soat,$sana,$num,$wallet,$text],file_get_contents("matn/accpeted.txt"));
$solveMoney = str_replace(["solveMoney","%first%","%last%","%id%","%hour%","%date%"],["<b>Qancha miqdorda pul yechib olmoqchisiz:</b>",$name,$last,$cid,$soat,$sana],file_get_contents("matn/solveMoney.txt"));
$solveMinimum = str_replace(["solveMinimum","%first%","%last%","%id%","%hour%","%date%","%balance%","%minimum%","%currency%"],["<b>Minimal yechib olish miqdori:</b> %minimum% %currency%\n\nQayta urunib ko'ring:",$name,$last,$cid,$soat,$sana,$pul,$narx,$valyuta],file_get_contents("matn/solveMinimum.txt"));
$lowBalance = str_replace(["lowBalance","%first%","%last%","%id%","%hour%","%date%"],["<b>Hisobingizda yetarli mablag' mavjud emas!</b>\n\nQayta urunib ko'ring:",$name,$last,$cid,$soat,$sana],file_get_contents("matn/lowBalance.txt"));
$accped = str_replace(["accped","%first%","%last%","%id%","%hour%","%date%"],["✅ <b>Qabul qilindi.</b>",$name,$last,$cid,$soat,$sana],file_get_contents("matn/accped.txt"));
$canceled = str_replace(["canceled","%first%","%last%","%id%","%hour%","%date%"],["⛔ <b>Bekor qilindi.</b>",$name,$last,$cid,$soat,$sana],file_get_contents("matn/canceled.txt"));
$hasBeenPaid = str_replace(["hasBeenPaid","%first%","%id%","%hour%","%date%"],["<b>Hurmatli %first%!\n\nPullaringizni yechib olish haqidagi arizangiz qabul qilindi.</b>",$name,$cid,$soat,$sana],file_get_contents("matn/hasBeenPaid.txt"));
$wasNotPaid = str_replace(["wasNotPaid","%first%","%id%","%hour%","%date%"],["<b>Hurmatli %first%!\n\nPullaringizni yechib olish haqidagi arizangiz qabul qilinmadi.</b>",$name,$cid,$soat,$sana],file_get_contents("matn/wasNotPaid.txt"));
$block = str_replace(["block","%first%","%id%","%hour%","%date%"],["<b>Hurmatli %first%!\n\nPullaringizni yechib olish haqidagi arizangiz qabul qilinmadi va botdan blocklandingiz.</b>",$name,$cid,$soat,$sana],file_get_contents("matn/block.txt"));
$BeenPaid = str_replace(["BeenPaid","%first%","%id%","%hour%","%date%","%phone%","%amount%","%advertising%"],["✅ <a href='tg://user?id=%id%'>%first%</a> <b>foydalanuvchi puli to'lab berildi.</b>\n\n• <b>Pul miqdori:</b> %amount%\n• <b>Hamyon raqami:</b> %phone%\n\n%advertising%",$ism,$id,$soat,$sana,$number,$miqdor,$reklama],file_get_contents("matn/BeenPaid.txt"));
$sendSuppMsg = str_replace(["sendSuppMsg","%first%","%last%","%id%","%hour%","%date%"],[" 📝 <b>Murojaat matnini yuboring:</b>",$name,$last,$cid,$soat,$sana],file_get_contents("matn/sendSuppMsg.txt"));
$SuppSend = str_replace(["SuppSend","%first%","%last%","%id%","%hour%","%date%"],["✅ <b>Murojaatingiz yuborildi.</b>\n\nTez orada javob qaytaramiz!",$name,$last,$cid,$soat,$sana],file_get_contents("matn/SuppSend.txt"));

//tugma
if(file_get_contents("raqam/$cid.txt")){
}else{
if(file_put_contents("raqam/$cid.txt",'1'));
}
if(file_get_contents("tugma/earn.txt")){
}else{
if(file_put_contents("tugma/earn.txt",'earn'));
}
if(file_get_contents("tugma/solve.txt")){
}else{
if(file_put_contents("tugma/solve.txt",'solve'));
}
if(file_get_contents("tugma/cabinet.txt")){
}else{
if(file_put_contents("tugma/cabinet.txt",'cabinet'));
}
if(file_get_contents("tugma/tolov.txt")){
}else{
if(file_put_contents("tugma/tolov.txt",'tolov'));
}
if(file_get_contents("tugma/support.txt")){
}else{
if(file_put_contents("tugma/support.txt",'support'));
}
if(file_get_contents("tugma/manual.txt")){
}else{
if(file_put_contents("tugma/manual.txt",'manual'));
}
if(file_get_contents("tugma/back.txt")){
}else{
if(file_put_contents("tugma/back.txt",'back'));
}
if(file_get_contents("tugma/getPhone.txt")){
}else{
if(file_put_contents("tugma/getPhone.txt",'getPhone'));
}
if(file_get_contents("tugma/check.txt")){
}else{
if(file_put_contents("tugma/check.txt",'check'));
}
if(file_get_contents("tugma/contiune.txt")){
}else{
if(file_put_contents("tugma/contiune.txt",'contiune'));
}
if(file_get_contents("tugma/share.txt")){
}else{
if(file_put_contents("tugma/share.txt",'share'));
}
if(file_get_contents("tugma/cancellation.txt")){
}else{
if(file_put_contents("tugma/cancellation.txt",'cancellation'));
}
if(file_get_contents("tugma/confirm.txt")){
}else{
if(file_put_contents("tugma/confirm.txt",'confirm'));
}
if(file_get_contents("tugma/transition.txt")){
}else{
if(file_put_contents("tugma/transition.txt",'transition'));
}

//matn
if(file_get_contents("matn/welcome.txt")){
}else{
if(file_put_contents("matn/welcome.txt",'welcome'));
}
if(file_get_contents("matn/subChannels.txt")){
}else{
if(file_put_contents("matn/subChannels.txt",'subChannels'));
}
if(file_get_contents("matn/tolovtext.txt")){
}else{
if(file_put_contents("matn/tolovtext.txt",'tolovtext'));
}
if(file_get_contents("matn/newRef.txt")){
}else{
if(file_put_contents("matn/newRef.txt",'newRef'));
}
if(file_get_contents("matn/checkRef.txt")){
}else{
if(file_put_contents("matn/checkRef.txt",'checkRef'));
}
if(file_get_contents("matn/backHome.txt")){
}else{
if(file_put_contents("matn/backHome.txt",'backHome'));
}
if(file_get_contents("matn/textPhone.txt")){
}else{
if(file_put_contents("matn/textPhone.txt",'textPhone'));
}
if(file_get_contents("matn/conPhone.txt")){
}else{
if(file_put_contents("matn/conPhone.txt",'conPhone'));
}
if(file_get_contents("matn/noPhone.txt")){
}else{
if(file_put_contents("matn/noPhone.txt",'noPhone'));
}
if(file_get_contents("matn/earnRef.txt")){
}else{
if(file_put_contents("matn/earnRef.txt",'earnRef'));
}
if(file_get_contents("matn/cabinet.txt")){
}else{
if(file_put_contents("matn/cabinet.txt",'cabinet'));
}
if(file_get_contents("matn/selectPayType.txt")){
}else{
if(file_put_contents("matn/selectPayType.txt",'selectPayType'));
}
if(file_get_contents("matn/minimum.txt")){
}else{
if(file_put_contents("matn/minimum.txt",'minimum'));
}
if(file_get_contents("matn/noChannel.txt")){
}else{
if(file_put_contents("matn/noChannel.txt",'noChannel'));
}
if(file_get_contents("matn/sendCard.txt")){
}else{
if(file_put_contents("matn/sendCard.txt",'sendCard'));
}
if(file_get_contents("matn/accpeted.txt")){
}else{
if(file_put_contents("matn/accpeted.txt",'accpeted'));
}
if(file_get_contents("matn/solveMoney.txt")){
}else{
if(file_put_contents("matn/solveMoney.txt",'solveMoney'));
}
if(file_get_contents("matn/solveMinimum.txt")){
}else{
if(file_put_contents("matn/solveMinimum.txt",'solveMinimum'));
}
if(file_get_contents("matn/lowBalance.txt")){
}else{
if(file_put_contents("matn/lowBalance.txt",'lowBalance'));
}
if(file_get_contents("matn/accped.txt")){
}else{
if(file_put_contents("matn/accped.txt",'accped'));
}
if(file_get_contents("matn/canceled.txt")){
}else{
if(file_put_contents("matn/canceled.txt",'canceled'));
}
if(file_get_contents("matn/hasBeenPaid.txt")){
}else{
if(file_put_contents("matn/hasBeenPaid.txt",'hasBeenPaid'));
}
if(file_get_contents("matn/wasNotPaid.txt")){
}else{
if(file_put_contents("matn/wasNotPaid.txt",'wasNotPaid'));
}
if(file_get_contents("matn/block.txt")){
	}else{
		if(file_put_contents("matn/block.txt",'block'));
}
if(file_get_contents("matn/BeenPaid.txt")){
}else{
if(file_put_contents("matn/BeenPaid.txt",'BeenPaid'));
}
if(file_get_contents("matn/manuals.txt")){
}else{
if(file_put_contents("matn/manuals.txt",'manuals'));
}
if(file_get_contents("matn/advertising.txt")){
}else{
if(file_put_contents("matn/advertising.txt",'advertising'));
}
if(file_get_contents("matn/sendSuppMsg.txt")){
}else{
if(file_put_contents("matn/sendSuppMsg.txt",'sendSuppMsg'));
}
if(file_get_contents("matn/SuppSend.txt")){
}else{
if(file_put_contents("matn/SuppSend.txt",'SuppSend'));
}

//panel
if(file_get_contents("admin/taklif.txt")){
}else{
if(file_put_contents("admin/taklif.txt","250"));
}
if(file_get_contents("admin/valyuta.txt")){
}else{
if(file_put_contents("admin/valyuta.txt","so'm"));
}
if(file_get_contents("admin/narx.txt")){
}else{
if(file_put_contents("admin/narx.txt","3000"));
}
if(file_get_contents("admin/vazifa.txt")){
}else{
if(file_put_contents("admin/vazifa.txt","Kiritilmagan"));
}
if(file_get_contents("admin/user.txt")){
}else{
if(file_put_contents("admin/user.txt","Kiritilmagan"));
}

mkdir("step");
mkdir("ban");
mkdir("pul");
mkdir("odam");
mkdir("admin");
mkdir("tugma");
mkdir("matn");
mkdir("number");
mkdir("raqam");

$panel = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"⚙ Asosiy sozlamalar"]],
[['text'=>"📢 Kanallar"],['text'=>"📊 Statistika"]],
[['text'=>"🔎 Foydalanuvchini boshqarish"]],
[['text'=>"🎮 O'yin Sozlamalari"]],
[['text'=>"📨 Xabarnoma"],['text'=>"$orqa"]]
]]);

$menu = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"⏬ No'mer olish"],['text'=>"🎁O'yinlar"]],
[['text'=>"🗄 Kabinet"],['text'=>"🎯Pul ishlash"]],
[['text'=>"$support"],['text'=>"📚Qo'llanma"]],
]]);

$menus = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"⏬ No'mer olish"],['text'=>"🎁O'yinlar"]],
[['text'=>"🗄 Kabinet"],['text'=>"🎯Pul ishlash"]],
[['text'=>"$support"],['text'=>"📚Qo'llanma"]],
[['text'=>"🗄 Boshqarish"]]
]]);

$back = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"$orqa"]],
]]);

$boshqarish = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🗄 Boshqarish"]],
]]);

if($text){
if($ban == "ban"){
if($cid == $guycoder){
}else{
}}else{}}

if($text){
$ban = file_get_contents("ban/$cid2.txt");
if($ban == "ban"){
if($cid2 == $guycoder){
}else{
}}else{}}

if($step=="request_contact"){
$phone = str_replace("+","","$phone");
if((strlen($phone)==12) and (mb_stripos($phone,"998")!==false)){
if($contact_id == $cid){
file_put_contents("number/$cid.txt","$phone");
bot("sendMessage",[
"chat_id"=>$cid,
"text"=>"$conPhone",
"parse_mode"=>"html",
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
[['text'=>"$contiune",'callback_data'=>"davom"]]
]])
]);
unlink("step/$cid.step");
}else{
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"$textPhone",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"$getPhone","request_contact"=>true]],
]]),
]);
}}else{
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"$noPhone",
'parse_mode'=>'html',
'reply_to_message_id'=>$mid,
'reply_markup'=>json_encode([
'remove_keyboard'=>true,
]),
]);
file_put_contents("ban/$cid.txt",'ban');
unlink("step/$cid.step");
}}

if($data == "davom"){
$welcome = str_replace(["welcome","%first%","%last%","%id%","%hour%","%date%"],["🖥 <b>Asosiy menyudasiz.</b>",$callname,$surname,$cid2,$soat,$sana],file_get_contents("matn/welcome.txt"));
if($cid2 != $guycoder){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"$welcome",
'parse_mode'=>'html',
'reply_markup'=>$menu,
]);
}else{
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$guycoder,
'text'=>"$welcome",
'parse_mode'=>'html',
'reply_markup'=>$menus,
]);
}}

if(isset($message)){
$pul = file_get_contents("pul/$cid.txt");
$mm = $pul + 0;
file_put_contents("pul/$cid.txt","$mm");
$solv = file_get_contents("pul/$cid.dat");
$m = $solv + 0;
file_put_contents("pul/$cid.dat","$m");
$odam = file_get_contents("odam/$cid.txt");
$kkd = $odam + 0;
file_put_contents("odam/$cid.txt","$kkd");
}

if(isset($callback)){
	$soat = date('H:i');
$sana = date("d.m.Y");
$get = file_get_contents("azo.dat");
if(mb_stripos($get,$callfrid)==false){
file_put_contents("azo.dat", "$get\n$callfrid");
bot('sendMessage',[
'chat_id'=>$guycoder,
'text'=>"<b>🆕Yangi <a href='tg://user?id=$callfrid'>obunachi</a> Qo'shildi!

🛜Malumotlar: 
🔖ID raqam: <code>$callfrid</code>
⏰Vaqti: <code>$soat | $sana</code>
📞Tel Raqam: <code>NULL</code></b>",
'parse_mode'=>"html"
]);
}}

if(isset($message)){
	$soat = date('H:i');
$sana = date("d.m.Y");
$get = file_get_contents("azo.dat");
if(mb_stripos($get,$from_id)==false){
file_put_contents("azo.dat", "$get\n$from_id");
bot('sendMessage',[
'chat_id'=>$guycoder,
'text'=>"<b>🆕Yangi <a href='tg://user?id=$from_id'>obunachi</a> Qo'shildi!

🛜Malumotlar: 
🔖ID raqam: <code>$from_id</code>
⏰Vaqti: <code>$soat | $sana</code>
📞Tel Raqam: <code>NULL</code></b>",
'parse_mode'=>"html"
]);
}}

if($text=="/start"){
if($cid != $guycoder){
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"$welcome",
'parse_mode'=>'html',
'reply_markup'=>$menu,
]);
}else{
bot('SendMessage',[
'chat_id'=>$guycoder,
'text'=>"$welcome",
'parse_mode'=>'html',
'reply_markup'=>$menus,
]);
}}

if(mb_stripos($text,"/start")!==false){
$refid = explode(" ",$text);
$refid = $refid[1];
if(strlen($refid)>0 and $refid>0){
if($refid == $cid){
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"$welcome",
'parse_mode'=>'html',
'reply_markup'=>$menu,
]);
}else{
if(mb_stripos($baza,"$cid")!==false){
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"$welcome",
'parse_mode'=>'html',
'reply_markup'=>$menus,
]);
}else{
bot('SendMessage',[
'chat_id'=>$refid,
'text'=>"$newRef",
'parse_mode'=>'html',
]);
file_put_contents("step/$cid.id","$refid");
file_put_contents("step/$cid.cid","$refid");
$joinkey = joinchat($cid);
if($joinkey != null){
$pulim = file_get_contents("pul/$refid.txt");
$a = $pulim + $taklif;
file_put_contents("pul/$refid.txt","$a");
$odam = file_get_contents("odam/$refid.txt");
$b = $odam + 1;
file_put_contents("odam/$refid.txt","$b");
bot('SendMessage',[
'chat_id'=>$refid,
'text'=>"$checkRef",
'parse_mode'=>'html',
]);
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"$welcome",
'parse_mode'=>'html',
'reply_markup'=>$menu,
]);
unlink("step/$cid.id");
unlink("step/$cid.cid");
}}}}}

if($data == "check"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
if(joinchat($cid2)==true){
$refid = file_get_contents("step/$cid2.id");
$cid3 = file_get_contents("step/$cid2.cid");
if($refid !=$cid3){
if($cid2 != $guycoder){
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"$welcome",
'parse_mode'=>'html',
'reply_markup'=>$menu,
]);
}else{
bot('SendMessage',[
'chat_id'=>$guycoder,
'text'=>"$welcome",
'parse_mode'=>'html',
'reply_markup'=>$menus,
]);
}}else{
$pulim = file_get_contents("pul/$cid3.txt");
$a = $pulim + $taklif;
$odam = file_get_contents("odam/$cid3.txt");
$b = $odam + 1;
file_put_contents("pul/$cid3.txt","$a");
file_put_contents("odam/$cid3.txt","$b");
if($ccid != $guycoder){
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"$welcome",
'parse_mode'=>'html',
'reply_markup'=>$menu,
]);
}else{
bot('SendMessage',[
'chat_id'=>$guycoder,
'text'=>"$welcome",
'parse_mode'=>'html',
'reply_markup'=>$menus,
]);
}
bot('SendMessage',[
'chat_id'=>$cid3,
'text'=>"$checkRef",
'parse_mode'=>'html',
]);
unlink("step/$cid2.id");
unlink("step/$cid2.cid");
}}}

if($text == "$orqa"){
if($cid != $guycoder){
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"$backHome",
'parse_mode'=>'html',
'reply_markup'=>$menu,
]);
unlink("step/$cid.step");
}else{
bot('SendMessage',[
'chat_id'=>$guycoder,
'text'=>"$backHome",
'parse_mode'=>'html',
'reply_markup'=>$menus,
]);
unlink("step/$cid.step");
}}


///
if($text == "🎯Pul ishlash"){
if(joinchat($cid)==true){
bot('SendPhoto',[
'chat_id'=>$cid,
'photo'=>"https://t.me/CodeDetal/21",
'caption'=>"<b>📂Quyidagilardan birini tanlang.</b>",
'parse_mode'=>'html',
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🔗Referal",'callback_data'=>"referal"]],
]])
]);
}}

if($data == "referal"){
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"◽<code>https://t.me/$bot?start=$cid2</code>◽",
'parse_mode'=>'html',
]);
}

if($text == "🗄 Kabinet"){
if(joinchat($cid)==true){
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"$kabinet",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"📥Pul Kiritish",'callback_data'=>"kiritish"]]
]])
]);
}}



if($text == "⏬ No'mer olish"){
if(joinchat($cid)==true){
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>❗️Bo'limdan foydalanish uchun ushbu shartlarga roziligingizni bildiring!

• Olingan nomer noto'g'ri yo'lda foydalanilsa bot adminlari bunga javobgar emas.
• Telegram uchun nomer olmoqchi bo'lsangiz rasmiy telegramdan foydalaning va eng yangi versiya ekanligiga ishonch hosil qiling aks holda sms kod kelmasligi mumkin.
• Sizga virtual nomer berilganda uni bemalol almashtirishingiz yoki bekor qilishingiz mumkin bo'ladi va buning uchun pul olinmaydi.
• Agar sizga sms kod kelsa virtual nomerni boshqa almashtirolmaysiz va nomer uchun pul yechiladi
• Agarda kelgan kod notog'ri bo'lsa siz berilgan 3 daqiqa ichida yangi sms kod so'rashingiz mumkin va buning uchun ortiqcha pul olinmaydi.
• Agar sizga sms kelsa lekin nomerga kira olmasangiz hamda berilgan 3 daqiqani ham o'tkazib yuborsangiz nomer baribir sizga sotilgan hisoblanadi va buning uchun da'volar qabul qilinmaydi.
• Bot orqali olgan nomeringizni o'chirsangiz yoki u block bo'lsa nomer tiklab berilmaydi.
• Telegram uchun nomer olganingizda sms kod telegram orqali yuborildi deyilgan xabar chiqsa yoki  raqamga chaqiruv amalga oshirilsa nomerni darhol bekor qiling! (Aks holda hisobingizdan pul yechilishi mumkin)

☝️ Yuqoridagi holatlar uchun da'volar qabul qilinmaydi chunki bunga rozilik bildirgan bo'lasiz!</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅Roziman",'callback_data'=>"nolish"]],
[['text'=>"⛔Bekor Qilish",'callback_data'=>"bekor"]],
]])
]);
}}


if($data=="nolish"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
  bot("answerCallbackQuery",[
"callback_query_id"=>$qid,
"text"=>"💸Nomer Olish Bo'limiga Hush Kelibsiz❗",
"show_alert"=>false,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>🌍👇 Telegram uchun olmoqchi boʻlgan Raqam Mamlakatini Tanlang:</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🇮🇩 indoneziya - 1500 So'm",'callback_data'=>"v1"]],
[['text'=>"🇷🇺 Rossiya - 15000 So'm",'callback_data'=>"v2"]],
[['text'=>"🇺🇿 O'zbekiston - 4000 So'm",'callback_data'=>"v3"]],
[['text'=>"🇵🇰 Pakistan - 4000 So'm",'callback_data'=>"v4"]],
[['text'=>"🇰🇿 Qozog'iston - 7000 So'm",'callback_data'=>"v5"]],
[['text'=>"🇰🇬 Qirg'iziston - 6000 So'm",'callback_data'=>"v6"]],
[['text'=>"1/3",'callback_data'=>"sinov"],['text'=>"⏩",'callback_data'=>"keyin"]],
[['text'=>"⛔Bekor Qilish",'callback_data'=>"bekor"]],
]])
]);
}

if($data=="orqan"){
  bot("answerCallbackQuery",[
"callback_query_id"=>$qid,
"text"=>"⏪Orqadagi Bo'limga O'tingiz.",
"show_alert"=>false,
]);
bot('EditMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"<b>🌍👇 Telegram uchun olmoqchi boʻlgan Raqam Mamlakatini Tanlang:</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🇮🇩 Indoneziya - 1500 So'm",'callback_data'=>"v1"]],
[['text'=>"🇷🇺 Rossiya - 15000 So'm",'callback_data'=>"v2"]],
[['text'=>"🇺🇿 O'zbekiston - 4000 So'm",'callback_data'=>"v3"]],
[['text'=>"🇵🇰 Pakistan - 4000 So'm",'callback_data'=>"v4"]],
[['text'=>"🇰🇿 Qozog'iston - 7000 So'm",'callback_data'=>"v5"]],
[['text'=>"🇰🇬 Qirg'iziston - 6000 So'm",'callback_data'=>"v6"]],
[['text'=>"1/3",'callback_data'=>"nothing"],['text'=>"⏩",'callback_data'=>"keyin"]],
[['text'=>"⛔Bekor Qilish",'callback_data'=>"bekor"]],
]])
]);
}

if($data=="keyin"){
  bot("answerCallbackQuery",[
"callback_query_id"=>$qid,
"text"=>"◾Tez Orada.",
"show_alert"=>true,
]);
bot('EditMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid,
'text'=>"<b>🌍👇 Telegram uchun olmoqchi boʻlgan Raqam Mamlakatini Tanlang:</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🇰🇬 Qirg'iziston - 6000 So'm",'callback_data'=>"v6"]],
[['text'=>"🇷🇺 Rossiya - 15000 So'm",'callback_data'=>"v2"]],
[['text'=>"🇺🇿 O'zbekiston - 5000 So'm",'callback_data'=>"v3"]],
[['text'=>"🇵🇰 Pakistan - 4000 So'm",'callback_data'=>"v4"]],
[['text'=>"⏪",'callback_data'=>"orqan"],['text'=>"2/3",'callback_data'=>"nothing"],['text'=>"⏩",'callback_data'=>"bekor"]],
[['text'=>"⛔Bekor Qilish",'callback_data'=>"bekor"]],
]])
]);
}




if($data == "bekor"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>💼Asosiy menyu Qaytdingiz

👤 ID raqam: <code>$cid2</code></b>",
'parse_mode'=>'html',
]);
}

//oyin 
if($text=="🎁O'yinlar"){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>📋 Quyidagilardan birini tanlang:</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"💈 Baraban o'yini",'callback_data'=>"baraban"],['text'=>"🧰 Sandiq o'yini",'callback_data'=>"sandiq"]],
]])
]);
}


if($data == "game"){
bot('editMessageText',[
        'chat_id'=>$cid2,
        'message_id'=>$mid2,
        'text'=>"<b>🧭 Yuklanmoqda...</b>",
       'parse_mode'=>'html',
]);
       bot('editMessageText',[
      'chat_id'=>$cid2,
     'message_id'=>$mid2 + 1,
'text'=>"<b>🧭 Yuklanmoqda...</b>",
       'parse_mode'=>'html',
]);
     bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
       'text'=>"<b>🎮 O'yin xonasi bo'limiga xush kelibsiz.</b>",
    'parse_mode'=>'html',
    'message_id'=>$mid2,
    'reply_markup'=>json_encode([
	'inline_keyboard'=>[
[['text'=>"💈 Baraban o'yini",'callback_data'=>"baraban"],['text'=>"🧰 Sandiq o'yini",'callback_data'=>"sandiq"]],
]
])
]);
}


if($data == "baraban"){
$get = file_get_contents("pul/$cid.txt");
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"<b>$baraban</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"💈 Baraban aylantirish - $bnarx $valyuta",'callback_data'=>"baraban75"]],
[['text'=>"◀️ Orqaga",'callback_data'=>"game"]],
]
])
]);
}
    
if($data == "baraban75"){
$rand = array($b1,$b2,$b3,$b4,$b5);
$ra = array_rand($rand, 1);
$sum= file_get_contents("pul/$cid2.txt");
if($sum>$bnarx) {
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"<b>💈 Baraban o'yini.

💸 Siz $rand[$ra]</b>",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🎁Sovg'ani Olish",'url'=>"tg://user?id=$guycoder"]],	
[['text'=>"◀️ Orqaga",'callback_data'=>"game"]],
]
])
]);
$gett = file_get_contents("pul/$cid2.txt");
$gett -= $bnarx;
file_put_contents("pul/$cid2.txt", $gett);
}else{
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
    'text'=>"<b>😔 Afsuski, hisobingizda mablag‘ yetarli emas.</b>",
    'parse_mode'=>"html",
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"➕ Hisobni to'ldirish",'callback_data'=>"kiritish"]],
[['text'=>"◀️ Orqaga",'callback_data'=>"baraban"]],
    ]
    ])
]);
}
}


if($data == "sandiq"){
$get = file_get_contents("pul/$cid2.txt");
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
    'text'=>"<b>🧰 Sandiq o'yini.

$stext",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"$sandiq1 $valyuta",'callback_data'=>"500som"],['text'=>"$sandiq2 $valyuta",'callback_data'=>"1000som"]],
    [['text'=>"$sandiq3 $valyuta",'callback_data'=>"10000som"],['text'=>"$sandiq4 $valyuta",'callback_data'=>"20000som"]],
    [['text'=>"◀️ Orqaga",'callback_data'=>"game"]],
    ]
    ])
    ]);
    }

if($data == "500som"){
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
    'text'=>"<b>📋 Quyidagilardan birini tanlang:</b>",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"$sandiq1 $valyuta",'callback_data'=>"500som"],['text'=>"$sandiq2 $valyuta",'callback_data'=>"1000som"]],
    [['text'=>"$sandiq3 $valyuta",'callback_data'=>"10000som"],['text'=>"$sandiq4 $valyuta",'callback_data'=>"20000som"]],
    [['text'=>"🧰 $sandiq1 $valyuta lik sandiq ochilsinmi",'callback_data'=>"ochsan"]],
    [['text'=>"◀️ Orqaga",'callback_data'=>"game"]],
    ]
    ])
    ]);
    }

    
if($data == "ochsan"){
$rand = array($s11,$s12,$s13,$s14,$s15);
$ra = array_rand($rand, 1);
$sum= file_get_contents("pul/$cid2.txt");
if($sum>$sandiq1) {
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"<b>💸 Siz $rand[$ra]</b>",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
	[['text'=>"🎁Sovg'ani Olish",'url'=>"tg://user?id=$guycoder"]],
[['text'=>"◀️ Orqaga",'callback_data'=>"game"]],
]
])
]);
$gett = file_get_contents("pul/$cid2.txt");
$gett -= $sandiq1;
file_put_contents("pul/$cid2.txt", $gett);
}else{
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
    'text'=>"<b>😔 Afsuski, hisobingizda mablag‘ yetarli emas.</b>",
    'parse_mode'=>"html",
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"➕ Hisobni to'ldirish",'callback_data'=>"kiritish"]],
[['text'=>"◀️ Orqaga",'callback_data'=>"500som"]],
    ]
    ])
]);
}
}



if($data == "1000som"){
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
    'text'=>"<b>📋 Quyidagilardan birini tanlang:</b>",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"$sandiq1 $valyuta",'callback_data'=>"500som"],['text'=>"$sandiq2 $valyuta",'callback_data'=>"1000som"]],
    [['text'=>"$sandiq3 $valyuta",'callback_data'=>"10000som"],['text'=>"$sandiq4 $valyuta",'callback_data'=>"20000som"]],
    [['text'=>"🧰 $sandiq2 $valyuta lik sandiq ochilsinmi",'callback_data'=>"ochsan1"]],
    [['text'=>"◀️ Orqaga",'callback_data'=>"game"]],
    ]
    ])
    ]);
    }

    
if($data == "ochsan1"){
$rand = array($s21,$s22,$s23,$s24,$s25);
$ra = array_rand($rand, 1);
$sum= file_get_contents("pul/$cid2.txt");
if($sum>$sandiq2) {
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"<b>💸 Siz $rand[$ra]</b>",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
	[['text'=>"🎁Sovg'ani Olish",'url'=>"tg://user?id=$guycoder"]],
[['text'=>"◀️ Orqaga",'callback_data'=>"game"]],
]
])
]);
$gett = file_get_contents("pul/$cid2.txt");
$gett -= $sandiq2;
file_put_contents("pul/$cid2.txt", $gett);
}else{
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
    'text'=>"<b>😔 Afsuski, hisobingizda mablag‘ yetarli emas.</b>",
    'parse_mode'=>"html",
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"➕ Hisobni to'ldirish",'callback_data'=>"kiritish"]],
[['text'=>"◀️ Orqaga",'callback_data'=>"1000som"]],
    ]
    ])
]);
}
}

if($data == "10000som"){
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
    'text'=>"<b>📋 Quyidagilardan birini tanlang:</b>",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"$sandiq1 $valyuta",'callback_data'=>"500som"],['text'=>"$sandiq2 $valyuta",'callback_data'=>"1000som"]],
    [['text'=>"$sandiq3 $valyuta",'callback_data'=>"10000som"],['text'=>"$sandiq4 $valyuta",'callback_data'=>"20000som"]],
    [['text'=>"🧰 $sandiq3 $valyuta lik sandiq ochilsinmi",'callback_data'=>"ochsan2"]],
    [['text'=>"◀️ Orqaga",'callback_data'=>"game"]],
    ]
    ])
    ]);
    }

    
if($data == "ochsan2"){
$rand = array($s31,$s32,$s33,$s34,$s35);
$ra = array_rand($rand, 1);
$sum= file_get_contents("pul/$cid2.txt");
if($sum>$sandiq3) {
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"<b>💸 Siz $rand[$ra]</b>",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🎁Sovg'ani Olish",'url'=>"tg://user?id=$guycoder"]],
[['text'=>"◀️ Orqaga",'callback_data'=>"game"]],
]
])
]);
$gett = file_get_contents("pul/$cid2.txt");
$gett -= $sandiq3;
file_put_contents("pul/$cid2.txt", $gett);
}else{
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
    'text'=>"<b>😔 Afsuski, hisobingizda mablag‘ yetarli emas.</b>",
    'parse_mode'=>"html",
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"➕ Hisobni to'ldirish",'callback_data'=>"kiritish"]],
[['text'=>"◀️ Orqaga",'callback_data'=>"10000som"]],
    ]
    ])
]);
}
}

if($data == "20000som"){
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
    'text'=>"<b>📋 Quyidagilardan birini tanlang:</b>",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"$sandiq1 $valyuta",'callback_data'=>"500som"],['text'=>"$sandiq2 $valyuta",'callback_data'=>"1000som"]],
    [['text'=>"$sandiq3 $valyuta",'callback_data'=>"10000som"],['text'=>"$sandiq4 $valyuta",'callback_data'=>"20000som"]],
    [['text'=>"🧰 $sandiq4 $valyuta lik sandiq ochilsinmi",'callback_data'=>"ochsan3"]],
    [['text'=>"◀️ Orqaga",'callback_data'=>"game"]],
    ]
    ])
    ]);
    }

    
if($data == "ochsan3"){
$rand = array($s41,$s42,$s43,$s44,$s45);
$ra = array_rand($rand, 1);
$sum= file_get_contents("pul/$cid2.txt");
if($sum>$sandiq4){
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"<b>💸 Siz $rand[$ra]</b>",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
	[['text'=>"🎁Sovg'ani Olish",'url'=>"tg://user?id=$guycoder"]],
[['text'=>"◀️ Orqaga",'callback_data'=>"game"]],
]
])
]);
$gett = file_get_contents("pul/$cid2.txt");
$gett -= $sandiq4;
file_put_contents("pul/$cid2.txt", $gett);
}else{
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
    'text'=>"<b>😔 Afsuski, hisobingizda mablag‘ yetarli emas.</b>",
    'parse_mode'=>"html",
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"➕ Hisobni to'ldirish",'callback_data'=>"oplata"]],
[['text'=>"◀️ Orqaga",'callback_data'=>"20000som"]],
    ]
    ])
]);
}
}

//

if($text=="📚Qo'llanma"){
if(joinchat($cid)==true){
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"📞 FasterSim Qoʻllab-Quvvatlash  Markazi.

❓ Sizga qanday yordam kerak",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"?? Eng koʻp beriladigan savollar ","callback_data"=>"yuriq"]],
[["text"=>"🚫 Bekor qilish","callback_data"=>"back"]],
]])
]);
}}
if($data=="kiritish"){
	bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>📳To'lov turidan birini tanlang.</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🟣HUMO KARTA",'callback_data'=>"karta"]],
]])
]);
}




if($data=="karta"){
	bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>🟣HUMO To'lov turini tanladingiz.

💳Hamyon: <code>8600021137766492</code>
📋Comment: <code>$cid2</code>

⬇️Minimal: 1000 So'm
⬆️Maksimal: 10000000 So'm

📂Adminga Id Raqamingiz Bilan Chekni Yuboring📬</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅To'lov Qildim",'url'=>"tg://user?id=$guycoder"]],
[['text'=>"$orqa",'callback_data'=>"kiritish"]],
]])
]);
}

//payeer
if($data == "payeer"){
bot('deletemessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('sendmessage',[
'chat_id'=>$cid2,
'text'=>"<b>💵 To'lov miqdorini kiriting: 
( 1₽ = 140 so'm )

❗️ Miqdor SO'M ko'rinishda yuboring.</b>",
'parse_mode'=>html,
'reply_markup'=>$back,
]);
file_put_contents("step/$cid2.step","payeer");
exit;
}

if($step=="payeer" and is_numeric($text)==1){
if(preg_match('%^[0-9]%',trim($text))){
if($text>=1000 and $text<=10000000){
$m_shop = '2019837428';
$m_orderid = md5(time());
$m_amount = number_format($text/140, 2, '.', '');
$m_curr = 'RUB';
$m_desc = base64_encode("$text So'm to'lov (ID: $cid)");
$m_key = '0hVLZCJmSJnOxIyz';
$arHash = array($m_shop,$m_orderid,$m_amount,$m_curr,$m_desc);
$arHash[] = $m_key;
$sign = strtoupper(hash('sha256', implode(':', $arHash)));
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"✅ <u>Toʻlov qilishingiz mumkin!</u>

💰To'lov: <b>$m_amount ₽</b>
📥Qabul qilish: <b>$text</b> $valyuta

⚪Toʻlov qilish uchun <b>«To'lov qilish»</b> Tugmasini bosing va toʻlov menyusini oching va toʻlov qiling!",
'parse_mode'=>html,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"↗️ To'lov qilish","url"=>"https://payeer.com/merchant/?m_shop=".$m_shop."&m_orderid=".$m_orderid."&m_amount=".$m_amount."&m_curr=".$m_curr."&m_desc=".$m_desc."&m_sign=".$sign."&lang=en"]],
[['text'=>"⬇️ To'lov qilish",'web_app'=>['url'=>"https://payeer.com/merchant/?m_shop=".$m_shop."&m_orderid=".$m_orderid."&m_amount=".$m_amount."&m_curr=".$m_curr."&m_desc=".$m_desc."&m_sign=".$sign."&lang=en"]]],
]])
]);
unlink("step/$cid.step");
exit;
}else{
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Minimal 1000 so‘m
Maksimal 10000000 so‘m",
'parse_mode'=>html,
]);
exit;
}  
}else{
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"• Faqat raqamlardan foydalaning!",
'parse_mode'=>html,
]);
exit;
}
}



if($text == "$support"){
if(joinchat($cid)==true){
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"$sendSuppMsg",
'parse_mode'=>'html',
'reply_markup'=>$back,
]);
file_put_contents("step/$cid.step",'yordam');
}}

if($step == "yordam"){
if($tx=="$orqa"){
unlink("step/$cid.step");
}else{
bot('SendMessage',[
'chat_id'=>$guycoder,
'text'=>"<a href='https://t.me/$username'>$cid</a> <b>dan yangi xabar:</b> $text",
'disable_web_page_preview'=>true,
'parse_mode'=>'html',
]);
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"$SuppSend",
'parse_mode'=>'html',
'reply_markup'=>$menu,
]);
unlink("step/$cid.step");
}}

if($text=="/panel" and $cid == $guycoder){
bot('SendMessage',[
'chat_id'=>$guycoder,
'text'=>"<b>Boshqaruv panelidasiz.</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
unlink("step/alijonov.txt");
unlink("step/$cid.step");
unlink("step/tugma.txt");
unlink("step/matn.txt");
}

if($text=="🗄 Boshqarish" and $cid == $guycoder){
bot('SendMessage',[
'chat_id'=>$guycoder,
'text'=>"<b>Boshqaruv panelidasiz.</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
unlink("step/alijonov.txt");
unlink("step/$cid.step");
unlink("step/tugma.txt");
unlink("step/matn.txt");
}

if($data == "yopish"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
}

if($text == "🔎 Foydalanuvchini boshqarish"){
if($cid == $guycoder){
bot('SendMessage',[
'chat_id'=>$guycoder,
'text'=>"<b>Kerakli foydalanuvchining ID raqamini kiriting:</b>",
'parse_mode'=>'html',
'reply_markup'=>$boshqarish
]);
file_put_contents("step/$cid.step",'iD');
}}

if($step == "iD"){
if($tx=="🗄 Boshqarish"){
unlink("step/$cid.step");
}else{
if(file_exists("pul/$text.txt")){
file_put_contents("step/pulbot.txt","$text");
$pul = file_get_contents("pul/$text.txt");
$odam = file_get_contents("odam/$text.txt");
$ban = file_get_contents("ban/$text.txt");
if($ban == null){
$bans = "🔔 Banlash";
}
if($ban == "ban"){
$bans = "🔕 Bandan olish";
}
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Foydalanuvchi topildi!

ID:</b> <a href='tg://user?id=$text'>$text</a>
<b>Balans: $pul $valyuta
Takliflar: $odam ta</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"$bans",'callback_data'=>"ban"]],
[['text'=>"➕ Pul qo'shish",'callback_data'=>"plus"],['text'=>"➖ Pul ayirish",'callback_data'=>"minus"]]
]])
]);
unlink("step/$cid.step");
}else{
bot('SendMessage',[
'chat_id'=>$guycoder,
'text'=>"<b>Foydalanuvchi topilmadi.</b>

Qayta urinib ko'ring:",
'parse_mode'=>'html',
]);
}}}

if($data == "foydalanuvchi"){
$pul = file_get_contents("pul/$saved.txt");
$odam = file_get_contents("odam/$saved.txt");
$ban = file_get_contents("ban/$saved.txt");
if($ban == null){
$bans = "🔔 Banlash";
}
if($ban == "ban"){
$bans = "🔕 Bandan olish";
}
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>Foydalanuvchi topildi!

ID:</b> <a href='tg://user?id=$saved'>$saved</a>
<b>Balans: $pul $valyuta
Takliflar: $odam ta</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"$bans",'callback_data'=>"ban"]],
[['text'=>"➕ Pul qo'shish",'callback_data'=>"plus"],['text'=>"➖ Pul ayirish",'callback_data'=>"minus"]]
]])
]);
}

if($data == "plus"){
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"<a href='tg://user?id=$saved'>$saved</a> <b>ning hisobiga qancha pul qo'shmoqchisiz?</b>",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"◀️ Orqaga",'callback_data'=>"foydalanuvchi"]]
]])
]);
file_put_contents("step/$cid2.step",'plus');
}

if($step == "plus"){
if($data=="Foydalanuvchi"){
unlink("step/$ccid.step");
}else{
if($cid == $guycoder){
if(is_numeric($text)=="true"){
bot('sendMessage',[
'chat_id'=>$saved,
'text'=>"<b>Adminlar tomonidan hisobingiz $text $valyuta to'ldirildi</b>",
'parse_mode'=>"html",
'reply_markup'=>$menu,
]);
bot('sendMessage',[
'chat_id'=>$guycoder,
'text'=>"<b>Foydalanuvchi hisobiga $text $valyuta qo'shildi!</b>",
'parse_mode'=>"html",
'reply_markup'=>$panel,
]);
$pul = file_get_contents("pul/$saved.txt");
$miqdor = $pul + $text;
file_put_contents("pul/$saved.txt",$miqdor);
unlink("step/pulbot.txt");
unlink("step/$cid.step");
}else{
bot('SendMessage',[
'chat_id'=>$guycoder,
'text'=>"<b>Faqat raqamlardan foydalaning!</b>",
'parse_mode'=>'html',
]);
}}}}

if($data=="minus"){
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"<a href='tg://user?id=$saved'>$saved</a> <b>ning hisobiga qancha pul ayirmoqchisiz?</b>",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"◀️ Orqaga",'callback_data'=>"foydalanuvchi"]]
]])
]);
file_put_contents("step/$cid2.step",'minus');
}

if($step == "minus"){
if($data=="foydalanuvchi"){
unlink("step/$ccid.step");
}else{
if($cid == $guycoder){
if(is_numeric($text)=="true"){
bot('sendMessage',[
'chat_id'=>$saved,
'text'=>"<b>Adminlar tomonidan hisobingizdan $text $valyuta olib tashlandi</b>",
'parse_mode'=>"html",
'reply_markup'=>$menu,
]);
bot('sendMessage',[
'chat_id'=>$guycoder,
'text'=>"<b>Foydalanuvchi hisobidan $text $valyuta olib tashlandi!</b>",
'parse_mode'=>"html",
'reply_markup'=>$panel,
]);
$pul = file_get_contents("pul/$saved.txt");
$miqdor = $pul - $text;
file_put_contents("pul/$saved.txt",$miqdor);
unlink("step/pulbot.txt");
unlink("step/$cid.step");
}else{
bot('SendMessage',[
'chat_id'=>$guycoder,
'text'=>"<b>Faqat raqamlardan foydalaning!</b>",
'parse_mode'=>'html',
]);
}}}}

if($data=="ban"){
$ban = file_get_contents("ban/$saved.txt");
if($guycoder != $saved){
if($ban == "ban"){
unlink("ban/$saved.txt");
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"<b>Foydalanuvchi ($saved) bandan olindi!</b>",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"◀️ Orqaga",'callback_data'=>"foydalanuvchi"]]
]])
]);
}else{
file_put_contents("ban/$saved.txt",'ban');
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"<b>Foydalanuvchi ($saved) banlandi!</b>",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"◀️ Orqaga",'callback_data'=>"foydalanuvchi"]]
]])
]);
}}else{
bot('answerCallbackQuery',[
'callback_query_id'=>$qid,
'text'=>"Asosiy adminlarni blocklash mumkin emas!",
'show_alert'=>true,
]);
}}

if($text == "📢 Kanallar"){
if($cid == $guycoder){
bot('SendMessage',[
'chat_id'=>$guycoder,
'text'=>"<b>Quyidagilardan birini tanlang:</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🔐 Majburiy obunalar",'callback_data'=>"majburiy"]],
[['text'=>"*⃣ Qo'shimcha kanallar",'callback_data'=>"qoshimcha"]],
[['text'=>"Yopish",'callback_data'=>"yopish"]]
]])
]);
}}

if($data == "kanallar"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>Quyidagilardan birini tanlang:</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🔐 Majburiy obunalar",'callback_data'=>"majburiy"]],
[['text'=>"*⃣ Qo'shimcha kanallar",'callback_data'=>"qoshimcha"]],
[['text'=>"Yopish",'callback_data'=>"yopish"]]
]])
]);
}

if($data == "majburiy"){
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"<b>Kuting...</b>",
'parse_mode'=>'html',
]);
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2 + 1,
'text'=>"<b>Kuting...</b>",
'parse_mode'=>'html',
]);
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"<b>Majburiy obunalarni sozlash bo'limidasiz:</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"➕ Qo'shish",'callback_data'=>"qoshish"]],
[['text'=>"📑 Ro'yxat",'callback_data'=>"royxat"],['text'=>"🗑 O'chirish",'callback_data'=>"ochirish"]],
[['text'=>"◀️ Orqaga",'callback_data'=>"kanallar"]]
]])
]);
}

if($data == "qoshish"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>Kanalingiz userini kiriting:

Namuna:</b> @ORGBuilder",
'parse_mode'=>'html',
'reply_markup'=>$boshqarish,
]);
file_put_contents("step/$cid2.step","qo'shish");
}

if($step == "qo'shish"){
if($tx=="🗄 Boshqarish"){
unlink("step/$cid.step");
}else{
if($cid == $guycoder){
if(isset($text)){
if(mb_stripos($text, "@")!==false){
if($kanal == null){
file_put_contents("admin/kanal.txt",$text);
bot('SendMessage',[
'chat_id'=>$guycoder,
'text'=>"<b>$text - kanal qo'shildi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel
]);
unlink("step/$cid.step");
}else{
file_put_contents("admin/kanal.txt","$kanal\n$text");
bot('SendMessage',[
'chat_id'=>$guycoder,
'text'=>"<b>$text - kanal qo'shildi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel
]);
unlink("step/$cid.step");
}}else{
bot('SendMessage',[
'chat_id'=>$guycoder,
'text'=>"<b>Kanalingiz useri yuboring:

Namuna:</b> @ORGBuilder",
'parse_mode'=>'html',
]);
}}}}}

if($data == "ochirish"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>Kanallar o'chirildi</b>",
'parse_mode'=>'html',
]);
unlink("admin/kanal.txt");
}

if($data == "royxat"){
$soni = substr_count($kanal,"@");
if($kanal == null){
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"<b>Kuting...</b>",
'parse_mode'=>'html',
]);
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2 + 1,
'text'=>"<b>Kuting...</b>",
'parse_mode'=>'html',
]);
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"📂 <b>Kanallar ro'yxati bo'sh!</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"◀️ Orqaga",'callback_data'=>"majburiy"]],
]])
]);
}else{
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"<b>Kuting...</b>",
'parse_mode'=>'html',
]);
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2 + 1,
'text'=>"<b>Kuting...</b>",
'parse_mode'=>'html',
]);
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"<b>📢 Kanallar ro'yxati:</b>

$kanal

<b>Ulangan kanallar soni:</b> $soni ta",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"◀️ Orqaga",'callback_data'=>"majburiy"]],
]])
]);
}}

if($data == "qoshimcha"){
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"<b>Kuting...</b>",
'parse_mode'=>'html',
]);
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2 + 1,
'text'=>"<b>Kuting...</b>",
'parse_mode'=>'html',
]);
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"<b>Quyidagilardan birini tanlang:

Hozirgi holat:
To'lovlar uchun kanal:</b> $vazifa",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🆕️ To'lovlar uchun",'callback_data'=>"vazifa"]],
[['text'=>"◀️ Orqaga",'callback_data'=>"kanallar"]]
]])
]);
}

if($data == "vazifa"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>Kanalingiz userini kiriting:</b>",
'parse_mode'=>'html',
'reply_markup'=>$boshqarish,
]);
file_put_contents("step/$cid2.step","vazifa");
}

if($step == "vazifa" and $cid == $guycoder){
if($tx=="🗄 Boshqarish"){
unlink("step/$cid.step");
}else{
if(mb_stripos($text,"@")!==false){
$get = bot('getChat',[
'chat_id'=>$text
]);
$types = $get->result->type;
$ch_name = $get->result->title;
$ch_user = $get->result->username;
if(getAdmin($ch_user)== true){
file_put_contents("admin/vazifa.txt","@$ch_user");
bot('SendMessage',[
'chat_id'=>$guycoder,
'text'=>"<b>Muvaffaqiyatli o'zgartirildi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel
]);
unlink("step/$cid.step");
}else{
bot('SendMessage',[
'chat_id'=>$guycoder,
'text'=>"<b>Bot ushbu kanalda admin emas yoki noto'g'ri kanal manzili yuborildi!</b>",
'parse_mode'=>'html',
]);
}}else{
bot('SendMessage',[
'chat_id'=>$guycoder,
'text'=>"⚠️ <b>Kanal manzili kiritishda xatolik!</b>

Qayta urinib ko'ring:",
'parse_mode'=>'html',
]);
}}}

$delturi=file_get_contents("number/turi.txt");
$delmore = explode("\n",$delturi);
$delsoni = substr_count($delturi,"\n");
$key=[];
for ($delfor = 1; $delfor <= $delsoni; $delfor++) {
$title=str_replace("\n","",$delmore[$delfor]);
$key[]=["text"=>"$title - ni o'chirish","callback_data"=>"del-$title"];
$keyboard2 = array_chunk($key, 1);
$keyboard2[] = [['text'=>"➕ To'lov tizimi qo'shish",'callback_data'=>"new"]];
$pay = json_encode([
'inline_keyboard'=>$keyboard2,
]);
}

if($text == "💳 To'lov tizimi" and $cid==$guycoder){
if($turi == null){
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Quyidagilardan birini tanlang:</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"➕ To'lov tizimi qo'shish",'callback_data'=>"new"]],
]])
]);
}else{
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Quyidagilardan birini tanlang:</b>",
'parse_mode'=>'html',
'reply_markup'=>$pay
]);
}}

if($data == "hamyon"){
if($turi == null){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>Quyidagilardan birini tanlang:</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"➕ To'lov tizimi qo'shish",'callback_data'=>"new"]],
]])
]);
}else{
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>Quyidagilardan birini tanlang:</b>",
'parse_mode'=>'html',
'reply_markup'=>$pay
]);
}}

if(mb_stripos($data,"del-")!==false){
$ex = explode("-",$data);
$tur = $ex[1];
$k = str_replace("\n".$tur."","",$turi);
file_put_contents("number/turi.txt",$k);
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"<b>Kuting...</b>",
'parse_mode'=>'html',
]);
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2 + 1,
'text'=>"<b>Kuting...</b>",
'parse_mode'=>'html',
]);
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"$tur - <b>To'lov tizimi olib tashlandi.</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"◀️ Orqaga",'callback_data'=>"hamyon"]],
]])
]);
}

if($data == "new"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('sendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>Yangi to'lov tizimi nomini yuboring:</b>",
'parse_mode'=>'html',
'reply_markup'=>$boshqarish
]);
file_put_contents("step/$cid2.step",'turi');
}

if($step == "turi"){
if($tx=="🗄 Boshqarish"){
unlink("step/$cid.step");
}else{
if($cid == $guycoder){
if(isset($text)){
file_put_contents("number/turi.txt","$turi\n$text");
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Yangi to'lov tizimi qo'shildi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
unlink("step/$cid.step");
}}}}

if($text == "📨 Xabarnoma" and $cid==$guycoder){
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Yuboriladigan xabar turini tanlang;</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"Oddiy xabar",'callback_data'=>"send"],['text'=>"Forward xabar",'callback_data'=>"forsend"]],
[['text'=>"Foydalanuvchiga xabar",'callback_data'=>"user"]],
]])
]);
}

if($data == "user"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>Foydalanuvchi iD raqamini kiriting:</b>",
'parse_mode'=>'html',
'reply_markup'=>$boshqarish,
]);
file_put_contents("step/$cid2.step",'user');
}

if($step == "user"){
if($tx=="🗄 Boshqarish"){
unlink("step/$cid.step");
}else{
if($cid == $guycoder){
if(is_numeric($text)=="true"){
file_put_contents("step/pulbot.txt",$text);
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Xabaringizni kiriting:</b>",
'parse_mode'=>'html',
]);
file_put_contents("step/$cid.step",'xabar');
}else{
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Faqat raqamlardan foydalaning!</b>",
'parse_mode'=>'html',
]);
}}}}

if($step == "xabar"){
if($tx=="🗄 Boshqarish"){
unlink("step/$cid.step");
}else{
if($cid == $guycoder){
bot('SendMessage',[
'chat_id'=>$saved,
'text'=>"$text",
'parse_mode'=>'html',
'disable_web_page_preview'=>true,
]);
bot('SendMessage',[
'chat_id'=>$guycoder,
'text'=>"<b>Xabaringiz yuborildi ✅</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
unlink("step/$cid.step");
unlink("step/pulbot.txt");
}}}

if($data == "send"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"*Xabaringizni kiriting:*",
'parse_mode'=>"markdown",
'reply_markup'=>$boshqarish
]);
file_put_contents("step/$cid2.step","users");
}
if($step=="users"){
if($cid == $guycoder){
$lich = file_get_contents("azo.dat");
$lichka = explode("\n",$lich);
foreach($lichka as $lichkalar){
$okuser=bot("sendmessage",[
'chat_id'=>$lichkalar,
'text'=>$text,
'parse_mode'=>'html',
'disable_web_page_preview'=>true,
]);
}}}
if($okuser){
bot("sendmessage",[
'chat_id'=>$guycoder,
'text'=>"<b>Hammaga yuborildi ✅</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel
]);
unlink("step/$cid.step");
}

if($data == "forsend"){
$lich=substr_count($user_id,"\n");
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('sendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>$lich ta foydalanuvchiga yuboriladigan forward xabarni yuboring:</b>",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🗄 Boshqarish"]],
]])
]);
file_put_contents("step/$cid2.step","forward");
}
if($step=="forward"){
if($tx=="🗄 Boshqarish"){
unlink("step/$cid.step");
}else{
if(in_array($cid,$guycoder)){
$lich=substr_count($user_id,"\n");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"<b>$lich ta foydalanuvchiga xabar yuborish boshlandi!</b>",
'parse_mode'=>"html",
'reply_markup'=>$panel,
]);
$lichka = explode("\n",$user_id);
foreach($lichka as $lichkalar){
$fors=bot("forwardMessage",[
'from_chat_id'=>$cid,
'chat_id'=>$lichkalar,
'message_id'=>$mid,
]);
unlink("step/$cid.step");
}}}}
if($fors){
$lich=substr_count($user_id,"\n");
bot("sendmessage",[
'chat_id'=>$cid,
'text'=>"<b>$lich ta foydalanuvchiga muvaffaqiyatli yuborildi</b>",
'parse_mode'=>'html',
]);
unlink("step/$cid.step");
}

if($text == "📊 Statistika" and $cid==$guycoder){
$baza = file_get_contents("azo.dat");
$obsh = substr_count($baza,"\n");
$load = sys_getloadavg();
bot('SendMessage',[
'chat_id'=>$guycoder,
'text'=>"<b>💡 O'rtacha yuklanish:</b> <code>$load[0]</code>

👥 <b>Foydalanuvchilar: $obsh ta</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"Yopish",'callback_data'=>"yopish"]]
]])
]);
}

if($text == "⚙ Asosiy sozlamalar"){
if($cid == $guycoder){
bot('SendMessage',[
'chat_id'=>$guycoder,
'text'=>"<b>Quyidagilardan birini tanlamg:</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"📑 Hozirgi holat",'callback_data'=>"holat"]],
[['text'=>"🔗 Taklif narxi",'callback_data'=>"taklif"],['text'=>"💶 Valyuta",'callback_data'=>"valyuta"]],
[['text'=>"💵 Minimal pul yechish narxi",'callback_data'=>"narx"]],
[['text'=>"📎 Admin useri",'callback_data'=>"admin"],['text'=>"Yopish",'callback_data'=>"yopish"]]
]])
]);
}}

///

if($callbackdata=="rus"){
if((joinchat($from_id)=="true") and (phonenumber($from_id)=="true") and ($banid==false)){
$j=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=prices&product=qiwiwallet"),1);
$j2=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=prices&product=telegram"),1);
$j3=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=prices&product=pubg"),1);
$j4=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=prices&product=google"),1);
$j5=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=prices&product=instagram"),1);
$j6=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=prices&product=tiktok"),1);
$j7=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=prices&product=facebook"),1);
$qi_c=$j['qiwiwallet']['russia']['beeline']['count'];
$tg_c=$j2['telegram']['russia']['mts']['count'];
$pb_c=$j3['pubg']['russia']['beeline']['count'];
$go_c=$j4['google']['russia']['beeline']['count'];
$in_c=$j5['instagram']['russia']['beeline']['count'];
$tt_c=$j6['tiktok']['russia']['beeline']['count'];
$ff_c=$j7['facebook']['russia']['beeline']['count'];
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
Tarmoqlarni tanlang:
🛎Telegram - $tg_c -ta
🛎Instagram - $in_c -ta
🛎QIWl - $qi_c -ta
🛎Google -$go_c -ta
🛎Pubg - $pb_c-ta
🛎TikTok - $tt_c-ta
🛎Facebook- $ff_c-ta
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>" 📲 Telegram 25-₽",'callback_data'=>"ru_tg"],['text'=>"🥝 Qiwi 15-₽",'callback_data'=>"ru_qiwi"]],
[['text'=>" 📭  Google 10-₽",'callback_data'=>"ru_gogle"],['text'=>"❤️ Instagram 15-₽",'callback_data'=>"ru_insta"]],
[['text'=>" 🎮 Pubg 15-₽",'callback_data'=>"ru_pubg"],['text'=>"🧡 TikTok 10-₽",'callback_data'=>"ru_tiktok"]],
[['text'=>"🧡 Facebook 20-₽",'callback_data'=>"ru_face"]],
]
]),
]);
}
}
if($callbackdata=="uzb"){
if((joinchat($from_id)=="true") and (phonenumber($from_id)=="true") and ($banid==false)){
$j=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=prices&product=qiwiwallet"),1);
$j2=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=prices&product=imo"),1);
$j4=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=prices&product=google"),1);
$j5=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=prices&product=instagram"),1);
$j6=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=prices&product=tiktok"),1);
$j7=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=prices&product=facebook"),1);
$qi_c=$j['qiwiwallet']['uzbekistan']['virtual21']['count'];
$fc_c=$j7['facebook']['uzbekistan']['virtual23']['count'];
$im_c=$j2['imo']['uzbekistan']['virtual21']['count'];
$go_c=$j4['google']['uzbekistan']['virtual18']['count'];
$in_c=$j5['instagram']['uzbekistan']['virtual23']['count'];
$tt_c=$j6['tiktok']['uzbekistan']['virtual18']['count'];
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
Tarmoqlarni tanlang:
🛎Imo- $im_c -ta
🛎Instagram - $in_c -ta
🛎QIWl - $qi_c -ta
🛎Google -$go_c -ta
🛎Facebook - $fc_c-ta
🛎TikTok - $tt_c-ta
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>" 📲 imo 25-₽",'callback_data'=>"uz_imo"],['text'=>"🥝 Qiwi 35-₽",'callback_data'=>"uz_qiwi"]],
[['text'=>" 📭  Google 45-₽",'callback_data'=>"uz_gogle"],['text'=>"❤️ Instagram 35-₽",'callback_data'=>"uz_insta"]],
[['text'=>"💙 Facebook 55-₽",'callback_data'=>"uz_face"],['text'=>"🧡 TikTok 25-₽",'callback_data'=>"uz_tiktok"]],
]
]),
]);
}
}

if($callbackdata=="chin"){
if((joinchat($from_id)=="true") and (phonenumber($from_id)=="true") and ($banid==false)){
$j4=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=prices&product=google"),1);
$j5=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=prices&product=instagram"),1);
$j6=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=prices&product=tiktok"),1);
$j7=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=prices&product=facebook"),1);
$j8=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=prices&product=telegram"),1);
$fc_c=$j7['facebook']['china']['virtual4']['count'];
$go_c=$j4['google']['china']['virtual4']['count'];
$in_c=$j5['instagram']['china']['virtual4']['count'];
$tt_c=$j6['tiktok']['china']['virtual4']['count'];
$tg_c=$j8['telegram']['china']['virtual4']['count'];
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
Tarmoqlarni tanlang:
🛎Telegram- $tg_c -ta
🛎Instagram - $in_c -ta
🛎Google -$go_c -ta
🛎Facebook - $fc_c-ta
🛎TikTok - $tt_c-ta
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"📲 Telegram 30-₽",'callback_data'=>"chin_tg"]],
[['text'=>" 📭 Google 25-₽",'callback_data'=>"chin_gogle"],['text'=>"❤️ Instagram 30-₽",'callback_data'=>"chin_insta"]],
[['text'=>"💙 Facebook 25-₽",'callback_data'=>"chin_face"],['text'=>"🧡 TikTok 25-₽",'callback_data'=>"chin_tiktok"]],
]
]),
]);
}
}

if($callbackdata=="rus"){
if((joinchat($from_id)=="true") and (phonenumber($from_id)=="true") and ($banid==false)){
$j=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=prices&product=qiwiwallet"),1);
$j2=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=prices&product=telegram"),1);
$j3=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=prices&product=pubg"),1);
$j4=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=prices&product=google"),1);
$j5=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=prices&product=instagram"),1);
$j6=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=prices&product=tiktok"),1);
$j7=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=prices&product=facebook"),1);
$qi_c=$j['qiwiwallet']['poland']['virtual26']['count'];
$tg_c=$j2['telegram']['poland']['virtual26']['count'];
$pb_c=$j3['pubg']['poland']['virtual26']['count'];
$go_c=$j4['google']['poland']['virtual26']['count'];
$in_c=$j5['instagram']['poland']['virtual26']['count'];
$tt_c=$j6['tiktok']['poland']['virtual26']['count'];
$ff_c=$j7['facebook']['poland']['virtual26']['count'];
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
Tarmoqlarni tanlang:
🛎Telegram - $tg_c -ta
🛎Instagram - $in_c -ta
🛎QIWl - $qi_c -ta
🛎Google -$go_c -ta
🛎Pubg - $pb_c-ta
🛎TikTok - $tt_c-ta
🛎Facebook- $ff_c-ta
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>" 📲 Telegram 20-₽",'callback_data'=>"po_tg"],['text'=>"🥝 Qiwi 20-₽",'callback_data'=>"po_qiwi"]],
[['text'=>" 📭  Google 15-₽",'callback_data'=>"po_gogle"],['text'=>"❤️ Instagram 20-₽",'callback_data'=>"po_insta"]],
[['text'=>"🧡 Facebook 20-₽",'callback_data'=>"po_face"]],
]
]),
]);
}
}

if($callbackdata=="chin_insta" and $status=="on" and (phonenumber($from_id)!=="true") and (joinchat($from_id)!=="true") and ($banid==false)){
if($sumid>=20){
$tg_rue=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=number&country=china&product=instagram"),1);
$tg_ru_phone=$tg_rue['phone'];
$tg_ru_id=$tg_rue['id'];
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
📞 Raqam olindi
📱Tarmoq: Instagram
🔢 Raqamingiz: `$tg_ru_phone`
🆔 Buyurtma id `$tg_ru_id`

⚠️ Diqqat 10-daqiqa ichida kodni olmasangiz raqamni bekor qiling 
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Kodni olish",'callback_data'=>"on=code=$tg_ru_id"]],
[['text'=>"🚫 Bekor qilish",'callback_data'=>"off=cancel=$tg_ru_id=15"]],
[['text'=>"📛 Ban",'callback_data'=>"ban=ban=$tg_ru_id=15"]],
]
]),
]);
$sumid = file_get_contents("getsim/$chat_id.pul");
$sumid-=20;
file_put_contents("getsim/$chat_id.pul",$sumid);
}else{
getsim("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>"Hisobingizda pul yo‘q 20-₽",
"show_alert"=>true,
]);
}
}

if($callbackdata=="vit"){
if((joinchat($from_id)=="true") and (phonenumber($from_id)=="true") and ($banid==false)){
$j=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=prices&product=qiwiwallet"),1);
$j2=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=prices&product=imo"),1);
$j4=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=prices&product=google"),1);
$j5=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=prices&product=instagram"),1);
$j6=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=prices&product=tiktok"),1);
$j7=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=prices&product=facebook"),1);
$j8=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=prices&product=telegram"),1);
$qi_c=$j['qiwiwallet']['vietnam']['virtual25']['count'];
$fc_c=$j7['facebook']['vietnam']['virtual16']['count'];
$im_c=$j2['imo']['vietnam']['virtual16']['count'];
$go_c=$j4['google']['vietnam']['virtual18']['count'];
$in_c=$j5['instagram']['vietnam']['virtual16']['count'];
$tt_c=$j6['tiktok']['vietnam']['virtual16']['count'];
$tg_c=$j8['telegram']['vietnam']['virtual17']['count'];
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
Tarmoqlarni tanlang:
🛎Telegram- $tg_c -ta
🛎Imo- $im_c -ta
🛎Instagram - $in_c -ta
🛎QIWl - $qi_c -ta
🛎Google -$go_c -ta
🛎Facebook - $fc_c-ta
🛎TikTok - $tt_c-ta
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"📲 Telegram 25-₽",'callback_data'=>"vit_tg"]],
[['text'=>" 📲 Imo 20-₽",'callback_data'=>"vit_imo"],['text'=>"🥝 Qiwi 20-₽",'callback_data'=>"vit_qiwi"]],
[['text'=>" 📭 Google 30-₽",'callback_data'=>"vit_gogle"],['text'=>"❤️ Instagram 25-₽",'callback_data'=>"vit_insta"]],
[['text'=>"💙 Facebook 20-₽",'callback_data'=>"vit_face"],['text'=>"🧡 TikTok 20-₽",'callback_data'=>"vit_tiktok"]],
]
]),
]);
}
}

if($callbackdata=="chin_tg" and $status=="on" and (phonenumber($from_id)!=="true") and (joinchat($from_id)!=="true") and ($banid==false)){
if($sumid>=30){
$tg_rue=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=number&country=china&product=telegram"),1);
$tg_ru_phone=$tg_rue['phone'];
$tg_ru_id=$tg_rue['id'];
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
📞 Raqam olindi
📱Tarmoq: Telegram
🔢 Raqamingiz: `$tg_ru_phone`
🆔 Buyurtma id `$tg_ru_id`

⚠️ Diqqat 10-daqiqa ichida kodni olmasangiz raqamni bekor qiling 
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Kodni olish",'callback_data'=>"on=code=$tg_ru_id"]],
[['text'=>"🚫 Bekor qilish",'callback_data'=>"off=cancel=$tg_ru_id=19"]],
[['text'=>"📛 Ban",'callback_data'=>"ban=ban=$tg_ru_id=19"]],
]
]),
]);
$sumid = file_get_contents("getsim/$chat_id.pul");
$sumid-=30;
file_put_contents("getsim/$chat_id.pul",$sumid);
}else{
getsim("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>"Hisobingizda 30 Rubl yoq",
"show_alert"=>true,
]);
}
}

if($callbackdata=="vit_insta" and $status=="on" and (phonenumber($from_id)!=="true") and (joinchat($from_id)!=="true") and ($banid==false)){
if($sumid>=25){
$tg_rue=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=number&country=vietnam&product=instagram"),1);
$tg_ru_phone=$tg_rue['phone'];
$tg_ru_id=$tg_rue['id'];
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
📞 Raqam olindi
📱Tarmoq: Instagram
🔢 Raqamingiz: `$tg_ru_phone`
🆔 Buyurtma id `$tg_ru_id`

⚠️ Diqqat 10-daqiqa ichida kodni olmasangiz raqamni bekor qiling 
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Kodni olish",'callback_data'=>"on=code=$tg_ru_id"]],
[['text'=>"🚫 Bekor qilish",'callback_data'=>"off=cancel=$tg_ru_id=15"]],
[['text'=>"📛 Ban",'callback_data'=>"ban=ban=$tg_ru_id=15"]],
]
]),
]);
$sumid = file_get_contents("getsim/$chat_id.pul");
$sumid-=25;
file_put_contents("getsim/$chat_id.pul",$sumid);
}else{
getsim("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>"Hisobingizda 25 Rubl yoq",
"show_alert"=>true,
]);
}
}

if($callbackdata=="vit_face" and $status=="on" and (phonenumber($from_id)!=="true") and (joinchat($from_id)!=="true") and ($banid==false)){
if($sumid>=20){
$tg_rue=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=number&country=vietnam&product=facebook"),1);
$tg_ru_phone=$tg_rue['phone'];
$tg_ru_id=$tg_rue['id'];
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
📞 Raqam olindi
📱Tarmoq: Facebook
🔢 Raqamingiz: `$tg_ru_phone`
🆔 Buyurtma id `$tg_ru_id`

⚠️ Diqqat 10-daqiqa ichida kodni olmasangiz raqamni bekor qiling 
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Kodni olish",'callback_data'=>"on=code=$tg_ru_id"]],
[['text'=>"🚫 Bekor qilish",'callback_data'=>"off=cancel=$tg_ru_id=10"]],
[['text'=>"📛 Ban",'callback_data'=>"ban=ban=$tg_ru_id=10"]],
]
]),
]);
$sumid = file_get_contents("getsim/$chat_id.pul");
$sumid-=20;
file_put_contents("getsim/$chat_id.pul",$sumid);
}else{
getsim("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>"Hisobingizda 20 Rubl yoq",
"show_alert"=>true,
]);
}
}

if($callbackdata=="vit_gogle" and $status=="on" and (phonenumber($from_id)!=="true") and (joinchat($from_id)!=="true") and ($banid==false)){
if($sumid>=30){
$tg_rue=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=number&country=vietnam&product=google"),1);
$tg_ru_phone=$tg_rue['phone'];
$tg_ru_id=$tg_rue['id'];
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
📞 Raqam olindi
📱Tarmoq: Google
🔢 Raqamingiz: `$tg_ru_phone`
🆔 Buyurtma id `$tg_ru_id`

⚠️ Diqqat 10-daqiqa ichida kodni olmasangiz raqamni bekor qiling 
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Kodni olish",'callback_data'=>"on=code=$tg_ru_id"]],
[['text'=>"🚫 Bekor qilish",'callback_data'=>"off=cancel=$tg_ru_id=20"]],
[['text'=>"📛 Ban",'callback_data'=>"ban=ban=$tg_ru_id=20"]],
]
]),
]);
$sumid = file_get_contents("getsim/$chat_id.pul");
$sumid-=30;
file_put_contents("getsim/$chat_id.pul",$sumid);
}else{
getsim("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>"Hisobingizda 30 Rubl yoq",
"show_alert"=>true,
]);
}
}

if($callbackdata=="vit_qiwi" and $status=="on" and (phonenumber($from_id)!=="true") and (joinchat($from_id)!=="true") and ($banid==false)){
if($sumid>=20){
$tg_rue=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=number&country=vietnam&product=qiwiwallet"),1);
$tg_ru_phone=$tg_rue['phone'];
$tg_ru_id=$tg_rue['id'];
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
📞 Raqam olindi
📱Tarmoq: Qiwi
🔢 Raqamingiz: `$tg_ru_phone`
🆔 Buyurtma id `$tg_ru_id`

⚠️ Diqqat 10-daqiqa ichida kodni olmasangiz raqamni bekor qiling 
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Kodni olish",'callback_data'=>"on=code=$tg_ru_id"]],
[['text'=>"🚫 Bekor qilish",'callback_data'=>"off=cancel=$tg_ru_id=13"]],
[['text'=>"📛 Ban",'callback_data'=>"ban=ban=$tg_ru_id=13"]],
]
]),
]);
$sumid = file_get_contents("getsim/$chat_id.pul");
$sumid-=20;
file_put_contents("getsim/$chat_id.pul",$sumid);
}else{
getsim("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>"Hisobingizda 20 Rubl yoq",
"show_alert"=>true,
]);
}
}

if($callbackdata=="vit_tg" and $status=="on" and (phonenumber($from_id)!=="true") and (joinchat($from_id)!=="true") and ($banid==false)){
if($sumid>=25){
$tg_rue=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=number&country=vietnam&product=telegram"),1);
$tg_ru_phone=$tg_rue['phone'];
$tg_ru_id=$tg_rue['id'];
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
📞 Raqam olindi
📱Tarmoq: Telegram
🔢 Raqamingiz: `$tg_ru_phone`
🆔 Buyurtma id `$tg_ru_id`

⚠️ Diqqat 10-daqiqa ichida kodni olmasangiz raqamni bekor qiling 
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Kodni olish",'callback_data'=>"on=code=$tg_ru_id"]],
[['text'=>"🚫 Bekor qilish",'callback_data'=>"off=cancel=$tg_ru_id=15"]],
[['text'=>"📛 Ban",'callback_data'=>"ban=ban=$tg_ru_id=15"]],
]
]),
]);
$sumid = file_get_contents("getsim/$chat_id.pul");
$sumid-=25;
file_put_contents("getsim/$chat_id.pul",$sumid);
}else{
getsim("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>"Hisobingizda 25 Rubl yoq",
"show_alert"=>true,
]);
}
}

if($callbackdata=="vit_imo" and $status=="on" and (phonenumber($from_id)!=="true") and (joinchat($from_id)!=="true") and ($banid==false)){
if($sumid>=20){
$tg_rue=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=number&country=vietnam&product=imo"),1);
$tg_ru_phone=$tg_rue['phone'];
$tg_ru_id=$tg_rue['id'];
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
📞 Raqam olindi
📱Tarmoq: Imo
🔢 Raqamingiz: `$tg_ru_phone`
🆔 Buyurtma id `$tg_ru_id`

⚠️ Diqqat 10-daqiqa ichida kodni olmasangiz raqamni bekor qiling 
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Kodni olish",'callback_data'=>"on=code=$tg_ru_id"]],
[['text'=>"🚫 Bekor qilish",'callback_data'=>"off=cancel=$tg_ru_id=10"]],
[['text'=>"📛 Ban",'callback_data'=>"ban=ban=$tg_ru_id=10"]],
]
]),
]);
$sumid = file_get_contents("getsim/$chat_id.pul");
$sumid-=20;
file_put_contents("getsim/$chat_id.pul",$sumid);
}else{
getsim("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>"Hisobingizda 20 Rubl yoq",
"show_alert"=>true,
]);
}
}


if($callbackdata=="uz_tiktok" and $status=="on" and (phonenumber($from_id)!=="true") and (joinchat($from_id)!=="true") and ($banid==false)){
if($sumid>=25){
$tg_ruq=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=number&country=uzbekistan&product=tiktok"),1);
$tg_ru_phone=$tg_ruq['phone'];
$tg_ru_id=$tg_ruq['id'];
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
📞 Raqam olindi
📱Tarmoq: TikTok
🔢 Raqamingiz: `$tg_ru_phone`
🆔 Buyurtma id `$tg_ru_id`

⚠️ Diqqat 10-daqiqa ichida kodni olmasangiz raqamni bekor qiling 
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Kodni olish",'callback_data'=>"on=code=$tg_ru_id"]],
[['text'=>"🚫 Bekor qilish",'callback_data'=>"off=cancel=$tg_ru_id=15"]],
[['text'=>"📛 Ban",'callback_data'=>"ban=ban=$tg_ru_id=15"]],
]
]),
]);
$sumid = file_get_contents("getsim/$chat_id.pul");
$sumid-=25;
file_put_contents("getsim/$chat_id.pul",$sumid);
}else{
getsim("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>"Hisobingizda 25 Rubl yoq",
"show_alert"=>true,
]);
}
}

if($callbackdata=="uz_face" and $status=="on" and (phonenumber($from_id)!=="true") and (joinchat($from_id)!=="true") and ($banid==false)){
if($sumid>=55){
$tg_ruq=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=number&country=uzbekistan&product=facebook"),1);
$tg_ru_phone=$tg_ruq['phone'];
$tg_ru_id=$tg_ruq['id'];
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
📞 Raqam olindi
📱Tarmoq: Facebook
🔢 Raqamingiz: `$tg_ru_phone`
🆔 Buyurtma id `$tg_ru_id`

⚠️ Diqqat 10-daqiqa ichida kodni olmasangiz raqamni bekor qiling 
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Kodni olish",'callback_data'=>"on=code=$tg_ru_id"]],
[['text'=>"🚫 Bekor qilish",'callback_data'=>"off=cancel=$tg_ru_id=46"]],
[['text'=>"📛 Ban",'callback_data'=>"ban=ban=$tg_ru_id=46"]],
]
]),
]);
$sumid = file_get_contents("getsim/$chat_id.pul");
$sumid-=55;
file_put_contents("getsim/$chat_id.pul",$sumid);
}else{
getsim("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>"Hisobingizda 55 Rubl yoq",
"show_alert"=>true,
]);
}
}

if($callbackdata=="uz_insta" and $status=="on" and (phonenumber($from_id)!=="true") and (joinchat($from_id)!=="true") and ($banid==false)){
if($sumid>=35){
$tg_ruq=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=number&country=uzbekistan&product=instagram"),1);
$tg_ru_phone=$tg_ruq['phone'];
$tg_ru_id=$tg_ruq['id'];
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
📞 Raqam olindi
📱Tarmoq: Instagram
🔢 Raqamingiz: `$tg_ru_phone`
🆔 Buyurtma id `$tg_ru_id`

⚠️ Diqqat 10-daqiqa ichida kodni olmasangiz raqamni bekor qiling 
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Kodni olish",'callback_data'=>"on=code=$tg_ru_id"]],
[['text'=>"🚫 Bekor qilish",'callback_data'=>"off=cancel=$tg_ru_id=29"]],
[['text'=>"📛 Ban",'callback_data'=>"ban=ban=$tg_ru_id=29"]],
]
]),
]);
$sumid = file_get_contents("getsim/$chat_id.pul");
$sumid-=35;
file_put_contents("getsim/$chat_id.pul",$sumid);
}else{
getsim("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>"Hisobingizda 35 Rubl yoq",
"show_alert"=>true,
]);
}
}

if($callbackdata=="uz_gogle" and $status=="on" and (phonenumber($from_id)!=="true") and (joinchat($from_id)!=="true") and ($banid==false)){
if($sumid>=45){
$tg_ruq=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=number&country=uzbekistan&product=google"),1);
$tg_ru_phone=$tg_ruq['phone'];
$tg_ru_id=$tg_ruq['id'];
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
📞 Raqam olindi
📱Tarmoq: Google
🔢 Raqamingiz: `$tg_ru_phone`
🆔 Buyurtma id `$tg_ru_id`

⚠️ Diqqat 10-daqiqa ichida kodni olmasangiz raqamni bekor qiling 
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Kodni olish",'callback_data'=>"on=code=$tg_ru_id"]],
[['text'=>"🚫 Bekor qilish",'callback_data'=>"off=cancel=$tg_ru_id=39"]],
[['text'=>"📛 Ban",'callback_data'=>"ban=ban=$tg_ru_id=39"]],
]
]),
]);
$sumid = file_get_contents("getsim/$chat_id.pul");
$sumid-=45;
file_put_contents("getsim/$chat_id.pul",$sumid);
}else{
getsim("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>"Hisobingizda 45 Rubl yoq",
"show_alert"=>true,
]);
}
}

if($callbackdata=="uz_imo" and $status=="on" and (phonenumber($from_id)!=="true") and (joinchat($from_id)!=="true") and ($banid==false)){
if($sumid>=25){
$tg_ruq=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=number&country=uzbekistan&product=imo"),1);
$tg_ru_phone=$tg_ruq['phone'];
$tg_ru_id=$tg_ruq['id'];
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"📞 Raqam olindi
📱Tarmoq: Imo
🔢 Raqamingiz: `$tg_ru_phone`
🆔 Buyurtma id `$tg_ru_id`

⚠️ Diqqat 10-daqiqa ichida kodni olmasangiz raqamni bekor qiling 
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Kodni olish",'callback_data'=>"on=code=$tg_ru_id"]],
[['text'=>"🚫 Bekor qilish",'callback_data'=>"off=cancel=$tg_ru_id=18"]],
[['text'=>"📛 Ban",'callback_data'=>"ban=ban=$tg_ru_id=18"]],
]
]),
]);
$sumid = file_get_contents("getsim/$chat_id.pul");
$sumid-=25;
file_put_contents("getsim/$chat_id.pul",$sumid);
}else{
getsim("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>"Hisobingizda 25 Rubl yoq",
"show_alert"=>true,
]);
}
}

if($callbackdata=="uz_qiwi" and $status=="on" and (phonenumber($from_id)!=="true") and (joinchat($from_id)!=="true") and ($banid==false)){
if($sumid>=35){
$tg_ruq=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=number&country=uzbekistan&product=qiwiwallet"),1);
$tg_ru_phone=$tg_ruq['phone'];
$tg_ru_id=$tg_ruq['id'];
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"📞 Raqam olindi
📱Tarmoq: Qiwi
🔢 Raqamingiz: `$tg_ru_phone`
🆔 Buyurtma id `$tg_ru_id`

⚠️ Diqqat 10-daqiqa ichida kodni olmasangiz raqamni bekor qiling 
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Kodni olish",'callback_data'=>"on=code=$tg_ru_id"]],
[['text'=>"🚫 Bekor qilish",'callback_data'=>"off=cancel=$tg_ru_id=23"]],
[['text'=>"📛 Ban",'callback_data'=>"ban=ban=$tg_ru_id=23"]],
]
]),
]);
$sumid = file_get_contents("getsim/$chat_id.pul");
$sumid-=35;
file_put_contents("getsim/$chat_id.pul",$sumid);
}else{
getsim("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>"Hisobingizda 35 Rubl yoq",
"show_alert"=>true,
]);
}
}






if($callbackdata=="ru_tg" and $status=="on" and (phonenumber($from_id)!=="true") and (joinchat($from_id)!=="true") and ($banid==false)){
if($sumid>=25){
$tg_rue=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=number&country=russia&product=telegram"),1);
$tg_ru_phone=$tg_rue['phone'];
$tg_ru_id=$tg_rue['id'];
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"📞 Raqam olindi
📱Tarmoq: Telegram
🔢 Raqamingiz: `$tg_ru_phone`
🆔 Buyurtma id `$tg_ru_id`

⚠️ Diqqat 10-daqiqa ichida kodni olmasangiz raqamni bekor qiling 
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Kodni olish",'callback_data'=>"on=code=$tg_ru_id"]],
[['text'=>"🚫 Bekor qilish",'callback_data'=>"off=cancel=$tg_ru_id=17"]],
[['text'=>"📛 Ban",'callback_data'=>"ban=ban=$tg_ru_id=17"]],
]
]),
]);
$sumid = file_get_contents("getsim/$chat_id.pul");
$sumid-=25;
file_put_contents("getsim/$chat_id.pul",$sumid);
}else{
getsim("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>"Hisobingizda 25 Rubl yoq",
"show_alert"=>true,
]);
}
}

if($callbackdata=="ru_qiwi" and $status=="on" and (phonenumber($from_id)!=="true") and (joinchat($from_id)!=="true") and ($banid==false)){
if($sumid>=15){
$tg_rur=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=number&country=russia&product=qiwiwallet"),1);
$tg_ru_phone=$tg_rur['phone'];
$tg_ru_id=$tg_rur['id'];
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"📞 Raqam olindi
📱Tarmoq: Qiwi
🔢 Raqamingiz: `$tg_ru_phone`
🆔 Buyurtma id `$tg_ru_id`

⚠️ Diqqat 10-daqiqa ichida kodni olmasangiz raqamni bekor qiling 
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Kodni olish",'callback_data'=>"on=code=$tg_ru_id"]],
[['text'=>"🚫 Bekor qilish",'callback_data'=>"off=cancel=$tg_ru_id=11"]],
[['text'=>"📛 Ban",'callback_data'=>"ban=ban=$tg_ru_id=11"]],
]
]),
]);
$sumid = file_get_contents("getsim/$chat_id.pul");
$sumid-=15;
file_put_contents("getsim/$chat_id.pul",$sumid);
}else{
getsim("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>"Hisobingizda 15 Rubl yoq",
"show_alert"=>true,
]);
}
}

if($callbackdata=="ru_gogle" and $status=="on" and (phonenumber($from_id)!=="true") and (joinchat($from_id)!=="true") and ($banid==false)){
if($sumid>=10){
$tg_rut=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=number&country=russia&product=google"),1);
$tg_ru_phone=$tg_rut['phone'];
$tg_ru_id=$tg_rut['id'];
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"📞 Raqam olindi
📱Tarmoq: Google
🔢 Raqamingiz: `$tg_ru_phone`
🆔 Buyurtma id `$tg_ru_id`

⚠️ Diqqat 10-daqiqa ichida kodni olmasangiz raqamni bekor qiling 
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Kodni olish",'callback_data'=>"on=code=$tg_ru_id"]],
[['text'=>"🚫 Bekor qilish",'callback_data'=>"off=cancel=$tg_ru_id=7"]],
[['text'=>"📛 Ban",'callback_data'=>"ban=ban=$tg_ru_id=7"]],
]
]),
]);
$sumid = file_get_contents("getsim/$chat_id.pul");
$sumid-=10;
file_put_contents("getsim/$chat_id.pul",$sumid);
}else{
getsim("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>"Hisobingizda 10 Rubl yoq",
"show_alert"=>true,
]);
}
}

if($callbackdata=="ru_insta" and $status=="on" and (phonenumber($from_id)!=="true") and (joinchat($from_id)!=="true") and ($banid==false)){
if($sumid>=15){
$tg_ruy=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=number&country=russia&product=instagram"),1);
$tg_ru_phone=$tg_ruy['phone'];
$tg_ru_id=$tg_ruy['id'];
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"📞 Raqam olindi
📱Tarmoq: Instagram
🔢 Raqamingiz: `$tg_ru_phone`
🆔 Buyurtma id `$tg_ru_id`

⚠️ Diqqat 10-daqiqa ichida kodni olmasangiz raqamni bekor qiling 
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Kodni olish",'callback_data'=>"on=code=$tg_ru_id"]],
[['text'=>"🚫 Bekor qilish",'callback_data'=>"off=cancel=$tg_ru_id=7"]],
[['text'=>"📛 Ban",'callback_data'=>"ban=ban=$tg_ru_id=7"]],
]
]),
]);
$sumid = file_get_contents("getsim/$chat_id.pul");
$sumid-=15;
file_put_contents("getsim/$chat_id.pul",$sumid);
}else{
getsim("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>"Hisobingizda 15 Rubl yoq",
"show_alert"=>true,
]);
}
}

if($callbackdata=="ru_pubg" and $status=="on" and (phonenumber($from_id)!=="true") and (joinchat($from_id)!=="true") and ($banid==false)){
if($sumid>=15){
$tg_ruu=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=number&country=russia&product=pubg"),1);
$tg_ru_phone=$tg_ruu['phone'];
$tg_ru_id=$tg_ruu['id'];
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"📞 Raqam olindi
📱Tarmoq: Pubg
🔢 Raqamingiz: `$tg_ru_phone`
🆔 Buyurtma id `$tg_ru_id`

⚠️ Diqqat 10-daqiqa ichida kodni olmasangiz raqamni bekor qiling 
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Kodni olish",'callback_data'=>"on=code=$tg_ru_id"]],
[['text'=>"🚫 Bekor qilish",'callback_data'=>"off=cancel=$tg_ru_id=3"]],
[['text'=>"📛 Ban",'callback_data'=>"ban=ban=$tg_ru_id=3"]],
]
]),
]);
$sumid = file_get_contents("getsim/$chat_id.pul");
$sumid-=15;
file_put_contents("getsim/$chat_id.pul",$sumid);
}else{
getsim("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>"Hisobingizda 15 Rubl yoq",
"show_alert"=>true,
]);
}
}

if($callbackdata=="ru_tiktok" and $status=="on" and (phonenumber($from_id)!=="true") and (joinchat($from_id)!=="true") and ($banid==false)){
if($sumid>=10){
$tg_rui=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=number&country=russia&product=tiktok"),1);
$tg_ru_phone=$tg_rui['phone'];
$tg_ru_id=$tg_rui['id'];
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"📞 Raqam olindi
📱Tarmoq: TikTok
🔢 Raqamingiz: `$tg_ru_phone`
🆔 Buyurtma id `$tg_ru_id`

⚠️ Diqqat 10-daqiqa ichida kodni olmasangiz raqamni bekor qiling 
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Kodni olish",'callback_data'=>"on=code=$tg_ru_id"]],
[['text'=>"🚫 Bekor qilish",'callback_data'=>"off=cancel=$tg_ru_id=4"]],
[['text'=>"📛 Ban",'callback_data'=>"ban=ban=$tg_ru_id=4"]],
]
]),
]);
$sumid = file_get_contents("getsim/$chat_id.pul");
$sumid-=10;
file_put_contents("getsim/$chat_id.pul",$sumid);
}else{
getsim("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>"Hisobingizda 10 Rubl yoq",
"show_alert"=>true,
]);
}
}

if($callbackdata=="ru_face" and $status=="on" and (phonenumber($from_id)!=="true") and (joinchat($from_id)!=="true") and ($banid==false)){
if($sumid>=20){
$tg_ruq=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=number&country=russia&product=facebook"),1);
$tg_ru_phone=$tg_ruq['phone'];
$tg_ru_id=$tg_ruq['id'];
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
📞 Raqam olindi
📱Tarmoq: Facebook
🔢 Raqamingiz: `$tg_ru_phone`
🆔 Buyurtma id `$tg_ru_id`

⚠️ Diqqat 10-daqiqa ichida kodni olmasangiz raqamni bekor qiling 
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Kodni olish",'callback_data'=>"on=code=$tg_ru_id"]],
[['text'=>"🚫 Bekor qilish",'callback_data'=>"off=cancel=$tg_ru_id=10"]],
[['text'=>"📛 Ban",'callback_data'=>"ban=ban=$tg_ru_id=10"]],
]
]),
]);
$sumid = file_get_contents("getsim/$chat_id.pul");
$sumid-=20;
file_put_contents("getsim/$chat_id.pul",$sumid);
}else{
getsim("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>"Hisobingizda 20 Rubl yoq",
"show_alert"=>true,
]);
}
}

if($callbackdata=="po_insta" and $status=="on" and (phonenumber($from_id)!=="true") and (joinchat($from_id)!=="true") and ($banid==false)){
if($sumid>=20){
$tg_rue=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=number&country=vietnam&product=instagram"),1);
$tg_ru_phone=$tg_rue['phone'];
$tg_ru_id=$tg_rue['id'];
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
📞 Raqam olindi
📱Tarmoq: Instagram
🔢 Raqamingiz: `$tg_ru_phone`
🆔 Buyurtma id `$tg_ru_id`

⚠️ Diqqat 10-daqiqa ichida kodni olmasangiz raqamni bekor qiling 
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Kodni olish",'callback_data'=>"on=code=$tg_ru_id"]],
[['text'=>"🚫 Bekor qilish",'callback_data'=>"off=cancel=$tg_ru_id=15"]],
[['text'=>"📛 Ban",'callback_data'=>"ban=ban=$tg_ru_id=15"]],
]
]),
]);
$sumid = file_get_contents("getsim/$chat_id.pul");
$sumid-=20;
file_put_contents("getsim/$chat_id.pul",$sumid);
}else{
getsim("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>"Hisobingizda 20 Rubl yoq",
"show_alert"=>true,
]);
}
}

if($callbackdata=="po_face" and $status=="on" and (phonenumber($from_id)!=="true") and (joinchat($from_id)!=="true") and ($banid==false)){
if($sumid>=20){
$tg_rue=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=number&country=vietnam&product=facebook"),1);
$tg_ru_phone=$tg_rue['phone'];
$tg_ru_id=$tg_rue['id'];
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
📞 Raqam olindi
📱Tarmoq: Facebook
🔢 Raqamingiz: `$tg_ru_phone`
🆔 Buyurtma id `$tg_ru_id`

⚠️ Diqqat 10-daqiqa ichida kodni olmasangiz raqamni bekor qiling 
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Kodni olish",'callback_data'=>"on=code=$tg_ru_id"]],
[['text'=>"🚫 Bekor qilish",'callback_data'=>"off=cancel=$tg_ru_id=10"]],
[['text'=>"📛 Ban",'callback_data'=>"ban=ban=$tg_ru_id=10"]],
]
]),
]);
$sumid = file_get_contents("getsim/$chat_id.pul");
$sumid-=20;
file_put_contents("getsim/$chat_id.pul",$sumid);
}else{
getsim("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>"Hisobingizda 20 Rubl yoq",
"show_alert"=>true,
]);
}
}

if($callbackdata=="po_gogle" and $status=="on" and (phonenumber($from_id)!=="true") and (joinchat($from_id)!=="true") and ($banid==false)){
if($sumid>=15){
$tg_rue=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=number&country=vietnam&product=google"),1);
$tg_ru_phone=$tg_rue['phone'];
$tg_ru_id=$tg_rue['id'];
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
📞 Raqam olindi
📱Tarmoq: Google
🔢 Raqamingiz: `$tg_ru_phone`
🆔 Buyurtma id `$tg_ru_id`

⚠️ Diqqat 10-daqiqa ichida kodni olmasangiz raqamni bekor qiling 
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Kodni olish",'callback_data'=>"on=code=$tg_ru_id"]],
[['text'=>"🚫 Bekor qilish",'callback_data'=>"off=cancel=$tg_ru_id=20"]],
[['text'=>"📛 Ban",'callback_data'=>"ban=ban=$tg_ru_id=20"]],
]
]),
]);
$sumid = file_get_contents("getsim/$chat_id.pul");
$sumid-=15;
file_put_contents("getsim/$chat_id.pul",$sumid);
}else{
getsim("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>"Hisobingizda 15 Rubl yoq",
"show_alert"=>true,
]);
}
}

if($callbackdata=="po_qiwi" and $status=="on" and (phonenumber($from_id)!=="true") and (joinchat($from_id)!=="true") and ($banid==false)){
if($sumid>=20){
$tg_rue=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=number&country=vietnam&product=qiwiwallet"),1);
$tg_ru_phone=$tg_rue['phone'];
$tg_ru_id=$tg_rue['id'];
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
📞 Raqam olindi
📱Tarmoq: Qiwi
🔢 Raqamingiz: `$tg_ru_phone`
🆔 Buyurtma id `$tg_ru_id`

⚠️ Diqqat 10-daqiqa ichida kodni olmasangiz raqamni bekor qiling 
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Kodni olish",'callback_data'=>"on=code=$tg_ru_id"]],
[['text'=>"🚫 Bekor qilish",'callback_data'=>"off=cancel=$tg_ru_id=13"]],
[['text'=>"📛 Ban",'callback_data'=>"ban=ban=$tg_ru_id=13"]],
]
]),
]);
$sumid = file_get_contents("getsim/$chat_id.pul");
$sumid-=20;
file_put_contents("getsim/$chat_id.pul",$sumid);
}else{
getsim("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>"Hisobingizda 20 Rubl yoq",
"show_alert"=>true,
]);
}
}

if($callbackdata=="po_tg" and $status=="on" and (phonenumber($from_id)!=="true") and (joinchat($from_id)!=="true") and ($banid==false)){
if($sumid>=20){
$tg_rue=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=number&country=vietnam&product=telegram"),1);
$tg_ru_phone=$tg_rue['phone'];
$tg_ru_id=$tg_rue['id'];
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
📞 Raqam olindi
📱Tarmoq: Telegram
🔢 Raqamingiz: `$tg_ru_phone`
🆔 Buyurtma id `$tg_ru_id`

⚠️ Diqqat 10-daqiqa ichida kodni olmasangiz raqamni bekor qiling 
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Kodni olish",'callback_data'=>"on=code=$tg_ru_id"]],
[['text'=>"🚫 Bekor qilish",'callback_data'=>"off=cancel=$tg_ru_id=15"]],
[['text'=>"📛 Ban",'callback_data'=>"ban=ban=$tg_ru_id=15"]],
]
]),
]);
$sumid = file_get_contents("getsim/$chat_id.pul");
$sumid-=20;
file_put_contents("getsim/$chat_id.pul",$sumid);
}else{
getsim("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>"Hisobingizda 20 Rubl yoq",
"show_alert"=>true,
]);
}
}



























if((stripos($callbackdata,"ban=")!==false)){
if((joinchat($from_id)=="true") and (phonenumber($from_id)=="true") and ($banid==false)){
$act=explode("=",$callbackdata)[3];
$c=explode("=",$callbackdata)[2];
$can=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=ban&id=$c"),1);
$sumid = file_get_contents("getsim/$chat_id.pul");
$sumid+=$act;
file_put_contents("getsim/$chat_id.pul",$sumid);
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
🖥 Holat: ".$can['status']."
📛 Ban qilindi
💳 Hisobingizga qaytarildi: $act  Rubl",
'reply_markup'=>$servis,
]);
}
}

if((stripos($callbackdata,"off=")!==false)){
if((joinchat($from_id)=="true") and (phonenumber($from_id)=="true") and ($banid==false)){
$act=explode("=",$callbackdata)[3];
$c=explode("=",$callbackdata)[2];
$can=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=cancel&id=$c"),1);
$sumid = file_get_contents("getsim/$chat_id.pul");
$sumid+=$act;
file_put_contents("getsim/$chat_id.pul",$sumid);
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
🖥 Holat: ".$can['status']."
🚫 Bekor qilindi
💳 Hisobingizga qaytarildi: $act  Rubl",
'reply_markup'=>$servis,
]);
}
}

if((stripos($callbackdata,"on=")!==false and (phonenumber($from_id)!=="true") and (joinchat($from_id)!=="true") and ($banid==false))){
$c=explode("=",$callbackdata)[2];
$can=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=code&id=$c"),1);
$cod=$can['sms'][0]['text'];
if($cod!=null){
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
🖥 Kod: ".$cod."",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Kodni qayta olish",'callback_data'=>"on2=code=$c"]],
]
]),
]);
}else{
getsim("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>"Kod kelmadi kuting $c ".$cod."",
"show_alert"=>true,
]);
}
}

if((stripos($callbackdata,"on2=")!==false and (phonenumber($from_id)!=="true") and (joinchat($from_id)!=="true") and ($banid==false))){
$c=explode("=",$callbackdata)[2];
$can=json_decode(file_get_contents("https://u8143.xvest5.ru/sms/index.php?act=code&id=$c"),1);
$cod=$can['sms'][1]['text'];
if($cod!=null){
getsim('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
🖥 Kod: ".$cod."",
]);
}else{
getsim("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>"Kod kelmadi kuting $c ".$cod."",
"show_alert"=>true,
]);
}
}


if($data == "asosiy"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>Quyidagilardan birini tanlamg:</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"📑 Hozirgi holat",'callback_data'=>"holat"]],
[['text'=>"🔗 Taklif narxi",'callback_data'=>"taklif"],['text'=>"💶 Valyuta",'callback_data'=>"valyuta"]],
[['text'=>"💵 Minimal pul yechish narxi",'callback_data'=>"narx"]],
[['text'=>"📎 Admin useri",'callback_data'=>"admin"],['text'=>"Yopish",'callback_data'=>"yopish"]]
]])
]);
}

if($data == "holat"){
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"<b>Hozirgi holat:

1. Valyuta:</b> $valyuta
<b>2. Taklif narxi:</b> $taklif $valyuta
<b>3. Pul yechish narxi:</b> $narx $valyuta
<b>4. Admin useri:</b> $user",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"◀️ Orqaga",'callback_data'=>"asosiy"]]
]])
]);
}

if($data == "taklif"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>Taklif narxini yuboring:</b>",
'parse_mode'=>'html',
'reply_markup'=>$boshqarish,
]);
file_put_contents("step/$cid2.step","taklifpul");
}

if($step == "taklifpul"){
if($tx=="🗄 Boshqarish"){
unlink("step/$cid.step");
}else{
if($cid == $guycoder){
if(isset($text)){
file_put_contents("admin/taklif.txt",$text);
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Muvaffaqiyatli o'zgartirildi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
unlink("step/$cid.step");
}}}}

if($data == "valyuta"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>Pul birligini yuboring:</b>",
'parse_mode'=>'html',
'reply_markup'=>$boshqarish,
]);
file_put_contents("step/$cid2.step","valyuta");
}

if($step == "valyuta"){
if($tx=="🗄 Boshqarish"){
unlink("step/$cid.step");
}else{
if($cid == $guycoder){
if(isset($text)){
file_put_contents("admin/valyuta.txt",$text);
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Muvaffaqiyatli o'zgartirildi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
unlink("step/$cid.step");
}}}}

if($data == "narx"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>Minimal pul yechish narxini yuboring:</b>",
'parse_mode'=>'html',
'reply_markup'=>$boshqarish,
]);
file_put_contents("step/$cid2.step","narx");
}

if($step == "narx"){
if($tx=="🗄 Boshqarish"){
unlink("step/$cid.step");
}else{
if($cid == $guycoder){
if(isset($text)){
file_put_contents("admin/narx.txt",$text);
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Muvaffaqiyatli o'zgartirildi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
unlink("step/$cid.step");
}}}}

if($data == "admin"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>Admin userini yuboring:</b>",
'parse_mode'=>'html',
'reply_markup'=>$boshqarish,
]);
file_put_contents("step/$cid2.step","admin-user");
}

if($step == "admin-user"){
if($tx=="🗄 Boshqarish"){
unlink("step/$cid.step");
}else{
if($cid == $guycoder){
if(isset($text)){
file_put_contents("admin/user.txt",$text);
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Muvaffaqiyatli o'zgartirildi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
unlink("step/$cid.step");
}}}}

if($text == "🎛 Tugmalar" and $cid == $guycoder){
bot('SendMessage',[
'chat_id'=>$guycoder,
'text'=>"<b>Tugma kodini kiriting:</b>",
'parse_mode'=>'html',
'reply_markup'=>$boshqarish,
]);
file_put_contents("step/$cid.step","tugma-kodi");
}

if($step == "tugma-kodi" and $cid == $guycoder){
if($tx=="🗄 Boshqarish"){
unlink("step/$cid.step");
}else{
if(file_exists("tugma/$text.txt")){
file_put_contents("step/tugma.txt",$text);
bot('SendMessage',[
'chat_id'=>$guycoder,
'text'=>"<pre>$text</pre> <b>qabul qilindi.</b>

<i>Ushbu kod uchun qiymatni kiriting:</i>",
'parse_mode'=>'html',
]);
file_put_contents("step/$cid.step",'tugma-qiymat');
}else{
bot('SendMessage',[
'chat_id'=>$guycoder,
'text'=>"<b>Mavjud bo'lmagan kod tugma kodini kiritdingiz!</b>

<i><a href='$shaxsiy'>Qo'llanmada</a> ko'rsatilgan kodlardan foydalaning:</i>",
'parse_mode'=>'html',
'disable_web_page_preview'=>true,
]);
}}}

if($step=="tugma-qiymat" and $cid == $guycoder){
if($tx=="🗄 Boshqarish"){
unlink("step/$cid.step");
}else{
file_put_contents("tugma/$tugma.txt",$text);
bot('SendMessage',[
'chat_id'=>$guycoder,
'text'=>"<b>O'zgartirish yakunlandi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
unlink("step/$cid.step");
unlink("step/tugma.txt");
}}

//oyin sozlama
if($text == "🎮 O'yin Sozlamalari"){
if($cid == $guycoder){
bot('SendMessage',[
'chat_id'=>$guycoder,
'text'=>"<b>Quyidagilardan birini tanlang:</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"💈 Baraban o'yini",'callback_data'=>"barabans"],['text'=>"🧰 Sandiq o'yini",'callback_data'=>"sandiqs"]],
]])
]);
}}

if($data == "sasosiy"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>Quyidagilardan birini tanlang:</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"💈 Baraban o'yini",'callback_data'=>"barabans"],['text'=>"🧰 Sandiq o'yini",'callback_data'=>"sandiqs"]],
]])
]);
}
//baraban
if($data == "barabans"){
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"<b>Quyidagilardan birini tanlang:</b>

Hozirgi :
Text :
<code>$baraban</code>
=====
Narxi:
<code>$bnarx $valyuta </code>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🔐 Baraban Texti",'callback_data'=>"btexts"],['text'=>"🔐 Baraban Narxi",'callback_data'=>"bnarxs"]],
[['text'=>"🔐 Baraban Prizlari",'callback_data'=>"bprizs"]],
]])
]);
}

//sandiq
if($data == "sandiqs"){
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"<b>Quyidagilardan birini tanlang:</b>

Hozirgi :
Text :
<code>$stext</code>
====",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🔐 Sandiq Texti",'callback_data'=>"stexts"],['text'=>"🔐 Sandiq Narxi",'callback_data'=>"snarxs"]],
]])
]);
}

//priz 





//
//sandiq

if($data == "snarxs"){
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"<b>Quyidagilardan birini tanlang:</b>

Hozirgi: 
1. $sandiq1 
=====
2. $sandiq2
=====
3. $sandiq3
=====
4. $sandiq4",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🔐1",'callback_data'=>"s1s"],['text'=>"🔐2",'callback_data'=>"s2s"]],
[['text'=>"🔐3",'callback_data'=>"s3s"],['text'=>"🔐4",'callback_data'=>"s4s"]],
]])
]);
}

//stext

if($data == "stexts"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>Narx yuboring:</b>",
'parse_mode'=>'html',
'reply_markup'=>$boshqarish,
]);
file_put_contents("step/$cid2.step","stexts");
}

if($step == "stexts"){
if($tx=="🗄 Boshqarish"){
unlink("step/$cid.step");
}else{
if($cid == $guycoder){
if(isset($text)){
file_put_contents("admin/stext.txt",$text);
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Muvaffaqiyatli o'zgartirildi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
unlink("step/$cid.step");
}}}}
//

//1
if($data == "s1s"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>Narx yuboring:</b>",
'parse_mode'=>'html',
'reply_markup'=>$boshqarish,
]);
file_put_contents("step/$cid2.step","s1s");
}

if($step == "s1s"){
if($tx=="🗄 Boshqarish"){
unlink("step/$cid.step");
}else{
if($cid == $guycoder){
if(isset($text)){
file_put_contents("admin/sandiq1.txt",$text);
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Muvaffaqiyatli o'zgartirildi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
unlink("step/$cid.step");
}}}}
//2
if($data == "s2s"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>Narx yuboring:</b>",
'parse_mode'=>'html',
'reply_markup'=>$boshqarish,
]);
file_put_contents("step/$cid2.step","s2s");
}

if($step == "s2s"){
if($tx=="🗄 Boshqarish"){
unlink("step/$cid.step");
}else{
if($cid == $guycoder){
if(isset($text)){
file_put_contents("admin/sandiq2.txt",$text);
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Muvaffaqiyatli o'zgartirildi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
unlink("step/$cid.step");
}}}}
//3
if($data == "s3s"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>Narx yuboring:</b>",
'parse_mode'=>'html',
'reply_markup'=>$boshqarish,
]);
file_put_contents("step/$cid2.step","s3s");
}

if($step == "s3s"){
if($tx=="🗄 Boshqarish"){
unlink("step/$cid.step");
}else{
if($cid == $guycoder){
if(isset($text)){
file_put_contents("admin/sandiq3.txt",$text);
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Muvaffaqiyatli o'zgartirildi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
unlink("step/$cid.step");
}}}}
//4
if($data == "s4s"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>Narx yuboring:</b>",
'parse_mode'=>'html',
'reply_markup'=>$boshqarish,
]);
file_put_contents("step/$cid2.step","s4s");
}

if($step == "s4s"){
if($tx=="🗄 Boshqarish"){
unlink("step/$cid.step");
}else{
if($cid == $guycoder){
if(isset($text)){
file_put_contents("admin/sandiq4.txt",$text);
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Muvaffaqiyatli o'zgartirildi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
unlink("step/$cid.step");
}}}}
//




//baraban
if($data == "bprizs"){
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"<b>Quyidagilardan birini tanlang:</b>

Hozirgi: 
1. $b1 
=====
2. $b2
=====
3. $b3
=====
4. $b4
=====
5. $b5",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🔐1",'callback_data'=>"b1s"],['text'=>"🔐2",'callback_data'=>"b2s"]],
[['text'=>"🔐3",'callback_data'=>"b3s"],['text'=>"🔐4",'callback_data'=>"b4s"]],
[['text'=>"🔐5",'callback_data'=>"b5s"]],
]])
]);
}
//1
if($data == "b1s"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>So'z yuboring:</b>",
'parse_mode'=>'html',
'reply_markup'=>$boshqarish,
]);
file_put_contents("step/$cid2.step","b1s");
}

if($step == "b1s"){
if($tx=="🗄 Boshqarish"){
unlink("step/$cid.step");
}else{
if($cid == $guycoder){
if(isset($text)){
file_put_contents("admin/b1.txt",$text);
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Muvaffaqiyatli o'zgartirildi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
unlink("step/$cid.step");
}}}}
//2
if($data == "b2s"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>So'z yuboring:</b>",
'parse_mode'=>'html',
'reply_markup'=>$boshqarish,
]);
file_put_contents("step/$cid2.step","b2s");
}

if($step == "b2s"){
if($tx=="🗄 Boshqarish"){
unlink("step/$cid.step");
}else{
if($cid == $guycoder){
if(isset($text)){
file_put_contents("admin/b2.txt",$text);
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Muvaffaqiyatli o'zgartirildi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
unlink("step/$cid.step");
}}}}
//3
if($data == "b3s"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>So'z yuboring:</b>",
'parse_mode'=>'html',
'reply_markup'=>$boshqarish,
]);
file_put_contents("step/$cid2.step","b3s");
}

if($step == "b3s"){
if($tx=="🗄 Boshqarish"){
unlink("step/$cid.step");
}else{
if($cid == $guycoder){
if(isset($text)){
file_put_contents("admin/b3.txt",$text);
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Muvaffaqiyatli o'zgartirildi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
unlink("step/$cid.step");
}}}}
//4
if($data == "b4s"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>So'z yuboring:</b>",
'parse_mode'=>'html',
'reply_markup'=>$boshqarish,
]);
file_put_contents("step/$cid2.step","b4s");
}

if($step == "b4s"){
if($tx=="🗄 Boshqarish"){
unlink("step/$cid.step");
}else{
if($cid == $guycoder){
if(isset($text)){
file_put_contents("admin/b4.txt",$text);
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Muvaffaqiyatli o'zgartirildi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
unlink("step/$cid.step");
}}}}
//5
if($data == "b5s"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>So'z yuboring:</b>",
'parse_mode'=>'html',
'reply_markup'=>$boshqarish,
]);
file_put_contents("step/$cid2.step","b5s");
}

if($step == "b5s"){
if($tx=="🗄 Boshqarish"){
unlink("step/$cid.step");
}else{
if($cid == $guycoder){
if(isset($text)){
file_put_contents("admin/b5.txt",$text);
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Muvaffaqiyatli o'zgartirildi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
unlink("step/$cid.step");
}}}}
//narxi b
if($data == "bnarxs"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>narxini yuboring:</b>",
'parse_mode'=>'html',
'reply_markup'=>$boshqarish,
]);
file_put_contents("step/$cid2.step","bnarxs");
}

if($step == "bnarxs"){
if($tx=="🗄 Boshqarish"){
unlink("step/$cid.step");
}else{
if($cid == $guycoder){
if(isset($text)){
file_put_contents("admin/bnarx.txt",$text);
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Muvaffaqiyatli o'zgartirildi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
unlink("step/$cid.step");
}}}}
//texti b
if($data == "btexts"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>So'z yuboring:</b>",
'parse_mode'=>'html',
'reply_markup'=>$boshqarish,
]);
file_put_contents("step/$cid2.step","btexts");
}

if($step == "btexts"){
if($tx=="🗄 Boshqarish"){
unlink("step/$cid.step");
}else{
if($cid == $guycoder){
if(isset($text)){
file_put_contents("admin/btext.txt",$text);
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Muvaffaqiyatli o'zgartirildi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
unlink("step/$cid.step");
}}}}


//
 
?>