<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usermodel
 *
 * @author badz
 */
class langdb_model extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->library('encrypt');
        $this->load->library('session');
        date_default_timezone_set('Asia/Manila');
        
    }
    
    function get_last_ten_entries()
    {
        $query = $this->db->get('entries', 10);
        return $query->result();
    }

    function insert_entry($table,$data)
    {
        $this->db->insert($table, $data);
    }       
    
    function update_entry($table,$id_name,$id,$data)
    {
        $this->db->where($id_name,$id);
        $this->db->update($table, $data);
    }
    
    function delete_entry($table,$id_name,$id){
        $this->db->where($id_name,$id);
        $this->db->delete($table);
        $this->db->dbprefix($table);
    }
    
    function get_data_by_id($table,$field,$idname,$id){
        $sql = "select $field from $table where $idname=$id";
        return $this->db->query($sql);
    }
    
    //Genres
    function get_genres(){
        $sql = "select * from ldb_genre;";
        return $this->db->query($sql);
    }
    
    function get_genre($id){
        $sql = "select * from ldb_genre where id = '$id'";
        return $this->db->query($sql);
    }
//End of Genres
    
    //Languages
    function get_languages(){
        $sql = "select * from ldb_language;";
        return $this->db->query($sql);
    }
    
    function get_language($id){
        $sql = "select * from ldb_language where id = '$id'";
        return $this->db->query($sql);
    }
//End of Languages
    
    //Texts
    function get_texts(){
        $sql = "select * from {PRE}text lt
                inner join {PRE}language ll on ll.id = lt.language_id
                inner join {PRE}genre lg on lg.id = lt.genre_id
                ;";
        return $this->db->query($sql);
    }
    
    function get_text($id){
        $sql = "select * from text where id = '$id'";
        $this->db->dbprefix('text');
        return $this->db->query($sql);
    }
//End of Texts
    
    //Parts of Speech
    function get_psos(){
        $sql = "select * from ldb_pos;";
        return $this->db->query($sql);
    }
    
    function get_pos($id){
        $sql = "select * from ldb_pos where id = '$id'";
        
        return $this->db->query($sql);
    }
//End of Parts of Speech
    
    //Domains
    function get_domains(){
        $sql = "select * from ldb_domain;";
        return $this->db->query($sql);
    }
    
    function get_domain($id){
        $sql = "select * from ldb_domain where id = '$id'";
        return $this->db->query($sql);
    }
//End of Domains
    
    //Words
    function get_words(){
        $sql = "select lw.*,ld.domain,lp.pos,ifnull(lpsec.pos,'') as secpos from ldb_word lw
                    inner join ldb_domain ld on ld.id = lw.domain_id
                    inner join ldb_pos lp on lp.id = lw.pri_pos_id
                    left outer join ldb_pos lpsec on lpsec.id = lw.sec_pos_id
                ;";
        return $this->db->query($sql);
    }
    
    function get_word($id){
        $sql = "select * from ldb_word where id = '$id'";
        return $this->db->query($sql);
    }
//End of Words
    
}
?>
