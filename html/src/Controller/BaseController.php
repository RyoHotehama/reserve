<?php
declare(strict_types=1);

namespace App\Controller;


use Cake\Auth\DefaultPasswordHasher;
use Cake\Event\EventInterface;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BaseController extends AppController
{

    public function initialize():void
    {
        parent::initialize();
        //レイアウトの指定
        $this-> viewBuilder()->setlayout('user');
        //各種コンポーネントのロード
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize' => ['Controller'],
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginRedirect' => [
                'controller' => 'Schedules',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'authError' => 'ログインしてください'
        ]);
    }

    //ログイン処理
    function login()
    {
        //Post時の処理
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            //Authのidentifyをユーザーに設定
            if (!empty($user)) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('メールアドレスかパスワードが間違っています');
        }
    }

    //ログアウト処理
    public function logout()
    {
        //$this->request->session()->destroy();
        return $this->redirect($this->Auth->logout());
    }

    //認証ページを使わないページの設定
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow([]);
    }

    //認証時のロールチェック
    public function isAuthorized($user = null)
    {
        //管理者はtrue
        if ($user['role'] === 1) {
            return true;
        }
        //一般ユーザーはtrue
        if ($user['role'] === 0) {
            if ($this->name === 'Schedules'){
                return true;
            }
            return false;
        }

        //他は全てfalse
        return false;
    }
}