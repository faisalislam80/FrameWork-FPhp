<?php
/**
 * @Controller   User
 * @author   Faisal Islam <faisal@nascenia.com>
 * @create   11/2/13
 * @modified 11/2/13 (6:56 PM)
 */

class User extends FRequest{

    public function create()
    {
        if($this->isGet()){
            $view = new FHtml('Layout1');
            $data = new GuestCard(1);
            $content = $view->loadView('user','guestNew',array(
                'firstname' => $data->firstname,
                'lastname'  => $data->lastname
            ));

            FHtml::showView($content);
        }

        if($this->isPost()){
            $data = $this->postData();
            dd($data);
        }

    }

}