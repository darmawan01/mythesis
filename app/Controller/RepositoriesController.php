<?php
App::uses('AppController', 'Controller');
class RepositoriesController extends AppController {
    public $components = array(
        'Preprocessing'
    );    
    
    public function index(){
        $this->paginate = array(
            'contain' => array(
                'CleanRepository'
                
            ),
            'limit' => 20
        );
        $this->set('data', $this->paginate('Repository'));
        
    }
     
    public function preprocessingDataTraining($limit,$page){
         $dataTweet = $this->Repository->find('all',array('limit' => $limit,'page'=> $page));
        $clean = array();
        
        foreach($dataTweet as $index => $tw){
            $clean[$index]['CleanRepository']['content'] = $this->Preprocessing->doIt($tw['Repository']['tweet']);
            $clean[$index]['CleanRepository']['repositori_id'] = $tw['Repository']['id_repositori'];
        }
               
        
        if(!$this->Repository->CleanRepository->saveAll($clean)){
            $this->Session->setFlash('Gagal');
        }else{
            $this->set('jumlah',count($clean));
            $this->set(compact('page','limit'));
        }
    }
    
    
}