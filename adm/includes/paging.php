<?php
/**************************************************************************************
* Class: Pager
* Author: Tsigo <tsigo@tsiris.com>
* Methods:
* findStart
* findPages
* pageList
* nextPrev
* Redistribute as you see fit.
**************************************************************************************/
class Pager
{
/***********************************************************************************
* int findStart (int limit)
* Returns the start offset based on $_GET['page'] and $limit
***********************************************************************************/
function findStart($limit)
{
if ((!isset($_GET['page'])) || ($_GET['page'] == "1"))
{
$start = 0;
$_GET['page'] = 1;
}
else
{
$start = ($_GET['page']-1) * $limit;
}

return $start;
}
/***********************************************************************************
* int findPages (int count, int limit)
* Returns the number of pages needed based on a count and a limit
***********************************************************************************/
function findPages($count, $limit)
{
$pages = (($count % $limit) == 0) ? $count / $limit : floor($count / $limit) + 1;

return $pages;
}
/***********************************************************************************
* string pageList (int curpage, int pages)
* Returns a list of pages in the format of "Â« < [pages] > Â»"
***********************************************************************************/
function pageList($curpage, $pages, $link)
{

$page_list = "";

/* Print the first and previous page links if necessary */
if (($curpage != 1) && ($curpage))
{
$page_list .= " <li><a href=\"".$link."&page=1\" title=\"First Page\">".$lang['first_page']."</a> </li>";
}

if (($curpage-1) > 0)
{
$page_list .= "<li><a href=\"".$link."&page=".($curpage-1)."\" title=\"Previous Page\">".$lang['previous_page']."</a> </li>";
}

/* Print the numeric page list; make the current page unlinked and bold */
for ($i=1; $i<=$pages; $i++)
{
if ($i == $curpage)
{
$page_list .= "<li class=\"current\"><a><b>".$i."</a></b></li>";
}
else
{
$page_list .= "<li><a href=\"".$link."&page=".$i."\" title=\"Page ".$i."\">".$i."</a></li>";
}
$page_list .= " ";
}

/* Print the Next and Last page links if necessary */
if (($curpage+1) <= $pages)
{
$page_list .= "<li><a href=\"".$link."&page=".($curpage+1)."\" title=\"Next Page\">".$lang['next_page']."</a> </li>";
}

if (($curpage != $pages) && ($pages != 0))
{
$page_list .= "<li><a href=\"".$link."&page=".$pages."\" title=\"Last Page\">".$lang['end_page']."</a> </li>";
}
$page_list .= "</td>\n";

return $page_list;
}
/***********************************************************************************
* string nextPrev (int curpage, int pages)
* Returns "Previous | Next" string for individual pagination (it's a word!)
***********************************************************************************/
function nextPrev($curpage, $pages)
{
$next_prev = "";

if (($curpage-1) <= 0)
{
$next_prev .= "Previous";
}
else
{
$next_prev .= "<li><a href=\"".$link."&page=".($curpage-1)."\">".$lang['previous_page']."</a><li>";
}

$next_prev .= " | ";

if (($curpage+1) > $pages)
{
$next_prev .= "Next";
}
else
{
$next_prev .= "<li><a href=\"".$link."&page=".($curpage+1)."\">".$lang['next_page']."</a></li>";
}

return $next_prev;
}
}
?>