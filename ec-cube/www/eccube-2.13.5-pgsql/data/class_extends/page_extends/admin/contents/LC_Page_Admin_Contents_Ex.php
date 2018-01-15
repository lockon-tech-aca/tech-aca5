<?php
/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) 2000-2014 LOCKON CO.,LTD. All Rights Reserved.
 *
 * http://www.lockon.co.jp/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

require_once CLASS_REALDIR . 'pages/admin/contents/LC_Page_Admin_Contents.php';

/**
 * コンテンツ管理 のページクラス(拡張).
 *
 * LC_Page_Admin_Contents をカスタマイズする場合はこのクラスを編集する.
 *
 * @package Page
 * @author LOCKON CO.,LTD.
 * @version $Id$
 */
class LC_Page_Admin_Contents_Ex extends LC_Page_Admin_Contents
{
    /**
     * Page を初期化する.
     *
     * @return void
     */
    function init()
    {
        parent::init();

        //以下、追記
        //プルダウンメニューの設定
        //フォーマット
        $this->arrForm_start = array(
            'start_year' => date('Y'),
            'start_month' => date('n'),
            'start_day' => date('j'),
        );
        $this->arrForm_end = array(
            'end_year' => date('Y'),
            'end_month' => date('n'),
            'end_day' => date('j'),
        );


        $objDate = new SC_Date_Ex(ADMIN_NEWS_STARTYEAR);
        //プルダウンメニューの選択肢
        $this->arr_start_Year = $objDate->getYear();
        $this->arr_start_Month = $objDate->getMonth();
        $this->arr_start_Day = $objDate->getDay();
        $this->arr_end_Year = $objDate->getYear();
        $this->arr_end_Month = $objDate->getMonth();
        $this->arr_end_Day = $objDate->getDay();
        //追記終了

    }

    /**
     * Page のプロセス.
     *
     * @return void
     */
    function process()
    {
        parent::process();
    }


    /**
     * Page のアクション.
     *
     * @return void
     */
    public function action()
    {
        $objNews = new SC_Helper_News_Ex();

        $objFormParam = new SC_FormParam_Ex();
        $this->lfInitParam($objFormParam);
        $objFormParam->setParam($_POST);   //arrValueへ格納
        $objFormParam->convParam();

        $news_id = $objFormParam->getValue('news_id');   //arrValueの値をnews_idで紐づけて取り出す

        //---- 新規登録/編集登録
        switch ($this->getMode()) {
            case 'edit':
                $this->arrErr = $this->lfCheckError($objFormParam);
                if (!SC_Utils_Ex::isBlank($this->arrErr['news_id'])) {
                    trigger_error('', E_USER_ERROR);

                    return;
                }

                if (count($this->arrErr) <= 0) {
                    // POST値の引き継ぎ
                    $arrParam = $objFormParam->getHashArray();
                    // 登録実行
                    $res_news_id = $this->doRegist($news_id, $arrParam, $objNews);
                    if ($res_news_id !== FALSE) {
                        // 完了メッセージ
                        $news_id = $res_news_id;
                        $this->tpl_onload = "alert('登録が完了しました。');";
                    }
                }
                // POSTデータを引き継ぐ
                $this->tpl_news_id = $news_id;
                break;

            case 'pre_edit':
                $news = $objNews->getNews($news_id);
                list($news['year'],$news['month'],$news['day']) = $this->splitNewsDate($news['cast_news_date']);
                //以下、追記
                //新着情報一覧の開始期限と終了期限を分割してlistでそれぞれに代入
                list($news['start_year'],$news['start_month'],$news['start_day']) = $this->splitNewsDate($news['cast_start_news_date']);
                if($news['cast_end_news_date'] == 'infinity'){
                    $news['end_year'] = null;
                    $news['end_month'] = null;
                    $news['end_day'] = null;
                }else{
                    list($news['end_year'],$news['end_month'],$news['end_day']) = $this->splitNewsDate($news['cast_end_news_date']);
                }

                //追記終了
                $objFormParam->setParam($news);

                // POSTデータを引き継ぐ
                $this->tpl_news_id = $news_id;
                break;

            case 'delete':
                //----　データ削除
                $objNews->deleteNews($news_id);
                //自分にリダイレクト（再読込による誤動作防止）
                SC_Response_Ex::reload();
                break;

            //----　表示順位移動
            case 'up':
                $objNews->rankUp($news_id);

                // リロード
                SC_Response_Ex::reload();
                break;

            case 'down':
                $objNews->rankDown($news_id);

                // リロード
                SC_Response_Ex::reload();
                break;

            case 'moveRankSet':
                //----　指定表示順位移動
                $input_pos = $this->getPostRank($news_id);
                if (SC_Utils_Ex::sfIsInt($input_pos)) {
                    $objNews->moveRank($news_id, $input_pos);
                }
                SC_Response_Ex::reload();
                break;

            default:
                break;
        }

        $this->arrNews = $objNews->getList();
        $this->line_max = count($this->arrNews);

        $this->arrForm = $objFormParam->getFormParamList();
        //以下、追記
        //開始期限と終了期限のプルダウンメニューのリストを挿入
        $this->arrForm_start = $objFormParam->getFormParamList();
        $this->arrForm_end = $objFormParam->getFormParamList();
        //追記終了
    }


