<?php
/**
 * Created by PhpStorm.
 * User: Papangping
 * Date: 8/7/14
 * Time: 3:11 PM
 */

include_once dirname(__FILE__).'/DB.php';
class Manager {
    public static function booking($param){
        $pdo = DB::getPDO();
        $st = $pdo->prepare("INSERT INTO reserve(book_date_from, book_date_to, book_room_adults, book_room_children, room_type, first_name, last_name, email_address, phone_number, address_line1, address_line2, city, province, zip_postcode, country, special_requirements)
            VALUES(:book_date_from, :book_date_to, :book_room_adults, :book_room_children, :room_type, :first_name, :last_name, :email_address, :phone_number, :address_line1, :address_line2, :city, :province, :zip_postcode, :country, :special_requirements)");
        return $st->execute($param);
    }

    public static function convertDate($date){
        //$date = preg_replace('#(\d{2})/(\d{2})/(\d{4})\s(.*)#', '$3-$2-$1 $4', $date);
        $date = preg_replace('#(\d{2})/(\d{2})/(\d{4})#', '$3-$2-$1', $date);
        return $date;
    }

    public static function getReserves(){
        $pdo = DB::getPDO();
        $r = $pdo->query("SELECT * FROM reserve");
        return $r->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getReserve($id){
        $pdo = DB::getPDO();
        $st = $pdo->prepare("SELECT * FROM reserve WHERE id=:id");
        $st->execute(array('id'=> $id));
        return $st->fetch(PDO::FETCH_ASSOC);
    }

    public static function deleteReserve($id){
        $pdo = DB::getPDO();
        $st = $pdo->prepare("DELETE FROM reserve WHERE id=:id");
        $st->execute(array('id'=> $id));
        return true;
    }

    public static function getPictures($type){
        $pdo = DB::getPDO();
        $st = $pdo->prepare("SELECT * FROM pictures WHERE p_type = :p_type");
        $st->execute(array('p_type'=> $type));
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getPicture($id){
        $pdo = DB::getPDO();
        $st = $pdo->prepare("SELECT * FROM pictures WHERE id=:id");
        $st->execute(array('id'=> $id));
        return $st->fetch(PDO::FETCH_ASSOC);
    }

    public static function validateExtImg($file_name){
        $ext = strtolower(substr(strrchr($file_name, "."), 1));
        $image_extensions_allowed = array('jpg', 'jpeg', 'png');
        if(!in_array($ext, $image_extensions_allowed))
        {
            return false;
        }
        return $ext;
    }

    public static function uploadPictures($file_pictures, $type){
        foreach($file_pictures['name'] as $key=> $value){
            $ext = self::validateExtImg($value);
            if($ext){
                self::savePicture($file_pictures['tmp_name'][$key], $ext, $type);
            }
            else {
                throw new Exception("Only allow jpg, jpeg, png");
            }
        }
    }

    public static function savePicture($file_tmp, $ext, $type){
        $name = uniqid().".".$ext;
        $des = dirname(__FILE__).'/pictures/'.$name;
        move_uploaded_file($file_tmp, $des);

        $pdo = DB::getPDO();
        $st = $pdo->prepare("INSERT INTO pictures(p_type, path) VALUES(:p_type, :path)");
        $st->execute(array('p_type'=> $type, 'path'=> $name));
    }

    public static function deletePictures($arr_id){
        if(!is_array($arr_id)){
            $arr_id = array($arr_id);
        }

        foreach($arr_id as $id){
            self::deletePicture($id);
        }
    }

    public static function deletePicture($id){
        $pdo = DB::getPDO();

        $pic = self::getPicture($id);

        $st = $pdo->prepare("DELETE FROM pictures WHERE id=:id");
        $st->execute(array('id'=> $id));

        $path = dirname(__FILE__).'/pictures/'.$pic['path'];
        @unlink($path);
    }
}