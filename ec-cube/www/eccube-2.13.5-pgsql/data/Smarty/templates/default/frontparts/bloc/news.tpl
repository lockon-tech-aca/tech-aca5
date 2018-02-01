<!--{*
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
 *}-->

<!--{strip}-->
    <div class="block_outer">
        <div id="news_area">
            <h2><img src="<!--{$TPL_URLPATH}-->img/title/tit_bloc_news.png" alt="新着情報" /><span class="rss"><a href="<!--{$smarty.const.ROOT_URLPATH}-->rss/<!--{$smarty.const.DIR_INDEX_PATH}-->" target="_blank"><img src="<!--{$TPL_URLPATH}-->img/button/btn_rss.jpg" alt="RSS" /></a></span></h2>
            <div class="block_body">
                <div class="news_contents">
		
                    <!--{section name=data loop=$arrNews}-->
		    
                    <!--{assign var="date_array" value="-"|explode:$arrNews[data].cast_news_date}-->
		    <!--{*追加箇所*}-->
		    <!--{assign var="start_date_array" value="-"|explode:$arrNews[data].cast_start_news_date}-->
		    <!--{assign var="end_date_array" value="-"|explode:$arrNews[data].cast_end_news_date}-->
		    <!--{*終わり*}-->
                    <dl class="newslist">

			<!--{*追加箇所*}-->
			<!--{assign var ="now" value = $smarty.now|date_format:"%Y-%m-%d"}-->
			<!--{assign var="start_date" value = $arrNews[data].cast_start_news_date}-->
			<!--{assign var="end_date" value = $arrNews[data].cast_end_news_date}-->
			<!--{assign var = "disp_judge" value="0"}-->
		
			<!--{if $start_date == "" && $end_date == ""}--><!--{assign var = "disp_judge" value="1"}-->
			<!--{elseif $start_date == "" && $now <= $end_date}--><!--{assign var = "disp_judge" value="1"}-->
			<!--{elseif $end_date == "" && $now >= $start_date}--><!--{assign var = "disp_judge" value="1"}-->
			<!--{elseif $now >= $start_date && $now <= $end_date}--><!--{assign var = "disp_judge" value="1"}-->
			<!--{/if}-->

		
			
			
			<!--{if $disp_judge == "1"}-->
			<!--{*終わり*}-->	
			<!--{if $start_date != ""}--><dt>表示開始日 <!--{$start_date_array[0]}-->年<!--{$start_date_array[1]}-->月<!--{$start_date_array[2]}-->日</dt><!--{/if}-->
			<!--{if $end_date != ""}--><dt>表示終了日 <!--{$end_date_array[0]}-->年<!--{$end_date_array[1]}-->月<!--{$end_date_array[2]}-->日</dt><!--{/if}-->
			<dt>日付<br><!--{$date_array[0]}-->年<!--{$date_array[1]}-->月<!--{$date_array[2]}-->日</dt>
			<dt>
                            <a
				<!--{if $arrNews[data].news_url}--> href="<!--{$arrNews[data].news_url}-->" <!--{if $arrNews[data].link_method eq "2"}--> target="_blank"
                                <!--{/if}-->
				<!--{/if}-->
				>
				<!--{$arrNews[data].news_title|h|nl2br}--></a>
			</dt>
			<dd class="mini"><!--{$arrNews[data].news_comment|h|nl2br}--></dd>
			
			<!--{*追加箇所*}-->
			<!--{/if}-->
		
			
			<!--{*終わり*}-->
			
                    </dl>
                    <!--{/section}-->
                </div>
            </div>
        </div>
    </div>
    <!--{/strip}-->
