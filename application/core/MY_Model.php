<?php

date_default_timezone_set('Asia/Kolkata');

if (!defined('BASEPATH')) EXIT("No direct script access allowed");

class MY_Model extends CI_Model 
{
    public $image_url = '';

    public function __construct() 
    {
        parent::__construct();

        $this->load->database();

        $this->tbl_prefix = 'ff_';

        $this->image_url = base_url('assets/upload/');

        $this->tbl_findcond = array(
            'is_deleted' => '0'
        );

        $this->tbls_join_conds = "";
        $this->is_group_field  = "";
    }

    public function getData($table_name = '', $conditions = array(), $from_fields = array(), $is_multy_result = 1, $join_table = array()) {

        $full_table_name = $table_name;

        if ($full_table_name != '') 
        {
            $tbl_conds = array();

            $tbl_cond = $full_table_name . '.is_deleted';

            $this->tbl_findcond1 = array(
                $tbl_cond => '0'
            );

            if (is_array($conditions)) 
            {
                foreach ($conditions as $key => $val) 
                {
                    $tbl_conds[$full_table_name . '.' . $key] = $val;
                }
            }

            //select fields of main table 
            $tbl_selects = $full_table_name . '.*';

            if (!empty($from_fields)) 
            {
                if (is_array($from_fields)) 
                {
                    $sel_flds = '';

                    foreach ($from_fields as $from_field) 
                    {
                        if ($sel_flds == '') 
                        {
                            $sel_flds = $full_table_name . '.' . $from_field;
                        } 
                        else 
                        {
                            $sel_flds .= ', ' . $full_table_name . '.' . $from_field;
                        }
                    }

                    if ($sel_flds != '') 
                    {
                        $tbl_selects = $sel_flds;
                    }
                }
            }

            if (!empty($join_table)) 
            {
                if (!empty($conditions)) 
                {
                    $conditions = array_merge($this->tbl_findcond1, $conditions);
                } 
                else 
                {
                    $tbl_conds = $this->tbl_findcond1;
                }

                if (is_array($join_table)) 
                {
                    foreach ($join_table as $join_type => $jointables) 
                    {
                        if (!empty($jointables)) 
                        {
                            if (is_array($jointables)) 
                            {
                                foreach ($jointables as $join_tbl_name => $joindata) 
                                {
                                    $tbls_as = explode('as', $join_tbl_name);

                                    if (count($tbls_as) == 2) 
                                    {
                                        $join_tbl_name = $tbls_as[0];
                                        $joindata['as'] = $tbls_as[1];
                                    }

                                    $on_cond            = '';
                                    $join_table_name    = '';
                                    $join_table_name_fl = $join_tbl_name;
                                    $as                 = '';

                                    // abreviation 
                                    if (isset($joindata['as']) && !empty($joindata['as'])) 
                                    {
                                        $as = $joindata['as'];
                                        $join_table_name = $as;
                                    } 
                                    else 
                                    {
                                        $join_table_name = $join_table_name_fl;
                                    }

                                    if (isset($joindata['on']) && !empty($joindata['on'])) 
                                    {
                                        foreach ($joindata['on'] as $on_key => $on_val) 
                                        {
                                            if (empty($on_cond)) 
                                            {
                                                $on_cond = $full_table_name . '.' . $on_key . '=' . $join_table_name . '.' . $on_val;
                                            } 
                                            else 
                                            {
                                                $on_cond .= ' AND ' . $full_table_name . '.' . $on_key . '=' . $join_table_name . '.' . $on_val;
                                            }
                                        }
                                    }

                                    if (isset($joindata['on_cond']) && !empty($joindata['on_cond'])) 
                                    {
                                        foreach ($joindata['on_cond'] as $on_con_key => $on_con_val) 
                                        {
                                            $on_cond .= ' AND ' . $join_table_name . '.' . $on_con_key . '=' . $on_con_val;
                                        }
                                    }

                                    if (isset($joindata['condition']) && !empty($joindata['condition'])) 
                                    {
                                        foreach ($joindata['condition'] as $cod_key => $con_val) 
                                        {
                                            if ($cod_key == 'before_like') 
                                            {
                                                if (is_array($con_val)) 
                                                {
                                                    foreach ($con_val as $lk_key => $lk_val) 
                                                    {
                                                        $this->db->like($join_table_name . '.' . $lk_key, $lk_val, 'before');
                                                    }
                                                }
                                            } 
                                            elseif ($cod_key == 'after_like') 
                                            {
                                                if (is_array($con_val)) 
                                                {
                                                    foreach ($con_val as $lk_key => $lk_val) 
                                                    {
                                                        $this->db->like($join_table_name . '.' . $lk_key, $lk_val, 'after');
                                                    }
                                                }
                                            } 
                                            elseif ($cod_key == 'both_like') 
                                            {
                                                if (is_array($con_val)) 
                                                {
                                                    foreach ($con_val as $lk_key => $lk_val) 
                                                    {
                                                        $this->db->like($join_table_name . '.' . $lk_key, $lk_val, 'both');
                                                    }
                                                }
                                            } 
                                            else 
                                            {
                                                $tbl_conds[$join_table_name . '.' . $cod_key] = $con_val;
                                            }
                                        }
                                    }

                                    if (isset($joindata['fields']) && !empty($joindata['fields'])) 
                                    {
                                        foreach ($joindata['fields'] as $field) 
                                        {
                                            if (empty($tbl_selects)) 
                                            {
                                                $tbl_selects = $join_table_name . '.' . $field;
                                            }
                                            else 
                                            {
                                                $tbl_selects .= ', ' . $join_table_name . '.' . $field;
                                            }
                                        }
                                    }

                                    if (!empty($as)) 
                                    {
                                        $join_table_name_fl = $join_table_name_fl . ' as ' . $as;
                                    }

                                    $this->db->join($join_table_name_fl, $on_cond, $join_type);
                                }
                            }
                        }
                    }
                }
            } 
            else 
            {
                if (!empty($conditions)) 
                {
                    $conditions = array_merge($this->tbl_findcond, $conditions);
                } 
                else 
                {
                    $tbl_conds = $this->tbl_findcond;
                }
            }

            $this->db->select($tbl_selects);
            $this->db->from($full_table_name);
            $this->db->where($tbl_conds);

            $query = $this->db->get();

            if ($is_multy_result) 
            {
                $tbl_reult_rows = $query->result();
            } 
            else 
            {
                $tbl_reult_rows = $query->row();
            }

            return $tbl_reult_rows;
        }

        return array();
    }

