<?php
class super_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function insert_into($table, $data)
    {
        $this->db->trans_begin();
        $this->db->insert($table, $data);

        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return 0;
        }else{
            $this->db->trans_commit();
            return 1;
        }
    }

    public function login_register($email, $password){
        $this->db->select('*');
        $this->db->from('registration');
        $this->db->where("email='$email' AND (password = '$password' OR password = '".md5($password)."')");
        $query=$this->db->get();
        $rows=$query->num_rows();
        return $rows;
    }

    public function select_custom_where($table, $where)
    {
        $this->db->where($where);
        $query = $this->db->get($table);
        return $query->result();
    }

    public function select_all_order_by($table, $column, $order)
    {
        $this->db->order_by($column, $order);
        $query = $this->db->get($table);
        return $query->result();

    }
// =============reset=====================
    public function count_rows_where($table,$column,$value)
    {
        $this->db->from($table);
        $this->db->where($column,$value);
        $query = $this->db->get();
        $rows=$query->num_rows();
        return $rows;
    }

    public function update_where($table, $data, $column, $value)
    {
        $this->db->trans_begin();
        $this->db->where($column, $value);
        $this->db->update($table, $data);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return 0;
        } else {
            $this->db->trans_commit();
            return 1;
        }
    }
// ==========================================
}
