<?php

namespace App\Controllers;

use App\Models\ComplainModel;
use App\Models\EditModel;

class User extends BaseController
{
	protected $la;
	public function __construct()
	{
		$this->EditModel = new EditModel();
		$this->ComplainModel = new ComplainModel();
	}
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['complain'] = $this->ComplainModel->count(user()->email);
		return view('user/index', $data);
	}
	public function profile()
	{
		$data['title'] = 'Profile Saya';
		return view('user/profile', $data);
	}
	public function edit()
	{
		session();
		$data = [
			'title' => 'Ubah Profile',
			'validation' => \Config\Services::validation()
		];

		return view('user/edit', $data);
	}
	public function update($id)
	{
		$this->EditModel->save([
			'id' =>  $id,
			'email' => $this->request->getVar('email'),
			'username' => $this->request->getVar('username'),
			'fullname' => $this->request->getVar('fullname'),
		]);
		$upload = $_FILES['user_image']['name'];

		if ($upload) {
			if (!$this->validate([
				'user_image' => [
					'rules' => 'max_size[user_image,2048]|mime_in[user_image,image/jpg,image/jpeg,image/png]|is_image[user_image]',
					'errors' => [
						'uploaded' => 'Pilih File Terlebih Dahulu',
						'max_size' => 'Ukuran File Terlalu Besar Maximal 1MB',
						'mime_in'  => 'File harus JPG JPEG atau PNG',
						'ext_in'  => 'File harus JPG JPEG atau PNG'
					]
				]

			])) {

				return redirect()->to('/user/edit')->withInput();
			}
			$filename = $this->request->getFile('user_image');
			$filename->move('img/profile/');
			$namaFile = $filename->getName();
			$this->EditModel->save([
				'id' =>  $id,
				'email' => $this->request->getVar('email'),
				'username' => $this->request->getVar('username'),
				'fullname' => $this->request->getVar('fullname'),
				'user_image' => $namaFile
			]);

			session()->setFlashdata('pesan', 'Profile berhasil Diubah');
			return redirect()->to('/user/edit');
		}
		session()->setFlashdata('pesan', 'Profile berhasil Diubah');
		return redirect()->to('/user/edit');
	}
	public function changepassword()
	{
		$data = [
			'title' => 'Ubah Password',
			'validation' => \Config\Services::validation()

		];

		return view('user/change-password', $data);
	}
	public function change($id)
	{
		if (!$this->validate([
			'current_password' => [
				'rules' => 'required|trim',
				'errors' => [
					'required' => 'Harus Diisi'
				]
			],
			'new_password1' => [
				'rules' => 'required|trim|min_length[8]|matches[new_password2]',
				'errors' => [
					'required' => 'Harus Diisi',
					'min_length' => 'Minimal 8 Karakter',
					'matches'  => 'Password Harus Sama'

				]
			],
			'new_password2' =>  [
				'rules' => 'required|trim|min_length[8]|matches[new_password1]',
				'errors' => [
					'required' => 'Harus Diisi',
					'min_length' => 'Minimal 8 Karakter',
					'matches'  => 'Password Harus Sama'

				]
			],

		])) {

			return redirect()->to('/user/changepassword')->withInput();
		}
		$user = $this->EditModel->find($id);
		$current_password = $this->request->getVar('current_password');
		$new_password = $this->request->getVar('new_password1');
		$password = $user->password_hash;
		if (!password_verify(base64_encode(hash('sha384', $current_password, true)), $password)) {

			session()->setFlashdata('gagal', 'Wrong Current Password!');
			return redirect()->to('/user/changepassword');
		} else {
			if ($current_password == $new_password) {
				session()->setFlashdata('gagal', 'New Password cannot be the same as current Password ');
				return redirect()->to('/user/changepassword');
			} else {
				$password_hash = password_hash(base64_encode(hash('sha384', $new_password, true)), PASSWORD_DEFAULT);
				$this->EditModel->save(
					[
						'id' =>  $id,
						'password_hash' => $password_hash
					]
				);
				session()->setFlashdata('pesan', 'Password berhasil Diubah');
				return redirect()->to('/user/changepassword');
			}
		}
	}
}
