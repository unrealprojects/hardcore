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

    public function add($list_id){
       $reCaptcha = new \Greggilbert\Recaptcha\CheckRecaptcha();
       if($reCaptcha=$reCaptcha->check(\Input::get('challenge'),\Input::get('response'))[0]=='true'){
           $comment = new \Model\General\Comments();

           $comment->name = \Input::get('name');
           $comment->comment = \Input::get('comment');
           $comment->list_id = $list_id;
           $comment->save();
           $comment['comment']=$comment->find($comment->id)->toArray();
           $content = \View::make('frontend.standard.layouts.comments.Item',$comment);


           $newVoteIp = new \Model\General\CommentsVoted();
           $newVoteIp->comment_id=$comment->id;
           $newVoteIp->ip=\Request::getClientIp();
           $newVoteIp->save();

           echo json_encode(['Event'=>'Сообщение','Message'=>'Спасибо, Ваш комментрий добавлен!','Type'=>'Success',
                             'comment'=>[htmlentities($content)]]);
       }else{
           echo json_encode(['Event'=>'Ошибка','Message'=>'Не верно введена капча!','Type'=>'Error']);
       }
    }
}
