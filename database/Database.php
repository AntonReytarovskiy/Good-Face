<?php
/**
 * Created by PhpStorm.
 * User: Антоша
 * Date: 15.04.2016
 * Time: 5:34
 */
class Database
{
    private $host = "localhost";
    private $user = "test";
    private $pass = "1111";
    private $db = "GoodFace";
    private $mysql;

    public function Database() {
        $this->mysql = new mysqli($this->host,$this->user,$this->pass,$this->db);
    }

    public function GetAccount($login,$password) {
        $login = $this->mysql->real_escape_string($login);
        $password = $this->mysql->real_escape_string($password);
        $result = $this->mysql->query("select * from accounts WHERE login = binary '$login' and user_password = binary '$password';");
        return $result->fetch_assoc();
    }

    public function CreateAccount($login,$pass,$fname,$lname,$sex,$city_id,$birth_day) {
        $login = $this->mysql->real_escape_string($login);
        $pass = $this->mysql->real_escape_string($pass);
        $fname = $this->mysql->real_escape_string($fname);
        $lname = $this->mysql->real_escape_string($lname);
        $sex = $this->mysql->real_escape_string($sex);
        $city_id = $this->mysql->real_escape_string($city_id);
        $birth_day = $this->mysql->real_escape_string($birth_day);
        return $this->mysql->query("insert into accounts(login,user_password,fname,lname,birth_day,sex,city_id,reg_date) 
                                            values('$login','$pass','$fname','$lname','$birth_day','$sex',$city_id,now());");
    }

    public function GetCountry() {
        $result = $this->mysql->query("select * from country_ order by country_name_ru");
        $country = array();
        while ($row = $result->fetch_assoc()) {
            array_push($country,$row);
        }
        
        return $country;
    }

    public function GetCityByCountryID($id_country) {
        $id_country = $this->mysql->real_escape_string($id_country);
        $result = $this->mysql->query("select * from city_ where id_country = $id_country order by city_name_ru");
        $city = array();
        while ($row = $result->fetch_assoc()){
            array_push($city,$row);
        }

        return $city;
    }

    public function GetCityByID($city_id) {
        $city_id = $this->mysql->real_escape_string($city_id);
        $result = $this->mysql->query("select * from city_ where id = $city_id");
        return $result->fetch_assoc();
    }

    public function AddPhoto($login,$path) {
        $login = $this->mysql->real_escape_string($login);
        $path = $this->mysql->real_escape_string($path);
        return $this->mysql->query("insert into photo(login,path) values('$login','$path')");
    }

    public function GetPhoto($login) {
        $login = $this->mysql->real_escape_string($login);
        $result = $this->mysql->query("select * from photo where binary login = '$login' and del = 0 limit 7");
        $photos = array();
        while ($row = $result->fetch_assoc())
            array_push($photos,$row);

        return $photos;
    }

    public function PhotoCount($login) {
        $login = $this->mysql->real_escape_string($login);
        $result = $this->mysql->query("select count(*) from photo where binary login = '$login' and del = 0");
        $count = $result->fetch_row();
        return $count[0];
    }

    public function GetAvatar($login) {
        $login = $this->mysql->real_escape_string($login);
        $result = $this->mysql->query("select * from photo where avatar = 1 and login = '$login' and del = 0");
        return $result->fetch_assoc();
    }

    public function SetAvatar($login,$photo_id) {
        $login = $this->mysql->real_escape_string($login);
        $photo_id = $this->mysql->real_escape_string($photo_id);
        return $this->mysql->query("call set_avatar('$login',$photo_id);");
    }
    
    public function GetPhotoByPath($path) {
        $path = $this->mysql->real_escape_string($path);
        $result = $this->mysql->query("select * from photo where path = binary '$path' and del = 0");
        return $result->fetch_assoc();
    }

    public function DeletePhotoByID($photo_id) {
        $photo_id = $this->mysql->real_escape_string($photo_id);
        return $this->mysql->query("update photo set del = 1 where ID = $photo_id");
    }

    public function CreateDialog() {
        $this->mysql->query("insert into dialogs values();");
        return $this->mysql->insert_id;
    }
    
    public function AddListener($dialog_id,$login) {
        $dialog_id = $this->mysql->real_escape_string($dialog_id);
        $login = $this->mysql->real_escape_string($login);
        return $this->mysql->query("insert into listeners(dialog_id,login) values($dialog_id,'$login')");
    }
    
    public function GetAccountByLogin($login) {
        $login = $this->mysql->real_escape_string($login);
        $result = $this->mysql->query("select * from accounts where login = binary '$login'");
        return $result->fetch_assoc();
    }

    public function GetDialog($dialog_id) {
        $dialog_id = $this->mysql->real_escape_string($dialog_id);
        $result = $this->mysql->query("select * from dialogs where ID = $dialog_id and del = 0");
        return $result->fetch_assoc();
    }

    public function GetDialogs($login) {
        $login = $this->mysql->real_escape_string($login);
        $result = $this->mysql->query("select * from listeners where dialog_id in 
                      (select dialog_id from listeners where login = binary '$login' and del = 0) and login <> binary '$login';");
        $dialogs = array();
        while ($row = $result->fetch_assoc())
            array_push($dialogs,$row);
        return $dialogs;
    }

    public function GetAllDialogs($login) {
        $login = $this->mysql->real_escape_string($login);
        $result = $this->mysql->query("select * from listeners where dialog_id in 
                      (select dialog_id from listeners where login = binary '$login') and login <> binary '$login';");
        $dialogs = array();
        while ($row = $result->fetch_assoc())
            array_push($dialogs,$row);
        return $dialogs;
    }
    
    public function GetMessagesByDialogID($dialog_id,$login) {
        $dialog_id = $this->mysql->real_escape_string($dialog_id);
        $login = $this->mysql->real_escape_string($login);
        $listeners = $this->mysql->query("select * from listeners where dialog_id = $dialog_id and login = binary '$login'");
        $listeners = $listeners->fetch_assoc();
        if($listeners) {
            $result = $this->mysql->query("SELECT messages.* FROM messages WHERE messages.dialog_id = $dialog_id AND
                                  messages.ID NOT IN (SELECT deletes.message_id FROM deletes WHERE deletes.login = binary '$login')");
            $messages = array();
            while ($row = $result->fetch_assoc())
                array_push($messages,$row);
            return $messages;
        }
    }

    public function GetDialogByID($id) {
        $id = $this->mysql->real_escape_string($id);
        $result = $this->mysql->query("select * from dialogs where ID = $id");
        return $result->fetch_assoc();
    }

    public function GetListenerTwoUsers($user1,$user2) {
        $user1 = $this->mysql->real_escape_string($user1);
        $user2 = $this->mysql->real_escape_string($user2);
        $result = $this->mysql->query("select * from listeners where login = binary '$user1' and 
                            dialog_id in (select dialog_id from listeners where login = binary '$user2');");
        return $result->fetch_assoc();
    }
    
    public function SendMessage($dialog_id,$sender_login,$message) {
        $dialog_id = $this->mysql->real_escape_string($dialog_id);
        $sender_login = $this->mysql->real_escape_string($sender_login);
        $message = $this->mysql->real_escape_string($message);
        $this->mysql->query("insert into messages(login,dialog_id,message) values ('$sender_login','$dialog_id','$message')");
        $result = $this->mysql->query("select * from listeners where dialog_id = $dialog_id and login = binary '$sender_login'");
        $result = $result->fetch_assoc();
        if (!$result)
            $this->mysql->query("insert into listeners(dialog_id,login) values($dialog_id,'$sender_login')");
        $this->mysql->query("update listeners set del = 0 where dialog_id = $dialog_id");
    }
    
    public function GetMessagesCount($dialog_id,$login) {
        $dialog_id = $this->mysql->real_escape_string($dialog_id);
        $login = $this->mysql->real_escape_string($login);
        $count = $this->mysql->query("SELECT COUNT(*) FROM messages WHERE messages.dialog_id = $dialog_id AND
                                  messages.ID NOT IN (SELECT deletes.message_id FROM deletes WHERE deletes.login = binary '$login')");
        $count = $count->fetch_array();
        return $count[0];
    }
    
    public function DeleteListener($dialog_id,$login) {
        $dialog_id = $this->mysql->real_escape_string($dialog_id);
        $login = $this->mysql->real_escape_string($login);
        return $this->mysql->query("update listeners set del = 1 where dialog_id = $dialog_id and login = binary '$login'");
    }

    public function ClearDialog($dialog_id,$login) {
        $dialog_id = $this->mysql->real_escape_string($dialog_id);
        $login = $this->mysql->real_escape_string($login);
        return $this->mysql->query("insert into deletes(message_id,login) (SELECT messages.ID,'$login' 
                              FROM messages WHERE messages.dialog_id = $dialog_id
                              AND messages.ID NOT IN (SELECT deletes.message_id FROM deletes WHERE deletes.login = binary '$login'));");
    }
    
    public function RestoreListener($listener_id) {
        $listener_id = $this->mysql->real_escape_string($listener_id);
        return $this->mysql->query("update listeners set del = 0 where ID = $listener_id");
    }

    public function ListenersCount($login) {
        $login = $this->mysql->real_escape_string($login);
        $result = $this->mysql->query("select count(*) from listeners where login = binary binary '$login' and del = 0");
        $count = $result->fetch_row();
        return $count[0];
    }
    
    public function GetListeners($login) {
        $login = $this->mysql->real_escape_string($login);
        $result = $this->mysql->query("select * from listeners where login = binary '$login'");
        $listeners = array();
        while ($row = $result->fetch_assoc())
            array_push($listeners,$row);
        return $listeners;
    }

    public function GetListener($dialog_id,$login) {
        $dialog_id = $this->mysql->real_escape_string($dialog_id);
        $login = $this->mysql->real_escape_string($login);
        $result = $this->mysql->query("select * from listeners where dialog_id = $dialog_id and login = binary '$login'");
        return $result->fetch_assoc();
    }

    public function DeleteMessageByID($message_id,$login) {
        $message_id = $this->mysql->real_escape_string($message_id);
        $login = $this->mysql->real_escape_string($login);
        return $this->mysql->query("insert into deletes(message_id,login) values($message_id,'$login')");
    }

    public function GetCountryNameByCityID($city_id) {
        $city_id = $this->mysql->real_escape_string($city_id);
        $result = $this->mysql->query("select country_name_ru from country_ inner join city_ on id_country = country_.id 
                                                                                        where city_.id = $city_id;");
        $result = $result->fetch_array();
        return $result[0];
    }

    public function GetCityNameByCityID($city_id) {
        $city_id = $this->mysql->real_escape_string($city_id);
        $result = $this->mysql->query("select city_name_ru from city_ where id = $city_id");
        $result = $result->fetch_array();
        return $result[0];
    }

    public function GetPeoples($last_id,$login) {
        $last_id = $this->mysql->real_escape_string($last_id);
        $login = $this->mysql->real_escape_string($login);
        $result = $this->mysql->query("select accounts.ID,accounts.login,fname,lname,path as avatar 
                                        from accounts inner join photo on accounts.login = photo.login
                                        where avatar = 1 and accounts.ID > $last_id and accounts.login not in 
                                        (select recipient_login from sympathy where sender_login = binary '$login')
                                        and accounts.login <> binary '$login'
                                         order by accounts.ID limit 5;");
        $accounts = array();
        while ($row = $result->fetch_assoc())
            array_push($accounts,$row);
        return $accounts;
    }

    public function SendSympathy($sender,$recipient) {
        $sender = $this->mysql->real_escape_string($sender);
        $recipient = $this->mysql->real_escape_string($recipient);
        return $this->mysql->query("insert into sympathy(sender_login,recipient_login) values('$sender','$recipient')");
    }

    public function GetILike($recipient) {
        $recipient = $this->mysql->real_escape_string($recipient);
        $result = $this->mysql->query(" select sympathy.ID, sympathy.sender_login as login,sympathy.sympathy_date as date,path as avatar,concat(fname,' ',lname) as name from sympathy 
                                     inner join photo on photo.login = sender_login
                                     inner join accounts on sender_login = accounts.login
                                     where avatar = 1 and recipient_login = binary '$recipient' and sympathy.del = 0 
                                     order by sympathy_date desc;");
        $sympathy = array();
        while ($row = $result->fetch_assoc())
            array_push($sympathy,$row);
        return $sympathy;
    }

    public function GetMeLike($sender) {
        $sender = $this->mysql->real_escape_string($sender);
        $result = $this->mysql->query("select sympathy.ID, sympathy.recipient_login as login,sympathy.sympathy_date as date,path as avatar,concat(fname,' ',lname) as name from sympathy 
                                    inner join photo on login = recipient_login 
                                    inner join accounts on recipient_login = accounts.login
                                    where avatar = 1 and sender_login = binary '$sender' and sympathy.del = 0
                                    order by sympathy_date desc;");
        $sympathy = array();
        while ($row = $result->fetch_assoc())
            array_push($sympathy,$row);
        return $sympathy;
    }

    public function GetMutuallyLikes($login) {
        $login = $this->mysql->real_escape_string($login);
        $result = $this->mysql->query("SELECT t1.ID,t1.sender_login as login,concat(accounts.fname,' ',accounts.lname) as name,
                                    photo.path as avatar,t1.sympathy_date as date FROM sympathy t1 
                                    inner join accounts on t1.sender_login = accounts.login
                                    inner join photo on t1.sender_login = photo.login
                                    WHERE t1.recipient_login = binary '$login' and t1.del = 0 and avatar = 1
                                    AND EXISTS(SELECT 'x' FROM sympathy t2 
                                    WHERE (t2.sender_login = t1.recipient_login and t2.recipient_login = t1.sender_login));");
        $sympathy = array();
        while ($row = $result->fetch_assoc())
            array_push($sympathy,$row);
        return $sympathy;
    }

    public function SetLastLogin($login) {
        $login = $this->mysql->real_escape_string($login);
        $this->mysql->query("update accounts set last_login_date = now() where login = binary '$login';");
    }

    public function GetSympathy($sender,$recipient) {
        $sender = $this->mysql->real_escape_string($sender);
        $recipient = $this->mysql->real_escape_string($recipient);
        $result = $this->mysql->query("select * from sympathy where sender_login = binary '$sender' 
                                      and recipient_login = binary '$recipient'");
        return $result->fetch_assoc();
    }
}