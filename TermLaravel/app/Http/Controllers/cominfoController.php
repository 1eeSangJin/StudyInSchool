<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cominfoController extends Controller
{
    //
    public function showCominfo(){
        require_once("tools.php");
        require_once("boardDao.php");

        $page = requestValue("page");

        $dao = new boardDao();
        

        $NumOfCominfo = $dao->getNumOfComInfo();

        if($NumOfCominfo > 0){
          $numPages = ceil($NumOfCominfo / NUM_LINES);

          if($page < 1)
            $page = 1;
          if ($page > $numPages)
            $page = $numPages;

          $start = ($page - 1) * NUM_LINES;
          $msgs = $dao->getAllcominfo($start, NUM_LINES);

          $firstLink = floor(($page - 1) / NUM_PAGE_LINKS) * NUM_PAGE_LINKS + 1;
          $lastLink = $firstLink + 1;
          if($lastLink > $numPages)
            $lastLink = $numPages;
        }

        return view('cominfo.cominfoBoard')
            ->with('NumOfCominfo', $NumOfCominfo)
            ->with('firstLink', $firstLink)
            ->with('msgs', $msgs)
            ->with('page', $page)
            ->with('lastLink', $lastLink);
    }

    public function showViewCominfo(){
        require_once("tools.php");
        require_once("boardDao.php");

        $page = requestValue('page');
        $num = requestValue('num');
        $dao = new boardDao();
        $msgs = $dao->getCominfo($num);
        $comments = $dao->getAllCommentComInfo($num);

        return view('cominfo.viewCominfo')
            ->with('page', $page)
            ->with('num', $num)
            ->with('msgs', $msgs)
            ->with('comments', $comments);
    }

    public function showWriteCominfo(){
        return view('cominfo.writeCominfo_form');
    }

    public function showModifyCominfo(){
        return view('cominfo.modifyCominfo_form');
    }

    public function writeComment(){
        require_once('tools.php');
        require_once('boardDao.php');
    
        $board_num = requestValue('num');
        $comment = requestValue('comment');
        $page = requestValue('page');
    
        if(!isset($_SESSION['userNick'])){
            error_reporting(0);
            errorBack('로그인 하십시오');
        }else if(!$comment){
            errorBack('내용을 입력하십시오');
        }else{
            $userNick = $_SESSION['userNick'];
            $affName = $_SESSION['affName'];
            $dao = new boardDao();
            $dao->InputCommentComInfo($board_num, $userNick, $affName, $comment);
            return redirect('2?num=$num&page=$page');
        }
    }

    public function comment(){
              
    }
}
