<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_users extends MY_Model
{

    protected $table = TBL_USERS;
    protected $primary_key = 'id';

    public function checkPwdHash($pwd)
    {
        $userDetails    = parent::fetchById(1); //Userid From session in production
        $currPwdhashKey = $this->genPwdHashKey($pwd, $userDetails->uniq_token);
        return ($currPwdhashKey === $userDetails->hash_key) ? true : false;
    }

    public function genUniqTkn($username)
    {
        $token = time() . rand(10, 5000) . sha1(rand(10, 5000)) . md5(__FILE__);
        $token = str_shuffle($token);
        $token = sha1($token) . md5(microtime()) . md5($username);
        return $token;
    }

    public function genPwdHashKey($password, $token)
    {
        return md5(md5($token) . md5($password));
    }

    public function genRndmPwdString($length = 12)
    {
        $chars    = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789#$";
        $password = substr(str_shuffle($chars), 0, $length);
        return $password;
    }

    public function _authUser($post)
    {
        //Fetch user details by username
        $where = array(
            TBL_USERS . '.username' => $post['username']
        );

        //Get user uniq token and basic details
        $usr = parent::fetchRow($where);

        if ($usr) {
            //Match Password with the has key generated
            if ($this->genPwdHashKey($post['password'], $usr->uniq_token) == $usr->hash_key) {

                return array('code' => 200, 'message' => 'User found', 'data' => $usr);

            } else {

                return array('code' => 400, 'message' => 'Password not matching', 'data' => array());
            }

        } else {
            return array('code' => 400, 'message' => 'No user found', 'data' => array());
        }


    }

    public function resetUsrPassword($account)
    {
        $this->db->select($this->table . ".*")
                 ->from($this->table)
                 ->where($this->table . ".username = '$account' OR " . $this->table . ".email = '$account'")
                 ->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            $result = $query->result();
            $result = $result[0];

            $newPass    = $this->genRndmPwdString();
            $newHashKey = $this->genPwdHashKey($newPass, $result->uniq_token);

            $save = array(
                $this->table . ".hash_key" => $newHashKey,
                $this->table . ".read_pass" => $newPass
            );

            $where = array(
                $this->table . ".id" => $result->id
            );

            parent::save($save, $where);
            return array('code' => 200, 'message' => 'Success', 'data' => array());

            //TODO : - Send an email to the user with new reset password

        } else {
            return array('code' => 400, 'message' => 'No User found', 'data' => array());
        }
    }

}