    public function insertData($tbl_name = '', $insert_data = array()) 
    {
        if ($tbl_name != '') 
        {
            $this->db->insert($tbl_name, $insert_data);
            $tbl_id = $this->db->insert_id();
            return $tbl_id;
        }

        return false;
    }

    public function updateData($tbl_name = '', $set_data = array(), $condtions = array(), $not_in = 0) 
    {
        if ($tbl_name != '') 
        {
            if (is_array($condtions) && count($condtions) > 0) 
            {
                $this->db->set($set_data);

                foreach ($condtions as $key => $val) 
                {
                    if (is_array($val) && count($val) > 0) 
                    {
                        if ($not_in) 
                        {
                            $this->db->where_not_in($key, $val);
                        } 
                        else 
                        {
                            $this->db->where_in($key, $val);
                        }

                        unset($condtions[$key]);
                    }
                }

                $this->db->where($condtions);
                $this->db->update($tbl_name);
                
                return true;
            }
        }

        return false;
    }

    public function is_velid_tbl_row($tbl_name = '', $condition = array()) 
    {
        if ($tbl_name != '') 
        {
            $condition = array_merge($condition, $this->tbl_findcond);

            $count = $this->db->from($tbl_name)
                              ->where($condition)
                              ->count_all_results();
            return $count;
        }

        return false;
    }

    public function customQuery($query = '') 
    {
        if (!empty($query)) 
        {
            $result = $this->db->query($query)
                           ->result();
            return $result;
        }

        return false;
    }

    public function customupdate($query = '') 
    {
        if (!empty($query)) 
        {
            $result = $this->db->query($query);
            return true;
        }

        return false;
    }
    
    public function customDelete($query = '') 
    {
        if (!empty($query)) 
        {
            $result = $this->db->query($query);
            return true;
        }

        return false;
    }

    public function customInsert($query = '') 
    {
        if (!empty($query)) 
        {
            $this->db->query($query);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        }

        return false;
    }
}

?>