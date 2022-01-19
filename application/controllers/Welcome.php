<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->model("Mainmodel");
    }

    function index()
    {

        $data['mhs'] = $this->Mainmodel->getMhs();
        $this->load->view('home', $data);
    }
    function tambahUsul()
    {
        $this->load->view('tambahUsul');
    }
    function prosesInput()
    {
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $ipk = $this->input->post('ipk');
        $smt = $this->input->post('smt');
        $sks = $this->input->post('sks');
        $piagam = $this->input->post('piagam');
        $sk = $this->input->post('sk');
        $penghOrtu = $this->input->post('penghOrtu');

        $this->Mainmodel->addUsul($nim, $nama, $ipk, $smt, $sks, $piagam, $sk, $penghOrtu);
        redirect('welcome/index');
    }
    function hapusMhs($nimMhs)
    {
        $this->Mainmodel->hapusMhs($nimMhs);
        redirect("welcome/index");
    }
    function smarter()
    {
        $mhs = $this->Mainmodel->getMhs();
        $data['awal'] = $mhs;
        $jml = 0;
        foreach ($mhs as $hasil) {
            $data['nim'][] = $hasil->nim;
            $data['nama'][] = $hasil->nama;
            $ipk = $hasil->ipk;
            if ($ipk <= 2) {
                $data['ipk'][] = 0;
            } else if ($ipk > 2 && $ipk < 4) {
                //	$uipk = ($ipk - 2) / 2;
                $data['ipk'][] = round(($ipk - 2) / 2, 3);
            } else if ($ipk > 4) {
                //	$uipk = 1;
                $data['ipk'][] = 1;
            }

            //semester
            $semester = $hasil->semester;
            if ($semester <= 2) {
                $data['semester'][] = 1;
            } else if ($semester > 2 && $semester < 9) {
                $data['semester'][] = round((9 - $semester) / (9 - 2), 3);
            } else if ($semester >= 9) {
                $data['semester'][] = 0;
            }
            //jml_sks
            $sks = $hasil->sks;
            if ($sks <= 20) {
                $data['sks'][] = 0;
            } else if ($sks > 20 && $sks < 160) {
                $data['sks'][] = round(($sks - 20) / (160 - 20), 3);
            } else if ($sks >= 160) {
                $data['sks'][] = 1;
            }
            //piagam
            $piagam = $hasil->piagam;
            if ($piagam <= 0) {
                $data['piagam'][] = 0;
            } else if ($piagam > 0 && $piagam < 30) {
                $data['piagam'][] = round(($piagam - 0) / (30 - 0), 3);
            } else if ($piagam >= 30) {
                $data['piagam'][] = 1;
            }
            //sk
            $sk = $hasil->sk;
            if ($sk <= 0) {
                $data['sk'][] = 0;
            } else if ($sk > 0 && $sk < 30) {
                $data['sk'][] = round(($sk - 0) / (30 - 0), 3);
            } else if ($sk >= 30) {
                $data['sk'][] = 1;
            }
            //penghasilan kotor orang tua
            $penghasilan = $hasil->penghasilan_ortu;
            if ($penghasilan <= 300000) {
                $data['penghasilan'][] = 1;
            } else if ($penghasilan > 300000 && $penghasilan < 10000000) {
                $data['penghasilan'][] = round(((10000000 - $penghasilan) / (10000000 - 300000)), 3);
            } else if ($penghasilan >= 10000000) {
                $data['penghasilan'][] = 0;
            }
            $jml++;
        }
        $data['jml'] = $jml;
        $minFuzzyIPK = min($data['ipk']);
        $maxFuzzyIPK = max($data['ipk']);
        $minFuzzySEMESTER = min($data['semester']);
        $maxFuzzySEMESTER = max($data['semester']);
        $minFuzzyJMLSKS = min($data['sks']);
        $maxFuzzyJMLSKS = max($data['sks']);
        $minFuzzyPIAGAM = min($data['piagam']);
        $maxFuzzyPIAGAM = max($data['piagam']);
        $minFuzzySK = min($data['sk']);
        $maxFuzzySK = max($data['sk']);
        $minFuzzyPENGHASILAN = min($data['penghasilan']);
        $maxFuzzyPENGHASILAN = max($data['penghasilan']);

        $bobotIPK = 0.408;
        $bobotSEMESTER = 0.242;
        $bobotSKS = 0.158;
        $bobotPIAGAM = 0.103;
        $bobotSK = 0.061;
        $bobotPENGHASILAN = 0.028;

        /*    for($i=0;$i<=$jml;$i++){
            $data['']
        }*/

        for ($i = 0; $i < $jml; $i++) {
            //division by zero ipk
            if (($data['ipk'][$i] - $minFuzzyIPK) != 0) {
                $data['ipk2'][$i] = round(($data['ipk'][$i] - $minFuzzyIPK) / ($maxFuzzyIPK - $minFuzzyIPK), 3);
            } else {
                $data['ipk2'][$i] = 0;
            }
            //division by zero semester
            if (($data['semester'][$i] - $minFuzzySEMESTER) != 0) {
                $data['semester2'][$i] = round(($data['semester'][$i] - $minFuzzySEMESTER) / ($maxFuzzySEMESTER - $minFuzzySEMESTER), 3);
            } else {
                $data['semester2'][$i] = 0;
            }
            //division by zero sks
            if (($data['sks'][$i] - $minFuzzyJMLSKS) != 0) {
                $data['sks2'][$i] = round(($data['sks'][$i] - $minFuzzyJMLSKS) / ($maxFuzzyJMLSKS - $minFuzzyJMLSKS), 3);
            } else {
                $data['sks2'][$i] = 0;
            }
            //division by zero piagam
            if (($data['piagam'][$i] - $minFuzzyPIAGAM) != 0) {
                $data['piagam2'][$i] = round(($data['piagam'][$i] - $minFuzzyPIAGAM) / ($maxFuzzyPIAGAM - $minFuzzyPIAGAM), 3);
            } else {
                $data['piagam2'][$i] = 0;
            }
            //division by zero sk
            if (($data['sk'][$i] - $minFuzzySK) != 0) {
                $data['sk2'][$i] = round(($data['sk'][$i] - $minFuzzySK) / ($maxFuzzySK - $minFuzzySK), 3);
            } else {
                $data['sk2'][$i] = 0;
            }
            //division by zero penghasilan
            if (($data['penghasilan'][$i] - $minFuzzyPENGHASILAN) != 0) {
                $data['penghasilan2'][$i] = round(($data['penghasilan'][$i] - $minFuzzyPENGHASILAN) / ($maxFuzzyPENGHASILAN - $minFuzzyPENGHASILAN), 3);
            } else {
                $data['penghasilan2'][$i] = 0;
            }

            $data['total'][$i] = round($data['hasil'][$i] = ($data['ipk'][$i] * $bobotIPK) + ($data['semester'][$i] * $bobotSEMESTER) + ($data['sks'][$i] * $bobotSKS) + ($data['piagam'][$i] * $bobotPIAGAM) + ($data['sk'][$i] * $bobotSK) + ($data['penghasilan'][$i] * $bobotPENGHASILAN), 3);
        }

        $this->load->view('smarter', $data);
    }
}
