<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/4 0004
 * Time: 15:25
 */

class Api extends Ctcms_Controller {
    public function index()
    {
        exit('No direct script access allowed');
    }

    public function daa(){
        $cla=$this->csdb->get_select('class','id,name');
        $pla=$this->csdb->get_select('player','id,name,bs');

        echo json_encode(['cla'=>$cla,'pla'=>$pla]);
    }
    public function vod(){
        $id = $this->input->post('id');
        $ac = $this->input->post('act');
        if($ac=='up'){
            $url = $this->input->post('url');
            $cla=$this->csdb->get_update('vod',$id,array('url'=>$url));
        }else{
            $cla=$this->csdb->get_row_arr('vod','id,url',array('id'=>$id));
            while(empty($cla)){
                $id++;
                $cla=$this->csdb->get_row_arr('vod','id,url',array('id'=>$id));
            }
            echo json_encode($cla);
        }
    }

    public function has(){
        $s=$this->input->get('s');
        if($this->csdb->get_row_arr('vod_sou','*',['sour'=>$s])){
            echo 2;
        }else{
            echo 1;
        }
    }

    public function btbtby(){
        $this->save();
    }

    public function fengxing(){
//        $this->input->post('video');
//        $this->input->post('still');
        $data['name'] = $this->input->post('name');
        $data['pic'] = $this->input->post('still');
        $data['pic2'] = $this->input->post('still');
        $ji[]="1$".$this->input->post('video');
        $data['cid']=$this->input->post('cid');
        $purl[]='ck###'.implode("\n",$ji);
        $data['url'] = implode("#ctcms#",$purl);
        $data['addtime']=time();
        echo $this->csdb->get_insert('vod',$data);
    }

    private function save()
    {
        $n = $this->input->post('name');
        $u = $this->input->post('url');
        $i = $this->input->post('img');
        $a = $this->input->post('ator');
        $c = $this->input->post('cid');
        $p= $this->input->post('player');
        $source = $this->input->post('source');
        if($this->csdb->get_row_arr('vod_sou','*',['source'=>$source])){
            echo json_encode(['info'=>'存在']);
            exit();
        }

        $data['name'] = $n;
        $data['pic'] = $i;
        $data['pic2'] = $i;
//        $data['tid'] = (int)$this->input->post('tid');
        $data['cid'] = $c;
//        $data['zid'] = (int)$this->input->post('zid');
//        $data['yid'] = (int)$this->input->post('yid');
//        $data['hits'] = (int)$this->input->post('hits');
//        $data['daoyan'] = $this->input->post('daoyan',true);
//        $data['zhuyan'] = $this->input->post('zhuyan',true);
//        $data['type'] = $this->input->post('type',true);
//        $data['skin'] = $this->input->post('skin',true);
//        $data['year'] = $this->input->post('year',true);
//        $data['info'] = $this->input->post('info',true);
//        $data['state'] = $this->input->post('state',true);
//        $data['diqu'] = $this->input->post('diqu',true);
        $data['zhuyan'] = $a;
//        $data['text'] = $this->input->post('text');
        if(empty($data['skin'])) $data['skin']='play.html';
        if(empty($data['name']) || empty($data['cid'])){
            echo json_encode(['info'=>'没有分类或名称']);
            exit();
        }

        //�������Ͳ��ŵ�ַ
        $play =$p;
        $url = $u;
        $purl=array();
        $ji=[];
        foreach($url as $k=>$v){
            $ji[]=($k+1).'$'.$v;
        }
        $purl[]=$play.'###'.implode("\n",$ji);
        $data['url'] = implode("#ctcms#",$purl);
        $data['addtime']=time();

        if($vid=$this->csdb->get_insert('vod',$data)){
            $this->csdb->get_insert('vod_sou',['vid'=>$vid,'source'=>$source]);
            echo json_encode(['info'=>1]);
        }else{
            echo json_encode($data);
        }
    }
}