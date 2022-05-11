
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pajak2 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
	}
	public function index()
	{
		if($this->session->userdata('LoggedIN') == TRUE) redirect('Pajak2/awal');
		$data['user']=$this->M_pajak2->tampil_user()->result();
		$this->load->view('index',$data);
	}
	public function login()
	{
		$this->load->view('login');
	}
	public function register()
	{
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$data=array(
			'username'=>$username,
			'password'=>$password
		);
		$this->M_pajak2->register("akun",$data);
		redirect("pajak2");
	}
	public function login1()
	{
		$username=$this->input->post('username');
		$password=$this->input->post('password');

$data['cek'] = $this->db->query("SELECT * FROM akun WHERE username = '$username' AND password = '$password'")->result();
if ($data['cek'] != NULL) {
	foreach ($data['cek'] as $key):
		$id1 = $key->id;
		$username1 = $key->username;
		$email1 = $key->email;
	endforeach;
	$data_session=array(
		'id'=>$id1,
		'username'=>$username1,
		'email'=>$email1,
		'LoggedIN' => TRUE,
	);
	$this->session->set_userdata($data_session);
	if ($data >0) {
		redirect('pajak2/awal');
	}
}else{
 	echo"Username atau Password salah!";
}
	}
	public function awal()
	{
		if($this->session->userdata('LoggedIN') == FALSE) redirect('Pajak2/logout');
		$data["title"] = 'Data Nama Perusahaan';
		$data['user']=$this->M_pajak2->tampil_user()->result();
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar');
		$this->load->view('template/footer');
		$this->load->view('awal',$data);
	}
	public function create()
	{
		$id_user=$this->input->post('id_user');
		$saldo_awal=$this->input->post('saldo_awal');
		$kode_akun=$this->input->post('kode_akun');
		$nama_akun=$this->input->post('nama_akun');
		$tipe=$this->input->post('tipe');

		$data=array(
			'id_user'=>$id_user,
			'saldo_awal'=>$saldo_awal,
			'kode_akun'=>$kode_akun,
			'nama_akun'=>$nama_akun,
			'tipe'=>$tipe
		);
		$this->M_pajak2->input_data($data,'neraca');
		redirect('pajak2/NS/'.$id_user);
	}
	public function create1()
	{
		$id_akun=$this->input->post('id');
		$nama_pimpinan=$this->input->post('nama_pimpinan');
		$nama_perusahaan=$this->input->post('nama_perusahaan');
		$periode=$this->input->post('periode');
		$data=array(
			'id_akun'=>$id_akun,
			'periode'=>$periode,
			'nama_pimpinan'=>$nama_pimpinan,
			'nama_perusahaan'=>$nama_perusahaan,
		);
		$this->M_pajak2->input_data($data,'user');
		redirect('pajak2/awal');
		// $data['id'] =$this->db->query("select id from user where nama_perusahaan= '{$nama_perusahaan}' AND nama_pimpinan= '{$nama_pimpinan}' AND periode='{$periode}'")->result();
		// $this->load->view('input',$data);
	}
	public function create2()
	{
		$pembayaran=$this->input->post('pembayaran');
		$pembayaran1=$this->input->post('pembayaran1');
		$id_user=$this->input->post('id_user');
		$no_transaksi=$this->input->post('no_transaksi');
		$keterangan=$this->input->post('keterangan');
		$jumlah=$this->input->post('jumlah');
		$kode_user=$this->input->post('kode_user');
		$kode_user1=$this->input->post('kode_user1');

		$data=array(
			'id_user'=>$id_user,
			'no_transaksi'=>$no_transaksi,
			'keterangan'=>$keterangan,
			'jumlah'=>$jumlah,
			'kode_user'=>$kode_user,
			'pembayaran'=>$pembayaran
		);
		$data1=array(
			'id_user'=>$id_user,
			'no_transaksi'=>$no_transaksi,
			'keterangan'=>$keterangan,
			'jumlah'=>$jumlah,
			'kode_user'=>$kode_user1,
			'pembayaran'=>$pembayaran1
		);
		$this->M_pajak2->input_data($data,'data');
		$this->M_pajak2->input_data($data1,'data');
		redirect('pajak2/JU/'.$id_user);
	}

	public function NS($id)
	{
		if($this->session->userdata('LoggedIN') == FALSE) redirect('Pajak2/logout');
		$data["title"] = 'Data Neraca Saldo';
		$data['idd']=$this->M_pajak2->get_id1($id)->result();
		$data['neracaa']=$this->M_pajak2->tampil_neraca()->result();
		$data['dataa']=$this->M_pajak2->tampil_data()->result();
		$data['user']=$this->M_pajak2->tampil_user()->result();
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar');
		$this->load->view('template/footer');
		$this->load->view('NS',$data);
	}
	public function JU($id)
	{
		if($this->session->userdata('LoggedIN') == FALSE) redirect('Pajak2/logout');
		//$data["per"]=$this->db->query("SELECT id from user where periode='{$dates}'")->result();
		$data['idd']=$this->M_pajak2->get_id1($id)->result();
		$data["title"] = 'Data Jurnal Umum';
		$data['user']=$this->M_pajak2->tampil_user()->result();
		$data['dataa']=$this->M_pajak2->tampil_data()->result();
		$data['neracaa']=$this->M_pajak2->tampil_neraca()->result();
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar');
		$this->load->view('template/footer');
		$this->load->view('JU',$data);
	}
	function update(){
		$id=$this->input->post('id');
		$nama_perusahaan=$this->input->post('nama_perusahaan');
		$nama_pimpinan=$this->input->post('nama_pimpinan');
		$periode=$this->input->post('periode');

		$data=array(
			'nama_perusahaan'=>$nama_perusahaan,
			'nama_pimpinan'=>$nama_pimpinan,
			'periode'=>$periode
		);

		$where = array(
			'id'=>$id
		);

		$this->M_pajak2->update_data($where,$data,'user');
		redirect('pajak2/awal');
	}
	function update1(){
		$id=$this->input->post('id');
		$id_user=$this->input->post('id_user');
		$kode_akun2=$this->input->post('kode_akun2');
		$kode_akun=$this->input->post('kode_akun');
		$nama_akun=$this->input->post('nama_akun');
		$saldo_awal=$this->input->post('saldo_awal');
		$tipe=$this->input->post('tipe');

		$data['tampil']=$this->M_pajak2->tampil_data()->result();
		foreach ($data['tampil'] as $key){ if($key->id_user==$id_user){if($key->kode_user==$kode_akun2){
					$data['id']=$this->M_pajak2->get_id2($kode_akun2)->result();
					$data1=array(
						'kode_user'=>$kode_akun
					);
					foreach ($data['id'] as $key) {
						$id2=$key->id;
						$where1=array(
							'id'=>$id2
						);
						$this->M_pajak2->update_data($where1,$data1,'data');
					}
				}
			}
		}
		$data=array(
			'kode_akun'=>$kode_akun,
			'nama_akun'=>$nama_akun,
			'saldo_awal'=>$saldo_awal,
			'tipe'=>$tipe
		);

		$where = array(
			'id'=>$id
		);

		$this->M_pajak2->update_data($where,$data,'neraca');
		redirect('pajak2/NS/'.$id_user);
	}
	function update2(){
		$id_user=$this->input->post('id_user');
		$id=$this->input->post('id');
		$keterangan=$this->input->post('keterangan');
		$jumlah=$this->input->post('jumlah');
		$pembayaran=$this->input->post('pembayaran');
		$no_transaksi=$this->input->post('no_transaksi');
		$kode_user=$this->input->post('kode_user');
		$data=array(
			'keterangan'=>$keterangan,
			'jumlah'=>$jumlah,
			'pembayaran'=>$pembayaran,
			'no_transaksi'=>$no_transaksi,
			'kode_user'=>$kode_user
		);

		$where = array(
			'id'=>$id
		);

		$this->M_pajak2->update_data($where,$data,'data');
		redirect('pajak2/JU/'.$id_user);
	}
	function hapus($id){
		$where=array('id'=>$id);
		$where1=array('id_user'=>$id);
		$this->M_pajak2->hapus_data($where1,'data');
		$this->M_pajak2->hapus_data($where1,'neraca');
		$this->M_pajak2->hapus_data($where,'user');
		redirect('pajak2/awal');
	}
	function hapus1(){
		$id=$this->input->get('id');
		$id_user=$this->input->get('id_user');
		$kode_akun=$this->input->get('kode_akun');
		$where1=array('id'=>$id);
		$where=array('kode_user'=>$kode_akun);
		$this->M_pajak2->hapus_data($where1,'neraca');
		$this->M_pajak2->hapus_data($where,'data');
		redirect('pajak2/NS/'.$id_user);
	}
	function hapus2(){
		$id=$this->input->get('id');
		$id_user=$this->input->get('id_user');
		$where1=array('id'=>$id);
		$this->M_pajak2->hapus_data($where1,'data');
		redirect('pajak2/JU/'.$id_user);
	}
	function lneraca($id){
		if($this->session->userdata('LoggedIN') == FALSE) redirect('Pajak2/logout');
		$data['idd']=$this->M_pajak2->get_id1($id)->result();
		$data['title']='Laporan Neraca';
		$data['user']=$this->M_pajak2->tampil_user()->result();
		$data['neracaa']=$this->M_pajak2->tampil_neraca()->result();
		$data['dataa']=$this->M_pajak2->tampil_data()->result();
		$this->load->view('template/header1',$data);
		$this->load->view('template/footer1');
		$this->load->view('lneraca',$data);
	}
	function lPM($id){
		if($this->session->userdata('LoggedIN') == FALSE) redirect('Pajak2/logout');
		$data['idd']=$this->M_pajak2->get_id1($id)->result();
		$data['title']='Laporan Neraca';
		$data['user']=$this->M_pajak2->tampil_user()->result();
		$data['neracaa']=$this->M_pajak2->tampil_neraca()->result();
		$data['dataa']=$this->M_pajak2->tampil_data()->result();
		$this->load->view('template/header1',$data);
		$this->load->view('template/footer1');
		$this->load->view('lPM',$data);
	}
	function lLB($id){
		if($this->session->userdata('LoggedIN') == FALSE) redirect('Pajak2/logout');
		$data['idd']=$this->M_pajak2->get_id1($id)->result();
		$data['title']='Laporan Laba Rugi';
		$data['user']=$this->M_pajak2->tampil_user()->result();
		$data['dataa']=$this->M_pajak2->tampil_data()->result();
		$periode=$this->input->post('periode');
		$date = new DateTime($periode);
		$date->modify('-1 month');
		$dates=$date->format('Y-m');
		$this->M_pajak2->get_id($dates);
		$data['per']=$this->M_pajak2->get_id($dates)->result();
		$data['neracaa']=$this->M_pajak2->tampil_neraca()->result();
		$this->load->view('lLB',$data);
	}
	public function edit3($id){
		$editdata = $this->M_pajak2->get_by_id_general('user','id',$id);
		if($editdata == TRUE){
			$editdata = json_encode($editdata,JSON_PRETTY_PRINT);
			echo $editdata;
		}else{
			echo "";
		}
	}
	public function edit1($id){
		$editdata = $this->M_pajak2->get_by_id_general('neraca','id',$id);
		if($editdata == TRUE){
			$editdata = json_encode($editdata,JSON_PRETTY_PRINT);
			echo $editdata;
		}else{
			echo "";
		}
	}
	public function edit2($id){
		$editdata = $this->M_pajak2->get_by_id_general('data','id',$id);
		if($editdata == TRUE){
			$editdata = json_encode($editdata,JSON_PRETTY_PRINT);
			echo $editdata;
		}else{
			echo "";
		}
	}
	public function cekUser(){
		$username=$this->input->get('username');
		$cek = $this->M_pajak2->get_by_id_general('akun','username',$username);
		if($cek){
			echo "true";
		}else {
			echo "false";
		}
	}
	public function cekEmail(){
	$email = $this->input->get('email');
	$cek = $this->M_pajak2->get_by_id_general('akun','email',$email);

	if($cek){
		echo "true";
	}else {
		echo "false";
	}

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect("pajak2");
	}
}
