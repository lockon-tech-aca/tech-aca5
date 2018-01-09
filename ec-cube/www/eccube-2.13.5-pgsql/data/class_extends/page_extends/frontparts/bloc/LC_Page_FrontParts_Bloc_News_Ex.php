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

require_once CLASS_REALDIR . 'pages/frontparts/bloc/LC_Page_FrontParts_Bloc_News.php';

/**
 * 新着情報 のページクラス(拡張).
 *
 * LC_Page_FrontParts_Bloc_News をカスタマイズする場合はこのクラスを編集する.
 *
 * @package Page
 * @author LOCKON CO.,LTD.
 * @version $Id$
 */
class LC_Page_FrontParts_Bloc_News_Ex extends LC_Page_FrontParts_Bloc_News
{
    /**
     * Page を初期化する.
     *
     * @return void
     */
    function init()
    {
        parent::init();
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
        switch ($this->getMode()) {
            case 'getList_front':
                $this->lfInitNewsParam($objFormParam);
                $objFormParam->setParam($_POST);
                $objFormParam->convParam();
                $this->arrErr = $objFormParam->checkError(false);
                if (empty($this->arrErr)) {
                    $arrData = $objFormParam->getHashArray();
                    $json = $this->lfGetNewsForJson($arrData, $objNews);
                    echo $json;
                    SC_Response_Ex::actionExit();
                } else {
                    echo $this->lfGetErrors($this->arrErr);
                    SC_Response_Ex::actionExit();
                }
                break;
            case 'getDetail':
                $this->lfInitNewsParam($objFormParam);
                $objFormParam->setParam($_GET);
                $objFormParam->convParam();
                $this->arrErr = $objFormParam->checkError(false);
                if (empty($this->arrErr)) {
                    $arrData = $objFormParam->getHashArray();
                    $json = $this->lfGetNewsDetailForJson($arrData);
                    echo $json;
                    SC_Response_Ex::actionExit();
                } else {
                    echo $this->lfGetErrors($this->arrErr);
                    SC_Response_Ex::actionExit();
                }
                break;
            default:
                $this->arrNews = $objNews->getList_front();
                $this->newsCount = $objNews->getCount();
                break;
        }

    }


    /**
     * 新着情報を取得する.
     *
     * @return array $arrNewsList 新着情報の配列を返す
     */
    public function lfGetNews($dispNumber, $pageNo, SC_Helper_News_Ex $objNews)
    {
        $arrNewsList = $objNews->getList_front($dispNumber, $pageNo);

        // モバイルサイトのセッション保持 (#797)
        if (SC_Display_Ex::detectDevice() == DEVICE_TYPE_MOBILE) {
            foreach ($arrNewsList as $key => $value) {
                $arrRow =& $arrNewsList[$key];
                if (SC_Utils_Ex::isAppInnerUrl($arrRow['news_url'])) {
                    $netUrl = new Net_URL($arrRow['news_url']);
                    $netUrl->addQueryString(session_name(), session_id());
                    $arrRow['news_url'] = $netUrl->getURL();
                }
            }
        }

        return $arrNewsList;
    }


}
