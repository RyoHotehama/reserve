<?php
declare(strict_types=1);

namespace App\Controller;

use APP\Controller\AppController;
/**
 * Schedules Controller
 *
 * @property \App\Model\Table\SchedulesTable $Schedules
 * @method \App\Model\Entity\Schedule[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SchedulesController extends BaseController
{
    public function initialize():void
    {
        parent::initialize();
        //レイアウトの指定
        $this-> viewBuilder()->setlayout('schedule');

        //タイムゾーンを設定
        date_default_timezone_set('Asia/Tokyo');

        //ユーザーの登録
        $this->set('authuser', $this->Auth->user());
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        //前月・次月リンクが押された場合は、GETパラメータから年月を取得
        if (isset($_GET['ym'])) {
            $ym = $_GET['ym'];
        } else {
            //今年の年月を表示
            $ym = date('Y-m');
        }

        // タイムスタンプを作成し、フォーマットをチェックする
        $timestamp = strtotime($ym . '-01');
        if ($timestamp === false) {
            $ym = date('Y-m');
            $timestamp = strtotime($ym . '-01');
        }

        // 今日の日付 フォーマット　例）2021-06-3
        $today = date('Y-m-j');

        // カレンダーのタイトルを作成　例）2021年6月
        $html_title = date('Y年n月', $timestamp);

        // 前月・次月の年月を取得
        $prev = date('Y-m', strtotime('-1 month', $timestamp));
        $next = date('Y-m', strtotime('+1 month', $timestamp));

        // 該当月の日数を取得
        $day_count = date('t', $timestamp);

        // １日が何曜日か　0:日 1:月 2:火 ... 6:土
        $youbi = (int) date('w', $timestamp);
        // カレンダー作成の準備
        $weeks = [];
        $week = '';

        // 第１週目：空のセルを追加
        // 例）１日が火曜日だった場合、日・月曜日の２つ分の空セルを追加する
        $week .= str_repeat('<td></td>', $youbi);
        for ( $day = 1; $day <= $day_count; $day++, $youbi++) {

            // 2021-06-3
            $date = $ym . '-' . $day;
        
            if ($today == $date) {
                // 今日の日付の場合は、class="today"をつける
                $week .= '<td class="today"><a href="/schedules/view/'.$date.'">' . $day;
            } else {
                $week .= '<td><a href="/schedules/view/'.$date.'">' . $day;
            }
            $week .= '</a></td>';
            // 週終わり、または、月終わりの場合
            if ($youbi % 7 == 6 || $day == $day_count) {
        
                if ($day == $day_count) {
                    // 月の最終日の場合、空セルを追加
                    // 例）最終日が水曜日の場合、木・金・土曜日の空セルを追加
                    $week .= str_repeat('<td></td>', 6 - $youbi % 7);
                }
                // weeks配列にtrと$weekを追加する
                $weeks[] = '<tr>' . $week . '</tr>';
                // weekをリセット
                $week = '';
            }
        }

        $this->set(compact('prev', 'html_title', 'next', 'weeks'));

    }

    /**
     * View method
     *
     * @param string|null $id Schedule id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        //Y年n月j日に変換
        $date = date("Y年n月j日", strtotime($id));
        //日付をY-m-d H:i:sに変換
        $data = date("Y-m-d H:i:s", strtotime($id));
        //次の日の日付を取得
        $tomorrow = date("Y-m-d H:i:s", strtotime($id .'+1 day'));

        //予定を取得
        $schedules = $this->Schedules->find('all', ['conditions' => ['user_id' => $this->Auth->user('id'), 'schedule_date >=' => $data,'schedule_date <=' => $tomorrow]]);

        //取得した予定と日付をセット
        $this->set('schedules', $schedules->toArray());
        $this->set('today', $id);
        $this->set(compact('date'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $date = $this->request->getQuery('date');
        $schedule = $this->Schedules->newEmptyEntity();
        if ($this->request->is('post')) {
            $schedule = $this->Schedules->patchEntity($schedule, $this->request->getData(),);
            $schedule->user_id = $this->Auth->user('id');
            if ($this->Schedules->save($schedule)) {
                $this->Flash->success(__('登録しました'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('もう一度入力してください'));
        }
        $this->set(compact('schedule','date'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Schedule id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit()
    {
        //スケジュールIDを取得
        $shedule_id = $this->request->getQuery('id');

        //予定を取得
        $schedules = $this->Schedules->find('all', ['conditions' => ['id' => $shedule_id ]]);
        
        //エンティティの追加
        $data = $this->Schedules->get($shedule_id);

        if ($this->request->is('post')) {
            $data = $this->Schedules->patchEntity($data, $this->request->getData(),);
            if ($this->Schedules->save($data)) {
                $this->Flash->success(__('登録しました'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('もう一度入力してください'));
        }
        $this->set(compact('data'));
        $this->set('schedules', $schedules->toArray());
    }

    /**
     * Delete method
     *
     * @param string|null $id Schedule id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete()
    {
        //スケジュールIDを取得
        $shedule_id = $this->request->getQuery('id');

        //エンティティの取得
        $schedule = $this->Schedules->get($shedule_id);
        
        if ($this->Schedules->delete($schedule)) {
            $this->Flash->success(__('削除しました'));
        } else {
            $this->Flash->error(__('削除失敗です'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
