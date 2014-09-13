<?php
namespace Controller;

class VotedController extends \Controller{

	public function up($app_section,$id)
	{
        /* Проверка ip */
        if(!\Model\General\Voted::hasVoted('comments',$id) &&
            $newVote=\Model\General\Comments::find($id)){

            $newVoteIp = new \Model\General\Voted();
            $newVoteIp->app_section='comments';
            $newVoteIp->item_id=$id;
            $newVoteIp->ip=\Request::getClientIp();
            $newVoteIp->save();

            $newVote->rating=++$newVote->rating;
            $newVote->save();
            echo json_encode(['Event'=>'Сообщение','Message'=>'Спасибо, Ваш голос учтен!','Type'=>'Success']);
        }else{
            echo json_encode(['Event'=>'Ошибка','Message'=>'Возможно, Вы уже проголосовали!','Type'=>'Error']);
        }
	}

    public function down($app_section,$id)
    {
        /* Проверка ip */
        if(!\Model\General\Voted::hasVoted('comments',$id) &&
            $newVote=\Model\General\Comments::find($id)){

            $newVoteIp = new \Model\General\Voted();
            $newVoteIp->app_section='comments';
            $newVoteIp->item_id=$id;
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