    /**
     * 登録処理を実行.
     *
     * @param  integer  $news_id
     * @param  array    $sqlval
     * @param  SC_Helper_News_Ex   $objNews
     * @return multiple
     */
    function doRegist($news_id, $sqlval, SC_Helper_News_Ex $objNews)
    {

        //以下、オーバーライド。
        //インサートの準備
        $sqlval['start_news_date'] = $this->getStartDate($sqlval);
        $sqlval['end_news_date'] = $this->getEndDate($sqlval);
        $sqlval['end_date_select'] = $this -> End_date_select($sqlval['end_date_select']);
        unset($sqlval['start_year'], $sqlval['start_month'], $sqlval['start_day']);
        unset($sqlval['end_year'], $sqlval['end_month'], $sqlval['end_day']);
        //これらはデータベースのテーブルにないので破棄

        //基底クラスのオーバーライドするメソッドを呼び出し
        parent::doRegist($news_id, $sqlval, $objNews);

    }

    /**
     * ラジオボタンで指定しないを選択した場合は1，指定するを選択した場合は2を格納する
     * @param  int $end_date_select
     * @return int
     */
    public function End_date_select($end_date_select)
    {
        if (strlen($end_date_select) == 0) {
            $end_date_select = "";
        }
        else
        {
            $end_date_select = "1";

        }

        return $end_date_select;
    }


    /**
     * パラメーターの初期化を行う
     * @param SC_FormParam_Ex $objFormParam
     */
    function lfInitParam(&$objFormParam)
    {
        //基底クラスの呼び出し。
        parent::lfInitParam($objFormParam);

        //以下、オーバーライド。
        //表示開始期限と表示終了期限のプルダウンメニューの初期化
        $objFormParam->addParam('表示終了期限の設定の有無', 'end_date_select', INT_LEN, 'n', array('NUM_CHECK', 'MAX_LENGTH_CHECK'));
        $objFormParam->addParam('表示開始期限(年)', 'start_year', INT_LEN, 'n', array('EXIST_CHECK', 'NUM_CHECK', 'MAX_LENGTH_CHECK'));
        $objFormParam->addParam('表示開始期限(月)', 'start_month', INT_LEN, 'n', array('EXIST_CHECK', 'NUM_CHECK', 'MAX_LENGTH_CHECK'));
        $objFormParam->addParam('表示開始期限(日)', 'start_day', INT_LEN, 'n', array('EXIST_CHECK', 'NUM_CHECK', 'MAX_LENGTH_CHECK'));
        $objFormParam->addParam('表示終了期限(年)', 'end_year', INT_LEN, 'n', array( 'NUM_CHECK', 'MAX_LENGTH_CHECK'));
        $objFormParam->addParam('表示終了期限(月)', 'end_month', INT_LEN, 'n', array('NUM_CHECK', 'MAX_LENGTH_CHECK'));
        $objFormParam->addParam('表示終了期限(日)', 'end_day', INT_LEN, 'n', array('NUM_CHECK', 'MAX_LENGTH_CHECK'));

    }

    /**
     * 入力されたパラメーターのエラーチェックを行う。
     * @param  SC_FormParam_Ex $objFormParam
     * @return Array  エラー内容
     */
    function lfCheckError(&$objFormParam)
    {
        $objErr = new SC_CheckError_Ex($objFormParam->getHashArray());
//        parent::lfCheckError($objFormParam);
        $objErr->arrErr = $objFormParam->checkError();
        //入力情報のエラーチェック
        $objErr->doFunc(array('日付', 'year', 'month', 'day'), array('CHECK_DATE'));
        $objErr->doFunc(array( 'end_date_select','表示終了期限','end_year', 'end_month', 'end_day'), array('RADIOBUTTON_SELECT')); //ラジオボタンの選択について
        $objErr->doFunc(array('表示開始期限', 'start_year', 'start_month', 'start_day'), array('CHECK_DATE'));
//        $objErr->doFunc(array('表示終了期限', 'end_year', 'end_month', 'end_day'), array('CHECK_DATE'));
        $objErr->doFunc(array( 'start_year', 'start_month', 'start_day', '表示開始期限',
                                'end_year', 'end_month', 'end_day','表示終了期限','end_date_select'), array('CHECK_DATE_CONTEXT')); //表示開始期限と表示終了期限の前後関係について


        return $objErr->arrErr;
    }

    /**
     * データの表示開始日を返す。
     * @param  Array  $arrPost POSTのグローバル変数
     * @return string 表示開始日を示す文字列
     */
    function getStartDate($arrPost)
    {
        $startDate = $arrPost['start_year'] .'/'. $arrPost['start_month'] .'/'. $arrPost['start_day'];

        return $startDate;
    }

    /**
     * データの表示終了日を返す。
     * @param  Array  $arrPost POSTのグローバル変数
     * @return string 表示終了日を示す文字列
     */
    function getEndDate($arrPost)
    {
        if(strlen($arrPost['end_date_select']) == 0 )
        {
            $endDate = 'infinity';//ラジオボタンで「指定しない」にすると期限が無しになる。⇒表示終了期限に'infinity'をインサート
        }else{
            $endDate = $arrPost['end_year'] .'/'. $arrPost['end_month'] .'/'. $arrPost['end_day'];
        }


        return $endDate;
    }



}
