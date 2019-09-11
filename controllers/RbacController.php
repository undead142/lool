<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // добавляем разрешение "createPost"
        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);

        // добавляем разрешение "updatePost"
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update post';
        $auth->add($updatePost);

        $deletePost = $auth->createPermission('deletePost');
        $deletePost->description = 'Delete Post';
        $auth->add($deletePost);

        $seePost = $auth->createPermission('seePost');
        $seePost->description = 'see Post';
        $auth->add($seePost);
        // добавляем роль "author" и даём роли разрешение "createPost"
        $user = $auth->createRole('user');
        $auth->add($user, $seePost);


        $author = $auth->createRole('manager');
        $auth->add($author);
        $auth->addChild($author, $createPost);
        $auth->addChild($author, $updatePost);
        $auth->addChild($author, $deletePost);
        $auth->addChild($author, $user);
        // добавляем роль "admin" и даём роли разрешение "updatePost"
        // а также все разрешения роли "author"
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $author);



        // Назначение ролей пользователям. 1 и 2 это IDs возвращаемые IdentityInterface::getId()
        // обычно реализуемый в модели User.
        $auth->assign($author, 2);
        $auth->assign($admin, 1);
    }
}