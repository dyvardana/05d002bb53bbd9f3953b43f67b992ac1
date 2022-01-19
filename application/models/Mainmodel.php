<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mainmodel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database(); //加上这句
    }


    public function getMhs()
    {
        $this->db->select('*');
        $this->db->from('tb_mahasiswa');
        $this->db->join('usul_mahasiswa', 'tb_mahasiswa.nim=usul_mahasiswa.nim');
        return $this->db->get()->result();
    }
    function addUsul($nim, $nama, $ipk, $smt, $sks, $piagam, $sk, $pengOrtu)
    {
        $this->db->query("INSERT INTO `tb_mahasiswa` (`nim`, `nama`) VALUES ('$nim', '$nama')");
        $this->db->query("INSERT INTO `usul_mahasiswa` (`nim`, `ipk`, `semester`, `sks`, `piagam`, `sk`, `penghasilan_ortu`) VALUES ('$nim', '$ipk', '$smt', '$sks', '$piagam', '$sk', '$pengOrtu');");
    }
    function hapusMhs($idMhs)
    {
        $this->db->query("DELETE FROM `tb_mahasiswa` WHERE `nim` = '$idMhs' ");
        $this->db->query("DELETE FROM `usul_mahasiswa` WHERE `nim` = '$idMhs'; ");
    }
}
