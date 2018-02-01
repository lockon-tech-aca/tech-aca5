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

require_once CLASS_REALDIR . 'SC_CheckError.php';

class SC_CheckError_Ex extends SC_CheckError
{
     public function CHECK_DATE4($value)
    {
        $disp_name = $value[0];
        $keyname = $value[1];

        if (isset($this->arrErr[$keyname])) {
            return;
        }

        $this->createParam($value);

        $input_year = $this->arrParam[$value[1]];
        $input_month = $this->arrParam[$value[2]];
        $input_day = $this->arrParam[$value[3]];
       
        if ($input_year == 0 && $input_month == 0 && $input_day == 0)
            ;
        // 少なくともどれか一つが入力されている。
        elseif ($input_year > 0 || $input_month > 0 || $input_day > 0) {
            // 年月日のどれかが入力されていない。
            if (!(strlen($input_year) > 0 && strlen($input_month) > 0 && strlen($input_day) > 0)) {
                $this->arrErr[$keyname] =
                    "※ {$disp_name}を設定する場合は全ての項目を入力して下さい。<br />";
            } elseif (!checkdate($input_month, $input_day, $input_year)) {
                $this->arrErr[$keyname] =
                    "※ {$disp_name}が正しくありません。<br />";
            }
        }
    }

    /*-----------------------------------------------------------------*/
    /*  CHECK_SET_TERM4
    /*  年月日に別れた2つの期間の妥当性をチェックし、整合性と期間を返す
    /*  引数 (開始年,開始月,開始日,終了年,終了月,終了日)
    /*  戻値 array(１，２，３)
    /*          １．開始年月日 (YYYYMMDD 000000)
    /*          ２．終了年月日 (YYYYMMDD 235959)
    /*          ３．エラー (0 = OK, 1 = NG)
    /*-----------------------------------------------------------------*/
    // value[0] = 項目名1
    // value[1] = 項目名2
    // value[2] = start_year
    // value[3] = start_month
    // value[4] = start_day
    // value[5] = end_year
    // value[6] = end_month
    // value[7] = end_day
    public function CHECK_SET_TERM4($value)
    {
        $disp_name1 = $value[0];
        $disp_name2 = $value[1];
        $keyname1 = $value[2];
        $keyname2 = $value[5];

        // 期間指定
        if (isset($this->arrErr[$keyname1]) || isset($this->arrErr[$keyname2])) {
            return;
        }

        // $this->createParam($value);

        $start_year = $this->arrParam[$value[2]];
        $start_month = $this->arrParam[$value[3]];
        $start_day = $this->arrParam[$value[4]];
        $end_year = $this->arrParam[$value[5]];
        $end_month = $this->arrParam[$value[6]];
        $end_day = $this->arrParam[$value[7]];
        if ((strlen($start_year) > 0 || strlen($start_month) > 0 || strlen($start_day) > 0)
            && ! checkdate($start_month, $start_day, $start_year)
        ) {
            $this->arrErr[$keyname1] =
                "※ {$disp_name1}を正しく指定してください。<br />";
        }
        if ((strlen($end_year) > 0 || strlen($end_month) > 0 || strlen($end_day) > 0)
            && ! checkdate($end_month, $end_day, $end_year)
        ) {
            $this->arrErr[$keyname2] =
                "※ {$disp_name2}を正しく指定してください。<br />";
        }
        if ((strlen($start_year) > 0 && strlen($start_month) > 0 && strlen($start_day) > 0)
            && (strlen($end_year) > 0 || strlen($end_month) > 0 || strlen($end_day) > 0)
        ) {
            $date1 = sprintf('%d%02d%02d000000', $start_year, $start_month, $start_day);
            $date2 = sprintf('%d%02d%02d235959', $end_year, $end_month, $end_day);

            if (($this->arrErr[$keyname1] == '' && $this->arrErr[$keyname2] == '') && $date1 > $date2) {
                $this->arrErr[$keyname1] =
                    "※ {$disp_name1}と{$disp_name2}の関係が前後しています。<br />";
                $this->arrErr[$keyname2] =
                    "※ {$disp_name1}と{$disp_name2}の関係が前後しています。<br />";
            }
        }
    }

    
}
