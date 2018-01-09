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

require_once CLASS_REALDIR . 'SC_Query.php';

class SC_Query_Ex extends SC_Query
{
    /**
     * 構築した SELECT 文を取得する.
     *
     * クラス変数から WHERE 句を組み立てる場合、$arrWhereVal を経由してプレースホルダもクラス変数のもので上書きする。
     * @param  string $cols        SELECT 文に含めるカラム名
     * @param  string $from        SELECT 文に含めるテーブル名
     * @param  string $where       SELECT 文に含める WHERE 句
     * @param  mixed  $arrWhereVal プレースホルダ(参照)
     * @return string 構築済みの SELECT 文
     */
    public function getSql($cols, $from = '', $where = '', &$arrWhereVal = null)
    {
        $dbFactory = SC_DB_DBFactory_Ex::getInstance();

        $sqlse = "SELECT $cols";

        if (strlen($from) === 0) {
            $sqlse .= ' ' . $dbFactory->getDummyFromClauseSql();
        } else {
            $sqlse .= " FROM $from";
        }

        // 引数の$whereを優先する。
        if (strlen($where) >= 1) {
            $sqlse .= " WHERE $where";
        } elseif (strlen($this->where) >= 1) {
            $sqlse .= ' WHERE ' . $this->where;
            // 実行時と同じくキャストしてから評価する (空文字を要素1の配列と評価させる意図)
            $arrWhereValForEval = (array) $arrWhereVal;
            if (empty($arrWhereValForEval)) {
                $arrWhereVal = $this->arrWhereVal;
            }
        }

        $sqlse .= ' ' . $this->groupby . ' ' . $this->order . ' ' . $this->option;

        return $sqlse;
    }

    /**
     * SELECT 文に付与する WHERE 句を設定する.
     *
     * この関数で設定した値は SC_Query::getSql() で使用されます.
     *
     * @param  string   $where       WHERE 句に付与する文字列
     * @param  mixed    $arrWhereVal プレースホルダ
     * @return SC_Query 自分自身のインスタンス
     */
    public function setWhere($where = '', $arrWhereVal = array())
    {
        $this->where = $where;
        $this->arrWhereVal = $arrWhereVal;

        return $this;
    }


    /**
     * SELECT 文の WHERE 句に付与する AND 条件を設定する.
     *
     * この関数で設定した値は SC_Query::getSql() で使用されます.
     *
     * @param  string   $str WHERE 句に付与する AND 条件の文字列
     * @return SC_Query 自分自身のインスタンス
     */
    public function andWhere($str)
    {
        if ($this->where != '') {
            $this->where .= ' AND ' . $str;
        } else {
            $this->where = $str;
        }

        return $this;
    }
}
