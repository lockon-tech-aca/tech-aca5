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
    /**
     * 入力された表示開始期限と表示終了期限の前後関係の判定
     *
     * 表示開始期限が表示終了期限より後の時間が選択された際にエラーを返す
     * @param  array $value value[0] = 判定対象1(YYYY) value[1] = 判定対象1(MM) value[2] = 判定対象1(DD) value[3] = 項目名1
     *                       value[4] = 判定対象2(YYYY) value[5] = 判定対象2(MM) value[6] = 判定対象2(DD) value[7] = 項目名2
     * @return void
     */
    public function CHECK_DATE_CONTEXT($value)
    {
        $keyname_start_year = $this->arrParam[$value[0]];
        $keyname_start_month = $this->arrParam[$value[1]];
        $keyname_start_day = $this->arrParam[$value[2]];
        $disp_name_start = $value[3];
        $keyname_end_year = $this->arrParam[$value[4]];
        $keyname_end_month = $this->arrParam[$value[5]];
        $keyname_end_day = $this->arrParam[$value[6]];
        $disp_name_end = $value[7];
        $arrKeyname_start = array($keyname_start_year,$keyname_start_month,$keyname_start_day);
        $arrKeyname_end = array($keyname_end_year,$keyname_end_month,$keyname_end_day);


        for($i = 0; $i <= 2;$i++)
        {
            if (isset($this->arrErr[$value[$i]] )){
                return;
            }
        }

        for($j = 4; $j <= 6;$j++)
        {
            if (isset($this->arrErr[$value[$j]] ))
            {
                return;
            }
        }



        foreach($arrKeyname_start as $key => $start_date)
        {

            if($start_date > $arrKeyname_end[$key])
            {
                $this->arrErr[$value[0]] =
                    "※ {$disp_name_start}は{$disp_name_end}よりも前の時間で入力してください。<br />";
                $this->arrErr[$value[4]] =
                    "※ {$disp_name_start}は{$disp_name_end}よりも前の時間で入力してください。<br />";
            }
            else if($start_date === $arrKeyname_end[$key])
            {
                continue;
            }
            else
            {
                break;
            }

        }




    }


}
