<?php

namespace App\Controllers;
use App\Models\M_adopsi;

class Home extends BaseController
{
    public function tes()
    {
    	if (session()->get('level')>0){
        echo view ('header');
    	echo view ('menu');
        echo view('tes');
        echo view ('footer');
          } else{
              return redirect()->to('home/login');
           }
    }

    public function user()
    {
         if (session()->get('level')>0){
        $model = new M_adopsi();
        $data ['manda'] = $model ->tampil('user','id_user');
        $where=array('id_user'=>session()->get('id'));
        echo view ('header');
        echo view ('menu');
        echo view('user', $data);
        echo view ('footer');
          } else{
              return redirect()->to('home/login');
           }
    }

    public function tambah_user() {
          if (session()->get('level')>0){
        $model = new M_adopsi();
        $data['manda'] = $model->tampil('user', 'id_user');
        echo view('header');
        echo view('menu');
        echo view('tambah_user', $data);
        echo view('footer');
         } else{
              return redirect()->to('home/login');
           }
    }
    public function aksi_t_user() {
        $model = new M_adopsi();
        $a = $this->request->getPost('id_user');
        $b = $this->request->getPost('username');
        $c = $this->request->getPost('pw');
        $d = $this->request->getPost('level');

        $isi = array(
            'id_user' => $a,
            'username' => $b,
            'password_user' => $c,
            'level' => $d

        );
        $model->tambah('user', $isi);

        return redirect()->to('home/user');
    }
    public function edit_user($id){
        if (session()->get('level')>0){
     $model = new M_adopsi();
     $where=array('id_user'=>$id);

     $data['satu']=$model->getWhere('user',$where);
     echo view ('header');
     echo view ('menu', $data);
     echo view ('e_user',$data);
     echo view ('footer');
           } else{
              return redirect()->to('home/login');
           }
 }

 public function aksi_e_user()
 {
    $model = new M_adopsi();
    $a = $this->request->getPost('username');
    $b = $this->request->getPost('password_user');
    $c = $this->request->getPost('level');
    $id = $this->request->getPost('id');

    $where=array('id_user'=>$id);

    $isi = array(
       'username' => $a,
       'password_user' => $b,
       'level' => $c

   );

    $model ->edit('user', $isi, $where);

    return redirect()->to('home/user');
}

public function hapus_user($id){
    $model = new M_adopsi();
    $where=array('id_user'=>$id);
    $model->hapus('user',$where);
    return redirect()->to('home/user');
}
public function admin()
{
       if (session()->get('level')>0){
    $model = new M_adopsi();
    $data ['manda'] = $model ->tampil('admin','id_admin');
    $where=array('id_admin'=>session()->get('id'));
    echo view ('header');
    echo view ('menu');
    echo view('admin', $data);
    echo view ('footer');
     } else{
              return redirect()->to('home/login');
           }
}
public function tambah_admin() {
      if (session()->get('level')>0){
    $model = new M_adopsi();
    $data['manda'] = $model->tampil('admin', 'id_admin');
    echo view('header');
    echo view('menu');
    echo view('tambah_admin', $data);
    echo view('footer');
     } else{
              return redirect()->to('home/login');
           }
}

public function aksi_t_admin() {
        $model = new M_adopsi();
        $a = $this->request->getPost('id_admin');
        $b = $this->request->getPost('username');
        $c = $this->request->getPost('pw');
        $d = $this->request->getPost('level');

        $isi = array(
            'id_admin' => $a,
            'username' => $b,
            'password_admin' => $c,
            'level' => $d

        );
        $model->tambah('admin', $isi);

        return redirect()->to('home/admin');
    }
public function hapus_admin($id){
    $model = new M_adopsi();
    $where=array('id_admin'=>$id);
    $model->hapus('admin',$where);
    return redirect()->to('home/admin');
}

