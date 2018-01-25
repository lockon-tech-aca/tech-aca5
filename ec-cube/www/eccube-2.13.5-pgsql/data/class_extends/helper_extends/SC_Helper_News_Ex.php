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

require_once CLASS_REALDIR . 'helper/SC_Helper_News.php';

/**
 * 新着情報を管理するヘルパークラス(拡張).
 *
 * LC_Helper_News をカスタマイズする場合はこのクラスを編集する.
 *
 * @package Helper
 * @author pineray
 * @version $Id:$
 */
class SC_Helper_News_Ex extends SC_Helper_News
{
    //put your code here
    /**
     * ニュース一覧の取得.
     *
     * @param  integer $dispNumber  表示件数
     * @param  integer $pageNumber  ページ番号
     * @param  boolean $has_deleted 削除されたニュースも含む場合 true; 初期値 false
     * @return array
     */
    public function getList_front($dispNumber = 0, $pageNumber = 0, $has_deleted = false)
    {

        $objQuery =& SC_Query_Ex::getSingletonInstance();

        $col = 'news_title, news_comment, news_url, link_method, cast(news_date as date) as cast_news_date';
        $table = 'dtb_news';
        $where_start_date = "(start_news_date is null OR start_news_date <= CURRENT_TIMESTAMP AT TIME ZONE 'JST')";
        $where_end_date = "(end_news_date is null OR end_news_date > CURRENT_TIMESTAMP AT TIME ZONE 'JST' - INTERVAL '1 DAY')";
        $where_del_flg ='del_flg = 0';

        $objQuery->setwhere($where_start_date);
        $objQuery->andWhere($where_end_date);
        $where = $objQuery->andWhere($where_del_flg);



        $objQuery->setOrder('rank DESC');
        if ($dispNumber > 0) {
            if ($pageNumber > 0) {
                $objQuery->setLimitOffset($dispNumber, (($pageNumber - 1) * $dispNumber));
            } else {
                $objQuery->setLimit($dispNumber);
            }
        }

        $arrRet = $objQuery->select($col, $table, $where);
        return $arrRet;
    }

    /**
     * ニュース一覧の取得.
     *
     * @param  integer $dispNumber  表示件数
     * @param  integer $pageNumber  ページ番号
     * @param  boolean $has_deleted 削除されたニュースも含む場合 true; 初期値 false
     * @return array
     */
    public function getList($dispNumber = 0, $pageNumber = 0, $has_deleted = false)
    {
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $col = "news_id, news_date, rank, news_title, news_comment, news_url, news_select, link_method, creator_id, 
              create_date, update_date, del_flg, cast(news_date as date) as cast_news_date,
              cast(start_news_date as date) as cast_start_news_date, cast(end_news_date as date) as cast_end_news_date";

        $where = '';
        if (!$has_deleted) {
            $where .= 'del_flg = 0';
        }
        $table = 'dtb_news';
        $objQuery->setOrder('rank DESC');
        if ($dispNumber > 0) {
            if ($pageNumber > 0) {
                $objQuery->setLimitOffset($dispNumber, (($pageNumber - 1) * $dispNumber));
            } else {
                $objQuery->setLimit($dispNumber);
            }
        }
        $arrRet = $objQuery->select($col, $table, $where);

        return $arrRet;
    }

    /**
     * ニュースの情報を取得.
     *
     * @param  integer $news_id     ニュースID
     * @param  boolean $has_deleted 削除されたニュースも含む場合 true; 初期値 false
     * @return array
     */
    public static function getNews($news_id, $has_deleted = false)
    {
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $col = "news_id, news_date, rank, news_title, news_comment, news_url, news_select, link_method, creator_id, 
              create_date, update_date, del_flg, cast(news_date as date) as cast_news_date,
              cast(start_news_date as date) as cast_start_news_date, cast(end_news_date as date) as cast_end_news_date";
        $where = 'news_id = ?';
        if (!$has_deleted) {
            $where .= ' AND del_flg = 0';
        }
        $arrRet = $objQuery->select($col, 'dtb_news', $where, array($news_id));

        return $arrRet[0];
    }




}
