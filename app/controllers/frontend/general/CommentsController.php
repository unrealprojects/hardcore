<?php
namespace Controller;

class CommentsController extends \Controller{

	public function up($id)
	{
        /* Проверка ip */
        if(!\Model\General\CommentsVoted::where('comment_id',$id)->where('ip',\Request::getClientIp())->first() &&
            $newVote=\Model\General\Comments::find($id)){

            $newVoteIp = new \Model\General\CommentsVoted();
            $newVoteIp->comment_id=$id;
            $newVoteIp->ip=\Request::getClientIp();
            $newVoteIp->save();

            $newVote->rating=++$newVote->rating;
            $newVote->save();
            echo json_encode(['Event'=>'Сообщение','Message'=>'Спасибо, Ваш голос учтен!','Type'=>'Success']);
        }else{
            echo json_encode(['Event'=>'Ошибка','Message'=>'Возможно, Вы уже проголосовали!','Type'=>'Error']);
        }
	}

    public function down($id)
    {
        /* Проверка ip */
        if(!\Model\General\CommentsVoted::where('comment_id',$id)->where('ip',\Request::getClientIp())->first() &&
            $newVote=\Model\General\Comments::find($id)){

            $newVoteIp = new \Model\General\CommentsVoted();
            $newVoteIp->comment_id=$id;
            $newVoteIp->ip=\Request::getClientIp();
            $newVoteIp->save();

            $newVote->rating=--$newVote->rating;
            $newVote->save();
            echo json_encode(['Event'=>'Сообщение','Message'=>'Спасибо, Ваш голос учтен!','Type'=>'Success']);
        }else{
            echo json_encode(['Event'=>'Ошибка','Message'=>'Возможно, Вы уже проголосовали!','Type'=>'Error']);
        }
    }
}
