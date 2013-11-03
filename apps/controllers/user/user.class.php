<?php
/**
 * @Controller   User
 * @author   Faisal Islam <faisal@nascenia.com>
 * @create   11/2/13
 * @modified 11/2/13 (6:56 PM)
 */

class User extends FRequest{

    protected $request;

    public function __construct() {
        $this->request = new FRequest();
    }

    public function create()
    {
        if($this->request->isGet()){
            $tpl = new FHtml('Layout1');
            $view = $tpl->loadView('user','guestNew');
            $tpl->showView($view);
        }
        elseif($this->request->isPost()){
            $data = $this->postData();
            /**
             * Guest Model
             */
            loadModel('users','guest');
            $guestCard = new GuestCard();

            $guestCard->firstname = $data['firstname'];
            $guestCard->lastname = $data['lastname'];
            $guestCard->phone = $data['phone'];
            $guestCard->cell = $data['cell'];
            $guestCard->where('id',5);
            //$guestCard->andWhere('firstname','Faisal');
            $guestCard->save();
        }
    }

    public function guest(){

    }

}