 public function edit_admin($id){
        if (session()->get('level')>0){
     $model = new M_adopsi();
     $where=array('id_admin'=>$id);

     $data['satu']=$model->getWhere('admin',$where);
     echo view ('header');
     echo view ('menu', $data);
     echo view ('e_admin',$data);
     echo view ('footer');
           } else{
              return redirect()->to('home/login');
           }
 }




public function login()
{
    echo view('header');
    echo view('login');
}

public function aksi_login()
{
    $u=$this->request->getPost('username');
    $p=$this->request->getPost('password');

    $model = new M_adopsi();
    $where=array(
        'username'=> $u,
        'password'=> $p
    );
    $cek = $model->getWhere('user',$where);
    $cek2 = $model->getWhere('admin',$where);
    if ($cek>0){
        session()->set('id_admin',$cek->id_user);
        session()->set('username',$cek->username);
        session()->set('level',$cek->level);
        return redirect()->to('home/tes');
    }elseif($cek2>0){
        session()->set('id_user',$cek2->id_admin);
        session()->set('username',$cek2->username);
        session()->set('level',$cek2->level);
        return redirect()->to('home/tes');
    }else{
        return redirect()->to('home/login');
    }

}
public function logout()
{
    session()->destroy();
    return redirect()->to('home/login');
}


public function signup()
{
    if (session()->get('level')>0){
        $model = new M_adopsi();
        echo view ('menu');
        $data ['manda'] = $model ->join('user', 'level','user.level=level.level','id_user');
        echo view('header');
        echo view('signup',$data);
    }else{
        return redirect()->to('home/login');
    }
}
public function aksi_signup()
{
    $model = new M_adopsi();
    $a = $this->request->getPost('username');
    $b = $this->request->getPost('password');
    $c = $this->request->getPost('level');

    $isi = array(
        'username' => $a,
        'password' => $b,
        'level' => $c

    );
    $model ->tambah('user', $isi);

    return redirect()->to('home/login');
}
  public function halaman_utama()
    {
         if (session()->get('level')>0){
        $model = new M_adopsi();
     $data ['manda'] = $model ->join('hewan', 'level','hewan.id_hewan=hewan.id_hewan', 'id_hewan');
        $where=array('id_halaman'=>session()->get('id'));
        echo view ('header');
        echo view ('menu');
        echo view('halaman_utama', $data);
        echo view ('footer');
          } else{
              return redirect()->to('home/login');
           }
    }

public function hewan()
    {
         if (session()->get('level')>0){
        $model = new M_adopsi();
        $data ['manda'] = $model ->tampil('hewan','id_hewan');
        $where=array('id_hewan'=>session()->get('id'));
        echo view ('header');
        echo view ('menu');
        echo view('hewan', $data);
        echo view ('footer');
          } else{
              return redirect()->to('home/login');
           }
    }
public function tambah_hewan() {
          if (session()->get('level')>0){
        $model = new M_adopsi();
        $data['manda'] = $model->tampil('hewan', 'id_hewan');
        echo view('header');
        echo view('menu');
        echo view('tambah_hewan', $data);
        echo view('footer');
         } else{
              return redirect()->to('home/login');
           }
    }
 public function aksi_t_hewan() {
        $model = new M_adopsi();
        $a = $this->request->getPost('id_hewan');
        $b = $this->request->getPost('nama_hewan');
        $c = $this->request->getPost('usia_hewan');
        $d = $this->request->getPost('kesehatan_hewan');
        $e = $this->request->getPost('jk_hewan');
        $f = $this->request->getPost('status');

        $isi = array(
            'id_hewan' => $a,
            'nama_hewan' => $b,
            'usia_hewan' => $c,
            'kesehatan_hewan' => $d,
            'jk_hewan' => $e,
            'status' => $f

        );
        $model->tambah('hewan', $isi);

        return redirect()->to('home/hewan');
    }

    public function edit_hewan($id){
        if (session()->get('level')>0){
     $model = new M_adopsi();
     $where=array('id_hewan'=>$id);

     $data['satu']=$model->getWhere('hewan',$where);
     echo view ('header');
     echo view ('menu', $data);
     echo view ('e_hewan',$data);
     echo view ('footer');
           } else{
              return redirect()->to('home/login');
           }
 }

 public function aksi_e_hewan()
 {
    $model = new M_adopsi();
    $a = $this->request->getPost('nama_hewan');
    $b = $this->request->getPost('usia_hewan');
    $c = $this->request->getPost('jk_hewan');
    $d = $this->request->getPost('status');
    $id = $this->request->getPost('id');

    $where=array('id_hewan'=>$id);

    $isi = array(
       'nama_hewan' => $a,
       'usia_hewan' => $b,
       'jk_hewan' => $c,
       'status' => $d
   );

    $model ->edit('hewan', $isi, $where);

    return redirect()->to('home/hewan');
}
public function hapus_hewan($id){
    $model = new M_adopsi();
    $where=array('id_hewan'=>$id);
    $model->hapus('hewan',$where);
    return redirect()->to('home/hewan');
}

}
