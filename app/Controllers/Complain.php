<?php

namespace App\Controllers;

use App\Models\ComplainModel;

class Complain extends BaseController
{
	protected $p;
	public function __construct()
	{
		$this->mModel = new ComplainModel();
	}
	public function index()
	{
	
		$skkp = $this->mModel->findAll();
		$data['title'] = 'Komplain';
		$data['p'] = $skkp;
		return view('complain/index',$data);
	}
    public function savep()
	{
		$this->mModel->save([
			'email' => $this->request->getVar('email'),
			'kepada' => $this->request->getVar('kepada'),
            'subject' => $this->request->getVar('subject'),
			'complain' => $this->request->getVar('complain'),
			'status' => $this->request->getVar('status')
		]);
		session()->setFlashdata('pesan','File berhasil ditambahkan');
		return redirect()->to('/complain');
	}
    public function deletep($id)
	{
		$this->mModel->delete($id);
		session()->setFlashdata('pesan','File berhasil dihapus ');
		return redirect()->to('/pengumuman');
	}
    public function downloadp($id)
	{
		
		$datafile = $this->mModel->find($id);
		return $this->response->download('file/pengumuman/' . $datafile->file, null);
	}
	public function myComplain()
	{
	
		$skkp = $this->mModel->where('email', user()->email)->findAll();
		$data['title'] = 'Komplain Saya';
		$data['p'] = $skkp;
		return view('complain/mycomplain',$data);
	}

}