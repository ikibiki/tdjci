<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserAccount extends CI_Model {

    private $dbi;

    public function __construct() {
        parent::__construct();
        $this->dbi = $this->load->database('default', true);
    }

    public function verifyPassword($combination, $empid) {
        $this->dbi->reset_query();
        $this->dbi->from('tblcredentials');
        $this->dbi->where('Code', 'PWD');
        $this->dbi->where('User_Ref', intval($empid));
        $res = $this->dbi->get()->result();

        return password_verify($combination, $res[0]->Content);
    }

    public function getUserInfo($empid) {
        $this->dbi->reset_query();
        $this->dbi->select('DISTINCT(tblusers.ID), tblusers.FirstName, tblusers.MiddleInitial, tblusers.LastName, tblusers.Suffix, tblusers.Birthday, tbldepartment.Department, tblusers.Plantilla, tbldepartment.ID as Dept, tblusers.Photo, tblusers.AccessMode');
        $this->dbi->from('tblusers');
        $this->dbi->join('tbldepartment', 'tblusers.Dept=tbldepartment.ID');
        $this->dbi->where('tblusers.ID', intval($empid));
        $this->dbi->where('tblusers.Active', 1);
        return $this->dbi->get()->result()[0];
    }

    public function getUsersInfo($start = 0, $count = 50) {
        $this->dbi->reset_query();

        $this->dbi->select('DISTINCT(tblusers.ID), tblusers.FirstName, tblusers.MiddleInitial, tblusers.LastName, tblusers.Suffix, tblusers.Birthday, tbldepartment.Department, tbldepartment.ID as Dept, tblusers.Photo, tblusers.AccessMode, tblusers.Plantilla');
        $this->dbi->from('tblusers');
        $this->dbi->join('tbldepartment', 'tblusers.Dept=tbldepartment.ID');
        $this->dbi->where('tblusers.Active', 1);
        $this->dbi->order_by('tblusers.ID', 'asc');
        $this->dbi->limit($count, $start);
        $result = $this->dbi->get()->result();

        return $result;
    }

    public function getUserInfoBySMC($smc) {
        $this->dbi->reset_query();
        $this->dbi->select('DISTINCT(tblusers.ID), tblusers.FirstName, tblusers.MiddleInitial, tblusers.LastName, tblusers.Suffix, tblusers.Birthday, tbldepartment.Department, tbldepartment.ID as Dept, tblusers.Photo, tblusers.AccessMode, tblusers.Plantilla');
        $this->dbi->from('tblusers');
        $this->dbi->join('tbldepartment', 'tblusers.Dept=tbldepartment.ID');
        $this->dbi->join('tblcredentials', 'tblusers.ID=tblcredentials.User_Ref');
        $this->dbi->like('tblcredentials.Code', 'SMC', 'after');
        $this->dbi->where('tblcredentials.Content', $smc);
        $this->dbi->where('tblusers.Active', 1);
        return $this->dbi->get()->result()[0];
    }

    public function getUsersInfoByDept($deptid, $summarize = false) {
        $this->dbi->reset_query();

        $this->dbi->select('tblusers.ID');
        $this->dbi->from('tblusers');
        $this->dbi->join('tbluseraccess', 'tblusers.ID=tbluseraccess.User_Ref');
        $this->dbi->join('tblprivileges', 'tblprivileges.ID=tbluseraccess.Priv_Ref');
        $this->dbi->where('tblprivileges.Privilege', 'EMPLOYEE');
        $this->dbi->where('tblusers.Dept', $deptid);
        $this->dbi->where('tblusers.Active', 1);
        $temp = $this->dbi->get()->result();

        foreach ($temp as $elem) {
            $ids[] = intval($elem->ID);
        }

        $this->dbi->reset_query();
        $this->dbi->select('tblusers.ID');
        $this->dbi->from('tblusers');
        $this->dbi->join('tbluseraccess', 'tblusers.ID=tbluseraccess.User_Ref');
        $this->dbi->join('tblprivileges', 'tblprivileges.ID=tbluseraccess.Priv_Ref');
        $this->dbi->where('tblprivileges.Privilege', 'EXEMPT');
        $this->dbi->where('tblusers.Dept', $deptid);
        $this->dbi->where('tblusers.Active', 1);
        $temp = $this->dbi->get()->result();

        foreach ($temp as $elem) {
            $ids2[] = intval($elem->ID);
        }

        if (empty($ids)) {
            return '';
        }

        if (isset($ids2)) {
            $result = array_diff($ids, $ids2);
        } else {
            $result = $ids;
        }

        $this->dbi->reset_query();
        $this->dbi->select('DISTINCT(tblusers.ID), tblusers.FirstName, tblusers.MiddleInitial, tblusers.LastName, tblusers.Suffix, tblusers.Birthday, tbldepartment.Department, tbldepartment.ID as Dept, tblusers.Photo, tblusers.AccessMode, tblusers.Plantilla');
        $this->dbi->from('tblusers');
        $this->dbi->join('tbldepartment', 'tblusers.Dept=tbldepartment.ID');

        $this->dbi->where_in('tblusers.ID', $result);

        $this->dbi->order_by('tblusers.DTCreated', 'DESC');

        $emps = $this->dbi->get()->result();
        if ($summarize) {
            $this->load->model('DTRecord');
            foreach ($emps as $value) {
                $value->Meta = $this->DTRecord->getSummary($value->ID, date('m'), date('Y'));
            }
        }

        return $emps;
    }

    public function getDepartments($id = 0) {
        $this->dbi->reset_query();

        if ($id > 0) {
            $this->dbi->where('tbldepartment.ID', intval($id));
        }
        $this->dbi->from('tbldepartment');
        $result = $this->dbi->get()->result();

        return $result;
    }

    public function getUserMessage($empid) {
        $this->dbi->reset_query();
        $this->dbi->from('tblmessages');
        $this->dbi->where('tblmessages.User_Ref', $empid);
        $this->dbi->where('tblmessages.Mode', 'MESSAGE');
        $res = $this->dbi->get()->result();
        return $res ? $res[0] : '';
    }

    public function setUserMessage($empid, $msg) {
        $data = array(
            'User_Ref' => $empid,
            'Mode' => 'MESSAGE',
            'Content' => $msg,
        );
        $this->dbi->reset_query();
        $this->dbi->where('User_Ref', $data['User_Ref']);
        $this->dbi->where('Mode', $data['Mode']);
        $exist = $this->dbi->get("tblmessages")->result();

        if ($exist) {
            $this->dbi->reset_query();
            $this->dbi->where('Mode', $data['Mode']);
            $this->dbi->where('User_Ref', $data['User_Ref']);
            $this->dbi->update('tblmessages', $data);
            return $this->empid;
        } else {
            $this->dbi->reset_query();
            $this->dbi->insert('tblmessages', $data);
            return $this->dbi->insert_id();
        }
    }

    public function removeUserMessage($empid) {
        $this->dbi->reset_query();
        $this->dbi->where('User_Ref', $empid);
        $this->dbi->delete('tblmessages');
    }

    public function isAllowSystemEntry($empid) {
        $this->dbi->reset_query();
        $this->dbi->select('tblprivileges.Description, tblprivileges.Level');
        $this->dbi->from('tbluseraccess');
        $this->dbi->join('tblprivileges', 'tbluseraccess.Priv_Ref=tblprivileges.ID');
        $this->dbi->where('tbluseraccess.User_Ref', $empid);
        $this->dbi->where('tblprivileges.Privilege', 'EMPLOYEE');
        return $this->dbi->get()->result()[0] ? true : false;
    }

    public function isCredCodeExists($empid, $code) {
        $this->dbi->reset_query();
        $this->dbi->from('tblcredentials');
        $this->dbi->where('User_Ref', intval($empid));
        $this->dbi->like('Code', $code, 'after');
        return count($this->dbi->get()->result()) > 0 ? true : false;
    }

    public function isCredentialExists($empid, $code) {
        $this->dbi->reset_query();
        $this->dbi->from('tblcredentials');
        $this->dbi->where('Code', $code);
        $this->dbi->where('User_Ref', intval($empid));
        return $this->dbi->get()->result()[0] ? true : false;
    }

    public function isFacebook($empid) {
        $this->dbi->reset_query();
        $this->dbi->from('tblcredentials');
        $this->dbi->where('Code', 'FB');
        $this->dbi->where('User_Ref', intval($empid));
        $tuple = $this->dbi->get()->result();
        return array_key_exists(0, $tuple);
    }

    public function getFacebook($fbuserid) {
        $this->dbi->reset_query();
        $this->dbi->from('tblcredentials');
        $this->dbi->where('Code', 'FB');
        $this->dbi->where('Content', $fbuserid);
        $tuple = $this->dbi->get()->result()[0];
        return $tuple ? $tuple : '';
    }

    public function revokeFacebook($id) {
        $this->dbi->reset_query();
        $this->dbi->where('Code', 'FB');
        $this->dbi->where('User_Ref', $id);
        $this->dbi->delete('tblcredentials');
    }

    public function getCredentials($empid) {
        $this->dbi->reset_query();
        $this->dbi->from('tblcredentials');
        $this->dbi->where('User_Ref', $empid);
        return $this->dbi->get()->result();
    }

    public function updateUserInfo($empid, $data) {
        $this->dbi->reset_query();
        $this->dbi->where('ID', $empid);
        $exist = $this->dbi->get("tblusers")->result();

        if ($exist) {
            $this->dbi->where('ID', $empid);
            $this->dbi->update('tblusers', $data);
            return $this->empid;
        } else {
            $this->dbi->reset_query();
            $this->dbi->insert('tblusers', $data);
            return $this->dbi->insert_id();
        }
    }

    public function createMeta($emp, $month, $year, $meta) {
        $this->dbi->reset_query();

        $this->dbi->where("User_Ref", $emp);
        $this->dbi->where("Month", $month);
        $this->dbi->where("Year", $year);
        $this->dbi->delete('tblmetadt');

        $this->dbi->reset_query();
        $meta['User_Ref'] = $emp;
        $meta['Month'] = $month;
        $meta['Year'] = $year;
        $this->dbi->insert('tblmetadt', $meta);
        return $this->dbi->insert_id();
    }

    public function getEmployeeIDs() {
        $this->dbi->reset_query();

        $this->dbi->select('DISTINCT(tblusers.ID)');
        $this->dbi->from('tblusers');
        $this->dbi->join('tbldepartment', 'tblusers.Dept=tbldepartment.ID');
        $this->dbi->where('tblusers.Active', 1);
        $this->dbi->order_by('tblusers.ID', 'asc');
        $result = $this->dbi->get()->result();

        return $result;
    }

    public function getUserMeta($empid = 0) {
        $this->dbi->reset_query();

        $this->dbi->select('tblusers.ID AS EmployeeID, tblusers.FirstName, tblusers.LastName, tbldepartment.Department, tblmetadt.Month, tblmetadt.Year, tblmetadt.Lates, tblmetadt.Absences, tblmetadt.Undertime, tblmetadt.LatesCount, tblmetadt.UndertimeCount');
        if ($empid > 0) {
            $this->dbi->where('User_Ref', $empid);
        }
        $this->dbi->join('tblusers', 'tblusers.ID=tblmetadt.User_Ref');
        $this->dbi->join('tbldepartment', 'tbldepartment.ID=tblusers.Dept');
        $this->dbi->from('tblmetadt');
        return $this->dbi->get()->result();
    }

    public function createCredential($data) {
        $this->dbi->reset_query();
        $this->dbi->insert('tblcredentials', $data);
        return $this->dbi->insert_id();
    }

    public function changePassword($empid, $pwd) {
        $this->dbi->reset_query();
        $this->dbi->where('User_Ref', $empid);
        $this->dbi->where('Code', 'PWD');
        $exist = $this->dbi->get("tblcredentials")->result();

        if ($exist) {
            $this->dbi->where('User_Ref', $empid);
            $this->dbi->where('Code', 'PWD');
            $this->dbi->update('tblcredentials', array(
                'Content' => password_hash($pwd, PASSWORD_BCRYPT)
            ));
            return $this->empid;
        } else {
            $this->dbi->reset_query();
            $this->dbi->insert('tblcredentials', array(
                'User_Ref' => $empid,
                'Code' => 'PWD',
                'Content' => password_hash($pwd, PASSWORD_BCRYPT)
            ));
            return $this->dbi->insert_id();
        }
    }

}
