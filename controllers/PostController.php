<?php

namespace app\controllers;

use Yii;
use app\models\Post;
use app\models\PostSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller {
	/**
	 * {@inheritdoc}
	 */
	public function behaviors() {
		return [
			'verbs'  => [
				'class'   => VerbFilter::className(),
				'actions' => [
					'delete' => [ 'POST' ],
				],
			],
			'access' => [
				'class' => AccessControl::className(),

				'rules' => [
					[
						'allow'   => true,
						'roles'   => [ 'manager','admin' ],
					],

				],
			],
		];

	}

	/**
	 * Lists all Post models.
	 * @return mixed
	 */
	public function actionIndex() {
		$searchModel  = new PostSearch();
		$dataProvider = $searchModel->search( Yii::$app->request->queryParams );

		return $this->render( 'index', [
			'searchModel'  => $searchModel,
			'dataProvider' => $dataProvider,
		] );
	}

	/**
	 * Displays a single Post model.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionView( $id ) {
		return $this->render( 'view', [
			'model' => $this->findModel( $id ),
		] );
	}

	/**
	 * Creates a new Post model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate() {
		//  VarDumper::dump(Yii::$app->user,10,true);
		$model = new Post();

		if ( $model->load( Yii::$app->request->post() ) ) {
			$model->save();

			return $this->redirect( [ 'view', 'id' => $model->id ] );
		}

		return $this->render( 'create', [
			'model' => $model,
		] );
	}

	/**
	 * @param $id
	 *
	 * @return string|\yii\web\Response
	 * @throws HttpException
	 * @throws NotFoundHttpException
	 */
	public function actionUpdate( $id ) {
		$model = $this->findModel( $id );

		if (!\Yii::$app->user->can('CanEditOwnPost', ['post' => $model])) {
			throw new HttpException(403,'You don\'t have premission');
		}

		if ( $model->load( Yii::$app->request->post() ) && $model->save() ) {
			return $this->redirect( [ 'view', 'id' => $model->id ] );
		}

		return $this->render( 'update', [
			'model' => $model,
		] );
	}

	/**
	 * Deletes an existing Post model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionDelete( $id ) {
		$this->findModel( $id )->delete();

		return $this->redirect( [ 'index' ] );
	}

	/**
	 * Finds the Post model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 *
	 * @param integer $id
	 *
	 * @return Post the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel( $id ) {
		if ( ( $model = Post::findOne( $id ) ) !== null ) {
			return $model;
		}

		throw new NotFoundHttpException( 'The requested page does not exist.' );
	}
}
